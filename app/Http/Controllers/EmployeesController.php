<?php

namespace App\Http\Controllers;
use App\Models\Employees;
use Illuminate\Http\Request;


class EmployeesController extends Controller
{
    public function index()
    {
          $employees = Employees::orderBy('name')->orderBy('email')->paginate(10);
        return view('employees.index',compact('employees'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    
    public function create()
    {
        return view('employees.create');
    }

   
    public function store(Request $request)
    {
        $input = $request->all();
        Employees::create($input);
       // \\return redirect('employees')->with('flash_message', 'Employees Addedd!'); 
        return redirect('employees')
            ->with('success', 'your employee added has been created'); 
    }

    
    public function show($id)
    {
        $employees = Employees::find($id);
        return view('employees.show')->with('employees', $employees);
    }

    
    public function edit($id)
    {
        $employees = Employees::find($id);
        return view('employees.edit')->with('employees', $employees);
    }

  
    public function update(Request $request, $id)
    {
        $employees = Employees::find($id);
        $input = $request->all();
        $employees->update($input);
       // return redirect('employees')->with('flash_message', 'Contact Updated!');
       return redirect('employees')
            ->with('success', 'your employee updated successfully');   
    }

   
    public function destroy($id)
    {
        Employees::destroy($id);
        //return redirect('employees')->with('flash_message', 'Contact deleted!'); 
        return redirect('employees')
            ->with('success', 'your employee deleted successfully');   
    }
}

