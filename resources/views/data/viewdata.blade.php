@extends('layouts.template')
@section('content')

<div class="box-body">
  


<div class="col-md-12">
  <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Issue Log Tracking </h3>
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
              
                <th>Token</th>
                <th>Client</th>
                <th>Instruction Date</th>
                <th>Beneficiary</th> 
                <th>Delivery Date</th> 
                 <th>CCY</th> 
                 <th>Amount</th>
                <th>Rate</th> 
                <th>status</th>
                <th>Action</th> 
   
            </tr>
          </thead>
          <tbody>
            @if(!empty($data))
           @foreach ($data ?? '' as $user)
              <tr>
        <td><a href="{{url('data-view/'.$user->ref_token)}}" class="label label-success">{{$user->ref_token}}</a></td>
                <td>{{$user->client_name}} </td>
                 <td>{{$user->inst_date}}</td>
                <td>{{$user->ben_name}}</td>
                <td>{{$user->delivery_date}}</td>
                <td>{{$user->ccy}}</td>
                <td>{{$user->amount}}</td>
                <td>{{$user->rate}}</td>
              
                <td>
                  @if($user->status == 'Approve')
                    <label class="label label-success">Done</label>
                  @elseif($user->status == 'Complete')
                     <label class="label label-success">Ok</label>
                  @elseif($user->status == 'Transit')
                     <label class="label label-info">Transit</label>
                  @else
                     <label class="label label-danger">Pending</label>
                  @endif
                </td>

                <td>
                  @if($user->status == 'Approve')
                   <a href="{{url('data-details/'.$user->ref_token)}}" class="label label-success">Detail</a>
                  @else
              <button class="label label-default  label-sm  open-modal" value="{{$user->ref_token}}">Update Status</button>
                  <a href="{{url('data-view/'.$user->ref_token)}}" class="label label-warning">Action</a>
                   <a href="{{url('data-edit/'.$user->ref_token)}}" class="label label-info">Edit</a>
                  <!--   <a href="{{url('data-drop/'.$user->ref_token)}}" class="label label-warning">Drop</a> -->
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

@include('payments.stage1')
    <script type="text/javascript">

   
   $(document).ready(function(){

    var url = "payment-actions";

    $('.open-modal').click(function(){
        var task_id = $(this).val();
        $.get(url + '/' + task_id, function (data) {
            //success data
            console.log(data);
            $('#taskid').val(data.ref_token);
            $('#inputter').val(data.reviewer);
         
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
