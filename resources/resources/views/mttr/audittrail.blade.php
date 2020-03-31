@extends('layouts.template')
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="box box-danger">
            <div class="box-header with-border bg-danger ">
               <h6 class="box-title  "><b style="color: #1F35A2;">SYSTEMS AUDIT TRAIL PAGE</b></h6>
            </div> 
       <div class="box box-danger"></div>
     
  
    <div class="box-body table-responsive" id="table_wrapper">
     <table id="report-table" class="table table-bordered table-striped  table-fit">
          <thead class="bg-info">
                    <tr>
                      <th>Id</th>
                      <th>User ID</th>
                      <th>Action</th>
                      <th>IP-ADDRESS</th>
                      <th>Date</th>      
                     
                   </tr>
           </thead>
         <tbody>
          @if(!empty($data))
          @foreach($data as $f)
          <tr>
            <td>{{$f->id}}</td>
            <td>{{$f->user_id}}</td>
            <td>{{$f->event}}</td>
            <td>{{$f->ip_address}}</td>
            <td>{{$f->created_at}}</td>
            
          </tr>
          @endforeach
          @endif
         </tbody>
      </table>
    </div>
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