@extends('layouts.template')

@section('title', '| Create Permission')

@section('content')

<div class='col-lg-4 col-lg-offset-4'>
      <div class="box-header with-border">
                <h6 class="box-title ">     <h1><i class='fa fa-key'></i> Add Permission</h1></h6>
            </div> 
    <div class="box-body"> 
    
    <br>


    {{ Form::open(['method'=> 'post','url' => 'permissions_store']) }}

    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', '', array('class' => 'form-control')) }}
    </div><br>
    @if(!$roles->isEmpty())
        <h4>Assign Permission to Roles</h4>

        @foreach ($roles as $role)
            {{ Form::checkbox('roles[]',  $role->id ) }}
            {{ Form::label($role->name, ucfirst($role->name)) }}<br>

        @endforeach
    @endif
    <br>
    {{ Form::submit('Add', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}

</div>
</div>

@endsection
