<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Orders as Orders;
use App\Product as Product;
use DB;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo "ok";
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
 
        if(!empty($result)) {
            $orderId = $result->id;
            $product = Product::find($request->id);
            $result->products()->attach($product, ['quantity' => 10]);
            echo "same order";
            // needs where the order_id == the order
            $query = DB::table('products')
            ->join('orders_product', 'products.id', '=', 'orders_product.product_id')
            ->select(DB::raw('sum(price * quantity) as total'))
            ->where('orders_id', $orderId)
            ->first();
            $result->total = $query->total;
            $result->save();
        }
        elseif(empty($result)) {
            //create new order
            $order = Orders::create(['user_id' => $id, 'delivery_id' => 2, 'payment_type' => 1, 'total' =>  0 ]);
            // find the requested product and attach it to it order_product.
            $product = Product::find($request->id);
            $order->products()->attach($product, ['quantity' => 10]);
            // query to total and update the value
            echo "Nouvelle commande";    
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
        //
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
        //
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
