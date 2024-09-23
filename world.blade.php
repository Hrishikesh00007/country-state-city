<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
     <div class="container mt-3">
  <h2>All Place Details</h2>
  <table class="table">
    <thead>
      <tr>
      <th>Id</th>
        <th>Country</th>
        <th>State</th>
        <th>City</th>
     
      </tr>
    </thead>
    <tbody>
        @foreach ($data as $id => $customer)
      <tr>
      <td>{{ $customer->id }} </td>
        <td>{{ $customer->countryName }} </td>
        <td>{{ $customer->stateName }} </td>
        <td>{{ $customer->city1 }} </td>
      </tr>
      @endforeach
      
    </tbody>
  </table>

</div>
</body>
</html>