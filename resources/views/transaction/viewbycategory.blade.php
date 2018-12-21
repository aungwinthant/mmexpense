@extends('layouts.app')


@section('content')

@include('layouts.navbar')

<div class="container">
        <div class="card">
                <!-- Card content -->
                <div class="card-body">
              
                  <!-- Title -->
                  <h4 class="card-title">Transaction Details</h4>
                  <table class="table table-bordered table-responsive-md table-striped text-center">
                        <tbody>
                            <tr class="table-info">
                            
                                    <td>Time</td>
                                    <td>Description</td>
                                    <td>Amount</td>
                                    <td></td>
                                    
                            </tr>
                            @foreach ($transactions as $transaction)
                            <tr>
                                    <td class="pt-3-half">{{ $transaction->created_at }}</td> 
                                    <td class="pt-3-half">{{ $transaction->description }}</td> 
                                    <td class="pt-3-half">{{ $transaction->amount }}</td>
                                    <td >
                                        <form method="POST" action="{{ route('transactions.destroy',$transaction->id) }}">
                                           @method('DELETE')
                                           @csrf
                                              <button type="submit" class="btn btn-danger btn-sm my-0">Delete</button>
                                        </form>
                                    </td>
                            </tr>
                            @endforeach
                           
                            
                        </tbody>
                    </table>
                </div>
               
              
        </div>
        <a class="btn btn-info btn-md" href="/transactions">Go Back</a>
</div>
<!-- Card -->


@endsection