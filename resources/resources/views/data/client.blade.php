@extends('layouts.template')
@section('content')
<div class="row">
  <div class="col-md-4">
    <div class="box box-success">
            <div class="box-header with-border ">
                 <center><h6 class="box-title  ">Create Clients</h6></center>
            </div> 
      {!! Form::open(['method'=> 'post','url' => 'client-store', 'files' => true ]) !!}
        <div class="box-body">    
            

          <div class="form-group  center">
             {!! Form::label('weight', 'Name ', ['class' => 'awesome'])!!}
             {!!Form::text('name',Null,['class' => 'form-control' ,'maxlength'=>'155'])!!}
          </div>

           <div class="form-group  center">
             {!! Form::label('weight', 'Email ', ['class' => 'awesome'])!!}
             {!!Form::email('email',Null,['class' => 'form-control' ,'maxlength'=>'155','required'])!!}
          </div>

           <div class="form-group  center">
             {!! Form::label('weight', 'Phone ', ['class' => 'awesome'])!!}
             {!!Form::number('phone',Null,['class' => 'form-control' ,'maxlength'=>'55','required'])!!}
          </div>

         

           <div class="form-group  center">
             {!! Form::label('weight', 'Contract ', ['class' => 'awesome'])!!}
             {!!Form::text('contract',Null,['class' => 'form-control' ,'maxlength'=>'155','required'])!!}
          </div>

           <div class="form-group  center">
             {!! Form::label('weight', 'Physical Address ', ['class' => 'awesome'])!!}
             {!!Form::textarea('phy_address',Null,['class' => 'form-control' ,'rows'=>'3','required'])!!}
          </div>

        </div>
        <div class="box-footer">
            <button type="cancel" class="pull-left btn btn-primary center ">Cancel</button>
            <button type="submit" class="pull-right btn btn-success center ">Create</button>
        </div>
     {!!Form::close()!!}
  </div>
</div>

  <div class="col-md-8">
    <div class="box box-success">
        <div class="box-header with-border ">
            <center><h6 class="box-title  ">Clients Area</h6></center>
         </div> 
        <div class="box-body">    
         <div class="box-body table-responsive">
          <table id="example2" class="table table-bordered table-striped table-sm small">
          <thead class="btn-success small">
             <tr>  
              <th>Client Name</th>
              <th>Email</th> 
              <th>Phone No </th>
              <th>Contract</th>
              <th>Status</th>
               <th colspan="2">Action</th> 
            </tr>
          </thead>
          <tbody class="small">
           @foreach ($data as $user)
              <tr>
                <td class="bg-success">{{$user->name}}</td>
                <td class="bg-success">{{$user->email}}</td>
                <td class="bg-success">{{$user->phone}}</td>
                <td>{{$user->contract}}</td>
                <td>{{$user->status}}</td>
                <td colspan="2">                  
               <a href="{{url('client-edit/'.$user->token)}}" class="label label-primary">
                <span class="fa-edit">Edit</span>
              </a>
              <a href="{{url('client-remove/'.$user->token)}}" class="label label-danger  btn-sm">          
                <span class="fa-remove">Drop</span>
              </a>
                </td>
              </tr>
          @endforeach
          </tbody>
          </table>
        </div>
        </div>
      </div>
    </div>
  @endsection