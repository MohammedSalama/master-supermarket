<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $product = Product::all();
        $products = Product::latest()->paginate(5);
        return view('products.index', compact('products'));
    }

    public function trashedProducts()
    {
        // $products = Product::withTrashed()->latest()->paginate(5);
        $products = Product::onlyTrashed()->latest()->paginate(5);

        return view('products.trash', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
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
            'name'=>'required',
            'price'=>'required',
            'detail'=>'required'
        ]);

        $products = Product::create($request->all());
        return redirect()->route('products.index')
        ->with('success','product added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate(
            [
                'name'=>'required',
                'price'=>'required',
                'detail'=>'required'
            ]

        );
        $product->update($request->all());
        return redirect()->route('products.index')
        ->with('success','product updated succcessfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')
        ->with('success','product Deleted Succcessfully');
    }

    public function softDelete($id)
    {
        $products = Product::find($id)->delete();

        return redirect()->route('products.index')
        ->with('success','product Deleted Succcessfully');
    }

    public function deleteforEver($id)
    {
        $products = Product::onlyTrashed()->where('id' , $id)->forceDelete();

        return redirect()->route('products.trash')
        ->with('success','product Deleted Succcessfully');
    }

    public function backFromSoftDelete($id)
    {

       $products = Product::onlyTrashed()->where('id' , $id)->first()->restore();

        return redirect()->route('products.index')
        ->with('success','product Restored Succcessfully');
    }

}
