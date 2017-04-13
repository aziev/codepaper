<?php

if (! function_exists('version')) {
    /**
     * Asset file with version parameter.
     *
     * @param  string  $key
     * @return string
     */
    function version($path)
    {
        $version = filemtime(public_path($path));

        return asset("$path?v=$version");
    }
}
