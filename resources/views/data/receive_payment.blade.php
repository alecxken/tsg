@extends('layouts.template')

@section('title', '| Add User')

@section('content')

<div class="box-body">
  

    <div class="col-lg-10 col-lg-offset-1" id="test">
          <div class="box box-success">
                <div class="box-header with-border bg-success">
                      <h3 class="box-title"><i class='fa fa-pencil'></i> {{$data->ref_token}} INVOICE PDF GENERATED</h3>
                      <div class="box-tools pull-right">  
                      </div>
                </div>
                <div class="box box-success"></div>
              <div class="box-body">


                    {!! Form::open(['method'=> 'post','url' => 'invoice-paid', 'files' => true ]) !!}

                  
                      
                          <div class="row">
                            <div class="col-md-12"  >
                               <iframe width="750px" height="700px"src="{{url('view-letter/'.$data->invoice_pdf)}}"></iframe>
                              
                            </div>
                          </div>
                           <br>
                             
                          <div class="row">
  {{ Form::hidden('ref_token', $data->ref_token, array('class' => 'form-control  input-sm','readonly')) }}
                            <div class="form-group col-md-4">
                              {{ Form::label('name', 'Payment Proof') }}
                              {{ Form::file('payment_proof', null, array('class' => 'form-control  input-sm',)) }}
                            </div>
                             <div class="form-group col-md-4">
                                {{ Form::label('name', 'Payment Status') }}
                                 <select class="form-control input-sm" name="status" required="">
                                 <option value="">Choose Status</option>
                                 <option >Paid</option>
                                 <option>Unpaid </option>
                               </select>
                            </div>

                            <div class="form-group col-md-4">
                                {{ Form::label('name', 'Amount Paid') }}
                                 {{ Form::number('paid', '', array('class' => 'form-control input-sm ','rows'=>'1','placeholder'=>'comments on the status')) }}
                               <!-- ] -->
                            </div>

                          

                             <div class="form-group col-md-12">
                                {{ Form::label('name', 'Comments') }}
                                 {{ Form::textarea('comments', '', array('class' => 'form-control input-sm ','rows'=>'1','placeholder'=>'comments on the status')) }}
                               <!-- ] -->
                            </div>
                              
                            </div>
                           
                    

                </div>
                <div class="box-footer">
                    {{ Form::submit('cancel ', array('class' => 'btn btn-danger pull-left')) }}
                    {{ Form::submit('Send Invoice ', array('class' => 'btn btn-success pull-right')) }}


                </div>
                  {!!Form::close()!!}
            </div>
        </div>
        </div>
@endsection
