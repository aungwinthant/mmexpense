<?php

namespace App\Helper;

class Helper{

    protected $data=[];
    protected $aya_url="https://www.ayabank.com/en_US";
    protected $centralbank_url="http://forex.cbm.gov.mm/api/latest";

    private function get_aya_data($url){
            $doc = new \DOMDocument();
            //clear special tag error such as header,nav etc
            libxml_use_internal_errors(true);
        
            $doc->loadHTMLFile($url);
            
            $xpath = new \DOMXPath($doc);
            
            //clear white spaces in class name
            $table = $xpath->query("//*[contains(concat(' ', normalize-space(@class), ' '), ' tablepress-id-1')]")->item(0);
        
            $rows = $table->getElementsByTagName('tr');
        
            $date_cell = $rows[0] -> getElementsByTagName('td');
        
            $currency_cell = $rows[1]-> getElementsByTagName('td');
                
            $currency_buy = $currency_cell[1]->nodeValue;
            
            $currency_sell = $currency_cell[2]->nodeValue;

            return [
                "title"=>"AYA Bank",
                "logo" =>"aya_logo.png",
                "date"=>date("d-m-Y"),
                "buy" =>$currency_buy,
                "sell"=>$currency_sell
            ];
    }
    private function get_centralbank_data($url){
        // create curl resource 
        $ch = curl_init(); 

        // set url 
        curl_setopt($ch, CURLOPT_URL, $url); 

        //return the transfer as a string 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        curl_setopt($ch, CURLOPT_USERAGENT,'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.17 (KHTML, like Gecko) Chrome/24.0.1312.52 Safari/537.17');
        curl_setopt($ch, CURLOPT_AUTOREFERER, true); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_VERBOSE, 1);

        // $output contains the output string 
        $output = curl_exec($ch); 

        $data = json_decode($output,true);

        // close curl resource to free up system resources 
        curl_close($ch); 
        
        return [
            "title" => "Central Bank",
            "logo"  => "cbm_logo.png",
            "date"  => date("d-m-Y"),
            "buy"   => $data['rates']["USD"],
            "sell"  => $data['rates']["USD"]
        ];
    }
    private function get_kbz_data($url){
        
    }
    public function get_currency_data(){
        $this->data['aya']= $this->get_aya_data($this->aya_url);
        $this->data['cbm'] = $this->get_centralbank_data($this->centralbank_url);

        return $this->data;
    }
   
}



