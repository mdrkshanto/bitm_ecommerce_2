<?php

namespace App\Models;

use Faker\Core\Number;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Str;

class Brand extends Model
{
    use HasFactory;


    private static $brand, $image, $imageUrl, $imageName, $imageExtension, $directory;

    private static function getImageUrl($request)
    {
        self::$image = $request->file('image');
        self::$imageExtension = self::$image->getClientOriginalExtension();
        self::$imageName = hexdec(uniqid()) . '.' . self::$imageExtension;
        self::$directory = 'images/brand/';
        self::$image->move(self::$directory, self::$imageName);
        self::$imageUrl = self::$directory . self::$imageName;
        return self::$imageUrl;
    }

    private static function getSlug($name, $id = null)
    {
        $count = Brand::where('name', $name)->count();
        if ($count > 1) {
            if ($id !== null) {
                return Str::slug($name . ' ' . $id);
            }
            return Str::slug($name . ' ' . bcrypt(time()));
        }
        return Str::slug($name);
    }

    protected static function createBrand($request)
    {
        self::$brand = new Brand();
        if ($request->file('image')) {
            self::$brand->image = self::getImageUrl($request);
        }
        self::$brand->name = ucwords($request->name);
        self::$brand->short_description = $request->short_description;
        self::$brand->slug = self::getSlug($request->name);
        self::$brand->save();

        $count = Brand::where('name', $request->name)->count();
        if ($count > 1) {
            self::$brand->slug = self::getSlug(self::$brand->name, self::$brand->id);
            self::$brand->save();
        }
    }


    protected static function updateBrand($request, $id)
    {
        self::$brand = Brand::find($id);
        if ($request->file('image')) {
            if (file_exists(self::$brand->image)) {
                unlink(self::$brand->image);
            }
            self::$brand->image = self::getImageUrl($request);
        }
        self::$brand->name = ucwords($request->name);
        self::$brand->short_description = $request->short_description;
        self::$brand->slug = self::getSlug($request->name, self::$brand->id);
        self::$brand->status = $request->status;
        self::$brand->save();
    }

    protected static function deleteBrand($id)
    {
        self::$brand = Brand::find($id);

        if (file_exists(self::$brand->image)) {
            unlink(self::$brand->image);
        }
        self::$brand->delete();
    }

    public function products()
    {
        return $this->hasMany();
    }
}
