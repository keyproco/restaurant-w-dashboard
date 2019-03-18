<?php

namespace App\Http\Controllers;

use App\Events\UserConfirmedOrder;
use App\Orders as Orders;
use App\Product as Product;
use DB;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = auth()->user()->id;
        return Orders::where(['user_id' => $id])->get();

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = auth()->user()->id;
        $result = Orders::where(['user_id' => $id, 'confirmed' => false])->first();
        $quantity = $request->quantity;
        if (!empty($result)) {
            $orderId = $result->id;
            $product = Product::find($request->id);
            $result->products()->attach($product, ['quantity' => $quantity]);
            $query = DB::table('products')
                ->join('orders_product', 'products.id', '=', 'orders_product.product_id')
                ->select(DB::raw('sum(price * quantity) as total'))
                ->where('orders_id', $orderId)
                ->first();
            $result->total = $query->total;
            $result->save();
            return [
                'total' => $query->total,
                'product' => Orders::find($orderId)->products->find($request->id),
            ];

        } elseif (empty($result)) {
            //create new order
            $order = Orders::create(
                ['user_id' => $id,
                    'delivery_id' => 2,
                    'payment_type' => 1, 'total' => 0]);
            // find the requested product and attach it to it order_product.
            $product = Product::find($request->id);
            $order->products()->attach($product, ['quantity' => 1]);
            // query to total and update the value
            $query = DB::table('products')
                ->join('orders_product', 'products.id', '=', 'orders_product.product_id')
                ->select(DB::raw('sum(price * quantity) as total'))
                ->where('orders_id', $order->id
                )
                ->first();
            return [
                'total' => $query->total,
                'product' => Orders::find($order->id)->products->find($request->id),

            ];

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        echo "Hello from edit";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $order = Orders::findOrFail($id);
        $order->confirmed = true;
        $order->save();
        UserConfirmedOrder::dispatch($order->load('user'));
        return $order;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
