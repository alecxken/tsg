@extends('layouts.template')

@section('title', '| Add User')

@section('content')

<div class="box-body">
  

    <div class="col-lg-11 col-lg-offset-1" id="test">
          <div class="box box-primary">
                <div class="box-header with-border bg-info">
                      <h3 class="box-title"><i class='fa fa-pencil'></i> Data Capture</h3>
                      <div class="box-tools pull-right">  
                      </div>
                </div>
                <div class="box box-primary"></div>
              <div class="box-body">


                    {!! Form::open(['method'=> 'post','url' => 'store_data', 'files' => true ]) !!}

                            <div class="form-group col-md-4">
                                {{ Form::label('name', 'Delivery Ref') }}
                                {{ Form::text('ref_token', $token, array('class' => 'form-control  input-sm','readonly')) }}
                            </div>

                            <div class="form-group col-md-4">
                                {{ Form::label('email', 'Client Name') }}
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
                            </div>

                            <div class="form-group col-md-4">
                                {{ Form::label('email', 'Instruction Date') }}
                                {{ Form::date('inst_date', '', array('class' => 'form-control input-sm')) }}
                            </div>

                           

                            <div class="form-group col-md-4">
                                {{ Form::label('email', 'Beneficiary Name') }}
                                {{ Form::text('ben_name', '', array('class' => 'form-control input-sm')) }}
                            </div>

                            <div class="form-group col-md-4">
                                {{ Form::label('email', 'Beneficiary ID') }}
                                {{ Form::text('ben_id', '', array('class' => 'form-control input-sm')) }}
                            </div>

                             <div class="form-group col-md-4">
                                {{ Form::label('email', 'Beneficiary Phone') }}
                                {{ Form::text('ben_phone', '', array('class' => 'form-control input-sm')) }}
                            </div> 

                            <div class="form-group col-md-4">
                                {{ Form::label('name', 'Location of Delivery') }}
                                {{ Form::text('loc_delivery', '', array('class' => 'form-control input-sm')) }}
                            </div>

                            <div class="form-group col-md-4">
                                {{ Form::label('email', 'Client Reference') }}
                                {{ Form::text('client_ref', '', array('class' => 'form-control input-sm')) }}
                            </div>

                              <div class="form-group col-md-4">
                                {{ Form::label('email', 'Delivery Date') }}
                                {{ Form::date('delivery_date', '', array('class' => 'form-control input-sm')) }}
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
                                {{ Form::label('name', ' Amount ') }}
                                {{ Form::number('amount', '', array('class' => 'form-control input-sm')) }}
                            </div>

                             <div class="form-group col-md-4">
                                {{ Form::label('name', ' USD:SSP Rate') }}
                                {{ Form::text('rate', '', array('class' => 'form-control input-sm')) }}
                            </div>


                            <div class="form-group col-md-3">
                                {{ Form::label('email', 'Attach Client Instruction') }}
                                <input type="file" multiple="" name="client_inst[]" class="form-control input-sm" required="">
                           
                            </div>

                             <div class="form-group col-md-3">
                                {{ Form::label('name', 'Attach Payment List') }}
                                <input type="file" multiple="" name="payment_list[]" class="form-control input-sm">
                              
                            </div>

                             <div class="form-group col-md-3">
                                {{ Form::label('name', 'Inputer Name') }}
                                {{ Form::text('reviewer',Auth::user()->name, array('class' => 'form-control input-sm','readonly')) }}
                            </div>

                            <div class="form-group col-md-3">
                                {{ Form::label('name', 'Inputer Name') }}
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

                             <div class="form-group col-md-12">
                                {{ Form::label('name', 'Description') }}
                                {{ Form::textarea('desc', '', array('class' => 'form-control input-sm ','rows'=>'')) }}
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
