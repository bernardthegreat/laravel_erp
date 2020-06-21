<head>
 <title>Stock Count Report</title>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>



<style>
    
    #body tr:nth-child(even) {background-color: #c1c7d0;}

    #body th {
        background-color: #c1c7d0;
    }

    .text-center {
        text-align: center;
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
  <h3 class="text-center">
    Stock Count
  </h3>
  <div>
        <table id="body" style="width: 100%;border-collapse: collapse; text-align: center;" border="1">
            <thead>
            <tr>
                <th width="50%">Item</th>
                <th width="50%">Count</th>
                
            </tr>
            </thead>
            <tbody>
            @foreach($stock_count as $stock)  
            <tr>
                <td > {{$stock->item}} </td>
                <td> {{$stock->stock_count}} </td>
            </tr>
                
            @endforeach
            </tbody>
        </table>
  </div>

  <!--
  <div id="footer">
    <div class="page-number"></div>
  </div>
  -->
</body>

</html>