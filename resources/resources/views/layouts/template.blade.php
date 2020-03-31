
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name', 'ESS-APP') }}</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{asset('assets/bootstrap/dist/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('assets/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('assets/Ionicons/css/ionicons.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist/css/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{asset('dist/css/skins/_all-skins.min.css')}}">

  <!-- Morris chart -->
  <link rel="stylesheet" href="{{asset('assets/morris.js/morris.css')}}">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{asset('assets/jvectormap/jquery-jvectormap.css')}}">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{asset('assets/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="{{asset('assets/plugins/timepicker/bootstrap-timepicker.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('assets/bootstrap-daterangepicker/daterangepicker.css')}}">
  <!-- bootstrap wysihtml5 - text editor -->
  <!-- <link rel="stylesheet" href="{{asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}"> -->
  <!-- Select2 -->
  <link rel="stylesheet" href="{{asset('assets/select2/dist/css/select2.min.css')}}">

  <link rel="stylesheet" type="text/css"  href="{{asset('assets/autofill/detect-autofill.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/DataTables/datatables.min.css')}}"/>


<!-- jQuery 3 -->
<script src="{{asset('assets/jquery/dist/jquery.min.js')}}"></script>
<!-- <script type="module" src="{{asset('assets/autofill/detect-autofill.js')}}"></script> -->

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
<!-- <script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script> -->
  <!-- Google Font -->
<!--   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"> -->
  <!-- <script>(function(e,t,n){var r=e.querySelectorAll("html")[0];r.className=r.className.replace(/(^|\s)no-js(\s|$)/,"$1js$2")})(document,window,0);</script> -->
</head>
<body class="hold-transition skin-green sidebar-mini" >

<div class="wrapper">
 
  <header class="main-header">
      <!-- Logo -->
    <a href="{{url('/home')}}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>E</b>SS</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>ESS</b>-digital</span>
    </a>
  

 @include('layouts.nav')
   </header>
@include('layouts.side')



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
       <!-- Welcome {{Auth::user()->username}} -->
      </h1>
      <ol class="breadcrumb">
        <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>

      </ol>
    </section>

    <br>


 @if (session('status'))
        <div id="erros" class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4>Alert!</h4>

        <p> {{ session('status') }}</p>
      </div>
@elseif(session('error'))
<div id="erros" class="alert alert-warning alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4>Warning!</h4>

        <p> {{ session('error') }}</p>
      </div>
@elseif(session('danger'))
<div id="erros" class="alert alert-danger alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <h4>Warning!</h4>

              <p> {{ session('danger') }}</p>
            </div>
@elseif(session('primary'))
<div id="erros" class="alert alert-primary alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <h4>Warning!</h4>

              <p> {{ session('primary') }}</p>
            </div>

@endif
@if ($errors->any())
    <div id="erros" class="alert alert-danger alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <h4>Input Fields Error!!</h4>
             @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </div>
@endif


    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
@yield('content')
    </section>
    <!-- /.content -->
  </div>


  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b>1.0.0
    </div>
    <strong>Copyright &copy; {{date('Y')}} All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
{{--  @include('layouts.rightside') --}}
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>




<!-- Bootstrap 3.3.7 -->
<script src="{{asset('assets/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- DataTables -->
<script type="text/javascript" src="{{asset('assets/DataTables/datatables.min.js')}}"></script>
<!-- Morris.js charts -->
<script src="{{asset('assets/raphael/raphael.min.js')}}"></script>
<script src="{{asset('assets/morris.js/morris.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('assets/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script>
<!-- jvectormap -->
<script src="{{asset('assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{asset('assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('assets/jquery-knob/dist/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('assets/moment/min/moment.min.js')}}"></script>
<script src="{{asset('assets/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<!-- datepicker -->
<script src="{{asset('assets/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<!-- bootstrap time picker -->
<script src="{{asset('assets/plugins/timepicker/bootstrap-timepicker.min.js')}}"></script>
<!-- Select2 -->
<script src="{{asset('assets/select2/dist/js/select2.min.js')}}"></script>
<!-- Bootstrap WYSIHTML5 -->
<!-- <script src="{{asset('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script> -->
<!-- Slimscroll -->
<script src="{{asset('assets/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('assets/fastclick/lib/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>

<!-- <script>

  $(function () {
      $('#example1').DataTable();


    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    });

  })
</script> -->


<script>
$(document).ready(function () {

    $('.navbar .dropdown-item').on('click', function (e) {
        var $el = $(this).children('.dropdown-toggle');
        var $parent = $el.offsetParent(".dropdown-menu");
        $(this).parent("li").toggleClass('open');

        if (!$parent.parent().hasClass('navbar-nav')) {
            if ($parent.hasClass('show')) {
                $parent.removeClass('show');
                $el.next().removeClass('show');
                $el.next().css({"top": -999, "left": -999});
            } else {
                $parent.parent().find('.show').removeClass('show');
                $parent.addClass('show');
                $el.next().addClass('show');
                $el.next().css({"top": $el[0].offsetTop, "left": $parent.outerWidth() - 4});
            }
            e.preventDefault();
            e.stopPropagation();
        }
    });

    $('.navbar .dropdown').on('hidden.bs.dropdown', function () {
        $(this).find('li.dropdown').removeClass('show open');
        $(this).find('ul.dropdown-menu').removeClass('show open');
    });

});
setTimeout(function() {
    $('#erros').fadeOut('fast');
}, 9000);
</script>
@yield('script')

</body>
</html>
