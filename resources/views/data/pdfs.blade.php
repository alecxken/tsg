
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{$data->ref_token}} Agent File</title>
    
    <style>
    .invoice-box {
        max-width: 900px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        font-size: 16px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
    }
    
    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
    }
    
    .invoice-box table td {
        padding: 5px;
        vertical-align: top;
    }
    
    .invoice-box table tr td:nth-child(2) {
        text-align: right;
    }
    
    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }
    
    .invoice-box table tr.information table td {
        padding-bottom: 40px;
    }
    
    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }
    
    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.item td{
        border-bottom: 1px solid #eee;
    }
    
    .invoice-box table tr.item.last td {
        border-bottom: none;
    }
    
    .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
        font-weight: bold;
    }
    
    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }
        
        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }
    
    /** RTL **/
    .rtl {
        direction: rtl;
        font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }
    
    .rtl table {
        text-align: right;
    }
    
    .rtl table tr td:nth-child(2) {
        text-align: left;
    }
    </style>
</head>

<body  style="font-family: \'Tahoma\'; line-height: 95%; text-align: justify;font-size:10pt;">
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="5">
                    <table>
                        <tr>
                            <td class="">
                               <address>
                                <b>Ecobank South Sudan</b><br>
                                    Koita Complex - Ministries Road<br>
                                    P.O. Box 150, Juba, Jubek 0 SS<br>                                    
                                    ESS-CIT@ecobank.com<br>
                                    www.ecobank.com
                                    </address>
                              <!--   <img src="/images/logo.png" style="width:30%; max-width:300px;"> -->
                            </td>
                            
                            <td>
                                 <img src="images/logo.png" alt="Logo" width="140" class="logo"/>
                                 <br>
                                 Date:{{\Carbon\Carbon::today()->format('d,F Y')}}
                               
                             <!--    Due: February 1, 2015 -->
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="information">
                <td colspan="2">
                       <b> Ref : {{$data->ref_token}}<br>
                                    To :{{$data->agname}}
                   
                </td>
                             
            </tr>
         

      
          <!--    <tr class="heading">
                <td colspan="4">
                   <h3>SUBJECT: <b> CASH DELIVERY REQUEST FOR TO {{$data->loc_delivery}}</b></h3>
                </td>
                
                <td colspan="2">
                    Check 
                </td>
            </tr> -->
            
        
       
               <tr class="details">
                <td colspan="6">
                <h3>SUBJECT: <b> CASH DELIVERY REQUEST  TO  {{strtoupper($data->loc_delivery)}} </b></h3>
                 <p>You are kindly requested to deliver cash in the total amount of  <b>{{$data->ccy}} {{$data->amount}} ({{$words}})</b>to the following beneficiary on {{$data->delivery_date}}</p>
                 <p>
                     <b>{{$data->desc}}</b>
                 </p>

                 <p>As per Agreement between {{$data->cname}} and Ecobank, we shall reimburse {{$data->agname}} Company Limited with the full amount delivered plus commission.</p>
                    <p>Find Delivery Details below Your prompt action is highly appreciated.</p>
                </td>
                
               
            </tr>
            
            <tr class="heading">
                <td>
                    Service
                </td>
                
                <td>
                    Details
                </td>
            </tr>
        
            <tr class="item">
                <td>
                    Beneficiary Name 
                </td>
                
                <td>
                    {{$data->ben_name}}
                </td>
            </tr>
            
            <tr class="item ">
                <td>
                    Passport / ID
                </td>
                
                <td>
                   {{$data->ben_id}}
                </td>
            </tr>
            
            <tr class="item ">
                <td>
                    Phone No
                </td>
                
                <td>
                    {{$data->ben_phone}}
                </td>
            </tr>
             <tr class="item last">
                <td>
                    Location
                </td>
                
                <td>
                    {{$data->loc_delivery}}
                </td>
            </tr>
            
            <tr class="total">
                <td></td>
                
                <td>
                   {{-- Total: {{$data->disbursed}} --}}
                </td>
            </tr>

                <br>
             <tr class="heading">
                <td colspan="4">
                    Authorizations
                </td>
                
                <td colspan="2">
                    By
                </td>
            </tr>
            
        
           
            <tr class="item last">
                <td   colspan="2">
                   Captured By 
                </td>
                
                <td  colspan="4">
                   <i>{{$data->reviewer}}</i> 
                   
                  
                </td>
            </tr>

                <tr class="item last">
                <td  colspan="2">
                   Authorized By 
                </td>
                
                <td  colspan="4">
                  <i>{{$data->checker}}</i> 
                </td>
            </tr>
            
            <tr class="total">
                <td></td>
                
                <td>
                  Ecobank South Sudan
                </td>
            </tr>

            <tr>
             
    </div>
</body>
</html>
