<?php

namespace Modules\Positions\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PositionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('positions::index');
    }

}
