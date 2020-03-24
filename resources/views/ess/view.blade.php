@extends('layouts.topnav')
@section('content')


            
<div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
            <div class="box-header with-border bg-info ">
               <h6 class="box-title  "><b style="color: #1F35A2;">Feel free to write your comments/concerns</b></h6>
            </div> 
       <div class="box box-primary"></div>
      {!! Form::open(['method'=> 'post','url' => 'report-concerns', 'files' => true ]) !!}
        <div class="box-body"> 

          <small>
                     
           <div class="form-group center">
             {!! Form::label('weight', 'Ref Token ', ['class' => ''])!!}
             {!!Form::text('token',$token,['placeholder'=>'', 'id'=>'name', 'class' => 'name form-control input' ,'maxlength'=>'700', 'readonly'])!!}
          </div>
           <div class="form-group center">
             {!! Form::label('Descri', 'Enter details here', ['class' => ''])!!}
             {!!Form::textarea('reasons',null,['placeholder'=>'Start here.....','id'=>'resident', 'class' => ' form-control input','maxlength'=>'500000'])!!}
          </div>
        </small>
      </div>
          <div class="box-footer">
             
             <button type="submit" class="pull-right btn btn-success center form-control ">Submit</button>
          </div>       
     
    
        </div>    
     {!!Form::close()!!}
  </div>

  @endsection