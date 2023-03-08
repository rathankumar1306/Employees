@extends('employees.layout')
  
@section('content')
<!DOCTYPE html>
<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
  padding-top :30px;

}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}

</style>
</head>
<body>

<h2>{{ $employees->name }} - Details</h2>
<div class="table" >
<a class="btn btn-primary" href="{{ route('employees.index') }}"> <-Back</a>
</div>

<table class="table" >
  <tr>
    <th>Name</th>
    <th>Email</th>
    <th>Gender</th>
    <th>Phone</th>

  </tr>
  <tr>
    <td>{{ $employees->name }}</td>
    <td>{{ $employees->email }}</td>
    <td>{{ $employees->gender }}</td>
    <td>{{ $employees->phone }}</td>

  </tr>
</table>

</body>
</html>
    
@endsection



