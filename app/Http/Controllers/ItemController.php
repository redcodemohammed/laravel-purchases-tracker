<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Product;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // TODO: remove this
        return [];
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "qty" => "required|integer|max:25|min:1",
            "product_id" => "required|exists:products,id",
            "purchase_id" => "required|exists:purchases,id"
        ]);

        $product = Product::find($request->product_id);

        if($product->qty < $request->qty) {
            // this item is out of stock
            return response()->json(['error' => "$product->name is out of the stock"], 400);
        }

        // reduce the current qty of the product by the request amount
        $product->qty -= $request->qty;
        $product->save();

        $cost = $product->price * $request->qty;


        $item = new Item($validated);
        $item->cost = $cost;

        $item->save();

        return $item;
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        return $item;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Item $item)
    {
        $request->validate([
            "qty" => "required|integer|max:25|min:1",
        ]);

        $product = Product::find($item->product_id);
        $increaseAmount = $request->qty - $item->qty;
        // check if the user increased the qty
        if($request->qty > $item->qty) {
            if($increaseAmount > $product->qty) {
                // this item is out of stock
                return response()->json(['error' => "$product->name is out of the stock"], 400);
            }
        }

        $product->qty -= $increaseAmount;
        $product->save();

        $cost = $product->price * $request->qty;

        $item->qty += $increaseAmount;
        $item->cost = $cost;

        $item->save();

        return $item;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        $product = Product::find($item->product_id);
        $product->qty += $item->qty;
        $product->save();

        $item->delete();

        return $item;
    }
}
