@extends('layouts.app')

@section('content')
<section id="content">

<!--breadcrumbs start-->
<div id="breadcrumbs-wrapper" class=" grey lighten-3">
  <div class="container">
    <div class="row">
      <div class="col s12 m12 l8">
        <h5 class="breadcrumbs-title">Emergency Stock Entry</h5>
        <ol class="breadcrumb">
          <li><a href="home">Dashboard</a>
          </li>
          <li><a href="#">Stock</a>
          </li>
          <li class="active">Emergency Stock</li>
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
            <p class="caption">Emergency Stock Entry</p>
            <div class="divider"></div>
        </div>
    </div>

    <div id="table-datatables">
            <div class="row">
                <div class="col s12 m12 offset-l2 l8">
                    <div class="card-panel">
                    <div class="row">
                    <form  method="POST" class="col s12" action="{{ url('/dashboard/stock/emergencyupdated') }}"  enctype="multipart/form-data">
                    {{ csrf_field() }}

           
            <div class="row">
                <div class="input-field col s12">
                    <i class="mdi-action-shopping-cart prefix"></i>
                        <input id="item_name" type="text" placeholder="Start Search"  class="autocomplete" name="item_name" >
                        <label for="item_name" class="center-align">Item Name<span class="red-text text-darken-2">*</span></label>
                            
                        @if ($errors->has('item_name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('item_name') }}</strong>
                            </span>
                        @endif
                </div>
            </div>
            <div class="row margin">
                <div class="input-field col s12">
                    <i class="mdi-action-info prefix"></i>
                    <input id="item_stock" type="number" name="item_stock" min="1" placeholder=""   >      
                    <label for="item_stock" class="center-aligh">Item New Stock</label>

                        @if ($errors->has('item_stock'))
                            <span class="help-block">
                                <strong>{{ $errors->first('item_stock') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            <div class="row">
                <div class="input-field col s12">
                    <i class="mdi-action-info prefix"></i>
                        <input id="item_category" type="text"  name="item_category" placeholder="" disabled>
                        <label for="item_category" class="center-align">Category<span class="green-text text-darken-2">*</span></label>
                            
                        @if ($errors->has('item_category'))
                            <span class="help-block">
                                <strong>{{ $errors->first('item_category') }}</strong>
                            </span>
                        @endif
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <i class="mdi-action-info prefix"></i>
                        <input id="item_supplier" type="text"  name="item_supplier" placeholder="" disabled >
                        <label for="item_supplier" class="center-align">Supplier<span class="red-text text-darken-2">*</span></label>
                            
                        @if ($errors->has('item_supplier'))
                            <span class="help-block">
                                <strong>{{ $errors->first('item_supplier') }}</strong>
                            </span>
                        @endif
                </div>
            </div>

            <div class="row margin">
                <div class="input-field col s12">
                    <i class="mdi-action-info prefix"></i>
                    <input id="item_stock_old" type="number" name="item_stock_old"  placeholder="" disabled  >      
                    <label for="item_stock_old" class="center-aligh">Item Current Stock</label>

                        @if ($errors->has('item_stock_old'))
                            <span class="help-block">
                                <strong>{{ $errors->first('item_stock_old') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="row margin">
                <div class="input-field col s12">
                    <i class="mdi-action-info prefix"></i>
                    <input id="item_price" type="text" name="item_price"   placeholder="" disabled >      
                    <label for="item_price" class="center-aligh">Price</label>

                        @if ($errors->has('item_price'))
                            <span class="help-block">
                                <strong>{{ $errors->first('item_price') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>            

                <div class="row">
                    <div class="input-field col s12">
                    <input id="hide" type="hidden" name="id"  >
                    <input id="supplier_id" type="hidden" name="supplier_id"  >
                    <input id="item_stock_old2" type="hidden" name="item_stock_old2"  >
                    <input id="category_id" type="hidden" name="category_id"  >
                        <button type="submit" class="btn waves-effect waves-light col s12">Make Update</a>
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
@section('script')
    <script type="text/javascript">
        data=[
            'Sylhet',
            'Sylheti',
            'Sylhetwala',
            'Dhaka',
           'Rajshahi',
           'Rajnagar' 
        ];
        $('#item_name').autocomplete(
            {
               source: "{{ URL::to('/dashboard/stock/emergencystocksearch') }}" ,
                minLength:0,
               select:function(event, ui)
               {
                $( "#item_supplier" ).val( ui.item.supplier );
                $( "#item_category" ).val( ui.item.category );
                $( "#supplier_id" ).val( ui.item.supplier_id );
                $( "#category_id" ).val( ui.item.category_id );
                $( "#item_stock_old" ).val( ui.item.stock );
                $( "#item_stock_old2" ).val( ui.item.stock );
                $( "#item_price" ).val( ui.item.price );
                $( "#hide" ).val( ui.item.id );
                console.log(ui);
                return false;
               }
            }
         ) 
        // .autocomplete("instance")._renderItem = function( ul, item) {
        //     return $("<li class='searchautoeach'>")
        //     .append("<div class='searchautoacItem'><span class='searchautoname'>" +
        //         item.name + "</span><br><span class='searchautodesc'>Category: " +
        //         item.category + "</span><br><span class='searchautodesc'>Supplier:" +
        //         item.supplier + "</span></div>")
        //     .appendTo(ul);
        // };
    </script>
@endsection

