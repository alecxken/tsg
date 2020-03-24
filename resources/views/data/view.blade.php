@extends('layouts.template')

@section('title', '| Add User')

@section('content')

<div class="box-body">
  

    <div class="col-lg-10 col-lg-offset-1" id="test">
          <div class="box box-primary">
                <div class="box-header with-border bg-info">
                      <h3 class="box-title"><i class='fa fa-pencil'></i> Data Capture</h3>
                      <div class="box-tools pull-right">  
                      </div>
                </div>
                <div class="box box-primary"></div>
              <div class="box-body">


                            {{ Form::open(array('url' => '')) }}

                              <table class="table table-bordered table-hover order-list1 table-sm small" id="">
                            <thead class="bg-green small">
                              {{-- <tr class="">
                                <th> </th><th>Amount</th>
                                <th>Description </th><th>Amount</th>                                   
                              </tr> --}}
                            </thead>
                              <tbody class="small">                               
                                 <tr> 
                                  <b><th class="bg-info">ref_token </th> </b><td>-</td>
                                  <b><th class="bg-info">client_name </th> </b><td>-</td>
                                  <b><th class="bg-info">inst_date  </th> </b><td>-</td>
                                 </tr>

                                  <tr> 
                              
                            <b><th class="bg-info">desc  </th> </b><td>-</td>
                            <b><th class="bg-info">ben_name  </th> </b><td>-</td>
                           <b><th class="bg-info">ben_id  </th> </b><td>-</td>
                                 </tr>

                                  <tr> 
                                  <b><th class="bg-info">ben_phone </th> </b><td>-</td>
                                  <b><th class="bg-info">loc_delivery  </th> </b><td>-</td>
                                  <b><th class="bg-info">ccy </th> </b><td>-</td>
                                 </tr>

                                 <tr> 
                                  <b><th class="bg-info">client_ref  </th> </b><td>-</td>
                                  <b><th class="bg-info">delivery_date  </th> </b><td>-</td>
                                  <b><th class="bg-info">rate </th> </b><td>-</td>
                                 </tr>

                                 <tr> 
                                  <b><th class="bg-success">client_inst  </th> </b><td>-</td>
                                  <b><th class="bg-success">payment_list  </th> </b><td>-</td>
                                  <b><th class="bg-success">reviewer </th> </b><td> <a href="{{url('calendar-pdf/')}}"><label class="label label-primary">-</label></a></td>
                                 </tr>

                                


                              </tbody>
                                               
                       </table>

                       <br>

                           


                            <div class="form-group col-md-4">
                                {{ Form::label('email', 'Attach Client Instruction') }}
                                {{ Form::file('address', null, array('class' => 'form-control input-sm','required')) }}
                            </div>

                             <div class="form-group col-md-4">
                                {{ Form::label('name', 'Attach Payment List') }}
                                {{ Form::file('name', null, array('class' => 'form-control input-sm')) }}
                            </div>

                             <div class="form-group col-md-4">
                                {{ Form::label('name', 'Reviewer') }}
                                {{ Form::text('name', '', array('class' => 'form-control input-sm')) }}
                            </div>

                       


                            

                </div>
                <div class="box-footer">
                    {{ Form::submit('Submit For Approval', array('class' => 'btn btn-success pull-right')) }}


                </div>
                                            {{ Form::close() }}
            </div>
        </div>
        </div>
@endsection
