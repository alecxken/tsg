@extends('layouts.template')

@section('title', '| Add User')

@section('content')

<div class="box-body">
  

    <div class="col-md-12">
          <div class="box box-success">
                <div class="box-header with-border bg-success">
                      <h3 class="box-title"><i class='fa fa-pencil'></i> {{$data->ref_token}} data Capture</h3>
                      <div class="box-tools pull-right">  
                      </div>
                </div>
                <div class="box box-success"></div>
              <div class="box-body">


                    {!! Form::open(['method'=> 'post','url' => 'sendapproval', 'files' => true ]) !!}
                      
                          <div class="row">
                            <div class="col-md-12"  >
                               <iframe width="900px" height="800px"src="{{url('view-letter/'.$data->agent_pdf)}}"></iframe>
                              
                            </div>
                          </div>
                           <br>
                          <div class="row">
 
                            <div class="form-group col-md-4">
                              {{ Form::label('name', 'Reference') }}
                              {{ Form::text('ref_token', $data->ref_token, array('class' => 'form-control  input-sm','readonly')) }}
                            </div>
                             <div class="form-group col-md-4">
                                {{ Form::label('name', 'Choose Status') }}
                                 <select class="form-control input-sm" name="status" required="">
                                 <option value="">Choose Status</option>
                                 <option value="Agent">Send to Agent</option>
                                 <option value="Reject">Do Not Sent</option>
                               </select>
                            </div>

                          

                             <div class="form-group col-md-4">
                                {{ Form::label('name', 'Comments') }}
                                 {{ Form::textarea('comments', '', array('class' => 'form-control input-sm ','rows'=>'1','placeholder'=>'comments on the status')) }}
                               <!-- ] -->
                            </div>
                              
                            </div>
                           
                    



                            

                </div>
                <div class="box-footer">
                    {{ Form::submit('cancel ', array('class' => 'btn btn-danger pull-left')) }}
                    {{ Form::submit('Submit ', array('class' => 'btn btn-success pull-right')) }}


                </div>
                  {!!Form::close()!!}
            </div>
        </div>
        </div>
@endsection
