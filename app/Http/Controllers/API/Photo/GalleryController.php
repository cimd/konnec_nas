<?php

namespace App\Http\Controllers\API\Photo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\Photo\GalleryCollection;
use App\Models\Photo\Photo;

class GalleryController extends Controller
{
    public function index(Request $request)
    {
        $photos = Photo::filter($request->query)->with('exif')->orderBy('date_taken', 'Desc')->paginate(25);
        return new GalleryCollection($photos);
    }
}
