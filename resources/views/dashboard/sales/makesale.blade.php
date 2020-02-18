@extends('layouts.app')

@section('content')
<section id="content">

<!--breadcrumbs start-->
<div id="breadcrumbs-wrapper" class=" grey lighten-3">
  <div class="container">
    <div class="row">
      <div class="col s12 m12 l8">
        <h5 class="breadcrumbs-title">Make A Sale</h5>
        <ol class="breadcrumb">
          <li><a href="home">Dashboard</a>
          </li>
          <li><a href="#">Sales</a>
          </li>
          <li class="active">Sale Item</li>
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
            <p class="caption">Sale Counter</p>
            <div class="row">
                <div class="input-field col s12">
                        <input id="item_name" type="text" placeholder="Start Search"  class="autocomplete" name="item_name" >
                        <label for="item_name" class="center-align">Item Name<span class="red-text text-darken-2">*</span></label>
                            
                        @if ($errors->has('item_name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('item_name') }}</strong>
                            </span>
                        @endif
                </div>
            </div
            <div class="divider"></div>
        </div>
    </div>
                    <div id="table-datatables">
                    <div class="row">
                         <div class="col s12 m12 l9" id="printportion">
                                <div class="card-panel">
                                <h4 class="header2">Item List</h4>
                                <div class="row">
                                <div class="row">
                                  <div class="col s12">
                                  <form  method="POST" autocomplete="off" action="{{ url('/dashboard/sales/sellitems') }}"  enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <table  class="stripped" cellspacing="0">
                                      <thead>
                                          <tr class="hide-on-med-and-down">
                                              <th>Name</th>
                                              <th>Category</th>
                                              <th>Supplier</th>
                                              <th>Price</th>
                                              <th tyle="text-align:center;"  >Selling</th>
                                          </tr>
                                      </thead>
                                   
                                      <tfoot>
                                          <tr>
                                              <th></th>
                                              <th></th>
                                              <th></th>
                                              <th>Total</th>
                                              <th ><input id="invoicetotal" name="invoicetotal"  type="text" style="height:30px;width: 80px;text-align:center;" ></th>
                                          </tr>
                                      </tfoot>
                                   
                                      <tbody id="itemline">
                                      <!-- <div id="itemline">
                                      </div> -->
                                            
          

                                      </tbody>
                                    </table>
                                    
                            
                                  </div>
                                </div>
                              </div> 
                              
                            
                        </div>
                    </div>  
                <div class="col s12 m12 l3">
                    <div class="card-panel">
                    <h4 class="header2">Customer(Optional)</h4>
                    <div class="row">


                        <div class="row">
                            <div class="input-field col s12">
                                <i class="mdi-communication-call prefix"></i>
                                    <input id="user_profile_number" type="text"  name="user_profile_number"  >
                                    <label for="user_profile_number" class="center-align">Number<span class="red-text text-darken-2">*</span></label>
                                        
                                    @if ($errors->has('user_profile_number'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('user_profile_number') }}</strong>
                                        </span>
                                    @endif
                            </div>
                        </div>

                        <div class="row margin">
                                <div class="input-field col s12">
                                    <i class="mdi-action-account-circle prefix"></i>
                                    <input id="user_profile_name" placeholder="" type="text"  name="user_profile_name"  >
                                    <label for="user_profile_name" class="center-align">Name<span class="red-text text-darken-2">*</span></label>
                                        
                                    @if ($errors->has('user_profile_name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('user_profile_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            

                            

                    </div>
                    </div>
                </div>
                
                <input id="customer_id" type="hidden"  name="customer_id"  >                
                <input id="total_price" type="hidden"  name="total_price"  >
                <button type="submit" class="btn waves-effect waves-light offse col offset-s5 s3">Sale</button>
                <!-- <button type="submit" onclick="printContent('printportion')" class="btn waves-effect waves-light offse col offset-s1 s3">PrintSale</button> -->
                </form>
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
                var dataX = 'id='+ ui.item.id+ '&supplier_id='+ ui.item.supplier_id+ '&category_id='+ ui.item.category_id +
                 '&name='+ ui.item.name + '&category='+ ui.item.category +'&supplier='+ ui.item.supplier+  '&stock='+ ui.item.stock +
                  '&price='+ ui.item.price;
                jQuery .ajax({
                    type: "GET",
                    url: "{{ url('/dashboard/sales/addingitems') }}",
                    data: dataX,
                    cache: false,
                    success: function(html){
                        $("#itemline").last().append(html);
                        $("#item_name").focus();
                        var TotalPriceCalculate = 0;
                        $("input[name='selling_price[]']").each(function() {
                            TotalPriceCalculate += Number($(this).val());console.log($("input[name='item_price[]']"));
                        });
                        $("#invoicetotal").val(TotalPriceCalculate);
                        $("#total_price").val(TotalPriceCalculate);
                    }
                });
               }
            }
         ) 
         $('#user_profile_number').autocomplete(
            {
               source: "{{ URL::to('/dashboard/sales/makesaleusersearch') }}" ,
                minLength:0,
               select:function(event, ui)
               {
                $( "#user_profile_number" ).val( ui.item.number );
                $( "#user_profile_name" ).val( ui.item.name );
                $( "#customer_id" ).val( ui.item.id );
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
        function printContent(el)
        {
            var restorepage=document.body.innerHTML;
            var printdoc=document.getElementById(el).innerHTML;
            document.body.innerHTML=printdoc;
            window.print();
        }
    </script>
@endsection

