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
.view{
    background-color:blue;
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
                <a class="button add" href="{{ route('employees.create') }}"> Create New Employee</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <!-- <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div> -->

        <div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    {{ $message }} 
</div>  
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>Employee ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Gender</th>
            <th>Phone</th>

            <th width="280px">Action</th>
        </tr>
        
        @foreach ($employees as $employe)
        <tr> <p>
            <td>{{ $employe->id  }}</td>
            <td>{{ $employe->name }}</td>
            <td>{{ $employe->email }}</td>
            <td>{{ $employe->gender }}</td>
            <td>{{ $employe->phone }}</td>
            <td>
                <form action="{{ route('employees.destroy',$employe->id) }}" method="POST">
   
                    <a class="button view" href="{{ route('employees.show',$employe->id) }}">Show</a>
    
                    <a class="button success" href="{{ route('employees.edit',$employe->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button class="button danger" type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach

    </table>
    {{ $employees->links() }}
      
@endsection