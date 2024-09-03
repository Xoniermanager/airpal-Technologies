<?php

use App\Models\SiteConfig;
use Illuminate\Support\Facades\Storage;

function getRatingHtml($value)
{
    $html = '';
    $star_1 = '"fa fa-star"';
    $star_2 = '"fa fa-star"';
    $star_3 = '"fa fa-star"';
    $star_4 = '"fa fa-star"';
    $star_5 = '"fa fa-star"';
    if ($value >= '0.5') {
        $star_1 = '"fa fa-star-half text-warning"';
    }

    if ($value >= '1') {
        $star_1 = '"fa fa-star text-warning"';
    }

    if ($value >= '1.5') {
        $star_2 = '"fa fa-star-half text-warning"';
    }

    if ($value >= '2') {
        $star_2 = '"fa fa-star text-warning"';
    }

    if ($value >= '2.5') {
        $star_3 = '"fa fa-star-half text-warning"';
    }

    if ($value >= '3') {
        $star_3 = '"fa fa-star text-warning"';
    }

    if ($value >= '3.5') {
        $star_4 = '"fa fa-star-half text-warning"';
    }

    if ($value >= '4') {
        $star_4 = '"fa fa-star text-warning"';
    }

    if ($value >= '4.5') {
        $star_5 = '"fa fa-star-half text-warning"';
    }

    if ($value > '4.5') {
        $star_5 = '"fa fa-star text-warning"';
    }
    $html .=       "<i class=$star_1></i>
                    <i class=$star_2></i>
                    <i class=$star_3></i>
                    <i class=$star_4></i>
                    <i class=$star_5></i>";
    return $html;
}

function uploadingImageorFile($file, String $path, $namePrefix = '')
{
    $image  = $namePrefix . '-' . time() . '.' . $file->getClientOriginalExtension();
    $path = $path . '/' . $image;
    Storage::disk('public')->put($path, file_get_contents($file));
    return  $path;
}
function unlinkFileOrImage($file)
{
    if (file_exists(storage_path('app/public/') . $file)) {
        unlink(storage_path('app/public/') . $file);
    }
    return true;
}



function site($configName = '')
{
    $configs = SiteConfig::where('name',$configName)->first();

    if($configs)
    {
        if ($configs->name == 'website_logo' || $configs->name == 'website_favicon') {

            $configs->value = url('storage/' . $configs->value);

        } 
        return $configs->value;
    }
    return;
}
