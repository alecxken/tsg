@extends('layouts.template')
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="box box-success">
            <div class="box-header with-border bg-success ">
               <h6 class="box-title  "><b style="color: #1F35A2;">SYSTEMS REGISTRATION PAGE</b></h6>
            </div> 
       <div class="box box-success"></div>
      {!! Form::open(['method'=> 'post','url' => 'system-store', 'files' => true ]) !!}
        <div class="box-body"> 

          <small>
                     
          <div class="form-group col-md-3 center">
             {!! Form::label('weight', 'SYSTEM NAME ', ['class' => ''])!!}
             {!!Form::text('name',Null,['placeholder'=>'eg FLEXCUBE', 'id'=>'name', 'class' => 'name form-control input' ,'maxlength'=>'700'])!!}
          </div>
          <div class="form-group col-md-3 center">
             {!! Form::label('weight', 'CATEGORY ', ['class' => ''])!!}
             <select required="" class="form-control" name="type">
               <option value="">Choose Type</option>
               <option>Group</option>
               <option>Local</option>
             </select>
          </div>
           <div class="form-group col-md-3 center">
             {!! Form::label('Descri', 'Affiliate', ['class' => ''])!!}
              <select required="" class="form-control" name="affiliate">
               <option value="">Choose Affiliate</option>
               <option >ALL</option>
               @if(!empty($reg))
               @foreach($reg as $r)
               <option>{{$r->country}}</option>
               @endforeach
               @endif
             </select>
          </div>

          <div class="form-group col-md-3 center">
             {!! Form::label('Descri', 'Action', ['class' => ''])!!}
             <button type="submit" class="pull-right btn btn-success center form-control ">Register</button>
          </div>       
     
      </small>

        </div>    
       {{--  <div class="box-footer">
            <button type="submit" class="pull-right btn btn-success center ">Submit</button>
        </div> --}}
     {!!Form::close()!!}
  </div>

  </div>

  <div class="box-body">
    <div class="box-body table-responsive" id="table_wrapper">
     <table id="report-table" class="table table-bordered table-striped  table-fit">
          <thead class="bg-info">
                    <tr>
                      <th>Id</th>
                      <th>SYSTEM</th>
                      <th>CATEGORY</th>
                      <th>REGION</th>
                      <th>STATUS</th>
                      <th>ACTION</th>
                     
                   </tr>
           </thead>
         <tbody>
          @if(!empty($data))
          @foreach($data as $f)
          <tr>
            <td>{{$f->id}}</td>
            <td>{{$f->name}}</td>
            <td>{{$f->type}}</td>
            <td>{{$f->affiliate}}</td>
            <td>{{$f->status}}</td>
            <td>
              <a href="{{url('region/'.$f->id.'/delete')}}" class="label label-danger">Cancel</a>
              <a href="{{url('region/'.$f->id.'/activate')}}" class="label label-success">Active</a></td>
          </tr>
          @endforeach
          @endif
         </tbody>
      </table>
    </div>
     </div>
</div>

<script type="text/javascript">
 

  
     $(document).ready(function() {
var table = $('#report-table').DataTable(
    {
    paging     : true,
    lengthChange: true,
    searching   : true,
    ordering   : true,
    info       : false,
    autoWidth   : false,
    buttons: [
       'copy', 'excel', 'pdf'
    ]
    });

    table.buttons().container()
        .appendTo( '#table_wrapper .col-sm-6:eq(0)' );

} );

</script>
  @endsection