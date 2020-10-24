<head>
  <title>Items Costs History</title>
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
          <td colspan="3" style="border:none;">
            <table style="width: 100%;border-collapse: collapse; text-align: center;">
              @include('partials.pdf.header')
            </table>
          </td>
        </tr>

        <tr>
          <th colspan="3"
            style="text-align:center; background: white; border:none; text-transform:uppercase;font-size: 20px">
            Item Costs History
          </th>
        </tr>

        <tr>
          <th colspan="3" style="text-align:center;background: white; border:none;"> &nbsp; </th>
        </tr>
        <tr>
          <th>Item</th>
          <th>Cost</th>
          <th>Cost Datetime</th>
        </tr>
      </thead>
      <tbody>
        @foreach($result_print as $item_costs)
        <tr>
          <td>{{$item_costs->item_name}}</td>
          <td>{{$item_costs->cost}}</td>
          <td>
            {{$item_costs->cost_datetime ? date('m/d/Y h:i:s A', strtotime($item_costs->cost_datetime)) : '' }}
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>



</body>