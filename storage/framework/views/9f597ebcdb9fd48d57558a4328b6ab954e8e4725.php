<head>
    <title>Payslip</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<style>
    

    #body tr td {
        border: 1px solid black;
    }

    #body tr th {
        border: 1px solid black;
    }

    #body th {
        background-color: #c1c7d0;
    }

    .text-center {
        text-align: center;
    }

    @page  {
        margin-top: 2%;
        margin-bottom: 5%;
        margin-left: 10%;
        margin-right: 10%;
    }

    #footer {
        bottom: 0;
        border-top: 0.1pt solid #aaa;
    }

    .page-number:before {
        content: "Page "counter(page);
    }

    .table-breakdown tr th {
        border-top: 0.5px solid black;
        border-bottom: 0.5px solid black;
    }

    .table-breakdown tr td {
        padding: 10px;
    }

    .table-breakdown tr:nth-child(even) {
        background-color: #c1c7d0;
        
    }

    .taleft {
        text-align: left;
    }

    .taright {
        text-align: right;
    }

    .bbot {
        border-bottom: 1px solid black;
    }

</style>

<?php 
    $border = 0;
?>

<body style="font-family: sans-serif">

    <table id="body" style="width: 100%;border-collapse: collapse; text-align: center;">
            <thead>
                <?php echo $__env->make('partials.pdf.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </thead>
    </table>


    <table width="100%" style="border-collapses: collapse" border="<?php echo $border; ?>">
        <tr>
            <td class="text-center"><h2>Payslip</h2></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
        </tr>
    </table>

    <table style="width:100%;border-collapse: collapse;text-align:center;"
        border="<?php echo $border; ?>">
        
        <tr>
            <td colspan="4"></td>
        </tr>
        <tr>
            <td width="15%" class="taleft"> Name: </td>
            <td class="bbot"> <?php echo e($payslip[0]->fullname); ?> </td>
            <td width="10%"> &nbsp; </td>
            <td width="15%"class="taright"> Address: </td> 
            <td class="bbot"> <?php echo e($payslip[0]->address); ?> </td>
        </tr>

        <tr>
            <td class="taleft"> Contact #: </td>
            <td class="bbot"> <?php echo e($payslip[0]->contact_no); ?> </td>
            <td> &nbsp; </td>
            <td class="taright"> Pay Date: </td> 
            <td class="bbot"> <?php echo e(date('m/d/Y', strtotime($payslip[0]->from_date))); ?> - <?php echo e(date('m/d/Y', strtotime($payslip[0]->to_date))); ?> </td>
        </tr>
    </table>

    <table width="100%" style="border-collapses: collapse" border="<?php echo $border; ?>">
        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
        </tr>
    </table>

    <table style="width:100%;border-collapse: collapse;text-align:center; border: 1px solid black;">
      <tr>
        <td colspan="2">&nbsp;</td>
      </tr>
      <tr>
          <td width="50%">EARNINGS</td>
          <td width="50%">DEDUCTIONS</td>
      </tr>
      <tr>
          <td>
            <table width="100%" style="border-collapse:collapse;">
              <tr>
                <td width="50%" style="text-align: center;">PAY</td>
                <td width="50%" style="text-align: center;"><?php echo e($payslip[0]->cost); ?></td>
              </tr>
            </table>
          </td>
          <td> <?php echo e($payslip[0]->deduction); ?> </td>
      </tr>
      <tr>
          <td>
            <?php if(isset($payslip[0]->addl_pay)): ?>
              <table width="100%" style="border-collapse:collapse;">
                <tr>
                  <td width="50%" style="text-align: center;">ADDITIONAL PAY</td>
                  <td width="50%" style="text-align: center;"><?php echo e($payslip[0]->addl_pay); ?></td>
                </tr>
              </table>
            <?php endif; ?>
          </td>
          <td></td>
      </tr>

      <tr>
        <td colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <td>
          <table width="100%" style="border-collapse:collapse;">
            <tr>
              <td width="50%" style="text-align: center;">  TOTAL EARNINGS:</td>
              <td width="50%" style="text-align: center;">
                <?php
                  $total_earnings = $payslip[0]->cost + $payslip[0]->addl_pay;
                  echo number_format($total_earnings, 2);
                ?>
              </td>
            </tr>
          </table>
        </td>
        <td>
          <?php echo e($payslip[0]->deduction); ?>

        </td>
      </tr>
      <tr>
        <td colspan="2">&nbsp;</td>
      </tr>
    </table>
    <table style="width:100%;border-collapse: collapse;text-align:center; border: 1px solid black;">
      <tr>
          <td width="50%"></td>
          <td width="50%"></td>
      </tr>
      <tr>
        <td style="font-weight:bold;"> NET PAY</td>
        <td style="font-weight:bold;">
          <?php
            $net_pay = $total_earnings - $payslip[0]->deduction;
            echo number_format($net_pay, 2);
          ?>
        </td>
      </tr>
    </table>
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

                </table>
            </div>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

    </div>
    </div>
    <!-- /.invoice -->

</body>
<?php /**PATH C:\xampp\htdocs\laravel\laravel_erp\resources\views/employees/payslip_print.blade.php ENDPATH**/ ?>