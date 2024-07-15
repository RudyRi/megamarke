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
}
