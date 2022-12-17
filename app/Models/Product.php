<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    private static $product, $imageUrl, $image, $imageName, $imageDirectory;

    public static function getImageUrl($request, $product = null){
        self::$image = $request->file('image');
        if (self::$image){
            if ($product){
                if (file_exists($product->image)){
                    unlink($product->image);
                }
            }
            self::$imageName = self::$image->getClientOriginalName();
            self::$imageDirectory = 'product-images/';
            self::$image->move(self::$imageDirectory, self::$imageName);
            self::$imageUrl = self::$imageDirectory.self::$imageName;
        }
        else{
            if ($product){
                self::$imageUrl = $product->image;
            }
            else{
                self::$imageUrl = null;
            }
        }
        return self::$imageUrl;
    }

    public static function createProduct($request){
        self::$product = new Product();
        self::$product->category_name = $request->category_name;
        self::$product->brand_name = $request->brand_name;
        self::$product->name = $request->name;
        self::$product->price = $request->price;
        self::$product->description = $request->description;
        self::$product->image = self::getImageUrl($request);
        self::$product->status = $request->status;
        self::$product->save();
    }

    public static function updateProduct($request, $id){
        self::$product = Product::find($id);
        self::$product->category_name = $request->category_name;
        self::$product->brand_name = $request->brand_name;
        self::$product->name = $request->name;
        self::$product->price = $request->price;
        self::$product->description = $request->description;
        self::$product->image = self::getImageUrl($request, self::$product);
        self::$product->status = $request->status;
        self::$product->save();
    }
}
