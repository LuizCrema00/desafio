<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    //
    // public function upload(Request $request)
    // {
    //     $request->validate([
    //         'file' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
    //         'path' => 'nullable|string'
    //     ]);

    //     $path = $request->input('path', 'uploads');
    //     $filePath = $request->file('file')->store($path, 'public');

    //     return response()->json(['path' => $filePath], 201);
    // }
}
