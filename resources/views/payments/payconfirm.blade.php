


<div  class="modal  fade" tabindex="-1" role="dialog" id="myModals">
   <div class="modal-dialog" role="document">
       <div class="modal-content">
                 <div class="modal-header">
                    <h4 class="modal-title"> Payment Module</h4>
                 </div>
                  {!! Form::open(['method'=> 'post','url' => 'updatepayments' ]) !!}
                   <div class="modal-body">
                      <div class="row">
                           <div class="box-body">

                              <div class="form-group col-md-12 center">
                                {!! Form::label('C_Name', 'Invoice  Ref:', ['class' => 'col-form-label text-md-right'])!!}
                                {!!Form::text('ref_token',Null,['class' => 'form-control','id' =>'taskids','readonly'])!!}
                             </div>
                             <div class="form-group col-md-12 center">
                                {!! Form::label('C_Name', 'Client Name', ['class' => 'col-form-label text-md-right'])!!}
                                {!!Form::text('client',Null,['class' => 'form-control','id' =>'tasknames','readonly'])!!}
                             </div>

                              <div class="form-group col-md-12 center">
                               {!! Form::label('C_Name', 'Payment Status:', ['class' => 'col-form-label text-md-right'])!!}
                                <select class="form-control select2 " style="width: 100%;" name="status" required="">
                                   <option value="">Select Status</option>
                                  <option value="Paids">Confirm</option>
                                  <option value="PartiallyPaid">Reject</option>
                                </select>
                              </div> 


                              <div class="form-group col-md-12 center">
                                {!! Form::label('C_Name', ' Comments', ['class' => 'col-form-label text-md-right'])!!}
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
