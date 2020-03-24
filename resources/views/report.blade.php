@extends('layouts.template')
@section('content')
            
<div class="row">
  <div class="col-md-12">
    <div class="box box-danger">
            <div class="box-header with-border bg-danger ">
               <h6 class="box-title  "><b style="color: #C70039;">MTTR REPORTING PAGE</b></h6>
            </div> 
       <div class="box box-danger"></div>
      {!! Form::open(['method'=> 'post','url' => 'report-mttr', 'files' => true ]) !!}
     
   <div class="box-body table-responsive" id="table_wrapper">
     <table id="report-table" class="table table-bordered table-striped  table-fit">
        <thead class="bg-info">
          <tr >
            <th class="text-center">
              #
            </th>
            <th class="text-center">
              System Name
            </th>
            <th class="text-center">
              Status
            </th>
            <th class="text-center">
              Comments
            </th>
             <th class="text-center">
              Sysaid
            </th>
          </tr>
        </thead>
        <tbody>
          @foreach($data as $ds=> $d)
          <tr id='t0'>
            <td>
              <input type="hidden"  name="{{$d->id}}"> 
            {{$ds}}-E{{Auth::user()->affiliate}}
            </td>
            <td>
              <input type="hidden" name="system[]" value="{{$d->id}}">               
              <b>{{$d->name}}</b>
            </td>
            <td>
              <select class="form-control" name="status[]">
                  <option class="labe label-success" value="0"> System Up</option>
                  <option class="labe label-warning" value="1">Down  by less than a Hour</option>
                  <option class="labe label-danger" value="2">Down  for more than a Hour</option>
              </select>
            </td>
             <td>
             {!!Form::text('comment[]',Null,['class' => 'form-control','placeholder'=>'Comments'])!!}
            </td>
            <td>
              {!!Form::text('ticket[]',Null,['class' => 'form-control','placeholder'=>'sysaid ticket'])!!}
            </td>
                     
          </tr>
          @endforeach

      
        </tbody>
        
      </table>
    </div>
    <div class="box-footer">
        <button type="submit" class="pull-right btn btn-success center form-control ">Submit</button>
    </div>
  </div>
</div>
</div>



<script type="text/javascript">
 

  
     $(document).ready(function() {
var table = $('#report-table').DataTable(
    {
    paging     : false,
    lengthChange: true,
    searching   : true,
    ordering   : true,
    info       : false,
    autoWidth   : false,
    buttons: [
       // 'copy', 'excel', 'pdf'
    ]
    });

    table.buttons().container()
        .appendTo( '#table_wrapper .col-sm-6:eq(0)' );

} );

</script>


@endsection