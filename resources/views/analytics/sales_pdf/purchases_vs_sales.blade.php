<head>
  <title>Purchases Vs. Sales Report</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<style>
#body tr:nth-child(even) {
  background-color: #c1c7d0;
}

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

@page {
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
</style>

<body style="font-family: sans-serif">


  <div>
    <table style="width: 100%;border-collapse: collapse; text-align: center;">
      <thead>

      </thead>
    </table>
    <table id="body" style="width: 100%;border-collapse: collapse; text-align: center;">
      <thead>
        <tr>
          <td colspan="6" style="border:none;">
            <table style="width: 100%;border-collapse: collapse; text-align: center;">
              @include('partials.pdf.header')
            </table>
          </td>
        </tr>

        <tr>
          <th colspan="6"
            style="text-align:center; background: white; border:none; text-transform:uppercase;font-size: 20px">
            Purchase Vs. Sales Report
          </th>
        </tr>

        <tr>
          <th colspan="6" style="text-align:center;background: white; border:none;"> &nbsp; </th>
        </tr>
        <tr>
          <th>Purchase Date</th>
          <th>Delivery #</th>
          <th>Item</th>
          <th>Purchase Quantity</th>
          <th>Sold Quantity</th>
          <th>Unsold Quantity</th>
        </tr>
      </thead>
      <tbody>
        @php 
          $total_purchase_qty = 0;
          $total_sold_qty = 0;
          $total_unsold_qty = 0;
        @endphp
        @foreach($result_print as $purchase_sales)
        <tr>
          <td>
            {{$purchase_sales->purchase_date ? date('m/d/Y', strtotime($purchase_sales->purchase_date)) : '' }}
          </td>
          <td>{{$purchase_sales->dr_no}}</td>
          <td>{{$purchase_sales->item_name}}</td>
          <td>{{$purchase_sales->purchase_qty}}</td>
          <td>{{$purchase_sales->sold_qty}}</td>
          <td>{{$purchase_sales->unsold_qty}}</td>
        </tr>
        @php 
          $total_purchase_qty += $purchase_sales->purchase_qty;
          $total_sold_qty += $purchase_sales->sold_qty;
          $total_unsold_qty += $purchase_sales->unsold_qty;
        @endphp
        @endforeach
        <tr>
          <td colspan="3"></td>
          <td><b>Total Quantity:</b> {{$total_purchase_qty}}</td>
          <td><b>Total Quantity:</b> {{$total_sold_qty}}</td>
          <td><b>Total Quantity:</b> {{$total_unsold_qty}}</td>
        </tr>
      </tbody>
    </table>
  </div>



</body>