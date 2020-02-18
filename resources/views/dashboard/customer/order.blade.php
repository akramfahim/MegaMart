@extends('layouts.app')

@section('content')
<section id="content">

<!--breadcrumbs start-->
<div id="breadcrumbs-wrapper" class=" grey lighten-3">
  <div class="container">
    <div class="row">
      <div class="col s12 m12 l8">
        <h5 class="breadcrumbs-title">Order List</h5>
        <ol class="breadcrumb">
          <li><a href="home">Dashboard</a>
          </li>
          <li><a href="#">Customer</a>
          </li>
          <li class="active">Order List</li>
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
            <p class="caption">Order List</p>
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
                                      <th>ID</th>
                                      <th>Client Name</th>
                                      <th>Phone</th>
                                      <th>Email</th>
                                      <th>Amount</th>
                                      <th class="center-align" >Action</th>
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
                                  @foreach($orders->all() as $order)
                                  <tr>
                                      <td>{{ $order->id }}</td>
                                      <td>{{ $order->fullname }}</td>
                                      <td>{{ $order->telephone }}</td>
                                      <td>{{ $order->email }}</td>
                                      <td>{{ $order->item_id }}</td>
                                      <td class="center-align">
                                      <a class="align-center" href="{{ url("/dashboard/customer/orderedit/{$order->id}") }}">
                                      <i class="mdi-editor-border-color"></i></a>
                                      <a class="align-center modal-trigger" href="#modal{{$order->id}}">
                                      <i class="mdi-action-delete red-text text-darken-2"></i></a>
                                      </td>
                                  </tr>
                                  <div id="modal{{$order->id}}" class="modal">
                                        <div class="modal-content">
                                            <p>Are you sure you want to view : {{ $order->fullname}}
                                        </div>
                                        <div class="modal-footer">
                                            <a href="#" class="waves-effect waves-red btn-flat modal-action modal-close">Yes</a>
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

