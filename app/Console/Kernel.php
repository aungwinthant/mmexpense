<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\CurrencyCrawler\CurrencyCrawler;
use Carbon\Carbon;
use App\CurrencyExchange;
class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        

        // $schedule->command('inspire')
        //          ->hourly();

        $schedule->call(function(){
            $data = (new CurrencyCrawler())->get_currency_data();
            
            $today_rates= CurrencyExchange::whereDate('created_at',Carbon::today())->get();
            if($today_rates){
                foreach ($today_rates as $rates){
                    CurrencyExchange::destroy($rates->id);
                    print_r('record deleted');
                }
            }
            CurrencyExchange::insert($data);
        })->cron('30 01,13 * * *');
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}