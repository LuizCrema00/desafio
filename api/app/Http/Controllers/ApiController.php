<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    //
    public function index(Request $request) 
    {
       $query = Produto::query();

       $sortBy = $request->get('sort_by', 'nome');
       $order = $request->get('order', 'asc');
       $query->orderBy($sortBy, $order);
       
       if ($request->has('nome')) {
            $query->where('nome', $request->nome);
       }

       return $query->paginate(5);

    }

    public function store(Request $request)
    {
        $produto = Produto::create($request->all());

        return response()
            ->json($produto, 201);
    }

    public function show (int $produto)
    {
       $produtoModel = Produto::find($produto);
       if ($produtoModel === null) {
            return response()->json(['message' => 'Produto nao encontrado'], 404);
       }
       return $produtoModel;
    }

    public function update (Produto $produto, Request $request)
    {
        $produto->fill($request->all());
        $produto->save();

        return $produto;
    }

    public function destroy (int $produto) 
    {
        Produto::destroy($produto);
        return response()->noContent();
    }


}
