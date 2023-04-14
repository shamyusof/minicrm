<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use App\Models\Company;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        //$employees = Employee::all();
        $employees = Employee::with('company')->get();
        

        return view('employee.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $companies = Company::all();

        //return view('employee.create');
        // Pass the list of companies to the view
        return view('employee.create', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        //validate form
        /*
        $this->validate($request, [
            'firstname'   => 'required|min:3',
            'lastname'   => 'required|min:3',
            'company_id' => 'required|exists:companies,id',
            'phone'   => 'required|min:10',
            'email'     => 'required|min:5',
            'phone'   => 'required|min:10',
        ]);

        //echo $company_id;
        //dd($request->company_id);
        //create
        employee::create([
            'firstname'      => $request->firstname,
            'lastname'       => $request->lastname,
            'company_id'     => $request->company_id,
            'email'         => $request->email,
            'phone'         => $request->phone
        ]);
*/
        //var_dump($data);
        // Validate the input data
    $validatedData = $request->validate([
        'firstname' => 'required',
        'lastname' => 'required',
        'company_id' => 'required|exists:companies,id', // assuming 'companies' table has 'id' column as primary key
        'email' => 'required|email',
        'phone' => 'required',
    ]);

    // Create a new employee record
    $employee = Employee::create([
        'firstname' => $validatedData['firstname'],
        'lastname' => $validatedData['lastname'],
        'company_id' => $validatedData['company_id'],
        'email' => $validatedData['email'],
        'phone' => $validatedData['phone']
    ]);
        //redirect to index
        return redirect()->route('employee.index')->with(['success' => 'Data has been added successfully!']);
        //return view('employee.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        //get by ID
        //$employee = Employee::findOrFail($id);
        $employee = Employee::with('company')->find($id);
 
        return view('employee.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        //$employee = Employee::findOrFail($id);
        $employee = Employee::with('company')->find($id);
        $companies = Company::all();
        //render view with post
        return view('employee.edit', compact('employee','companies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        //validate form
        $this->validate($request, [
            'firstname'   => 'required|min:3',
            'lastname'   => 'required|min:3',
            'email'     => 'required|min:5',
            'phone'   => 'required|min:10',
        ]);

        //get by ID
        $employee = Employee::findOrFail($id);

            $employee->update([
                'firstname'      => $request->firstname,
                'lastname'      => $request->lastname,
                'email'      => $request->email,
                'phone'   => $request->phone
            ]);
    

        //redirect to index
        return redirect()->route('employee.index')->with(['success' => 'Data has been updated successfully!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        //get by ID
        $employee = Employee::findOrFail($id);


        //delete 
        $employee->delete();

        //redirect to index
        return redirect()->route('employee.index')->with(['success' => 'Data has been deleted successfully!']);
    }
}
