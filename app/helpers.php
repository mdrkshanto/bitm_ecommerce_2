<?php
use Intervention\Image\Facades\Image;

function uploadImage($image,$directory,$width,$height)
{
    $imagename = bcrypt(uniqid()) .'.'. $image->getClientOriginalExtension();
    Image::make($image)->resize($width, $height)->save($directory.$imagename);
    return $directory.$imagename;
}
