<?php

function version($path)
{
    return asset("$path?v=" . filemtime(public_path($path)));
}
