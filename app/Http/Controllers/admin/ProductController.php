<?php

namespace App\Http\Controllers\admin;

use App\Product;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product=Product::all();
        return view('admin\product-list',compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('admin/product-add',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = $request->except('_token');


        $valid = Validator::make($request->all(), [
            'name' => 'required|min:3|max:255',
            'desc' => 'required|min:10|max:255',
        ]);
        // Redirect
        if ($valid->fails()) {
            return redirect()->route('product.create')->withErrors($valid)->withInput();
        }
        // Copy avatar to my directory

        // Save in data base
        $new_product = new Product();
        $new_product->fill($product);
        if ($new_product->save()) {
            return redirect('/res_admin/product')->with('status', 'Product  successfully added !!!');
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
        $product = Product::find($id);
        $category = Category::all();
        return view('admin/product-edit',compact('product','category'));
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
        $inputs = $request->except(['_method', '_token']);

        // Validate
        $valid = Validator::make($request->all(), [
            'name' => 'required|min:3|max:255',
            'desc' => 'required|min:10|max:255',
        ]);
        // Redirect
        if ($valid->fails()) {
            return redirect()->route('product.edit', $id)->withErrors($valid)->withInput();
        }

        // Save in data base
        $update_product = Product::find($id);
        $update_product->fill($inputs);
        if ($update_product->update()) {
            return redirect('/res_admin/product')->with('status', 'Product successfully updated !!!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product=Product::find($id);
        if($product->delete()){
            return redirect('res_admin/product');
        };
    }
}
