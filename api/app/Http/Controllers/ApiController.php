<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    //
    public function index() 
    {
        return Produto::all();

    }

    public function store(Request $request)
    {
        return response()->json(Produto::create($request->all()), 201);
    }
}
