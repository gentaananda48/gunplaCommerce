<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Fungsi input url
    public function all(Request $request)
    {
        $id = $request->input('id');
        $limit = $request->input('limit', 5);
        $name = $request->input('name');
        $slug = $request->input('slug');
        $type = $request->input('type');
        $price_from = $request->input('price_from');
        $price_to = $request->input('price_to');

        // conditional Logic jika data ditemukan berdasarkan id
        if($id)
        {
            $product = Products::with('galleries')->find($id);

            if($product)
            return ResponseFormatter::success($product, 'Data wes ketemu COK!!!');

            else
            return ResponseFormatter::error(null, 'Data ora ketemu COK!!!', 404);

        }

        if($slug)
        {
            $product = Products::with('galleries')->where('slug', $slug)->first();

            if($product)
            return ResponseFormatter::success($product, 'Data wes ketemu COK!!!');

            else
            return ResponseFormatter::error(null, 'Data ora ketemu COK!!!', 404);

        }

        $product = Products::with('galleries');

        if($name)
            $product->where('name', 'like', '%' . $name . '%');

        if($type)
            $product->where('type', 'like', '%' . $type . '%');

        if($price_from)
            $product->where('price', '>=', $price_from);

        if($price_to)
            $product->where('price', '<=', $price_to);

        return ResponseFormatter::success($product->paginate($limit), 'Data wes Ketemu COK!!');

    }
}
