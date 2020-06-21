<head>
 <title></title>
</head>
<body>
  <h1></h1>
  <div>
  <table>
        <tr>
        <td>  </td>
        <tr>
        @foreach($patient_census as $patient)  
        <tr>
            <td> {{$patient->first_name}} </td>
        </tr>
        @endforeach
        </table>
  </div>
</body>
</body>
</html>