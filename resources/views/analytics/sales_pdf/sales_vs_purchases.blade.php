<head>
  <title>Monthly Sales Income Report</title>
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
          <td colspan="9" style="border:none;">
            <table style="width: 100%;border-collapse: collapse; text-align: center;">
              @include('partials.pdf.header')
            </table>
          </td>
        </tr>

        <tr>
          <th colspan="9"
            style="text-align:center; background: white; border:none; text-transform:uppercase;font-size: 20px">
            Sales VS. Purchases
          </th>
        </tr>

        <tr>
          <th colspan="9" style="text-align:center;background: white; border:none;"> &nbsp; </th>
        </tr>
        <tr>
          <th>Sale Date</th>
          <th>Delivery #</th>
          <th>Client</th>
          <th>Item</th>
          <th>Selling Cost</th>
          <th>Sold Quantity</th>
          <th>Purchase Cost</th>
          <th>Interest Rate</th>
          <th>Net Income</th>
        </tr>
      </thead>
      <tbody>
        @foreach($result_print as $sales_purchase)
        <tr>
          <td>
            {{$sales_purchase->sale_date ? date('m/d/Y', strtotime($sales_purchase->sale_date)) : '' }}
          </td>
          <td>{{$sales_purchase->delivery_no}}</td>
          <td>{{$sales_purchase->client_name}}</td>
          <td>{{$sales_purchase->item_name}}</td>
          <td>{{$sales_purchase->selling_cost}}</td>
          <td>{{$sales_purchase->sold_qty}}</td>
          <td>{{$sales_purchase->purchase_cost}}</td>
          <td>{{$sales_purchase->interest_rate}}</td>
          <td>{{$sales_purchase->net_income}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>



</body>