@extends('layouts.main_layout')

@section('content')

<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Invoice</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Invoice</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- Main content -->
                <div class="invoice p-3 mb-3">
                    <!-- title row -->
                    <div class="row">
                        <div class="col-12">
                            <h4>
                                <img src="{{asset('img/company.jpeg')}}" width="180px" height="80px">
                                <small class="float-right">Date: <?php echo date('m-d-y'); ?></small>
                            </h4>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- info row -->
                    <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">
                            From
                            <address>
                                <strong>Huat-Hok Rice Trading, Inc.</strong><br>
                                Address: 1082 Del Monte Avenue, Quezon City <br>
                                Phone #: (02) 750-37473 <br>
                                Cellphone #:  09228808104 / 0178958156 
                            </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                            To
                            <address>
                                <strong>{{$clients->name_long}}</strong><br>
                                Address: {{$clients->address}}<br>
                                Contact #: {{$clients->contact_no}}
                            </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                            <b>Invoice #007612</b><br>
                            <!-- <br>
                            <b>Order ID:</b> 4F3S8J<br>
                            <b>Payment Due:</b> 2/22/2014<br>
                            <b>Account:</b> 968-34567 -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <!-- Table row -->
                    <div class="row">
                        <div class="col-12 table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Qty</th>
                                        <th>Product</th>
                                        <th>Serial #</th>
                                        <th>Description</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Call of Duty</td>
                                        <td>455-981-221</td>
                                        <td>El snort testosterone trophy driving gloves handsome</td>
                                        <td>$64.50</td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Need for Speed IV</td>
                                        <td>247-925-726</td>
                                        <td>Wes Anderson umami biodiesel</td>
                                        <td>$50.00</td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Monsters DVD</td>
                                        <td>735-845-642</td>
                                        <td>Terry Richardson helvetica tousled street art master</td>
                                        <td>$10.70</td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Grown Ups Blue Ray</td>
                                        <td>422-568-642</td>
                                        <td>Tousled lomo letterpress</td>
                                        <td>$25.99</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <div class="row">
                        <!-- accepted payments column -->
                        <div class="col-6">
                            <!-- <p class="lead">Payment Methods:</p>
                            <img src="../../dist/img/credit/visa.png" alt="Visa">
                            <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
                            <img src="../../dist/img/credit/american-express.png" alt="American Express">
                            <img src="../../dist/img/credit/paypal2.png" alt="Paypal">

                            <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                                Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya
                                handango imeem
                                plugg
                                dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                            </p> -->
                        </div>
                        <!-- /.col -->
                        <div class="col-6">
                            <!-- <p class="lead">Amount Due 2/22/2014</p> -->

                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <th style="width:50%">Subtotal:</th>
                                        <td>$250.30</td>
                                    </tr>
                                    <tr>
                                        <th>Tax (9.3%)</th>
                                        <td>$10.34</td>
                                    </tr>
                                    <tr>
                                        <th>Shipping:</th>
                                        <td>$5.80</td>
                                    </tr>
                                    <tr>
                                        <th>Total:</th>
                                        <td>$265.24</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <!-- this row will not appear when printing -->
                    <div class="row no-print">
                        <div class="col-12">
                            <a href="invoice-print.html" target="_blank" class="btn btn-default"><i
                                    class="fas fa-print"></i> Print</a>
                            <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i>
                                Submit
                                Payment
                            </button>
                            <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                                <i class="fas fa-download"></i> Generate PDF
                            </button>
                        </div>
                    </div>
                </div>
                <!-- /.invoice -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

@endsection
