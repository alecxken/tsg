@extends('layouts.template')
@section('content')
<div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
           
              <li class="active"><a href="#settings" data-toggle="tab" aria-expanded="true">Profile Settings</a></li>
            </ul>
            <div class="tab-content">
              
            
              <!-- /.tab-pane -->

              <div class="tab-pane active" id="settings">
        
                 {!! Form::open(['method'=> 'post','class'=>'form-horizontal','url' => 'profileupdate', 'files' => true ]) !!}
                	
                	<input type="hidden" name="id" value="{{Auth::id()}}">

                   <div class="form-group">
                      {{ Form::label('name', 'username', array('class' => 'col-sm-2 control-label') )}}
                       <div class="col-sm-10">
                      {{ Form::text('username', Auth::user()->username, array('class' => 'form-control')) }}
                    </div>
                  </div>
       
                 
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Name</label>
                    <div class="col-sm-10">
                      <input type="name" required="" value="{{Auth::user()->name}}" name="name"  class="form-control" id="inputName" placeholder="Name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                      <input type="email" value="{{Auth::user()->email}}" name="email" class="form-control" id="inputEmail" placeholder="Email" >
                    </div>
                  </div>

                     <div class="form-group">
                      {{ Form::label('name', 'Signature', array('class' => 'col-sm-2 control-label') )}}
                      
                      <div class="col-sm-5">
                      {{ Form::text('signature', Auth::user()->signature, array('class' => 'form-control')) }}
                    </div>
                     <div class="col-sm-5">
                      {{ Form::file('file', Auth::user()->signature, array('class' => 'form-control')) }}
                    </div>
                  </div>
       
              
              
           
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-danger">Submit</button>
                    </div>
                  </div>
               {!!Form::close()!!}
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
@endsection