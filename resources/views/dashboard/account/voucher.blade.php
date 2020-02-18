@extends('layouts.app')

@section('content')
<section id="content">

<!--breadcrumbs start-->
<div id="breadcrumbs-wrapper" class=" grey lighten-3">
  <div class="container">
    <div class="row">
      <div class="col s12 m12 l8">
        <h5 class="breadcrumbs-title">Voucher Posting</h5>
        <ol class="breadcrumb">
          <li><a href="home">Dashboard</a>
          </li>
          <li><a href="#">Account</a>
          </li>
          <li class="active">Voucher Posting</li>
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
            <p class="caption">Voucher Statement</p>
            <div class="divider"></div>
        </div>
    </div>

    <div id="table-datatables">
            <div class="row">
                 <div class="col s12 m12 l7">
                        <div class="card-panel">
                        <h4 class="header2">Report List</h4>
                        <div class="row">
                        <div id="table-datatables">
                        <div class="row">
                          <div class="col s12">
                            <table id="data-table-simple" class="responsive-table display" cellspacing="0">
                              <thead>
                                  <tr class="hide-on-med-and-down">
                                        <th>Employee</th>
                                        <th>Amount</th>
                                        <th>Remark</th>
                                        <th class="center-align">Posting Time</th>
                                  </tr>
                              </thead>
                           
                           
                              <tbody>
                                  @foreach($items as $item)
                                  <tr>

                                      <td>{{ $item->user_profile_name }}</td>
                                      <td>BDT {{ $item->price }}</td>
                                      <td>{{ $item->remarks }}</td>
                                      <td> {{date('M j, Y H:i', 
                                            strtotime($item->updated_at))}}</td>
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
            <div class="col s12 m12 l5">
                <div class="card-panel">
                <h4 class="header2">Add Statement</h4>
                    <div class="row">
                        
                    <form  method="POST" class="col s12" action="{{ url('dashboard/account/voucheradded') }}"  enctype="multipart/form-data">
                                {{ csrf_field() }}

                        <div class="row">
                            <div class="input-field col s12">
                                <i class="mdi-action-shopping-cart prefix"></i>
                                    <input id="price" type="number"  name="price"  >
                                    <label for="price" class="center-align">Amount<span class="red-text text-darken-2">*</span></label>
                                        
                                    @if ($errors->has('price'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('price') }}</strong>
                                        </span>
                                    @endif
                            </div>
                        </div>

                        <div class="row margin">
                                <div class="input-field col s12">
                                    <i class="mdi-editor-mode-edit prefix"></i>
                                    <textarea name="remarks" id="remarks" class="materialize-textarea"></textarea>   
                                    <label for="remarks" class="remarks-aligh">Remarks</label>
                                    @if ($errors->has('remarks'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('remarks') }}</strong>
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

