<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use function Symfony\Component\HttpFoundation\Session\Storage\save;
use function Symfony\Component\HttpFoundation\setFile;

class SubCategory extends Model
{
    use HasFactory;
    private static $subCategory,$image, $imageExtension, $imageName, $imageUrl, $directory;

    public static function getImageUrl($request)
    {
        self::$image = $request->file('image');
        self::$imageExtension = self::$image->getClientOriginalExtension();
        self::$imageName = time(). "." . self::$imageExtension;
        self::$directory = 'sub-category-images/';
        self::$image->move(self::$directory, self::$imageName);
        self::$imageUrl = self::$directory . self::$imageName;
        return self::$imageUrl;
    }

    public static function newSubCategory($request)
    {
        self::$subCategory = new subCategory();
        self::$subCategory->category_id = $request->category_id;
        self::$subCategory->name = $request->name;
        self::$subCategory->description = $request->description;
        self::$subCategory->image = self::getImageUrl($request);
        self::$subCategory->save();
    }


    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    public static function UpdateSubCategory($request, $id)
    {
        self::$subCategory = SubCategory::find($id);

        if($request->file('image'))
        {
            if(self::$subCategory->image)
            {
                unlink(self::$subCategory->image);
            }
            self::$imageUrl = self::getImageUrl($request);
        }
        else
        {
            self::$imageUrl = self::$subCategory->image;
        }

        self::$subCategory->category_id = $request->category_id;
        self::$subCategory->name = $request->name;
        self::$subCategory->description = $request->description;
        self::$subCategory->image = self::$imageUrl;
        self::$subCategory->save();
    }

    public static function deleteSubCategory($id)
    {
        self::$subCategory = SubCategory::find($id);

        if(self::$subCategory->image)
        {
            unlink(self::$subCategory->image);
        }
        self::$subCategory->delete();
    }



}
