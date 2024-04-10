<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;


class ProductController extends Controller
{
    public function getProducts()
    {
        $products = Product::with(['section', 'category', 'brand', 'attributes', 'images', 'vendor'])->get();

        $large_image_path  = 'front/images/product_images/large/';
        $medium_image_path = 'front/images/product_images/medium/';
        $small_image_path  = 'front/images/product_images/small/';

        $products->each(function ($product) use ($large_image_path, $medium_image_path, $small_image_path) {
            $product->product_image = asset($large_image_path . $product->product_image);

            $product->images->each(function ($image) use ($large_image_path, $medium_image_path, $small_image_path) {
                $image->image_path  = asset($large_image_path . $image->image);
                // $image->image_medium = asset($medium_image_path . $image->image);
                // $image->image_small  = asset($small_image_path . $image->image);
            });
        });

        return response()->json(['products' => $products]);
    }


    public function getProduct($id)
{
    $product = Product::with(['section', 'category', 'brand', 'attributes', 'images', 'vendor'])->find($id);

    $large_image_path  = 'front/images/product_images/large/';
    $medium_image_path = 'front/images/product_images/medium/';
    $small_image_path  = 'front/images/product_images/small/';

    $productImageLarge  = asset($large_image_path . $product->product_image);
    $productImageMedium = asset($medium_image_path . $product->product_image);
    $productImageSmall  = asset($small_image_path . $product->product_image);

    $responseData = [
        'id'                => $product->id,
        'product_name'      => $product->product_name,
        'product_code'      => $product->product_code,
        'product_price'     => $product->product_price,
        'product_image_large'  => $productImageLarge,
        // 'product_image_medium' => $productImageMedium,
        // 'product_image_small'  => $productImageSmall,
        'product_color'   => $product->product_color,
        'product_discount'=>$product->product_discount,
        'product_weight'=>$product->product_weight,
        'description'=>$product->description,
        'meta_title'=>$product ->meta_title,
        'meta_description'=>$product->meta_description,
        'meta_keywords'=>$product->meta_keywords,
        'brand'=>$product->brand,
        'vendor'=>$product->vendor,
        'attributes'=>$product->attributes,

    ];

    return response()->json($responseData);
}

}
