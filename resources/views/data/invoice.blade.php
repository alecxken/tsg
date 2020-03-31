





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
    <meta charset="utf-8">
      <title>Invoice  {{\Carbon\Carbon::now()->format('d m, Y')}}</title>
  </head>
  <body><div class="information" >
          
                        <img src="images/logo.png" alt="Logo" width="144" class="logo"/>
                 
        </div><br>
        
        <address>
            {{-- <h5><u>Authorization Letter {{$data->ref_token}}</u></h5> --}}
        <p> Date: <?php
             print date("d/m/y");
             // print date("j of F Y, \a\\t g.i a");
          ?></p>

       
          <p>Invoice No :<b>{{$data->invoice_no}}</b></p>
          <p>Your Ref :  <b>{{$data->ref_token}}</b></p>
          <br>
          <p><b>Attn</b> {{$data->client_name}}</p>
      </address>
                <!-- pre>
               
                Identifier: #uniquehash
                Status: Paid
                </pre> -->
                </div>
 

    <h3>Subject:<u> Reimbursement for cash delivery to  {{$data->ben_name}}</u></h3></br>
    <p>We write in reference to the cash delivery service that we made to the {{$data->ben_name}} office whose details are as below:</p></br>
  
    <p>
        <table class="x-small" align="center">
            <tr><th>Service Description</th><th>Amount (USD)</th><th>Service Fee (USD)</th> <th>Reimbursement Amount</th></tr>
            <tr><td>Cash Delivery</td><td>{{$data->amount}}</td><td>{{$data->commission}}</td> <td>{{$data->disbursed}}</td></tr>
         
       </table>
    </p>
 
    <p>In line with the cash delivery services agreement between XXX South Sudan and Ecobank, please make arrangements to settle {{$data->amount}}({{$words}}) with us, as reimbursement for the delivered amount.</p>
<p>Our account details are attached to this invoice..</p>
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

