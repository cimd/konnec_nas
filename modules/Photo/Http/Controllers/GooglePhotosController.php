<?php


use App\Http\Controllers\Controller;
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
    public function show(\App\Http\Controllers\API\Photo\Photo $photo)
    {
        $photo = \App\Http\Controllers\API\Photo\Photo::filter($request)->with('exif')->orderBy('date_taken', 'Desc')->paginate(1);

        return $photo;
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, \App\Http\Controllers\API\Photo\Photo $photo)
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
    public function destroy(\App\Http\Controllers\API\Photo\Photo $photo)
    {
        $photo->delete();

        return [
            'data' => $photo->toArray(),
        ];
    }

    public function rename(Request $request, \App\Http\Controllers\API\Photo\Photo $photo)
    {
        \App\Http\Controllers\API\Photo\RenamePhotoJob::dispatch($photo, $request->path, $request->filename);
        \App\Http\Controllers\API\Photo\UpdateExifModelJob::dispatch($photo);

        $photo = \App\Http\Controllers\API\Photo\Photo::find($photo->id);

        return [
            'data' => $photo->toArray(),
        ];
    }

    public function exif(Request $request, \App\Http\Controllers\API\Photo\Photo $photo)
    {
        \App\Http\Controllers\API\Photo\EditExifTagsJob::dispatch($photo, $request);
        \App\Http\Controllers\API\Photo\UpdateExifModelJob::dispatch($photo);
        // DeleteOriginalsJob::dispatch();
        $photo = \App\Http\Controllers\API\Photo\Photo::find($photo->id);

        return [
            'data' => $photo->toArray(),
        ];
    }
}
