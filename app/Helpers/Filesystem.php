<?php
    function join_paths() {
        $paths = array();
        foreach (func_get_args() as $arg) {
            if ($arg !== '') { $paths[] = $arg; }
        }
        return preg_replace('#/+#','/',join(DIRECTORY_SEPARATOR, $paths));
    }

    function get_relative_path($path) {
        $result;
        // echo("storage_path: " . storage_path('/app/photos') . PHP_EOL);
        // echo("File::dirname: " . File::dirname($path) . PHP_EOL);
        switch (PHP_OS) {
        case 'Linux':
            $result = str_replace(storage_path('app/photos'), '', File::dirname($path));
            break;
        case 'WINNT':
            $result = str_replace(storage_path('app/photos'), '', File::dirname($path));
            break;
        default:
            $result = PHP_OS;
            break;
        }
        // echo("result: " . $result . PHP_EOL);
        return substr($result, 1);
    }
