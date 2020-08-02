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
          <td colspan="12" style="border:none;"> 
            <table style="width: 100%;border-collapse: collapse; text-align: center;">
              @include('partials.pdf.header')
            </table>
          </td>
        </tr>
        <tr>
          <th colspan="12"
            style="text-align:center; background: white; border:none; text-transform:uppercase;font-size: 20px">
            Monthly Sales Income Report
          </th>
        </tr>

        <tr>
          <th colspan="12" style="text-align:center;background: white; border:none;"> &nbsp; </th>
        </tr>
        <tr>
          <th>DR #</th>
          <th>Client</th>
          <th>Item</th>
          <th>Cost</th>
          <th>Discount</th>
          <th>Additional Fee</th>
          <th>Quantity</th>
          <th>Total Cost</th>
          <th>Paid Date</th>
          <th>Sold Date</th>
          <th>Sold By</th>
          <th>Payment Method</th>
        </tr>
      </thead>
      <tbody>
        @foreach($result_print as $sale)
        <tr>
          <td>{{$sale->delivery_no}}</td>
          <td>{{$sale->client_name}}</td>
          <td>{{$sale->item_name}}</td>
          <td>{{$sale->cost}}</td>
          <td>{{$sale->discount}}</td>
          <td>{{$sale->additional_fee}}</td>
          <td>{{$sale->quantity}}</td>
          <td>{{$sale->total_cost}}</td>
          <td>
            {{$sale->paid_on ? date('m/d/Y', strtotime($sale->paid_on)) : '' }}
          </td>
          <td>
            {{date('m/d/Y', strtotime($sale->added_on)) }}
          </td>
          <td>{{$sale->added_by}}</td>
          <td>{{$sale->description}}</td>
        </tr>

        @endforeach
      </tbody>
    </table>
  </div>



</body>