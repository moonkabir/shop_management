<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function manage()
    {
        $products = product::all();
        return view('admin/product/index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/product/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'code' => ['required'],
            'category' => ['required','numeric'],
            'subcategory' => ['required','numeric'],
            'brand' => ['required','numeric'],
            'unit' => ['required','numeric'],
            'is_active' => ['required','numeric']
        ]);

        $product = new product();
        $product->product_id = $product->generateProductID();
        $product->name = $request->name;
        $product->code = $request->code;
        $product->category = $request->category;
        $product->subcategory = $request->subcategory;
        $product->brand = $request->brand;
        $product->unit = $request->unit;
        $product->min_qty = $request->min_qty;
        $product->is_active = $request->is_active;
        $product->save();

        return redirect()->route('ProductManage');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = product::find($id);
        return view('admin/product/update', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'code' => ['required'],
            'category' => ['required','numeric'],
            'subcategory' => ['required','numeric'],
            'brand' => ['required','numeric'],
            'unit' => ['required','numeric'],
            'is_active' => ['required','numeric']
        ]);

        $product = product::find($request->id);
        $product->name = $request->name;
        $product->code = $request->code;
        $product->category = $request->category;
        $product->subcategory = $request->subcategory;
        $product->brand = $request->brand;
        $product->unit = $request->unit;
        $product->min_qty = $request->min_qty;
        $product->is_active = $request->is_active;
        $product->save();

        return redirect()->route('ProductManage');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $product = product::find($request->id);
        $product->delete();
        return redirect()->route('ProductManage');
    }
}
