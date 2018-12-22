@extends('layouts.app')


@section('content')

@include('layouts.navbar')

    <div id="wrapper">

        <!-- Sidebar -->
      <div class="navbar-nav sidebar">
        <ul >
          <li class="nav-item active">
            <a class="nav-link" href="/transactions">
              <i class="fas fa-fw fa-tachometer-alt"></i>
              <span>Dashboard</span>
            </a>
          </li>
          
          <li class="nav-item">
          <a class="nav-link" href="{{route('history',Auth::user()->id)}}">
              <i class="fas fa-fw fa-chart-area"></i>
              <span>History</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/currency_exchange">
              <i class="fas fa-fw fa-table"></i>
              <span>Exchange Rates</span></a>
          </li>
        </ul>
      </div>
  
        <div id="content-wrapper">
          <div class="date"><h3 id="datetext"></h3></div>
        
          <div class="container-fluid">
            <div class="content">
              <div class="col col-md-12">
                  {{-- <div class="list-group"> --}}
                      @forelse ($transactions as $transaction)
                          <a href="/transactions/category/{{$transaction->category_id}}/by/{{Auth::user()->id}}" class="list-group-item align-items-center list-group-item-action">
                                  {{$transaction->category->name}}
                                  <span class="count">{{$transaction->count}}</span>
                                  <span class="badge badge-{{$transaction->type == 2 ? 'danger':'success'}} ">{{$transaction->amount}}</span>
                          </a>
                        
                      @empty
                          <p class="alert alert-info text-center">You have no records today!</p>
                      @endforelse
                     
                      <div class="total">
                  
                        <button class="list-group-item align-items-center list-group-item-action total-text">TOTAL
                            
                          <span class="badge badge-info">{{trim($totals['net_total'],'-')}}</span>
                        </button>
                      {{-- </div> --}}
                  </div>
                  
              </div>
            </div>
            <div class="fab" data-toggle="modal" data-target="#exampleModalCenter"> + </div>
            <!-- Modal -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title  w-100 font-weight-bold">Add Transaction</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                      <form class="text-center border border-light p-5" method="POST" action="/transactions">
                        {{ csrf_field() }}
                          <div class="form-group md-form">
                          <input type="number" min="0" class="form-control {{ $errors->has('amount') ? ' is-invalid' : '' }}" id="amount" name="amount" placeholder="Amount" required value="{{ old('amount') }}">
                          </div>
                          <div class="form-group">
                            <select id="category" class="form-control category-select" name="category_id">
                              @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                              @endforeach
                             
                            </select>
                          </div>
                          <div class="form-group md-form">
                          <input type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }} " id="description" name = "description" placeholder="Description" value="{{ old('description') }}">
                          </div>
                          
                          <div class="custom-control custom-radio custom-control-inline">
                              <input type="radio" class="custom-control-input" id="expense" name="expense">
                              <label class="custom-control-label" for="expense">Expense</label>
                          </div>
                            
                            <!-- Default inline 2-->
                          <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="income" name="income">
                            <label class="custom-control-label" for="income">Income</label>
                          </div>
                          <hr>
                          <div class="text-center">
                            <button type="submit" class="btn btn-default">Save</button>
                          </div>
                        </form>
                  </div>
        
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- /.container-fluid -->
  
  
        </div>
        <!-- /.content-wrapper -->
  
      </div>

@include('layouts.footer')

@endsection

