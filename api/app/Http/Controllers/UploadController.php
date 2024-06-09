<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function upload(Request $request)
    {
        // Validar a imagem
        $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        // Pegar o caminho opcional
        $path = $request->query('path', 'uploads');

        // Armazenar a imagem
        $filePath = $request->file('image')->store($path, 'public');

        // Retornar o caminho da imagem
        return response()->json(['path' => $filePath], 201);
    }
}
