





    <!-- info row -->
  <!DOCTYPE html>
<html>
  <head>
    <style>
    table, th, td { border: 1px solid black;}
    table { border-collapse: collapse;}
    body {padding: 80px 10px 20px 10px; }
       .information {
            background: -webkit-linear-gradient(left,#005b82 15%,#0082bb 100%);
            color: #FFF;
        }
</style>
<style type="text/css">
                body {
                overflow-x: hidden;
                font-family: 'Roboto Slab', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';
            }
            .signature{
                font-family: 'Kaushan Script', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';
                color: #0099D5;
            }

            .table thead th {
                vertical-align: bottom;
                border-bottom: 0px solid transparent;
                background: #0099D5;
                color: #fff;
            }
            .font-weight-lighter{
                font-weight: 300;
                background: #0099D5;
                color: #fff;
            }
            .inv{
                background: #E6E4E7;
            }
            .my-3 {
                margin-bottom: 1rem !important;
                margin-top: 1rem !important;
            }
            .my-5 {
                margin-bottom: 3rem !important;
                margin-top: 3rem !important;
            }
            .py-5 {
                padding-bottom: 3rem !important;
                padding-top: 3rem !important;
            }
            .px-3 {
                padding-left: 1rem !important;
                padding-right: 1rem !important;
            }
            .border-bottom{
                border-bottom: 2px solid #000 !important;
                /*width: 35%;*/
                padding: 0px 0px 5px 0px;
            }
</style>
    <meta charset="utf-8">
      <title>Authorization Letter {{\Carbon\Carbon::now()->format('d m, Y')}}</title>
  </head>
       <div class="information">
                        <img src="images/logo.png" alt="Logo" width="160" class="logo"/>
                 
        </div>
        
        <address>
            <h5><u>Authorization Letter {{$data->ref_token}}</u></h5>
        <p> Date: <?php
             print date("d/m/y");
             // print date("j of F Y, \a\\t g.i a");
          ?></p>
          <p>From :<b>Ecobank South Sudan</b></p>
          <p>To :  <b>{{$data->agname}}</b></p>
      </address>
                <!-- pre>
               
                Identifier: #uniquehash
                Status: Paid
                </pre> -->
                </div>
 

    <h3><u>SUBJECT: CASH DELIVERY REQUEST FOR THE {{$data->cname}}</u></h3></br>
    <p>You are kindly requested to deliver cash in the total amount of  <b>{{$data->ccy}} {{$data->amount}} ({{$words}})</b>to the following beneficiary on Monday 21 October 2019:</p></br>
    <h6><u>Beneficiary Details</u></h6>
    <p>
        <table class="x-small" align="center">
            <tr><th>Beneficiary Name</th><td>{{$data->ben_name}}</td></tr>
            <tr><th>Passport / ID</th><td>{{$data->ben_id}}</td></tr>
            <tr><th>Phone No</th><td>{{$data->ben_phone}}</td></tr>
            <tr><th>Location</th><td>{{$data->loc_delivery}}</td></tr>
       </table>
    </p>
   <!--  <table class="table table-stripped">
      <tr style="background:#5cffff;">
        <th>Original Owner Name</th>
        <th>Address</th>
        <th>Asset ID</th>
        <th>Currency</th>
        <th>Amount Due</th>
        <th>Date Submitted</th>
      </tr>
      <tr>
        <td>
         xxxx
        </td>
        <td>
       xxxx
        </td>
        <td>
         xxxx
        </td>
        <td>
       xxxx
        </td>
        <td>
       xxxx
        </td>
        <td>
       xxxx
        </td>
      </tr>
    </table></br></br> -->


    <p>As per Agreement between XXX and Ecobank, we shall reimburse XXX Company Limited with the full amount delivered plus commission.</p>
<p>Your prompt action is highly appreciated.</p>
<br>
  <b>Yours faithfully</b>
  <p>Ecobank South Sudan</p>
        

      <table style="width:100%; border: 0px; padding-top: 30px;">
        <tr style="border: 0px;">
          <td style="border: 0px; padding: 15px;">________________________________________</td>
          <td style="border: 0px; padding: 15px;">________________________________________</td>
        </tr>
      
        <tr style="border: 0px;">
          <th style="border: 0px; padding: 15px;"><u>AUTHORISED SIGNATORY</u></th>
          <th style="border: 0px; padding: 15px;"><u>AUTHORISED SIGNATORY</u></th>
        </tr>
      </table>
  </body>
</html>

