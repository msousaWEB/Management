<?php

namespace App\Http\Controllers;

use App\Ordered;
use App\OrderedProduct;
use App\Product;
use Illuminate\Http\Request;

class OrderedProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Ordered $ordered)
    {
        $products = Product::all();
        // $ordered->products;
        return view('app.ordered_product.create', ['ordered' => $ordered, 'products' => $products]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Ordered $ordered)
    {
        $rules = [
            'product_id' => 'exists:products,id'
        ];

        $feedback = [
            'product_id.exists' => 'O produto informado não existe'
        ];

        $request->validate($rules, $feedback);

        $oreredProduct = new OrderedProduct();
        $oreredProduct->ordered_id = $ordered->id;
        $oreredProduct->product_id = $request->get('product_id');
        $oreredProduct->save();

        return redirect()->route('ordered-product.create', ['ordered' => $ordered->id]);
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
