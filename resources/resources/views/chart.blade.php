 @extends('layouts.template')

@section('content')
<div class="container"><div class="box box-success">
         <div class="box-header with-border">
          <h3 class="box-title"><b>Report Distribution</b>  </h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body" id="video" style="display: block;" >
                     {!! Charts::styles() !!}
                    <div class="app"> 
                      <center>{!! $chart->html() !!} </center>
                    </div>
            </div>

        {!! Charts::scripts() !!}
        {!! $chart->script() !!}
      </div>
    </div>
      @endsection