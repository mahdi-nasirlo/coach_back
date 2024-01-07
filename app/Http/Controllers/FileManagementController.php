<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileManagementController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'file' => 'required|file',
        ]);

        $file = $request->file('file');

        $filePath = 'uploads';
        $fileName = time() . '_' . $file->getClientOriginalName();

        Storage::disk('public')->putFileAs($filePath, $file, $fileName);

        return response()->json([
            "status" => true,
            'message' => 'File uploaded successfully',
            'path' => $filePath . '/' . $fileName
        ]);
    }
}
