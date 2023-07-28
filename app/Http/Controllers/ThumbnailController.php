<?php

namespace App\Http\Controllers;

use App\Models\Thumbnail;
use Illuminate\Http\Request;

class ThumbnailController extends Controller
{
    public function getThumbnail($id)
    {
        $thumbnail = Thumbnail::findOrFail($id);
        $path = storage_path('app/public/upload/thumbnail/' . $thumbnail->filename);
        return response()->file($path);
    }
}
