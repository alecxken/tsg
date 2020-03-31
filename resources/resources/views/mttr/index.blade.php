

 @extends('layouts.template')
@section('content')

{{-- <center><h2 class="timeline-header"><a href="#">Autocase</a> Module</h2></center> --}}
 


<div class="box box-primary">
            <div class="box-header with-border bg-info">
        <center><h6 class="box-title  ">System Status  :<!--  -->: {{\Carbon\Carbon::now()->format('d F, Y') }} </h6></center>
            </div> 
         
            <div class="box-body">



        <table class="table table-bordered table-hover order-list small" id="">
                     <thead class="btn-Success">
                     
                      <tr class="bg-info">
                        <th>System</th> 
                        @foreach($datas->groupBy('date') as $ds =>$v)
                        <th class="text-center">{{\Carbon\Carbon::parse($ds)->format('d F, Y')}}</th>
                        @endforeach
                      </tr>
                     </thead>
               
        <tbody>
           @if(!empty($datasx))
          @foreach($datasx as $d)
          @if($d->status == 'active')
             <tr id='t0' lass="bg-info">
               <td class="bg-success"> {{$d->name }}</td>
                   @foreach($datas->groupBy('date') as $ds => $te)
                        @foreach($te as $de)
                            @if($d->id == $de->system)
                              <td 
                                  @if($de->status == '1')
                                  class="btn-warning ">
                                  {{$de->status}}
                                  @elseif($de->status =='0')
                                  class="btn-success  ">
                                  {{$de->status}}
                                  @elseif($de->status =='2')
                                  class="btn-danger  ">
                                  {{$de->status}}
                                  @endif
                               </td>
              
                              @endif
                        @endforeach
                   @endforeach           
             </tr>
          @endif
          @endforeach
          @endif
         </tbody>
       </table>

 </div>
<div class="box-footer">

   <div class="box-body table-responsive" id="table_wrapper">
     <table id="report-table" class="table table-bordered table-striped  table-fit">
          <thead class="btn-info">
                     
                         <tr>
                          <th>Date</th>
                          <th>Affiliate</th>
                          <th>Unit</th>
                          <th>Reported By</th>
                          <th>System</th>
                          <th>Status</th>
                          <th>Comments</th>
                          </tr>
                     </thead>
                          
        <tbody>
          @if(!empty($data))
          @foreach($data as $d)
          <tr>
            <td>{{\Carbon\Carbon::parse($d->date)->format('d F, Y')}}</td>
            <td>EKE</td>
            <td>{{$d->affiliate }}</td>
            <td>{{$d->user }} </td>
            <?php $sys= \App\MttrSystem::where('id',$d->system)->first();?>
            <td>@if(!empty($sys)){{$sys->name}} @else Not Found @endif</td>
<td 

@if($d->status == '1')
class="btn-warning ">
{{-- {{$d->status}} --}}

@elseif($d->status =='2')
class="btn-danger  ">
{{-- {{$d->status}} --}}
@else
class="btn-success  ">
{{-- {{$d->status}} --}}
@endif</td>
            <td>
              @if(!is_null($d->comments)){{$d->comments}} @else No Comments @endif
         
            </td>
            
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
