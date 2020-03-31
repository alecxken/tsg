@extends('layouts.template')

@section('title', '| Add User')

@section('content')
 <div class="row justify-content-center">
       <div class="col-md-2"></div>
        <div class="col-md-8">
<div class='box box-default'>

     <div class="box-header with-border">
                <h6 class="box-title ">     Create User</h6>
            </div> 
    <div class="box-body"> 

    {{ Form::open(array('url' => 'user_store')) }}

       
    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', '', array('class' => 'form-control')) }}
    </div>

    <!-- <div class="form-group">
        {{ Form::label('name', 'Phone Number') }}
        {{ Form::number('contact', '', array('class' => 'form-control')) }}
    </div> -->
  <!--   @php  $reg = App\Region::all()->where('status','active'); @endphp
    <div class="form-group">
        {{ Form::label('name', 'Affiliate') }}
       <select class="form-control" name="affiliate" required="">
        <option value="">Choose Affiliate</option>
        @foreach($reg as $r)
         <option value="{{$r->code}}">{{$r->country}}</option>
        @endforeach
       </select> -->
<!--     </div>
 -->
    <div class="form-group">
        {{ Form::label('email', 'Email') }}
        {{ Form::email('email', '', array('class' => 'form-control')) }}
    </div>

   <!--  <div class='form-group'>
         {{ Form::label('email', 'User Role') }}
         <div class="form-control">
                @foreach ($roles as $role)
            {{ Form::checkbox('roles[]',  $role->id ) }}
            {{ Form::label($role->name, ucfirst($role->name)) }}<br>

        @endforeach
         </div>
     
    </div> -->
<!-- 
    <div class="form-group">
        {{ Form::label('password', 'Password') }}<br>
        {{ Form::password('password', array('class' => 'form-control')) }}

    </div>

    <div class="form-group">
        {{ Form::label('password', 'Confirm Password') }}<br>
        {{ Form::password('password_confirmation', array('class' => 'form-control')) }}

    </div> -->




  </div>
  <div class="box-footer"> 

    {{ Form::submit('Add', array('class' => 'btn btn-primary')) }}
</div>
    {{ Form::close() }}

</div>
</div>
</div>

@endsection
