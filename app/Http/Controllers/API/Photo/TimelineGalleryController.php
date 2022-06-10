<?php

namespace App\Http\Controllers\API\Photo;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use App\Models\Exif;
use Illuminate\Http\Request;

use App\Jobs\RenamePhotoJob;
use App\Jobs\ReadExifTagsJob;
use App\Jobs\EditExifTagsJob;
use App\Jobs\DeleteOriginalsJob;

class TimelineGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $photos = Photo::filter($request)->with('exif')->orderBy('date_taken', 'Desc')->paginate(50);
        return $photos;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function show(Photo $photo)
    {
        //
    }
}
