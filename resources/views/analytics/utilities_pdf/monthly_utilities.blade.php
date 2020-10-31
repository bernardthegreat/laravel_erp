<head>
  <title>Monthly Utilities Report</title>
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
            Monthly Utilities Report
          </th>
        </tr>

        <tr>
          <th colspan="3" style="text-align:center;background: white; border:none;"> &nbsp; </th>
        </tr>
        <tr>
          <th>Utility</th>
          <th>Cost</th>
          <th>Coverage</th>
        </tr>
      </thead>
      <tbody>
        @php 
          $total_cost = 0;
        @endphp
        @foreach($result_print as $utilities)
        <tr>
          <td>{{$utilities->utility}}</td>
          <td>
            @if(isset($utilities->from_date))
              {{$utilities->from_date ? date('M Y', strtotime($utilities->from_date)) : '' }} - {{$utilities->to_date ? date('M Y', strtotime($utilities->to_date)) : '' }}
            @endif
          </td>
          <td>{{$utilities->cost}}</td>
        </tr>
        @php 
          $total_cost += $utilities->cost;
        @endphp
        @endforeach
        <tr>
          <td></td>
          <td style="font-weight: bold;">Total</td>
          <td><?php echo number_format($total_cost, 2); ?></td>
        </tr>
      </tbody>
    </table>
  </div>



</body>