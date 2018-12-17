@extends('layouts.app')


@section('content')

@include('layouts.navbar')

    <div id="wrapper">

        <!-- Sidebar -->
      <div class="navbar-nav sidebar">
        <ul >
          <li class="nav-item active">
            <a class="nav-link" href="index.html">
              <i class="fas fa-fw fa-tachometer-alt"></i>
              <span>Dashboard</span>
            </a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="charts.html">
              <i class="fas fa-fw fa-chart-area"></i>
              <span>Charts</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="tables.html">
              <i class="fas fa-fw fa-table"></i>
              <span>Tables</span></a>
          </li>
        </ul>
      </div>
  
        <div id="content-wrapper">
          <div class="date"><h3 id="datetext"></h3></div>
        
          <div class="container-fluid">
            <div class="content">
              <div class="col col-md-12">
                <div class="list-group">
                  @if (!is_null($transactions))
                    @foreach ($transactions as $transaction)
                      <a href="#!" class="list-group-item d-flex justify-content-between align-items-center list-group-item-action">{{$transaction->category->name}}<span class="badge badge-danger badge-pill">{{$transaction->amount}}</span></a>
                    @endforeach
                    <a href="#!" class="list-group-item d-flex justify-content-between align-items-center list-group-item-action">{{$transaction->category->name}}<span class="badge badge-danger badge-pill">{{$transaction->amount}}</span></a>
                 @else
                     <div class="alert alert-info">
                       you have no transactions!
                     </div>
                 @endif
                 
                    
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

@endsection

@section('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.category-select').select2();
    });
</script>
    
@endsection
