@extends('layouts.app')



@section('content')
@include('layouts.navbar')

        <div class="container">
            <div class="row"> 
            @if (is_array($data))
                @foreach ($data as $bank => $info)
                   
                        <div class="col col-md-6">
                            <div class="card" >
                                    <div class="card-header">
                                        
                                        <img src={{ asset("images/".$info["logo"]) }} width=110px height=100px>
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
                                                    <td>{{ $info['date'] }}</td>
                                                    <td>{{ $info['buy'] }}</td>
                                                    <td>{{ $info['sell'] }}</td>
                                                </tr>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                
                                </div>
                                                       
                            </div>
                        
                        @endforeach
                    @endif
                </div>
            </div>
@endsection

  