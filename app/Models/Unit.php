<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Str;

class Unit extends Model
{
    use HasFactory;



    private static $unit;

    private static function getSlug($name, $id = null)
    {
        $count = Unit::where('name', $name)->count();
        if ($count > 1) {
            if ($id !== null) {
                return Str::slug($name . ' ' . $id);
            }
            return Str::slug($name . ' ' . bcrypt(time()));
        }
        return Str::slug($name);
    }

    protected static function createUnit($request)
    {
        self::$unit = new Unit();
        self::$unit->name = ucwords($request->name);
        self::$unit->short_description = $request->short_description;
        self::$unit->slug = self::getSlug($request->name);
        self::$unit->save();

        $count = Unit::where('name', $request->name)->count();
        if ($count > 1) {
            self::$unit->slug = self::getSlug(self::$unit->name, self::$unit->id);
            self::$unit->save();
        }
    }


    protected static function updateUnit($request, $id)
    {
        self::$unit = Unit::find($id);
        self::$unit->name = ucwords($request->name);
        self::$unit->short_description = $request->short_description;
        self::$unit->slug = self::getSlug($request->name, self::$unit->id);
        self::$unit->status = $request->status;
        self::$unit->save();
    }

    protected static function deleteUnit($id)
    {
        self::$unit = Unit::find($id);
        self::$unit->delete();
    }
}
