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
                <th>Age</th>
                <th>Status</th>
                <th>Action</th> 

                         
            </tr>
          </thead>
          <tbody>
            @if(!empty($data))
           @foreach ($data ?? '' as $user)
              <tr>
           
          <td><a href="{{url('tracking-action/'.$user->ref_token)}}" class="label label-success">{{$user->ref_token}}</a></td>                       
                <td>{{$user->client_name}}</td>
                <td>{{$user->inst_date}}</td>
                <td>{{$user->ben_name}}</td>
                <td>{{$user->ccy}} {{$user->amount}}</td>
                <td>{{$user->rate}}</td>
                <td>{{$user->agent}}</td>
                <td>{{$user->delivery_status}}</td>
                <?php
$now  = \Carbon\Carbon::now();
$end  = $user->inst_date;

// show difference in days between now and end dates
$test = $now->diffInDays($end);
                ?>
                <td>{{$test}} Days</td>
                <td>
                  @if($user->status == 'Done')
                    <label class="label label-warning">{{$user->status}}</label>
                  @elseif($user->status == 'Invoicing')
                     <label class="label label-success">{{$user->status}}</label>
                   @elseif($user->status == 'Agent')
                     <label class="label label-success">{{$user->status}}</label>
                   @elseif($user->status == 'Paid')
                     <label class="label label-success">{{$user->status}}</label>
                   @elseif($user->status == 'Reimbursed')
                     <label class="label label-success">{{$user->status}}</label>
                  @else
                     <label class="label label-info">{{$user->status}}</label>
                  @endif
                </td>
               <td>
                
                  @if($user->status == 'Agent')
                 <button class="btn btn-sm btn-default  label-sm  open-modal" value="{{$user->ref_token}}">Update Status</button>
               {{--     <a href="{{url('tracking-action/'.$user->ref_token)}}" class="label label-success">Action Now</a> --}}
                  @elseif($user->status == 'Invoicing')
                  
                  @elseif($user->status == 'Paid')

                  @else
                  No Action Here
                  @endif
           
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
@include('payments.trackerinputer')
    <script type="text/javascript">

   
   $(document).ready(function(){

    var url = "payment-actions";

    $('.open-modal').click(function(){
        var task_id = $(this).val();
        $.get(url + '/' + task_id, function (data) {
            //success data
            console.log(data);
            $('#taskid').val(data.ref_token);
            $('#taskname').val(data.client_name);
            $('#delivery').val(data.delivery_status);
            $('#myModal').modal('show');
        }) 
    });
  });
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
