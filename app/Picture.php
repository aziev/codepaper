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
        $extension = File::extension($file->getClientOriginalName());
        $uniqid = uniqid();
        $filename = $uniqid .'.'. $extension;

        if (!is_dir($path)){
            mkdir(public_path($path), 0755, true);
        }

        $path .= '/';

        if ($image->width() > 700*2)
        {
            $image->widen(700*2);
        }

        $image->save($path . $uniqid . '-2x.' . $extension);

        $image->fit(1200, 630);
        $image->save($path . $uniqid . '-1200x630.' . $extension);

        $image->widen(700);
        $image->save($path . $filename);

        $image->fit(537, 240);
        $image->save($path . $uniqid . '-537x240.' . $extension);

        return $path . $filename;
    }

    public function getPath($size = null)
    {
        if (substr($this->getOriginal('path'), 0, 4 ) === 'http')
        {
            // return path as is if image is not local
            return $this->path;
        }

        $pathinfo = pathinfo($this->getOriginal('path'));
        $path = $pathinfo['dirname'] . '/' . $pathinfo['filename'];

        switch ($size)
        {
            case '2x': $path .= '-2x'; break;
            case 'vk': $path .= '-537x240'; break;
            case 'fb': $path .= '-1200x630'; break;
        }

        dd($pathinfo);

        $path .= '.' . $pathinfo['extension'];

        return $path;
    }
}
