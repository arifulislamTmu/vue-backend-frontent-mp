<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Pos;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    function AddToCart($id)
    {
        $product = Product::find($id);
        $check = Pos::where('pro_id', $id)->first();
        if ($check) {
            Pos::where('pro_id', $id)->increment('product_qty');
            $check = Pos::where('pro_id', $id)->first();
            // dd($check->id , $id);
            $pos = Pos::find($check->id);
            $pos->sub_total = $check->product_qty * $check->product_price;
            $pos->save();
        } else {
            $cart = new Pos;
            $cart->pro_id = $id;
            $cart->product_name = $product->name;
            $cart->product_price = $product->selling_price;
            $cart->product_qty = 1;
            $cart->sub_total = $product->selling_price;
            $cart->save();
        }
    }

    function removeToCart($id)
    {
        return  Pos::find($id)->delete();
    }

    function IncrementCart($id)
    {
        Pos::where('id', $id)->increment('product_qty');
        $increment = Pos::where('id', $id)->first();
        $pos = Pos::find($id);
        $pos->sub_total = $increment->product_qty * $increment->product_price;
        $pos->save();

        return response()->json($increment->product_qty);
    }
    function decrementCart($id)
    {
        $check = Pos::where('id', $id)->first();
        if ($check->product_qty > 1) {
            Pos::where('id', $id)->decrement('product_qty');
            $check = Pos::where('id', $id)->first();
            $pos = Pos::find($id);
            $pos->sub_total = $check->product_qty * $check->product_price;
            $pos->save();
        } else {
            return response()->json('Minimum 1 quantity');
        }
    }

    function orderDone(Request $request){
       $validData = $request->validate([
        'customerId' => 'required',
        'payBill' => 'required',
        ]);

        $order = new Order;
        $order->customerId = $request->customerId;
        $order->payBill = $request->payBill;
        $order->qty = $request->qty;
        $order->dueBill = $request->dueBill;
        $order->total = $request->total;
        $order->order_date = date('Y-m-d');
        $order->order_month = date('F');
        $order->order_year = date('Y');
        $order->save();
        $orderId = $order->id;

        $posData = Pos::get();
        foreach ($posData as $key => $value) {
             $orderDetails = new OrderDetails;
             $orderDetails->orderId = $orderId;
             $orderDetails->pro_id =  $value->pro_id;
             $orderDetails->product_name =  $value->product_name;
             $orderDetails->product_price =  $value->product_price;
             $orderDetails->product_qty =  $value->product_qty;
             $orderDetails->sub_total =  $value->sub_total;
             $orderDetails->save();

             $product = Product::where('id', $value->pro_id)->first();
             $product->product_quantity =  $product->product_quantity -  $value->product_qty;
             $product->save();
        }

        Pos::query()->delete();

        return "done";

    }
}
