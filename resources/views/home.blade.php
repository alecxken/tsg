@extends('layouts.template')

@section('content')
<?php
$reports = \App\EssReport::all()->count();
$news = \App\User::all()->count();


?>
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
            <span class="info-box-icon bg-aqua"><i class="fa fa-cog"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Reports Filled</span>
              <span class="info-box-number">@if(!empty($reports)) {{$reports}} @else  0 @endif</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-bank"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Processed </span>
              <span class="info-box-number">@if(!empty($news)) {{$news}} @else  0 @endif</span>
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
            <span class="info-box-icon bg-red"><i class="fa fa-remove"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Cancelled Checks</span>
              <span class="info-box-number">@if(!empty($cancelled)) {{$cancelled}} @else  0 @endif</span>
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
              <span class="info-box-text">  Reports</span>
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

   
</div>
</div>

@endsection
