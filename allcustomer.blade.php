<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>  
</head>
<body>
<div class="container mt-3">
  <h2>All Customers</h2>
  <button type="button" class="btn btn-success" ><a href="/newcustomer" >Add New Data</a></button>
  <table class="table">
    <thead>
      <tr>
      <th>Id</th>
        <th>Name</th>
        <th>Email</th>
        <th>Mobile</th>
        <th>City</th>
        <th>View</th>
        <th>Update</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($data as $id => $customer)
      <tr>
      <td>{{ $customer->id }} </td>
        <td>{{ $customer->name }} </td>
        <td>{{ $customer->email }} </td>
        <td>{{ $customer->mobile }} </td>
        <td>{{ $customer->city }} </td>
        {{-- <td><a href="{{ route('view.customer',$customer->id) }}">View</a></td>
        <td><button type="button" class="btn btn-warning"><a href="{{ route('update.Page',$customer->id) }}">Update</a></button></td>
        <td><button type="button" class="btn btn-danger"><a href="{{ route('detele.customer',$customer->id) }}"> Delete</a></button></td> --}}
      </tr>
      @endforeach
      
    </tbody>
  </table>

</div>

    
</body>
</html>




