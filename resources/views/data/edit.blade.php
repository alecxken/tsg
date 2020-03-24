@extends('layouts.template')

@section('title', '| Add User')

@section('content')

<div class="box-body">
  

    <div class="col-lg-10 col-lg-offset-1" id="test">
          <div class="box box-primary">
                <div class="box-header with-border bg-info">
                      <h3 class="box-title"><i class='fa fa-pencil'></i> {{$data->ref_token}} data Capture</h3>
                      <div class="box-tools pull-right">  
                      </div>
                </div>
                <div class="box box-primary"></div>
              <div class="box-body">


                    {!! Form::open(['method'=> 'post','url' => 'update_data', 'files' => true ]) !!}

                            <div class="form-group col-md-4">
                                {{ Form::label('name', 'Delivery Ref') }}
                                {{ Form::text('ref_token', $data->ref_token, array('class' => 'form-control  input-sm','readonly')) }}
                            </div>

                            <div class="form-group col-md-4">
                                {{ Form::label('email', 'Client Name') }}
                                 @if(!empty($data->client_name))
                                 {{ Form::text('client_name', $data->client_name, array('class' => 'form-control input-sm')) }}
                                 @else
                               <select class="form-control input-sm" name="client_name" required="">
                               
                                @if(!empty($client))
                                @foreach($client as $c)
                                 <option value="">Choose Client</option>
                                <option value="{{$c->token}}">{{$c->token}} - {{$c->name}}</option>
                                @endforeach
                                @else
                                <option value="">No Client Created</option>
                                @endif
                                
                               </select>
                                @endif
                            </div>
                          

                            <div class="form-group col-md-4">
                                {{ Form::label('email', 'Instruction Date') }}
                                {{ Form::date('inst_date',$data->inst_date, array('class' => 'form-control input-sm')) }}
                            </div>

                          

                            <div class="form-group col-md-4">
                                {{ Form::label('email', 'Beneficiary Name') }}
                                {{ Form::text('ben_name',$data->ben_name, array('class' => 'form-control input-sm')) }}
                            </div>

                            <div class="form-group col-md-4">
                                {{ Form::label('email', 'Beneficiary ID') }}
                                {{ Form::number('ben_id',$data->ben_id, array('class' => 'form-control input-sm')) }}
                            </div>

                             <div class="form-group col-md-4">
                                {{ Form::label('email', 'Beneficiary Phone') }}
                                {{ Form::text('ben_phone',$data->ben_phone, array('class' => 'form-control input-sm')) }}
                            </div> 

                            <div class="form-group col-md-4">
                                {{ Form::label('name', 'Location of Delivery') }}
                                {{ Form::text('loc_delivery',$data->loc_delivery, array('class' => 'form-control input-sm')) }}
                            </div>

                             <div class="form-group col-md-4">
                                {{ Form::label('email', 'Client Reference') }}
                                {{ Form::text('client_ref',$data->client_ref, array('class' => 'form-control input-sm')) }}
                            </div>

                              <div class="form-group col-md-4">
                                {{ Form::label('email', 'Delivery Date') }}
                                {{ Form::date('delivery_date', $data->delivery_date, array('class' => 'form-control input-sm')) }}
                            </div>

                            <div class="form-group col-md-4">
                                {{ Form::label('email', 'Currency') }}
                               <select class="form-control input-sm" name="ccy" required="">
                                 <option value="">Choose Currency</option>
                                 <option>SSP</option>
                                 <option>USD</option>
                               </select>
                            </div>

                             <div class="form-group col-md-4">
                                {{ Form::label('name', ' Amount') }}
                                {{ Form::number('rate', $data->amount, array('class' => 'form-control input-sm')) }}
                            </div>

                             <div class="form-group col-md-4">
                                {{ Form::label('name', ' USD:SSP Rate') }}
                                {{ Form::number('rate', $data->rate, array('class' => 'form-control input-sm')) }}
                            </div>


                            <div class="form-group col-md-4">
                                {{ Form::label('email', 'Attach Client Instruction') }}
                                <input type="file" multiple="" name="client_inst[]" class="form-control input-sm" required="">
                                 <a href=""><label class="label label-default">{{$data->client_inst}}</label></a>
                           
                            </div>

                             <div class="form-group col-md-4">
                                {{ Form::label('name', 'Attach Payment List') }}
                                <input type="file" multiple="" name="payment_list[]" class="form-control input-sm">
                                <a href=""><label class="label label-default">{{$data->payment_list}}</label></a>
                              
                            </div>

                             <div class="form-group col-md-4">
                                {{ Form::label('name', 'Reviewer') }}
                                {{ Form::text('reviewer',$data->reviewer, array('class' => 'form-control input-sm','readonly')) }}
                            </div>

                              <div class="form-group col-md-12">
                                {{ Form::label('name', 'Description') }}
                                {{ Form::textarea('desc',$data->desc, array('class' => 'form-control input-sm ','rows'=>'3')) }}
                            </div>

                       


                            

                </div>
                <div class="box-footer">
                    {{ Form::submit('Submit For Approval', array('class' => 'btn btn-success pull-right')) }}


                </div>
                  {!!Form::close()!!}
            </div>
        </div>
        </div>
@endsection
