@extends('layouts.log')
@section('content')
<body class="hold-transition login-page">
<div class="login-box">

  <div class="login-box-body">
     <div class="login-logo">
    <div class=""><img src="{{url('/images/logo.png')}}" style="width: 50%"></div>

  </div
  >
    
    @if (session('status'))
   {{--  <div class="alert alert-primary"> --}}
      <div class="callout callout-success">
        <h4>Alert!</h4>

        <p> {{ session('status') }}</p>
      </div>
@elseif(session('error'))
 <div class="callout callout-warning">
        <h4>Warning!</h4>

        <p> {{ session('error') }}</p>
      </div>
@elseif(session('danger'))
       <div class="callout callout-danger">
              <h4>Warning!</h4>

              <p> {{ session('danger') }}</p>
            </div>

@endif

    <form method="POST" action="{{ route('login') }}">
                        @csrf
     <div class="form-group has-feedback{{ __('E-Mail Address') }}">
        <input type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus placeholder="Windows Username">


           @if ($errors->has('email'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('email') }}</strong>
        </span>
           @endif

      </div>


      <div class="form-group has-feedback">
      <input type="password" name="password" required placeholder="Windows password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" >

 @if ($errors->has('password'))
     <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('password') }}</strong>
     </span>
@endif
       <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
       
      <div class="form-group has-feedback">
      

       
        <!-- /.col -->
       <!--  <div class="col-xs-12" align="center"> -->
          <button type="submit" class="btn btn-primary btn-block btn-flat form-control">Click To Login</button>
        <!-- </div> -->
        <!-- /.col -->
      </div>
    </form>


    <!-- /.social-auth-links -->

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->



</body>
@endsection
