<?php

namespace App\Http\Controllers\API\Package;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Artisan;
use App\Models\Package;
use App\Jobs\ApacheRestartJob;

class ApacheController extends Controller
{
    private $path;

    public function __construct()
    {
        // $this->path = '/var/apache2/sites-available';
        $this->path = 'C:\\Users\\Ingo\\OneDrive\\Desktop\\';
    }

    public function listEnvs(Request $request)
    {
        // Artisan::call('apache:list-envs');
        // $result = Artisan::output();

        // $path = '/var/apache2/sites-available';
        // $path = 
        $result = scandir($this->path);

        // $data = explode(' ', $result);
        return [
            'data' => $result
        ];
    }

    public function getFile(Request $request)
    {
        $file = file_get_contents($this->path . $request->filename);
        return $file;
    }

    public function updateFile(Request $request)
    {
        $file = file_put_contents($this->path . $request->filename, $request->data);
        Artisan::call('apache:update-envs ' . $request->filename);
        Artisan::call('apache:restart');
        return $file;
    }
}
