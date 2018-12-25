@extends('layouts.app')



@section('content')
@include('layouts.navbar')

        <div class="container">
            <div class="row"> 
                @foreach ($exchange_rates as $bank)
                        <div class="col col-md-6">
                            <div class="card" >
                                    <div class="card-header">
                                        
                                        {{$bank->title}}
                                        {{-- <span class="card-header-text">{{$info["title"]}}</span> --}}
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-striped">
                                            <tbody>
                                                <tr>
                                                
                                                        <td>Date</td>
                                                        <td>Buy</td>
                                                        <td>Sell</td>
                                                        
                                                </tr>
                                                <tr>
                                                    <td>{{ date('d-m-Y', strtotime($bank->created_at)) }}</td>
                                                    <td>{{ $bank->buy }}</td>
                                                    <td>{{ $bank->sell }}</td>
                                                </tr>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                
                                </div>
                                                       
                            </div>
                        
                        
                        @endforeach
                </div>
                <a class="btn btn-info btn-md" href="/transactions">Go Back</a>

            </div>

            @include('layouts.footer')

@endsection

  