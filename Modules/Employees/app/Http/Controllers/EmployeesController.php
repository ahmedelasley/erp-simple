<?php

namespace Modules\Employees\Http\Controllers;

use App\Http\Controllers\Controller;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('employees::index');
    }

}
