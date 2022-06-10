<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

// use PulkitJalan\Google\Facades\Google;

// use Revolution\Google\Photos\Facades\Photos;


// use Google\Auth\Credentials\UserRefreshCredentials;
// use Google\Photos\Library\V1\PhotosLibraryClient;
// use Google\Photos\Library\V1\PhotosLibraryResourceFactory;


class GooglePhotosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

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
        $photo = Photo::filter($request)->with('exif')->orderBy('date_taken', 'Desc')->paginate(1);
        return $photo;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Photo $photo)
    {
        $photo->fill($request->all());
        $photo->save();

        return [
            'data' => $photo->toArray()
        ]; 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Photo $photo)
    {
        $photo->delete();
        return [
            'data' => $photo->toArray()
        ];
    }

    public function rename(Request $request, Photo $photo)
    {
        RenamePhotoJob::dispatch($photo, $request->path, $request->filename);
        UpdateExifModelJob::dispatch($photo);

        $photo = Photo::find($photo->id);
        return [
            'data' => $photo->toArray()
        ];
    }

    public function exif(Request $request, Photo $photo)
    {
        EditExifTagsJob::dispatch($photo, $request);
        UpdateExifModelJob::dispatch($photo);
        // DeleteOriginalsJob::dispatch();
        $photo = Photo::find($photo->id);
        return [
            'data' => $photo->toArray()
        ];
    }
}
