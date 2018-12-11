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
  
          
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
              Add Transaction
            </button>

            
            
            <!-- Modal -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Add Transaction</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                      <form>
                          <div class="form-group">
                              <div class="form-group">
                                  <label for="inputState">Category</label>
                                  <select id="inputState" class="form-control">
                                    <option selected>Choose...</option>
                                    <option>...</option>
                                  </select>
                                </div>
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name = "title" placeholder="Add Title">
                          </div>
                          <div class="form-group">
                            <label for="amount">Amount</label>
                            <input type="number" min="0" class="form-control" id="amount">
                          </div>
                          <div class="form-check">
                              <input class="form-check-input" type="radio" name="option" id="income" value="income">
                              <label class="form-check-label" for="income">
                                Income
                              </label>
                            </div>
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="option" id="expense" value="expense">
                              <label class="form-check-label" for="expense">
                                Expense
                              </label>
                            </div>
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
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
