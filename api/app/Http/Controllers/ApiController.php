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
        $produto = Produto::create($request->all());

        return response()->json($produto, 201);
    }
}
