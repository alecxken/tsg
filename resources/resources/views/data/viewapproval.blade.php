@extends('layouts.template')

@section('title', '| Add User')

@section('content')

<div class="box-body">
  

    <div class="col-lg-10 col-lg-offset-1" id="test">
          <div class="box box-success">
                <div class="box-header with-border bg-success">
                      <h3 class="box-title"><i class='fa fa-pencil'></i> {{$data->ref_token}} data Capture</h3>
                      <div class="box-tools pull-right">  
                      </div>
                </div>
                <div class="box box-success"></div>
              <div class="box-body">


                    {!! Form::open(['method'=> 'post','url' => 'approval_data', 'files' => true ]) !!}

                            <div class="form-group col-md-4">
                                {{ Form::label('name', 'Delivery Ref') }}
                                {{ Form::text('ref_token', $data->ref_token, array('class' => 'form-control  input-sm','readonly')) }}
                            </div>

                            <div class="form-group col-md-4">
                                {{ Form::label('email', 'Client Name') }}
                                 @if(!empty($data->client_name))
                                 {{ Form::text('client_name', $data->client_name, array('class' => 'form-control input-sm','readonly')) }}
                                 @else
                               <select class="form-control input-sm" name="client_name" required="">
                               
                                @if(!empty($client))
                                   <option value="">Choose Client</option>
                                @foreach($client as $c)
                              
                                <option value="{{$c->token}}">{{$c->token}} - {{$c->name}}</option>
                                @endforeach
                                @else
                                
                                
                                @endif
                                
                               </select>
                                @endif
                            </div>
                          

                            <div class="form-group col-md-4">
                                {{ Form::label('email', 'Instruction Date') }}
                                {{ Form::date('inst_date',$data->inst_date, array('class' => 'form-control input-sm','readonly')) }}
                            </div>

                          

                            <div class="form-group col-md-4">
                                {{ Form::label('email', 'Beneficiary Name') }}
                                {{ Form::text('ben_name',$data->ben_name, array('class' => 'form-control input-sm','readonly')) }}
                            </div>

                            <div class="form-group col-md-4">
                                {{ Form::label('email', 'Beneficiary ID') }}
                                {{ Form::number('ben_id',$data->ben_id, array('class' => 'form-control input-sm','readonly')) }}
                            </div>

                             <div class="form-group col-md-4">
                                {{ Form::label('email', 'Beneficiary Phone') }}
                                {{ Form::text('ben_phone',$data->ben_phone, array('class' => 'form-control input-sm','readonly')) }}
                            </div> 

                            <div class="form-group col-md-4">
                                {{ Form::label('name', 'Location of Delivery') }}
                                {{ Form::text('loc_delivery',$data->loc_delivery, array('class' => 'form-control input-sm','readonly')) }}
                            </div>

                             <div class="form-group col-md-4">
                                {{ Form::label('email', 'Client Reference') }}
                                {{ Form::text('client_ref',$data->client_ref, array('class' => 'form-control input-sm','readonly')) }}
                            </div>

                              <div class="form-group col-md-4">
                                {{ Form::label('email', 'Delivery Date') }}
                                {{ Form::date('delivery_date', $data->delivery_date, array('class' => 'form-control input-sm','readonly')) }}
                            </div>

                            <div class="form-group col-md-4">
                                {{ Form::label('email', 'Currency') }}
                              {{ Form::text('ccy', $data->ccy, array('class' => 'form-control input-sm','readonly')) }}
                            </div>

                             <div class="form-group col-md-4">
                                {{ Form::label('name', ' Amount') }}
                                {{ Form::number('rate', $data->amount, array('class' => 'form-control input-sm','readonly')) }}
                            </div>

                             <div class="form-group col-md-4">
                                {{ Form::label('name', ' USD:SSP Rate') }}
                                {{ Form::number('rate', $data->rate, array('class' => 'form-control input-sm','readonly')) }}
                            </div>


                            <div class="form-group col-md-4">
                                {{ Form::label('email', 'Attach Client Instruction') }}
                              <!--   <input type="file" multiple="" name="client_inst[]" class="form-control input-sm" required=""> -->
                              <div class="form-control">
                                 @if(!empty($data->client_inst))
             @foreach(explode(",",$data->client_inst) as $p1 )
              <a href="{{url('view-pdf/'.$p1)}}"  target="_blank" class="label label-sm label-success"><i class="fa fa-paperclip" aria-hidden="true"></i> {{$p1}}</a>
              @endforeach
              @else
              No Instruction Attached
              @endif
            </div>
                               
                           
                            </div>

                             <div class="form-group col-md-4">
                                {{ Form::label('name', 'Attach Payment List') }}
                             <!--    <input type="file" multiple="" name="payment_list[]" class="form-control input-sm"> -->
                             <div class="form-control">
                                @if(!empty($data->payment_list))
             @foreach(explode(";",$data->payment_list) as $p2 )
              <a href="{{url('view-pdf/'.$p2)}}"  target="_blank" class="label label-sm label-primary"><i class="fa fa-paperclip" aria-hidden="true"></i> {{$p2}}</a>
              @endforeach
              @else
              No Payment list Attached
              @endif
                             </div>
                            
                              <!--   <a href=""><label class="label label-default">{{$data->payment_list}}</label></a> -->
                              
                            </div>

                             <div class="form-group col-md-4">
                                {{ Form::label('name', 'Reviewer') }}
                                {{ Form::text('reviewer',Auth::user()->email, array('class' => 'form-control input-sm','readonly')) }}
                            </div>

                              <div class="form-group col-md-12">
                                {{ Form::label('name', 'Description') }}
                                {{ Form::textarea('desc',$data->desc, array('class' => 'form-control input-sm ','rows'=>'3','readonly')) }}
                            </div>

                            <div class="row">

                             <div class="form-group col-md-3">
                                {{ Form::label('name', 'Choose Status') }}
                                 <select class="form-control input-sm" name="status" required="">
                                 <option value="">Choose Status</option>
                                 <option>Approve</option>
                                 <option>Reject</option>
                               </select>
                            </div>

                             <div class="form-group col-md-3">
                                {{ Form::label('email', 'Agent Name') }}
                               
                                @if(!empty($agent))
                               <select class="form-control input-sm" name="agent" required="">
                               
                               
                               
                                 <option value="">Choose Delivery Agent</option>
                                  @foreach($agent as $c)
                                <option value="{{$c->token}}">{{$c->token}} - {{$c->name}}</option>
                                @endforeach
                              
                                
                               </select>
                                 @else
                                 <label class="form-control text-danger">No Agent Created<</label>
                             
                                @endif
                         
                            </div>

                             <div class="form-group col-md-6">
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
