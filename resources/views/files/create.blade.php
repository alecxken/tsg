@extends('layouts.template')
@section('content')


            
<div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
            <div class="box-header with-border bg-info ">
               <h6 class="box-title  "><b style="color: #1F35A2;">File Upload Section </b></h6>
            </div> 
       <div class="box box-primary"></div>
      {!! Form::open(['method'=> 'post','url' => 'store-file', 'files' => true ]) !!}
        <div class="box-body"> 

          <small>
                
                <div class="form-group col-md-4 ">
                    {!! Form::label('C_Name', 'File Name:', ['class' => 'col-form-label '])!!}
                    {!!Form::text('file_name',Null,['class' => 'form-control input-sm' ,'multiple'])!!}
                </div>  
                <div class="form-group col-md-4 ">
                    {!! Form::label('C_Name', 'File Accesibility:', ['class' => 'col-form-label '])!!}
                   <select class="form-control input-sm" name="access">
                     <option>Operations</option>
                     <option>Business</option>
                     <option>Treasury</option>
                     <option>Finance</option>
                     <option>Audit</option>
                     <option>Branch</option>
                     <option>Public</option>
                     <option>Private</option>
                   </select>
                </div>  
                 <div class="form-group col-md-4 ">
                    {!! Form::label('C_Name', 'File Upload:', ['class' => 'col-form-label '])!!}
                    {!!Form::file('file',Null,['class' => 'form-control input-sm' ,'multiple'])!!}
                </div>  
                <div class="form-group col-md-12 ">
                    {!! Form::label('C_Name', 'File Comments:', ['class' => 'col-form-label '])!!}
                    {!!Form::text('comments',Null,['class' => 'form-control input-sm','placeholder'=>'Any Comments (Optional)'])!!}
                </div>        
          
        </small>
      </div>
          <div class="box-footer">
             
             <button type="submit" class="pull-right btn btn-success center btn-sm  ">Submit</button>
          </div>       
     
    
        </div>    
     {!!Form::close()!!}
  </div>

  @endsection