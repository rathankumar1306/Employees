@extends('employees.layout')
@section('content')
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

.success {background-color: #4CAF50;} /* Green */
.button2 {background-color: #008CBA;} /* Blue */
.danger{
    background-color:red;
    color:white;
}
.success{
    background-color:green;
    color:white;
}
.add{
    background-color:green;
    color:white;
    padding-bottom:10px;
}
.show{
    background-color:blue;
    color:white;
}
.table-bordered{
    padding-top:10px;

}
</style>
    <div class="row">
        <div >
            <div>
                <h2>Employees Dashboard</h2>
            </div>
            <div>
                <a class="button add" href="{{ route('employees.create') }}"> Create New user</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($employees as $employees)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $employees->name }}</td>
            <td>{{ $employees->email }}</td>
            <td>
                <form action="{{ route('employees.destroy',$employees->id) }}" method="POST">
   
                    <a class="button show" href="{{ route('employees.show',$employees->id) }}">Show</a>
    
                    <a class="button success" href="{{ route('employees.edit',$employees->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button class="button danger" type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
      
@endsection