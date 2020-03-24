@extends('layouts.template')
@section('content')
<div class="row">
  <div class="col-md-12">
   <table class="table table-bordered table-hover order-list  small" id="">
        <thead class="bg-info">
          <tr >
            <th class="text-center">
              #
            </th>
            <th class="text-center">
              System Name
            </th>
            <th class="text-center">
              Status
            </th>
            <th class="text-center">
              Comments
            </th>
             <th class="text-center">
              Sysaid
            </th>
          </tr>
        </thead>
        <tbody>
          <tr id='t0'>
            <td>
            1
            </td>
            <td>
           <select class="form-control" required name="system[]">
            <option value="">Choose System</option>
                @if(!empty($data))
                    @foreach($data as $d)
                      @if($d->status == 'active')
                      <option value="{{$d->id}}">{{$d->name}}</option>
                      @endif
                    @endforeach
                @endif
           </select>
            </td>
            <td>
              <select class="form-control" name="status[]">
                  <option class="labe label-success" value="up"> System Up</option>
                  <option class="labe label-warning" value="Down < 1hr">Down  by less than a Hour</option>
                  <option class="labe label-danger" value="Down > 1hr">Down  for more than a Hour</option>
              </select>
            </td>
             <td>
             {!!Form::text('comment[]',Null,['class' => 'form-control','placeholder'=>'Comments'])!!}
            </td>
            <td>
              {!!Form::text('ticket[]',Null,['class' => 'form-control','placeholder'=>'sysaid ticket'])!!}
            </td>
                     
          </tr>

      
        </tbody>
          <tfoot>
        <tr>
            <td colspan="5" style="text-align: left;">
                <input type="button" class="btn btn-sm btn-block " id="addrow" value="Add More Items" />
            </td>
        </tr>
        <tr>
        </tr>
    </tfoot>
      </table>



<script type="text/javascript">
    $(document).ready(function () {
    var counter = 2;

    $("#addrow").on("click", function () {
        var newRow = $("<tr id='t"+ counter +"'>");
        var cols = "";

cols += '<td>'+ counter +'</td>';
cols += '<td><select class="form-control" required name="system[]"><option value="">Choose System</option>@foreach($data as $d)<option value="{{$d->id}}">{{$d->name}}</option>@endforeach</select></td>';
        cols += '<td><select class="form-control" name="status[]"><option class="labe label-success" value="up"> System Up</option><option class="label label-warning" value="Down < 1hr">Down  by less than a Hour</option><option class="labe label-danger" value="Down > 1hr">Down  for more than a Hour</option></select></td>';
        cols += '<td><input type="text" class="form-control"  placeholder="Comments" name="comment[]"/></td>';
        cols += '<td><input type="text" class="form-control"  placeholder="Sysaid" name="ticket[]"/></td>';
         cols += '<td><input type="button" class="ibtnDel btn btn-md btn-danger "  value="Delete"></td>';
        newRow.append(cols);
        $("table.order-list").append(newRow);
        counter++;
    });
      $("table.order-list").on("click", ".ibtnDel", function (event) {
        $(this).closest("tr").remove();       
        counter -= 1
    });

});
</script>

@endsection