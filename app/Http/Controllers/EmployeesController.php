<?php

namespace App\Http\Controllers;
use App\Models\Employees;
use Illuminate\Http\Request;


class EmployeesController extends Controller
{
    
// /**
//      * Display a listing of the resource.
//      *
//      * @return \Illuminate\Http\Response
//      */
//     public function index()
//     {
//         $employees = Employees::latest()->paginate(5);
    
//         return view('employees.index',compact('employees'))
//             ->with('i', (request()->input('page', 1) - 1) * 5);
//     }
     
//     /**
//      * Show the form for creating a new resource.
//      *
//      * @return \Illuminate\Http\Response
//      */
//     public function create()
//     {
//         return view('employees.create');
//     }
    
//     /**
//      * Store a newly created resource in storage.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @return \Illuminate\Http\Response
//      */
//     public function store(Request $request)
//     {
//         $request->validate([
//             'name' => 'required',
//             'email' => 'required',
//         ]);
    
//         Employees::create($request->all());
     
//         return redirect()->route('employees.index')
//                         ->with('success','User created successfully.');
//     }
     
//     /**
//      * Display the specified resource.
//      *
//      * @param  \App\Employees  $employees
//      * @return \Illuminate\Http\Response
//      */
//     public function show(Employees $employees)
//     {
//         return view('employees.show',compact('employees'));
//     } 
     
//     /**
//      * Show the form for editing the specified resource.
//      *
//      * @param  \App\Employees  $employees
//      * @return \Illuminate\Http\Response
//      */
//     public function edit(Employees $employees)
//     {
//         return view('employees.edit',compact('employees'));
//     }
    
//     /**
//      * Update the specified resource in storage.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @param  \App\Employees  $employees
//      * @return \Illuminate\Http\Response
//      */
//     public function update(Request $request, Employees $employees)
//     {
//         $request->validate([
//             'name' => 'required',
//             'email' => 'required',
//             'id'=>'required'
//         ]);
    
//         $employees->update($request->all());
    
//         return redirect()->route('employees.index')
//                         ->with('success','User updated successfully');
//     }
    
//     /**
//      * Remove the specified resource from storage.
//      *
//      * @param  \App\Employees  $user
//      * @return \Illuminate\Http\Response
//      */
//     public function destroy(Employees $employees)
//     {
//         $employees->delete();
    
//         return redirect()->route('employees.index')
//                         ->with('success','User deleted successfully');
//     }


   
    public function index()
    {
    //     $employees = Employees::all();
    //   return view ('employees.index')->with('employees', $employees);
          $employees = Employees::latest()->paginate(10);
        return view('employees.index',compact('employees'))
            ->with('i', (request()->input('page', 1) - 1) * 5);

            $products = Product::latest()->paginate(5);
            return view('products.index',compact('products'))
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
        return redirect('employees')->with('flash_message', 'Employees Addedd!');  
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
        return redirect('employees')->with('flash_message', 'Contact Updated!');  
    }

   
    public function destroy($id)
    {
        Employees::destroy($id);
        return redirect('employees')->with('flash_message', 'Contact deleted!');  
    }
}

