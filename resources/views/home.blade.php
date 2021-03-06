@extends('layouts.template')

@section('content')
<?php
$reports = \App\EssReport::all()->count();
$new = \App\DataEntry::all()->where('status','New')->count();
$agent = \App\DataEntry::all()->where('status','Agent')->count();
$invoice = \App\DataEntry::all()->where('status','invoicing')->count();

$news = \App\User::all()->count();

 $post = \App\Trans::all()->pluck('state');
              $num = \App\Trans::all()->pluck('items');
              // return $num;
     
            

?>
 <style>
    a { color: #042b1e; } /* CSS link color */
  </style>

@if(\Auth::user()->name == Auth::user()->username)
<div id="errods" class="alert alert-danger alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <h4>Profile Update Alert!</h4>

              <p> Please Update your Profile to continue <a href="{{url('/profile')}}" class="btn btn-info btn-sm">Profile Update</a></p>
            </div>
@endif
<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Dashboard Summary</h3>

             
            </div>
<div class="box-body">

    <div class="row justify-content-center">
         <div class="box-body">
    <div class="row justify-content-center" >
        
    

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="">@if(!empty($reports)) {{$reports}} @else  0 @endif</i></span>

            <div class="info-box-content">
              <span class="info-box-text">New </span>
              <span class="info-box-number"><small>Data Entries</small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i >@if(!empty($agent)) {{$agent}} @else  0 @endif</i></span>

            <div class="info-box-content">
              <span class="info-box-text">Pending  </span>
              <span class="info-box-number"><small>Agent Confirmation</small></span>

            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i>@if(!empty($invoice)) {{$invoice}} @else  0 @endif</i></span>

            <div class="info-box-content">
              <span class="info-box-text">Invoices</span>
              <span class="info-box-number"><small>unpaid</small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-file"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Profitability  Reports</span>
              <span class="info-box-number">@if(!empty($reports)) {{$reports}} @else  0 @endif</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      
    </div>
    </div>
</div>
 <div class="col-md-6" >
      <div class="box box-success">
         <div class="box-header with-border">
          <h3 class="box-title"><b>Transaction Distribution</b>  </h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body" id="video" style="display: block;" >
              {!! Charts::styles() !!}
                    <div class="app"> 
                            <center>  
                                    {!! $chart->html() !!}
                            </center>
                      </div>
                    </div>
          
              {!! $chart->script() !!}
      </div>
    </div>
     <div class="col-md-6" >
      <div class="box box-success">
         <div class="box-header with-border">
          <h3 class="box-title"><b>Transaction Items</b>  </h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body" id="video" style="display: block;" >
              {!! Charts::styles() !!}
                    <div class="app"> 
                            <center>  
                                    {!! $sam->html() !!}
                            </center>
                      </div>
                    </div>
              {!! Charts::scripts() !!}
              {!! $sam->script() !!}
      </div>
    </div>

   
</div>
</div>

@endsection
