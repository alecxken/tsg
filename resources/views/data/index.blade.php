@extends('layouts.template')
@section('content')

<div class="box-body">
  


<div class="col-md-12">
  <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Tracker Log  </h3>
         </div>
        <div class="box-body table-responsive" id="table_wrapper">
                
                     <table id="report-table" class="table table-bordered table-striped small">
          <thead class="table-sm">
             <tr class="box-success">  
              
                <th>Ref</th>
                <th>Client</th>
                <th>Instruction Date</th> 
                <th>Beneficiary</th> 
                <th>Amount</th>
                <th>Rate</th> 
                <th>Delivery Agent</th>          
                <th>Delivery Status</th>
                <th>Status</th>
                <th>Action</th> 

                         
            </tr>
          </thead>
          <tbody>
            @if(!empty($data))
           @foreach ($data ?? '' as $user)
              <tr>
                @if($user->status == 'Approve')
                 <td><a href="{{url('calendar-view/'.$user->log_id)}}" class="label label-success">{{$user->ref_token}}</a></td>
                        
                <td>{{$user->client_name}}</td>
                <td>{{$user->inst_date}}</td>
                <td>{{$user->ben_name}}</td>
                <td>{{$user->ccy}} {{$user->amount}}</td>
                <td>{{$user->rate}}</td>
                <td>{{$user->agent}}</td>
                <td>{{$user->delivery_status}}</td>
                <td>
                  @if($user->status == 'Done')
                    <label class="label label-warning">Done</label>
                  @elseif($user->status == 'Complete')
                     <label class="label label-success">Ok</label>
                  @else
                     <label class="label label-info">Pending</label>
                  @endif
                </td>
               <td>
                  @if($user->status == 'Done')
                   <a href="{{url('action-remedy/'.$user->id)}}" class="label label-success">Action</a>
                  @else
                  <a href="{{url('calendar-review/'.$user->log_id)}}" class="label label-warning">Action</a>
                  @endif
                </td>
               @endif
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
