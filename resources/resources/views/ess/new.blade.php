

 @extends('layouts.template')
@section('content')


<div class="box box-primary">
            <div class="box-header with-border bg-info">
        <center><h6 class="box-title  ">Reports Output: System Date {{\Carbon\Carbon::now()->format('d F, Y') }} </h6></center>
            </div> 
         
          
<div class="box-body">

   <div class="box-body table-responsive" id="table_wrapper">
     <table id="report-table" class="table table-bordered table-striped  table-fit">
          <thead class="btn-success">
                     
                         <tr>
                          <th>Date</th>
                          <th>Token</th>
                          <th>Concern</th>
                          <th>Status</th>
                          <th>Action</th>
                          </tr>
                     </thead>
                          
        <tbody>
          @if(!empty($data))
          @foreach($data as $d)
          <tr>
            <td>{{\Carbon\Carbon::parse($d->created_at)->format('d-M-Y')}}</td>
              <td>{{$d->token}}</td>
            <td>{{$d->reasons }}</td>
            <td><span class="label label-danger">{{$d->status }}</span></td>
            <td><a class="btn btn-success btn-sm" href="{{url('mark-read/'.$d->id)}}">Mark As Read</a></td>                     
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
