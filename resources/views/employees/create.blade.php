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
.back{
    background-color:grey;
    color:white;
}

.table-bordered{
  padding-bottom:20px;
}
.row{
    padding-top:20px;

}
.pull-right{
    padding-bottom:20px;
}
.back{
    width:70px;
}
</style>
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Employ</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary back" href="{{ route('employees.index') }}"> Back</a>
        </div>
    </div>
</div>
   
@if ($errors->any())
    <div class="alert alert-danger">
        There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form action="{{ route('employees.store') }}" method="POST">
    @csrf
    <table class="table table-bordered">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Gender</th>
            <th>Phone</th>
        </tr>
        <tr>
        <td><input type="text" name="name" style="height:30px; width :150px;" class="form-control" placeholder="Name"></td>
        <td><input class="form-control" style="height:30px; width :300px;"  name="email" placeholder="Email"></td>
        <td><select name="gender" style="height:30px; width :100px;" class="form-control" placeholder="Gender">
    <option value="Male">Male</option>
    <option value="Female">Female</option>
</select></td>
<td><input type="number" class="form-control" style="height:30px; width :200px;"  name="phone" placeholder="Phone"></td>
        </tr>
    </table>

    <button type="submit" class="button success">Submit</button>
    </form>
@endsection


