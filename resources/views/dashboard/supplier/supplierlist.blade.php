@extends('layouts.app')

@section('content')
<section id="content">

<!--breadcrumbs start-->
<div id="breadcrumbs-wrapper" class=" grey lighten-3">
  <div class="container">
    <div class="row">
      <div class="col s12 m12 l8">
        <h5 class="breadcrumbs-title">Suppliers List</h5>
        <ol class="breadcrumb">
          <li><a href="home">Dashboard</a>
          </li>
          <li><a href="#">Supplier</a>
          </li>
          <li class="active">Suppliers List</li>
        </ol>
      </div>
    </div>
  </div>
</div>
<!--breadcrumbs end-->
<!--start container-->
<div class="containerlarge">
    <div class="section">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <!-- alert -->

                    @if(count($errors)>0)
                        @foreach($errors->all() as $error)
                        <br/>
                        <div class="col s12 m10 l6">
                        <div class="card-panel red lighten-2"><span class="white-text">{{$errors}}</span></div>
                        </div>
                        @endforeach
                    @endif
                    @if(session('response'))
                    <br/>
                    <div class="col s12 m10 l6">
                    <div class="card-panel  green lighten-2"><span class="white-text">{{session('response')}}</span></div>
                    </div>
                    @endif


    <div class="raw">
        <div class="col s12 m12 l8">
            <p class="caption">Suppliers List</p>
            <div class="divider"></div>
        </div>
    </div>

    <div id="table-datatables">
            <div class="row">
                 <div class="col s12 m12 offset-l2 l8">
                        <div class="card-panel">
                        <div class="row">
                        <div id="table-datatables">
                        <div class="row">
                          <div class="col s12">
                            <table id="data-table-simple" class="responsive-table display" cellspacing="0">
                              <thead>
                                  <tr class="hide-on-med-and-down">
                                      <th>Name</th>
                                      <th>Address</th>
                                      <th>Phone</th>
                                      <th>Email</th>
                                      <th class="center-align" >Edit</th>
                                  </tr>
                              </thead>
                           
                              <!-- <tfoot>
                                  <tr>
                                      <th>Name</th>
                                      <th>Position</th>
                                      <th>Office</th>
                                      <th>Age</th>
                                      <th>Start date</th>
                                      <th>Salary</th>
                                  </tr>
                              </tfoot> -->
                           
                              <tbody>
                                  @foreach($suppliers->all() as $supplier)
                                  <tr>
                                      <td>{{ $supplier->supplier_name }}</td>
                                      <td>{{ $supplier->supplier_address }}</td>
                                      <td>{{ $supplier->supplier_number }}</td>
                                      <td>{{ $supplier->supplier_email }}</td>
                                      <td class="center-align">
                                      <a class="align-center" href="{{ url("/dashboard/suppliers/edit/{$supplier->id}") }}">
                                      <i class="mdi-editor-border-color"></i></a>
                                      <a class="align-center modal-trigger" href="#modal{{$supplier->id}}">
                                      <i class="mdi-action-delete red-text text-darken-2"></i></a>
                                      </td>
                                  </tr>
                                  <div id="modal{{$supplier->id}}" class="modal">
                                        <div class="modal-content">
                                            <p>Are you sure you want to delete Supplier: {{ $supplier->supplier_name }}</p>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="{{ url("/dashboard/suppliers/delete/{$supplier->id}") }}" class="waves-effect waves-red btn-flat modal-action modal-close">Yes</a>
                                            <a href="#" class="waves-effect waves-green btn-flat modal-action modal-close">No</a>
                                        </div>
                                    </div>
                                  @endforeach
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div> 
   
                    </div>
                </div>
            </div>  

        </div>
    </div>
</div>
@endsection

