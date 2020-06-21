<head>
 <title>Disposition Analytics</title>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>

<style>
    tr:nth-child(even) {background-color: #f2f2f2;}

    th {
        background-color: #f2f2f2;
    }

    /*
    #footer {
       bottom: 0;
        border-top: 0.1pt solid #aaa;
    }
    .page-number:before {
        content: "Page " counter(page);
    }
    */
</style>
<body style="font-family: sans-serif">
  <h3>
    Patient Disposition Census - Jose Reyes Memorial Medical Center
  </h3>
  <div>
        <table style="width: 100%;border-collapse: collapse; text-align: center;" border="1">
            <thead>
            <tr>
                <th witdh="50%">Disposition</th>
                <th witdh="50%">Total Count</th>
                
            </tr>
            </thead>
            <tbody>
            @foreach($disposition as $patient)  
            <tr>
                <td> {{$patient->disposition_name}} </td>
                <td> {{$patient->total}} </td>
            </tr>
                
            @endforeach
            </tbody>
            <tfoot>
            <tr>
                <th>Total</th>
                <th>{{ $total }}</th>
            </tr>
            </tfoot>
        </table>
  </div>

  <!--
  <div id="footer">
    <div class="page-number"></div>
  </div>
  -->
</body>