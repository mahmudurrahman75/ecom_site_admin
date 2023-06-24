<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    public static $brand, $image, $imageExtension, $imageName, $directory, $imageUrl;

    public static function getImageUrl($request)
    {
        self::$image = $request->file('image');
        self::$imageExtension = self::$image->getClientOriginalExtension();
        self::$imageName = time(). ".". self::$imageExtension;
        self::$directory = 'brand-images/';
        self::$image->move(self::$directory, self::$imageName);
        self::$imageUrl = self::$directory . self::$imageName;
        return self::$imageUrl;
    }

    public static function newBrand($request)
    {
        self::$brand = new brand();
        self::$brand->category_id = $request->category_id;
        self::$brand->name = $request->name;
        self::$brand->description = $request->description;
        self::$brand->image = self::getImageUrl($request);
        self::$brand->save();

    }

    public function category()
    {
        return $this->belongsTo(category::class);
    }

    public static function updateBrand($request, $id)
    {
        self::$brand = Brand::find($id);

        if($request->file('image'))
        {
            if(self::$brand->image)
            {
                unlink(self::$brand->image);
            }
            self::$imageUrl = self::getImageUrl($request);
        }
        else
        {
            self::$imageUrl = self::$brand->image;
        }

        self::$brand->category_id = $request->category_id;
        self::$brand->name = $request->name;
        self::$brand->description = $request->description;
        self::$brand->image = self::$imageUrl;
        self::$brand->save();
    }

    public static function deleteBrand($id)
    {
        self::$brand = Brand::find($id);

        if(self::$brand->image)
        {
            unlink(self::$brand->image);
        }
        self::$brand->delete();
    }



}
