
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{$data->in}}</title>
    
    <style>
    .invoice-box {
        max-width: 800px;
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

<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="images/logo.png" alt="Logo" width="144" class="logo"/>
                            </td>
                            
                            <td>
                                <b> {{$data->invoice_no}}</b><br>
                                 <?php
             //print date("d/m/y");
             print date("m of F Y,");
          ?><br>
                          {{--   Due: February 1, 2015 --}}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                <address>
                               <b>Ecobank South Sudan</b><br>
                                    Koita Complex - Ministries Road<br>
                                    P.O. Box 150, Juba, Jubek 0 SS<br>                                    
                                    ESS-CIT@ecobank.com<br>
                                    www.ecobank.com</address>
                            </td>
                            
                            <td>
                                {{$deta->cname}}.<br>
                                 {{$deta->phy_addresss}}<br>
                                {{$deta->email}}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="heading">
                <td>
                    Service  Method
                </td>
                
                <td>
                    Check 
                </td>
            </tr>
            
            <tr class="details">
                <td>
                    In line with the cash delivery services agreement between {{$data->agname}} South Sudan and Ecobank, please make arrangements to settle <b>{{$data->amount}}({{$words}})</b> with us, as reimbursement for the delivered amount.
                </td>
                
                <td>
                    Done
                </td>
            </tr>
            
            <tr class="heading">
                <td>
                    Amount Breakdown
                </td>
                
                <td>
                    Amount
                </td>
            </tr>
            
            <tr class="item">
                <td>
                   Service Description
                </td>
                
                <td>
                    {{$data->ccy}} {{$data->amount}}
                </td>
            </tr>
            
            <tr class="item last">
                <td>
                   Amount (USD)
                </td>
                
                <td>
                    {{$data->ccy}} {{$data->commission}}
                </td>
            </tr>
            
            <tr class="item last">
                <td>
                    Reimbursement Amount
                </td>
                
                <td>
                    {{$data->disbursed}}
                </td>
            </tr>
            
            <tr class="total">
                <td></td>
                
                <td>
                   Total: {{$data->disbursed}}
                </td>
            </tr>


             <tr class="heading">
                <td>
                    Authorizations
                </td>
                
                <td>
                    By
                </td>
            </tr>
            
        
           
            <tr class="item last">
                <td>
                   Created By 
                </td>
                
                <td>
                   <i>{{$inputer->name}}</i> 
                   
                  
                </td>
            </tr>

                <tr class="item last">
                <td>
                   Authorized By 
                </td>
                
                <td>
                  <i>{{$authorizer->name}}</i> 
                </td>
            </tr>
            
            <tr class="total">
                <td></td>
                
                <td>
                  Ecobank South Sudan
                </td>
            </tr>
        </table>
    </div>
</body>
</html>
