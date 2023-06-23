<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;


    private static $category, $image, $imageUrl, $imageName, $imageExtension, $directory;


    private static function getImageUrl($request)
    {
        self::$image = $request->file('image');
        self::$imageExtension = self::$image->getClientOriginalExtension();
        self::$imageName = time() . '.' . self::$imageExtension;
        self::$directory = 'images/category/';
        self::$image->move(self::$directory, self::$imageName);
        self::$imageUrl = self::$directory . self::$imageName;
        return self::$imageUrl;
    }

    private static function getSlug($name, $id = null)
    {
        $count = Category::where('name', $name)->count();
        if ($count > 1) {
            if ($id !== null) {
                return Str::slug($name . ' ' . $id);
            }
            return Str::slug($name . ' ' . bcrypt(time()));
        }
        return Str::slug($name);
    }

    protected static function createCategory($request)
    {
        self::$category = new Category();
        if ($request->file('image')) {
            self::$category->image = self::getImageUrl($request);
        }
        self::$category->name = ucwords($request->name);
        self::$category->short_description = $request->short_description;
        self::$category->slug = self::getSlug($request->name);
        self::$category->save();

        $count = Category::where('name', $request->name)->count();
        if ($count > 1) {
            self::$category->slug = self::getSlug(self::$category->name, self::$category->id);
            self::$category->save();
        }
    }

    protected static function updateCategory($request, $id)
    {
        self::$category = Category::find($id);
        if ($request->file('image')) {
            if (file_exists(self::$category->image)) {
                unlink(self::$category->image);
            }
            self::$category->image = self::getImageUrl($request);
        }
        self::$category->name = ucwords($request->name);
        self::$category->short_description = $request->short_description;
        self::$category->slug = self::getSlug($request->name, self::$category->id);
        self::$category->status = $request->status;
        self::$category->save();
    }

    protected static function deleteCategory($id)
    {

        self::$category = Category::find($id);

        if (file_exists(self::$category->image)) {
            unlink(self::$category->image);
        }
        self::$category->delete();
    }

    public function subCategories()
    {
        return $this->hasMany(SubCategory::class);
    }
}
