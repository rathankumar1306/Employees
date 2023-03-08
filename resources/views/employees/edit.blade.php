
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
.back{
  padding-top:50px;

}
</style>
@section('content')

<form class="back" action="{{ route('employees.update',$employees->id) }}" method="POST">
@csrf
@method('PUT')
<a class="btn btn-primary button" href="{{ route('employees.index') }}"> <-Back</a>

<h3>EDIT EMPLOYEE</h3>
    <table class="table table-bordered">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Gender</th>
            <th>Phone</th>

        </tr>
        <tr>
        <td><textarea class="form-control" style="height:35px" name="name" placeholder="Email">{{ $employees->name }}</textarea></td>
        <td><input type ="email" class="form-control" style="height:35px" name="email" placeholder="Email" value = "{{ $employees->email }}"></td>
        <td><select name="gender" style="height:30px; width :200px;" class="form-control" placeholder="Gender">
    <option value="{{ $employees->gender }}">selected : {{ $employees->gender }}</option>
    <option value="Male">Male</option>
    <option value="Female">Female</option>
</select></td>
        <td><textarea class="form-control" style="height:35px" name="phone" placeholder="Phone">{{ $employees->phone }}</textarea></td>
        </tr>
    </table>

    <button type="submit" class="button success">Submit</button>
    </form>

  
      
@endsection