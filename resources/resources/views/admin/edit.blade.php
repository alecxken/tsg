@extends('layouts.template')

@section('title', '| Edit User')

@section('content')

 <div class="row justify-content-center">
       <div class="col-md-2"></div>
        <div class="col-md-8">
<div class='box box-default'>

     <div class="box-header with-border">
                <h6 class="box-title ">     Edit {{$user->name}}</h6>
            </div> 
    <div class="box-body"> 


    <hr>

    {{ Form::open(['method'=>'POST','url'=>'user_update/'.$user->id]) }}{{-- Form model binding to automatically populate our fields with user data --}}
@csrf
    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', $user->name, array('class' => 'form-control', 'readonly')) }}
    </div>

    <div class="form-group">
        {{ Form::label('email', 'Email') }}
        {{ Form::email('email', $user->email, array('class' => 'form-control', 'readonly')) }}
    </div>


    <div class='form-group'>
        @foreach ($roles as $role)
            {{ Form::checkbox('roles[]',  $role->id, $user->roles ) }}
            {{ Form::label($role->name, ucfirst($role->name)) }}<br>

        @endforeach
    </div>

    

    <!-- <div class="form-group">
        {{ Form::label('password', 'Password') }}<br>
        {{ Form::password('password', array('class' => 'form-control')) }}

    </div>

    <div class="form-group">
        {{ Form::label('password', 'Confirm Password') }}<br>
        {{ Form::password('password_confirmation', array('class' => 'form-control')) }}


    </div> -->
    


</div>
<div class="box-footer"> 
  {{ Form::submit('Edit User', array('class' => 'btn btn-primary')) }}
</div>


    {{ Form::close() }}
</div>
</div>
</div>

@endsection
