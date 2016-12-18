<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use URL;
use Image;
use File;

class Picture extends Model
{
    protected $fillable = ['path'];

    public function getPathAttribute($value)
    {
        return URL::asset($value);
    }

    public static function storeFile($file)
    {
        $image = Image::make($file);

        $path = 'uploads/images/' . date("Y") .'/'. date('m');
        $extension= File::extension($file->getClientOriginalName());
        $filename = uniqid() .'.'. $extension;

        if (!is_dir($path)){
            mkdir(public_path($path), 0755, true);
        }

        $path .= '/';

        if ($image->width() > 700*2)
        {
            $image->widen(700*2);
        }

        $image->save($path . $filename);

        return $path . $filename;
    }
}
