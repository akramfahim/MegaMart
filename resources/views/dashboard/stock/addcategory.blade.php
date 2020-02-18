@extends('layouts.app')

@section('content')
<section id="content">

<!--breadcrumbs start-->
<div id="breadcrumbs-wrapper" class=" grey lighten-3">
  <div class="container">
    <div class="row">
      <div class="col s12 m12 l8">
        <h5 class="breadcrumbs-title">Item Category</h5>
        <ol class="breadcrumb">
          <li><a href="home">Dashboard</a>
          </li>
          <li><a href="#">Stock</a>
          </li>
          <li class="active">Item Category</li>
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
            <p class="caption">Item Category</p>
            <div class="divider"></div>
        </div>
    </div>

    <div id="table-datatables">
            <div class="row">
                 <div class="col s12 m12 l7">
                        <div class="card-panel">
                        <h4 class="header2">Category List</h4>
                        <div class="row">
                        <div id="table-datatables">
                        <div class="row">
                          <div class="col s12">
                            <table id="data-table-simple" class="responsive-table display" cellspacing="0">
                              <thead>
                                  <tr class="hide-on-med-and-down">
                                      <th>Title</th>
                                      <th>Info</th>
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
                                  @foreach($item_categories->all() as $itemcategory)
                                  <tr>
                                      <td>{{ $itemcategory->category_title }}</td>
                                      <td>{{ $itemcategory->category_info }}</td>
                                      <td class="center-align">
                                      <a class="align-center modal-trigger" href="#modal{{$itemcategory->id}}">
                                      <i class="mdi-action-delete red-text text-darken-2"></i></a>
                                      </td>
                                  </tr>
                                  <div id="modal{{$itemcategory->id}}" class="modal">
                                        <div class="modal-content">
                                            <p>Are you sure you want to delete Supplier: {{ $itemcategory->category_title }}</p>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="{{ url("/dashboard/stock/deletecategory/{$itemcategory->id}") }}" class="waves-effect waves-red btn-flat modal-action modal-close">Yes</a>
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
                <h4 class="header2">Add Category</h4>
                    <div class="row">
                        
                    <form  method="POST" class="col s12" action="{{ url('dashboard/stock/itemcategoryadded') }}"  enctype="multipart/form-data">
                                {{ csrf_field() }}

                        <div class="row">
                            <div class="input-field col s12">
                                <i class="mdi-action-shopping-cart prefix"></i>
                                    <input id="category_title" type="text"  name="category_title"  >
                                    <label for="category_title" class="center-align">Category Title<span class="red-text text-darken-2">*</span></label>
                                        
                                    @if ($errors->has('category_title'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('category_title') }}</strong>
                                        </span>
                                    @endif
                            </div>
                        </div>

                        <div class="row margin">
                                <div class="input-field col s12">
                                    <i class="mdi-editor-mode-edit prefix"></i>
                                    <textarea name="category_info" id="category_info" class="materialize-textarea"></textarea>   
                                    <label for="category_info" class="center-aligh">Description (Optional)</label>
                                    @if ($errors->has('category_info'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('category_info') }}</strong>
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

