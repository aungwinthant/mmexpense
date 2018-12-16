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
  
          <div class="container-fluid">
            
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
                      <form class="text-center border border-light p-5">
                          <div class="form-group md-form">
                              <input type="number" min="0" class="form-control" id="amount" placeholder="Amount">
                          </div>
                          <div class="form-group">
                            <select id="inputState" class="form-control category-select" name="state">
                              <option selected>Category</option>
                              <option>...</option>
                            </select>
                          </div>
                          <div class="form-group md-form">
                            <input type="text" class="form-control" id="title" name = "title" placeholder="Description">
                          </div>
                          
                          <div class="custom-control custom-radio custom-control-inline">
                              <input type="radio" class="custom-control-input" id="expense" name="inlineDefaultRadiosExample">
                              <label class="custom-control-label" for="expense">Expense</label>
                          </div>
                            
                            <!-- Default inline 2-->
                          <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="income" name="inlineDefaultRadiosExample">
                            <label class="custom-control-label" for="income">Income</label>
                          </div>
                          <hr>
                          <div class="text-center">
                            <button type="button" class="btn btn-default">Save changes</button>
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
