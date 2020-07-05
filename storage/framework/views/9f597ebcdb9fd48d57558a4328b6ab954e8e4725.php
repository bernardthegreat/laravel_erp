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


    <table width="100%" style="border-collapses: collapse">
        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
        </tr>
    </table>

    <table style="width:100%;border-collapse: collapse;text-align:center;"
        border="<?php echo $border; ?>">

        <tr>
            <td colspan="3"></td>
        </tr>
        <tr>
            <td width="69%"> &nbsp; </td>
            <th width="15%">Total:</th>
            
        </tr>

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