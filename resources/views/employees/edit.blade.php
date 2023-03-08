
@extends('employees.layout')
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
.button {
  border: none;
  color: white;
  padding: 8px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 12px;
  margin: 2px 1px;
  cursor: pointer;
}


.success{
    background-color:green;
    color:white;
}

.table-bordered{
  padding-bottom:20px;


}
</style>
@section('content')
<form action="{{ route('employees.update',$employees->id) }}" method="POST">
@csrf
@method('PUT')
    <table class="table table-bordered">
        <tr>
            <th>Name</th>
            <th>Email</th>
        </tr>
        <tr>
        <td><textarea class="form-control" style="height:35px" name="name" placeholder="Email">{{ $employees->name }}</textarea></td>
        <td><textarea class="form-control" style="height:35px" name="email" placeholder="Email">{{ $employees->email }}</textarea></td>
        </tr>
    </table>

    <button type="submit" class="button success">Submit</button>
    </form>

  
      
@endsection