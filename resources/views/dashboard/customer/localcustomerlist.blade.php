@extends('layouts.app')

@section('content')
<section id="content">

<!--breadcrumbs start-->
<div id="breadcrumbs-wrapper" class=" grey lighten-3">
  <div class="container">
    <div class="row">
      <div class="col s12 m12 l8">
        <h5 class="breadcrumbs-title">Local Customer List</h5>
        <ol class="breadcrumb">
          <li><a href="home">Dashboard</a>
          </li>
          <li><a href="#">Customer</a>
          </li>
          <li class="active">Customer List</li>
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
            <p class="caption">Local Customers</p>
            <div class="divider"></div>
        </div>
    </div>

    <div id="table-datatables">
            <div class="row">
                 <div class="col s12 m12 l7">
                        <div class="card-panel">
                        <h4 class="header2">Customer List</h4>
                        <div class="row">
                        <div id="table-datatables">
                        <div class="row">
                          <div class="col s12">
                            <table id="data-table-simple" class="responsive-table display" cellspacing="0">
                              <thead>
                                  <tr class="hide-on-med-and-down">
                                      <th>Name</th>
                                      <th>Number</th>
                                      <th>Member From</th>
                                      <th class="center-align" >Actions</th>
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
                                  @foreach($users->all() as $user)
                                  <tr>
                                      <td>{{ $user->customer_name }}</td>
                                      <td>{{ $user->number_number }}</td>
                                      <td>
                                        {{date('M j, Y H:i', 
                                            strtotime($user->updated_at))}}
                                      </td>
                                      <td class="center-align">
                                      <a class="align-center modal-trigger" href="#modal{{$user->id}}">
                                      <i class="mdi-action-delete red-text text-darken-2"></i></a>
                                      </td>
                                  </tr>
                                  <div id="modal{{$user->id}}" class="modal">
                                        <div class="modal-content">
                                            <p>Are you sure you want to delete this Customer: {{ $user->customer_name }}</p>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="{{ url("/dashboard/customer/localcustomerdelete/{$user->id}") }}" class="waves-effect waves-red btn-flat modal-action modal-close">Yes</a>
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







            <div class="col s12 m12 l5">
                <div class="card-panel">
                <h4 class="header2">Add Customer</h4>
                    <div class="row">
                        
                    <form  method="POST" class="col s12" action="{{ url('dashboard/customer/localcustomeradded') }}"  enctype="multipart/form-data">
                                {{ csrf_field() }}

                        <div class="row">
                            <div class="input-field col s12">
                                <i class="mdi-action-shopping-cart prefix"></i>
                                    <input id="user_profile_name" type="text"  name="user_profile_name"  >
                                    <label for="user_profile_name" class="center-align">Customer Name<span class="red-text text-darken-2">*</span></label>
                                        
                                    @if ($errors->has('user_profile_name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('user_profile_name') }}</strong>
                                        </span>
                                    @endif
                            </div>
                        </div>

                        <div class="row margin">
                                <div class="input-field col s12">
                                    <i class="mdi-editor-mode-edit prefix"></i>
                                    <input id="user_profile_number" type="number"  name="user_profile_number"  >
                                    <label for="user_profile_number" class="center-align">Phone Number<span class="red-text text-darken-2">*</span></label>
                                     @if ($errors->has('user_profile_number'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('user_profile_number') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            

                            <div class="row">
                                <div class="input-field col s12">
                                    <button type="submit" class="btn waves-effect waves-light col s12">Add</a>
                                </div>
                            </div>
                         </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

