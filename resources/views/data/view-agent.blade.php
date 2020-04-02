@extends('layouts.template')
@section('content')

<div class="box-body">
  


<div class="col-md-12">
  <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Agent Reimbursment  Log  </h3>
         </div>
        <div class="box-body table-responsive" id="table_wrapper">
                
                     <table id="report-table" class="table table-bordered table-striped small">
          <thead class="table-sm">
             <tr class="box-success">  
              
                <th>Ref</th>
                <th>Client</th>
                <th>invoice_no</th> 
                <th>Beneficiary</th> 
                <th>Amount</th>      
                <th>Commission</th>          
                <th>Disbursed</th>
                <th>Age</th>
                <th>Status</th>
                <th>Action</th> 

                         
            </tr>
          </thead>
          <tbody>
            @if(!empty($data))
           @foreach ($data ?? '' as $user)
              <tr>
               
          <td><a href="{{url('tracking-payment/'.$user->ref_token)}}" class="label label-default">{{$user->ref_token}}</a></td>                       
                <td>{{$user->client_name}}</td>
                <td><a href="{{url('view-letter/'.$user->invoice)}}" target="_blank" class="label label-info"><span class="fa fa-paperclip"></span> {{$user->invoice_no}}</a></td>
                <td>{{$user->ben_name}}</td>
                <td>{{$user->amount}}</td>
                <td>{{$user->commission}}</td>
                <td>{{$user->disbursed}}</td>
               
                <?php
$now  = \Carbon\Carbon::now();
$end  = $user->created_at;

// show difference in days between now and end dates
$test = $now->diffInDays($end);
                ?>
                <td>{{$test}} Days</td>
                <td>
                  @if($user->status == 'upaid')
                    <label class="label label-warning">Not Paid</label>
                  @elseif($user->status == 'paid')
                     <label class="label label-success">Paid</label>
                  @else
                     <label class="label label-info">Pending</label>
                  @endif
                </td>
               <td>
                  @if($user->status == 'Paids')
                   <button class="btn btn-default  btn-sm  open-modal" value="{{$user->ref_token}}">Agent Paid</button>
                   {{-- <a href="{{url('action-remedy/'.$user->ref_token)}}" class="label label-success">Pay Agent</a> --}}
                  @elseif($user->status == 'Repaid')
Closed
                  @else
                  No Action
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
    @include('payments.pays')

    <script type="text/javascript">
    //display modal form for task editing
     $(document).ready(function(){

    var url = "payment-actions";

    $('.open-modal').click(function(){
        var task_id = $(this).val();
        $.get(url + '/' + task_id, function (data) {
            //success data
            console.log(data);
            $('#taskid').val(data.ref_token);
            $('#tasknamer').val(data.client_name);
            $('#assigned').val(data.rm);
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
