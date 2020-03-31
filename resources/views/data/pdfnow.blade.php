{{-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> --}}
  <link rel="stylesheet" href="{{asset('assets/bootstrap/dist/css/bootstrap.min.css')}}">
<script src="{{asset('assets/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('assets/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!------ Include the above in your HEAD tag ---------->

{{-- <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
<link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'> --}}

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
                border-bottom: 2px solid transparent;
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
<body>
        <div class="container inv my-5 py-5">
            <div class="row">
                <div class="col-lg-6"></div>
                <div class="col-lg-6">
                    <h1 class="font-weight-lighter py-1 px-3">INVOICE</h1>
                </div>
            </div>
            <div class="row my-3">
                <div class="col-lg-6">
                    <p class="mb-0">INVOICE TO</p>
                    <h5 class="mb-0"><b>Mr. Simon Edwards</b></h5>
                    <p class="mb-0">Lorem Ipsum is simply dummy text of the.. </p>
                    <p class="mb-0">07570-222804</p>
                    <p class="mb-0">nmalviya@gmail.com</p>
                </div>
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-12">
                            <table>
                                <tbody>
                                    <tr>
                                        <td>Invoice No</td>
                                        <td class="px-3">:</td>
                                        <td>123456</td>
                                    </tr>
                                    <tr>
                                        <td>Date</td>
                                        <td class="px-3">:</td>
                                        <td>12-12-2019</td>
                                    </tr>
                                    <tr>
                                        <td>Order Date</td>
                                        <td class="px-3">:</td>
                                        <td>12-12-2019</td>
                                    </tr>
                                    <tr>
                                        <td>Account No</td>
                                        <td class="px-3">:</td>
                                        <td>00000123</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">NO</th>
                                <th scope="col">ITEM DESCREPTION</th>
                                <th scope="col">QTY</th>
                                <th scope="col">PRICE</th>
                                <th scope="col">TOTAL</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>
                                    <b>Brochure Design</b>
                                    <p>
                                        Design a stunning brochure in minutes with Canva.
                                    </p>
                                </td>
                                <td>1</td>
                                <td>540</td>
                                <td>540</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>
                                    <b>Stationery Design</b>
                                    <p>
                                        The entire goal is to have beautiful branding throughout the company.
                                    </p>
                                </td>
                                <td>2</td>
                                <td>400</td>
                                <td>800</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>
                                    <b>Logo Design</b>
                                    <p>
                                        Visiting Cards, Photo Mugs, Printed T-Shirts, Photo Books, Notebook, Letterhead.
                                    </p>
                                </td>
                                <td>4</td>
                                <td>500</td>
                                <td>20000</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>
                                    <b>Business Card Design</b>
                                    <p>
                                        Browse our selection of business cards design templates. 
                                    </p>
                                </td>
                                <td>10</td>
                                <td>300</td>
                                <td>3000</td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                                <td><b>SUB Total</b></td>
                                <td><b>15200</b></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                                <td><b>TAX VAT 3%</b></td>
                                <td><b>16200</b></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                                <td><b>DISCOUNT 3%</b></td>
                                <td><b>16000</b></td>
                            </tr>
                            <tr style="background: #E6E4E7; color: #0099D5;">
                                <td colspan="3"></td>
                                <td><b>GRAND TOTAL</b></td>
                                <td><b>28000</b></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3">
                    <h5 class="ml-5 border-bottom">Payment Method</h5>
                    <h6 class="text-center">Paypal</h6>
                    <p></p>
                </div>
                <div class="col-lg-6"></div>
            </div>
            <div class="row mt-5">
                <div class="col-lg-6">
                    <h5 class="ml-5">Terms and Conditions</h5>
                    <p class="ml-5">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
                        when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                    </p>
                </div>
                <div class="col-lg-3"></div>
                <div class="col-lg-3 text-center">
                    <h3 class="signature">Nitesh Malviya</h3>
                    <p>Account Manager</p>
                </div>
            </div>
        </div>
</body>