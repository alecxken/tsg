@extends('layouts.template')
@section('content')


            
<div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
            <div class="box-header with-border bg-info ">
               <h6 class="box-title  "><b style="color: #1F35A2;">AFFILIATE REGISTRATION PAGE</b></h6>
            </div> 
       <div class="box box-primary"></div>
      {!! Form::open(['method'=> 'post','url' => 'region-store', 'files' => true ]) !!}
        <div class="box-body"> 

          <small>
                     
          <div class="form-group col-md-3 center">
             {!! Form::label('weight', 'AFFILIATE ', ['class' => ''])!!}
             {!!Form::text('country',Null,['placeholder'=>'eg KENYA - EKE', 'id'=>'name', 'class' => 'name form-control input' ,'maxlength'=>'700'])!!}
          </div>
          <div class="form-group col-md-3 center">
             {!! Form::label('weight', 'CODE ', ['class' => ''])!!}
             {!!Form::text('code',Null,['placeholder'=>'KE', 'id'=>'name', 'class' => 'name form-control input' ,'maxlength'=>'700'])!!}
          </div>
           <div class="form-group col-md-3 center">
             {!! Form::label('Descri', 'Affiliate', ['class' => ''])!!}
             {!!Form::text('affiliate',null,['placeholder'=>'CESA','id'=>'resident', 'class' => 'residence form-control input','maxlength'=>'3500'])!!}
          </div>

          <div class="form-group col-md-3 center">
             {!! Form::label('Descri', 'Action', ['class' => ''])!!}
             <button type="submit" class="pull-right btn btn-success center form-control ">Submit</button>
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
          <thead class="btn-success">
                    <tr>
                      <th>Id</th>
                      <th>COUNTRY</th>
                      <th>CODE</th>
                      <th>REGION</th>
                      <th>Action</th>
                     
                   </tr>
           </thead>
         <tbody>
          @if(!empty($data))
          @foreach($data as $f)
          <tr>
            <td>{{$f->id}}</td>
            <td>{{$f->country}}</td>
            <td>{{$f->code}}</td>
            <td>{{$f->affiliate}}</td>
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