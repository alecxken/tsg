


<div  class="modal  fade" tabindex="-1" role="dialog" id="myModal">
   <div class="modal-dialog" role="document">
       <div class="modal-content">
                 <div class="modal-header">
                    <h4 class="modal-title"> Payment Module</h4>
                 </div>
                  {!! Form::open(['method'=> 'post','url' => 'approval_data' ]) !!}
                   <div class="modal-body">
                      <div class="row">
                           <div class="box-body">

                              <div class="form-group col-md-12 center">
                                {!! Form::label('C_Name', 'Invoice  Ref:', ['class' => 'col-form-label text-md-right'])!!}
                                {!!Form::text('ref_token',Null,['class' => 'form-control','id' =>'taskid','readonly'])!!}
                             </div>
                             <div class="form-group col-md-12 center">
                                {!! Form::label('C_Name', 'Inputer ', ['class' => 'col-form-label text-md-right'])!!}
                                {!!Form::text('inputter',Null,['class' => 'form-control','id' =>'inputter','readonly'])!!}
                             </div>

                              <div class="form-group col-md-12">
                                {{ Form::label('name', 'Choose Status') }}
                                 <select class="form-control input-sm" name="status" required="">
                                 <option value="">Choose Status</option>
                                 <option>Approved</option>
                                 <option>Rejected</option>
                               </select>
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
