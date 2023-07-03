<?php


use App\Http\Controllers\Controller;
use App\Models\Photo\Photo;
use Illuminate\Http\Request;
use Resources\GalleryCollection;

class GalleryController extends Controller
{
    public function index(Request $request)
    {
        $photos = Photo::filter($request->query)->with('exif')->orderBy('date_taken', 'Desc')->paginate(25);

        return new GalleryCollection($photos);
    }
}
