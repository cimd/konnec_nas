<?php

namespace App\Http\Controllers\API\Photo;

use App\Http\Controllers\Controller;
use App\Jobs\Photo\DeleteOriginalsJob;
use App\Jobs\Photo\EditExifTagsJob;
use App\Jobs\Photo\RenamePhotoJob;
use App\Models\Photo\Photo;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $photos = Photo::filter($request->query)->with('exif')->orderBy('date_taken', 'Desc')->paginate(25);

        return $photos;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Photo $photo)
    {
        $previous = Photo::where('date_taken', '<=', $photo->date_taken)->where('id', '!=', $photo->id)->orderBy('date_taken', 'DESC')->first();
        $next = Photo::where('date_taken', '>=', $photo->date_taken)->where('id', '!=', $photo->id)->orderBy('date_taken', 'ASC')->first();

        return [
            'data' => $photo->load('exif')->toArray(),
            'previous' => $previous ? $previous->toArray() : null,
            'next' => $next ? $next->toArray() : null,
        ];
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Photo $photo)
    {
        $photo->fill($request->all());
        $photo->save();

        return [
            'data' => $photo->toArray(),
        ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Photo $photo)
    {
        $photo->delete();

        return [
            'data' => $photo->toArray(),
        ];
    }

    public function rename(Request $request, Photo $photo)
    {
        RenamePhotoJob::dispatch($photo, $request->path, $request->filename);
        UpdateExifModelJob::dispatch($photo);

        $photo = Photo::find($photo->id);

        return [
            'data' => $photo->toArray(),
        ];
    }

    public function exif(Request $request, Photo $photo)
    {
        EditExifTagsJob::dispatch($photo, $request);
        UpdateExifModelJob::dispatch($photo);
        // DeleteOriginalsJob::dispatch();
        $photo = Photo::find($photo->id);

        return [
            'data' => $photo->toArray(),
        ];
    }
}
