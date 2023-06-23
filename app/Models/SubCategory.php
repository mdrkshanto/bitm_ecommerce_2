<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class SubCategory extends Model
{
    use HasFactory;

    protected $guarded = [];

    private static $subCategory, $image, $imageUrl, $imageName, $imageExtension, $directory;

    private static function getImageUrl($request)
    {
        self::$image                = $request->file('image');
        self::$imageExtension       = self::$image->getClientOriginalExtension();
        self::$imageName            = time() . '.' . self::$imageExtension;
        self::$directory            = 'images/sub-category/';
        self::$image->move(self::$directory, self::$imageName);
        self::$imageUrl             = self::$directory . self::$imageName;
        return self::$imageUrl;
    }

    private static function getSlug($name, $id = null)
    {
        $count = SubCategory::where('name', $name)->count();
        if ($count > 1) {
            if ($id !== null) {
                return Str::slug($name . ' ' . $id);
            }
            return Str::slug($name . ' ' . bcrypt(time()));
        }
        return Str::slug($name);
    }

    protected static function createSubCategory($request)
    {
        self::$subCategory = new SubCategory();
        if ($request->file('image')) {
            self::$subCategory->image = self::getImageUrl($request);
        }
        self::$subCategory->category_id             = $request->category_id;
        self::$subCategory->name                    = ucwords($request->name);
        self::$subCategory->short_description       = $request->short_description;
        self::$subCategory->slug                    = self::getSlug($request->name);
        self::$subCategory->save();

        $count = Category::where('name', $request->name)->count();
        if ($count > 1) {
            self::$subCategory->slug = self::getSlug(self::$subCategory->name, self::$subCategory->id);
            self::$subCategory->save();
        }
    }

    protected static function updateSubCategory($request, $id)
    {
        self::$subCategory = SubCategory::find($id);
        if ($request->file('image')) {
            if (file_exists(self::$subCategory->image)) {
                unlink(self::$subCategory->image);
            }
            self::$subCategory->image = self::getImageUrl($request);
        }
        self::$subCategory->category_id             = $request->category_id;
        self::$subCategory->name                    = ucwords($request->name);
        self::$subCategory->short_description       = $request->short_description;
        self::$subCategory->slug                    = self::getSlug($request->name, self::$subCategory->id);
        self::$subCategory->status                  = $request->status;
        self::$subCategory->save();
    }

    protected static function deleteSubCategory($id)
    {
        self::$subCategory = SubCategory::find($id);

        if (file_exists(self::$subCategory->image)) {
            unlink(self::$subCategory->image);
        }
        self::destroy($id);
//        self::$subCategory->delete();
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
