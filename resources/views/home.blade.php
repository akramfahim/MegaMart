@extends('layouts.app')

@section('content')
    <!-- START CONTENT -->
    <section id="content">
        <!--start container-->
        <div class="container">


                <div class="panel-body">
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

                    
                    <!--card stats start-->
                    <div id="card-stats">
                        <div class="row">
                            <div class="col s12 m6 l3">
                                <div class="card">
                                    <div class="card-content  green white-text">
                                        <a href="{{url('/dashboard/settings/employeelist')}}" style="color: white" class="card-stats-title"><i class="mdi-social-group-add"></i> Total Employee</p>
                                        <h4 class="card-stats-number">
                                            @if(!empty($total_user))
                                             {{$total_user}}
                                             @endif   
                                    </h4>
                                        </a>
                                    </div>
                                    <div class="card-action  green darken-2">
                                    </div>
                                </div>
                            </div>
                            <div class="col s12 m6 l3">
                                <div class="card">
                                    <div class="card-content purple white-text">
                                        <a href="{{url('/dashboard/sales/salelist')}}" class="card-stats-title" style="color: white"><i class="mdi-editor-attach-money"></i>Total Items Sell</p>
                                        <h4 class="card-stats-number">
                                             @if(!empty($total_items))
                                             {{$total_items}}
                                             @else
                                                0
                                             @endif

                                       </h4>
                                        </a>
                                    </div>
                                    <div class="card-action purple darken-2">

                                    </div>
                                </div>
                            </div>                            
                            <div class="col s12 m6 l3">
                                <div class="card">
                                    <div class="card-content blue-grey white-text">
                                        <a href="{{ url('/dashboard/account/income' ) }}" class="card-stats-title" style="color: white"><i class="mdi-action-trending-up"></i> Total Invoice</p>
                                        <h4 class="card-stats-number">
                                             @if(!empty($total_invoics))
                                             {{$total_invoics}}
                                             @else
                                                0
                                             @endif

                                        </h4>
                                        </a>
                                    </div>
                                    <div class="card-action blue-grey darken-2">
                                    </div>
                                </div>
                            </div>
                            <div class="col s12 m6 l3">
                                <div class="card">
                                    <div class="card-content pink lighten-2 white-text">
                                        <a href="{{url('/dashboard/account/voucher')}}" class="card-stats-title" style="color: white"><i class="mdi-editor-insert-drive-file"></i>Total Voucher</p>
                                        <h4 class="card-stats-number">
                                             @if(!empty($total_voucher))
                                            {{$total_voucher}}
                                            @else
                                                0
                                             @endif

                                       </h4>
                                        </a>
                                    </div>
                                    <div class="card-action  pink darken-2">
                                    </div>
                                </div>
                            </div>
                            <div class="col s12 m6 l6">
                                <div class="card">
                                    <div class="card-content red lighten-2 white-text">
                                        <a href="{{ url('/dashboard/account/voucher' ) }}" class="card-stats-title" style="color: white"><i class="mdi-editor-insert-drive-file"></i>Out Going Cash</p>
                                        <h4 class="card-stats-number">BDT 
                                             @if(!empty($voucher))
                                            {{$voucher}}
                                            @else
                                                0
                                             @endif

                                       </h4>
                                        </a>
                                    </div>
                                    <div class="card-action  red darken-2">
                                    </div>
                                </div>
                            </div>
                            <div class="col s12 m6 l6">
                                <div class="card">
                                    <div class="card-content green lighten-2 white-text">
                                        <a href="{{ url('/dashboard/account/income')}}" class="card-stats-title" style="color: white"><i class="mdi-editor-insert-drive-file"></i>Incoming Cash</p>
                                        <h4 class="card-stats-number">BDT 
                                             @if(!empty($income))
                                             {{$income}}
                                             @else
                                                0
                                             @endif

                                       </h4>
                                        </a>
                                    </div>
                                    <div class="card-action  green darken-2">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col s12 m12 l12">
                                <div class="card">
                                    <div class="card-content cyan lighten-2 white-text">
                                        <p class="card-stats-title"><i class="mdi-editor-insert-drive-file"></i>Total Profit</p>
                                        <h4 class="card-stats-number">BDT
                                         @if(!empty($voucher))
                                            {{$income - $voucher}}
                                            @else
                                                0
                                             @endif 

                                       </h4>
                                        <div class="card-action  cyan darken-2">
                                    </div>
                                </div>
                            </div>


                            <div class="col s12 m12 l12">
                                <div class="card">
                                    <div class="card-content blue lighten-2 white-text">
                                        <p class="card-stats-title"><i class="mdi-editor-insert-drive-file"></i>
                                            @if(!empty($shopprofile->shop_domain))

                                            <a class="white-text" href="domain/{{$shopprofile->shop_domain }}">
                                         @endif

                                         Visit Shop
                                         <a>
                                         </p>
                                        <h4 class="card-stats-number"></h4>
                                        </p>
                                    </div>
                                </div>
                            </div>                            <!-- <div class=" col s12 m6 l6 offset-l3">
                                <div class="card">
                                    <div class="card-content blue lighten-2 white-text">
                                        <p class="card-stats-title"><i class="mdi-editor-insert-drive-file"></i>Currnet Cash</p>
                                        <h4 class="card-stats-number">{{-- {{$income}} --}}</h4>
                                        </p>
                                    </div>
                                    <div class="card-action  blue darken-2">
                                    </div>
                                </div>
                            </div> -->

                        </div>
                    </div>
                    <!--card stats end-->

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
