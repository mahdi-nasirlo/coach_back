<?php

namespace App\Http\Controllers;

use App\Models\TemporaryFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class FileManagementController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|file',
        ]);

        $file = $request->file('file');

        $fileFolder = '/tmp/' . time();
        $fileName = $file->getClientOriginalName();
        Storage::disk('public')->putFileAs($fileFolder, $file, $fileName);

        TemporaryFile::query()->create([
            'folder' => $fileFolder,
            'filename' => $fileName
        ]);

        return $fileFolder . "/" . $fileName;

    }

    public function fetch(Request $request)
    {

        $file = Storage::get(storage_path("/app/public/uploads/1704986483_RequestPage.png"));

        $response = Response::make($file, 200);
        $response->header('Content-Type', 'application/png');
        return $response;
    }
}
