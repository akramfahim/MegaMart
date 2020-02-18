@extends('layouts.app')

@section('content')
<section id="content">

<!--breadcrumbs start-->
<div id="breadcrumbs-wrapper" class=" grey lighten-3">
  <div class="container">
    <div class="row">
      <div class="col s12 m12 l8">
        <h5 class="breadcrumbs-title">Item Sales List</h5>
        <ol class="breadcrumb">
          <li><a href="home">Dashboard</a>
          </li>
          <li><a href="#">Sales</a>
          </li>
          <li class="active">Sales List</li>
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
            <p class="caption">Item List</p>
            <div class="divider"></div>
        </div>
    </div>

    <div id="table-datatables">
            <div class="row">
                 <div class="col s12 m12 offset-l2 l8">
                        <div class="card-panel">
                        <h4 class="header2">Item List</h4>
                        <div class="row">
                        <div id="table-datatables">
                        <div class="row">
                          <div class="col s12">
                            <table id="data-table-simple" class="responsive-table display" cellspacing="0">
                              <thead>
                                  <tr class="hide-on-med-and-down">
                                      <th>ID</th>
                                      <th>Total Amount</th>
                                      <th>Date</th>
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
                                    @foreach($items->all() as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->total_price }}</td>
                                        <td> {{date('M j, Y H:i', 
                                            strtotime($item->updated_at))}}</td>
                                        <td class="center-align">
                                            <a class="align-center" href="{{ url("/dashboard/sales/view/{$item->id}") }}">
                                            <i class="mdi-editor-border-color blue-text text-darken-2"></i></a>
                                            </td>
                                    </tr>
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

