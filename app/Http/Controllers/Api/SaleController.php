<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SaleRequest;
use App\Http\Resources\SaleResource;
use App\Models\Cart;
use App\Models\Sale;
use App\Models\SaleDetail;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index()
    {
        $sales = Sale::with('customer', 'sale_details.product')->get();
        return SaleResource::collection($sales);
    }

    public function count()
    {
        $sales = Sale::count();
        return $sales;
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required',
        ]);

        // Check if cart is empty
        if (Cart::count() == 0) {
            return response()->json([
                'message' => 'Cart is empty'
            ], 422);
        }

        $sale = new Sale();
        $sale->customer_id = $request->customer_id;
        $sale->save();
        $sale->invoice_no = 'INV-' . $sale->id;
        $sale->save();
        $grand_total = 0;

        $carts = Cart::all();
        foreach ($carts as $cart) {
            $sale_detail = new SaleDetail();
            $sale_detail->product_id = $cart->product_id;
            $sale_detail->sale_id = $sale->id;
            $sale_detail->qty = $cart->qty;
            $grand_total += $cart->product->price * $cart->qty;
            $sale_detail->save();
        }
        $sale->grand_total = $grand_total;
        $sale->save();

        $carts = Cart::all();
        foreach($carts as $cart) {
            $cart->delete();
        }

        return new SaleResource($sale);
    }

    public function show($id)
    {
        $sale = Sale::with('customer', 'sale_details', 'sale_details.product')->findOrFail($id);
        return new SaleResource($sale);
    }

    public function destroy(Sale $sale)
    {
        $sale->sale_details()->delete();
        $sale->delete();

        return response()->noContent();
    }
}
