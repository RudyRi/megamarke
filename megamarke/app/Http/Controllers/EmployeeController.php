<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Exception;

class EmployeeController extends Controller
{
    /**
     * @throws Exception
     */
    public function index()
    {
        if (request()->ajax()) {
            return DataTables::make(Employee::select('id', 'name', 'position', 'birth_date', 'hired_on'))->make(true);
        }

        return view('employees.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'position' => 'required',
            'birth_date' => 'required|date',
            'hired_on' => 'required|date',
        ]);

        Employee::create($request->all());

        return response()->json(['message' => 'Employee created successfully.', 'status' => 200]);
    }

    public function update(Employee $employee)
    {
        $employee = Employee::findOrFail($employee->id);
        $employee->update(request()->all());
        return response()->json(['message' => 'Employee updated successfully.', 'status' => 200]);
    }

    public function destroy(Employee $employee)
    {
        $employee = Employee::findOrFail($employee->id);
        $employee->delete();
        return response()->json(['message' => 'Employee deleted successfully.', 'status' => 200]);
    }

}
