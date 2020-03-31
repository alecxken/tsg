@extends('layouts.template')
@section('content')
<div class="row">
  <div class="col-md-4">
    <div class="box box-warning">
            <div class="box-header with-border ">
                 <center><h6 class="box-title  ">Create Agents</h6></center>
            </div> 
      {!! Form::open(['method'=> 'post','url' => 'agent-store', 'files' => true ]) !!}
        <div class="box-body">    
            

          <div class="form-group  center">
             {!! Form::label('weight', 'Name ', ['class' => 'awesome'])!!}
             {!!Form::text('name',Null,['class' => 'form-control' ,'maxlength'=>'155','required'])!!}
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
            <button type="submit" class="pull-right btn btn-warning center ">Create</button>
        </div>
     {!!Form::close()!!}
  </div>
</div>

  <div class="col-md-8">
    <div class="box box-warning">
        <div class="box-header with-border ">
            <center><h6 class="box-title  ">Agent Area</h6></center>
         </div> 
        <div class="box-body">    
         <div class="box-body table-responsive">
          <table id="example2" class="table table-bordered table-striped table-sm small">
          <thead class="btn-warning small">
             <tr> 
             <th>Token</th> 
              <th>Agent Name</th>
              <th>Email</th> 
              <th>Phone No </th>
              <th>Tin</th>
              <th>Cert Corp</th>
              <th>Status</th>
               <th colspan="2">Action</th> 
            </tr>
          </thead>
          <tbody class="small">
           @foreach ($data as $user)
              <tr>
                
                 <td class="bg-warning">{{$user->token}}</td>
                <td class="bg-warning">{{$user->name}}</td>
                <td class="bg-warning">{{$user->email}}</td>
                <td class="bg-warning">{{$user->phone}}</td>
                <td>{{$user->tin}}</td>
                <td>{{$user->cert_corp}}</td>
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