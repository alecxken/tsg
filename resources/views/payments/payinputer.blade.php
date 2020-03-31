


<div  class="modal  fade" tabindex="-1" role="dialog" id="myModal">
   <div class="modal-dialog" role="document">
       <div class="modal-content">
                 <div class="modal-header">
                    <h4 class="modal-title"> Payment Module</h4>
                 </div>
                  {!! Form::open(['method'=> 'post','url' => 'updatepayment' ]) !!}
                   <div class="modal-body">
                      <div class="row">
                           <div class="box-body">

                              <div class="form-group col-md-12 center">
                                {!! Form::label('C_Name', 'Invoice  Ref:', ['class' => 'col-form-label text-md-right'])!!}
                                {!!Form::text('ref_token',Null,['class' => 'form-control','id' =>'taskid','readonly'])!!}
                             </div>
                             <div class="form-group col-md-12 center">
                                {!! Form::label('C_Name', 'Client Name', ['class' => 'col-form-label text-md-right'])!!}
                                {!!Form::text('client',Null,['class' => 'form-control','id' =>'taskname','readonly'])!!}
                             </div>

                              <div class="form-group col-md-12 center">
                               {!! Form::label('C_Name', 'Payment Status:', ['class' => 'col-form-label text-md-right'])!!}
                                <select class="form-control select2 " style="width: 100%;" name="status" required="">
                                   <option value="">Select Status</option>
                                  <option value="Paid">Fully Paid</option>
                                  <option value="PartiallyPaid">Partially Paid</option>
                                </select>
                              </div> 

                               <div class="form-group col-md-12 center">
                                {!! Form::label('C_Name', 'Payment Proof', ['class' => 'col-form-label text-md-right'])!!}
                                {!!Form::file('proof',Null,['class' => 'form-control','id' =>'','readonly'])!!}
                             </div>

                              <div class="form-group col-md-12 center">
                                {!! Form::label('C_Name', 'Inputer Comments', ['class' => 'col-form-label text-md-right'])!!}
                                {!!Form::text('desc',Null,['class' => 'form-control','id' =>''])!!}
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
