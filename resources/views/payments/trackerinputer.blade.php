


<div  class="modal  fade" tabindex="-1" role="dialog" id="myModal">
   <div class="modal-dialog" role="document">
       <div class="modal-content">
                 <div class="modal-header">
                    <h4 class="modal-title"> Delivery Status</h4>
                 </div>
                  {!! Form::open(['method'=> 'post','url' => 'store_invoice' ]) !!}
                   <div class="modal-body">
                      <div class="row">
                           <div class="box-body">

                              <div class="form-group col-md-12 center">
                                {!! Form::label('C_Name', 'Invoice  Ref:', ['class' => 'col-form-label text-md-right'])!!}
                                {!!Form::text('ref_token',Null,['class' => 'form-control','id' =>'taskid','readonly'])!!}
                             </div>
                             <div class="form-group col-md-12 center">
                                {!! Form::label('C_Name', 'Agent Code', ['class' => 'col-form-label text-md-right'])!!}
                                {!!Form::text('agent',Null,['class' => 'form-control','id' =>'taskname','readonly'])!!}
                             </div>

                             <div class="form-group col-md-12 center">
                                {!! Form::label('C_Name', 'Delivery Status', ['class' => 'col-form-label text-md-right'])!!}
                                {!!Form::text('delivery',Null,['class' => 'form-control','id' =>'delivery','readonly'])!!}
                             </div>

                              <div class="form-group col-md-12">
                                {{ Form::label('name', 'Choose Status') }}
                                 <select class="form-control input-sm" name="status" required="">
                                 <option value="">Choose Status</option>
                                 <option>Delivered</option>
                                 <option>Not Delivered</option>
                               </select>
                            </div>

                             <div class="form-group col-md-12">
                                {{ Form::label('name', 'Proof Attachment') }}
                                {{ Form::file('proof_delivery',null, array('class' => 'form-control input-sm','readonly')) }}
                            </div>

                           

                             <div class="form-group col-md-12">
                                {{ Form::label('name', 'Comments') }}
                                 {{ Form::textarea('comments', '', array('class' => 'form-control input-sm ','rows'=>'1','placeholder'=>'comments on the status')) }}
                               <!-- ] -->
                            </div>

                           

                              </div>
                        </div>
                    </div>
            
            <div class="modal-footer">
               <button type="button" class="btn btn-info pull-left" data-dismiss="modal">Close</button>
               <button type="submit" class="btn btn-success center">Submit </button>
            </div>
              {!!Form::close()!!}
        </div>
     </div>
</div>
