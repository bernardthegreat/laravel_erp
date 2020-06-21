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
        content: "Page " counter(page);
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
                
                @include('partials.pdf.header')
                

                <tr>
                    <th colspan="2" style="text-align:center; background: white; border:none; text-transform:uppercase;font-size: 20px"> 
                        Monthly Income Report
                    </th>
                </tr>

                <tr>
                    <th colspan="2" style="text-align:center;background: white; border:none;"> &nbsp; </th>
                </tr>

                <tr>
                    <th witdh="50%">CLIENT</th>
                    <th witdh="50%">ITEM</th>

                </tr>
            </thead>
            <tbody>
                @foreach($sales as $sale)
                <tr>
                    <td> {{$sale->client_name}} </td>
                    <td> {{$sale->item_name}} </td>
                </tr>

                @endforeach
            </tbody>
        </table>
    </div>

  
  
</body>
