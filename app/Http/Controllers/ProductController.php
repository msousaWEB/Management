<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductDetail;
use App\Unit;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = Product::paginate(10);

        // foreach($products as $p => $product){
        //     $productDetail = ProductDetail::where('product_id', $product->id)->first();

        //     if(isset($productDetail)){
        //         $products[$p]['length'] = $productDetail->length;
        //         $products[$p]['width']  = $productDetail->width;
        //         $products[$p]['height'] = $productDetail->height;
        //     }
        // }

        return view('app.product.index', ['products' => $products, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unit = Unit::all();
        return view('app.product.create', ['unit' => $unit]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|min:3|max:40',
            'description' => 'required|min:3|max:1000',
            'weight' => 'required|integer',
            'unit_id' => 'exists:units,id',
        ];

        $feedback = [
            'required'          => 'É nescessário preencher o campo :attribute.',
            'name.min'          => 'É nescessário conter no mínimo 3 caracteres.',
            'name.max'          => 'É nescessário conter no máximo 40 caracteres.',
            'description.min'   => 'A descrição deve conter no mínimo 3 caracteres.', 
            'description.max'   => 'A descrição deve conter no máximo 1000 caracteres.', 
            'weight.integer'    => 'O peso deve ser um número inteiro.', 
            'unit_id.exists'    => 'Esta unidade de medida não foi registrada!', 
        ];

        $request->validate($rules,$feedback);
        Product::create($request->all());
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('app.product.show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $unit = Unit::all();
        return view('app.product.edit', ['product' => $product, 'unit' => $unit]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product->update($request->all());
        return redirect()->route('product.show', ['product' => $product->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index');
    }
}
