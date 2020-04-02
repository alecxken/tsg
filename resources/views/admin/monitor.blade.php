
@extends('layouts.template')
@section('content')

<div class="box-body">
  


<div class="col-md-12">
  <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Status Audit Trail </h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
                <div class="btn-group">                 
                </div>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
        <div class="box-body table-responsive" id="table_wrapper">
                
                     <table id="report-table" class="table table-bordered table-striped small">
          <thead class="table-sm">
             <tr class="box-success">  
              
                <th>Ref</th>
                <th>Stage</th>
                <th>Inputer</th>
                <th>Authorizer</th> 
                <th>Age</th> 
                 <th>Inputer Action</th> 
                 <th>Authorizer Action</th>
              
                <th>status</th>
              
   
            </tr>
          </thead>
          <tbody>
            @if(!empty($data))
           @foreach ($data ?? '' as $user)
              <tr>
        <td><a href="{{url('data-view/'.$user->ref_token)}}" class="label label-success">{{$user->ref_token}}</a></td>
                <td>{{$user->stage}} </td>
                 <td>{{$user->inputer}}</td>
                <td>{{$user->authorizer}}</td>
                <td>{{$user->age}}</td>
                <td>
                	{{$user->inputer_status}}<br>
					{{\Carbon\Carbon::parse($user->inputer_time)->format('d M Y')}}					
				</td>
                 <td>
                	{{$user->authorizer_status}}<br>
					{{$user->authorizer_time}}					
				</td>
                
              
                <td>
                  
                    <label class="label label-success">Confirmed</label>
                 
                </td>

            
              </tr>
          @endforeach
          @endif
          </tbody>
          </table>
       
          </div>



           </div>
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
    info       : true,
    autoWidth   : true,
    buttons: [
        'excel'
    ]
    });

    table.buttons().container()
        .appendTo( '#table_wrapper .col-sm-6:eq(0)' );

} );

</script>
 
@endsection
