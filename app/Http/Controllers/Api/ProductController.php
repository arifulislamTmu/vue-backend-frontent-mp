<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    public function index()
    {
        $products = DB::table('products')
                       ->join('categories','products.category_id', 'categories.id')
                       ->join('suppliers','products.supplier_id', 'suppliers.id')
                       ->select('categories.category_name', 'suppliers.name as sup_name', 'products.*')
                       ->orderBy('products.id',"DESC")
                       ->get();
                       return response()->json($products);

    }

    public function store(Request $request)
    {
        $validData = $request->validate([
            'name' => 'required',
            'product_code' => 'required',
            'root' => 'required',
            'buying_price' => 'required',
            'buying_date' => 'required',
            'selling_price' => 'required',
            'product_quantity' => 'required',
        ]);
        $product = new Product;
        $product->name = $request->name;
        $product->root = $request->root;
        $product->product_code = $request->product_code;
        $product->category_id = $request->category_id;
        $product->supplier_id = $request->supplier_id;
        $product->buying_price = $request->buying_price;
        $product->buying_date = $request->buying_date;
        $product->selling_price = $request->selling_price;
        $product->product_quantity = $request->product_quantity;

        if ($request->photo) {
            $position = strpos($request->photo, ';');
            $sub = substr($request->photo, 0, $position);
            $ext = explode('/', $sub)[1];
            $name = time() . "." . $ext;
            $img = Image::make($request->photo)->resize(240, 240);
            $upload_path = "backend/product/";
            $img_url = $upload_path . $name;
            $img->save($img_url);
            $product->photo = $img_url;
        }

       return $product->save();

    }

    public function show(string $id)
    {
       return $product = Product::findOrFail($id);
    }

    public function update(Request $request, string $id)
    {
     
        $validData = $request->validate([
            'name' => 'required',
            'product_code' => 'required',
            'root' => 'required',
            'buying_price' => 'required',
            'buying_date' => 'required',
            'selling_price' => 'required',
            'product_quantity' => 'required',
        ]);

        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->root = $request->root;
        $product->product_code = $request->product_code;
        $product->category_id = $request->category_id;
        $product->supplier_id = $request->supplier_id;
        $product->buying_price = $request->buying_price;
        $product->buying_date = $request->buying_date;
        $product->selling_price = $request->selling_price;
        $product->product_quantity = $request->product_quantity;

        if ($request->newPhoto) {
            if( $request->photo){
                unlink($request->photo);
            }
            $position = strpos($request->newPhoto, ';');
            $sub = substr($request->newPhoto, 0, $position);
            $ext = explode('/', $sub)[1];
            $name = time() . "." . $ext;
            $img = Image::make($request->newPhoto)->resize(240, 240);
            $upload_path = "backend/product/";
            $img_url = $upload_path . $name;
            $img->save($img_url);
            $product->photo = $img_url;
        }
        $product->save();
    }


    public function destroy(string $id)
    {
        Product::find($id)->delete();
    }
}
