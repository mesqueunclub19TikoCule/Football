<?php

namespace App\Http\Controllers\admin;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category= Category::all();
        return view('admin.category-list',compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category-add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs = $request->except('_token');

        // Validate
        $valid = Validator::make($request->all(), [
            'name' => 'required|min:3|max:255',
        ]);
        // Redirect
        if ($valid->fails()) {
            return redirect()->route('category.create')->withErrors($valid)->withInput();
        }



        // Save in data base
        $new_category = new Category;
        $new_category->fill($inputs);
        if ($new_category->save()) {
            return redirect('/res_admin/category')->with('status', 'Category successfully added !!!');
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
        $cat = Category::find($id);
        return view('admin.category-edit',compact('cat'));
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
        ]);
        if ($valid->fails()) {
            return redirect()->route('category.edit', $id)->withErrors($valid)->withInput();
        }
        $update_category = Category::find($id);
        $update_category->fill($inputs);
        if ($update_category->update()) {
            return redirect('/res_admin/category')->with('status', 'Category successfully updated !!!');
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
        $product = Product::where('category_id',$id)->get();
        foreach ($product as $prod){
            $prod->delete();
        }
        $cat=Category::find($id);
        if($cat->delete()){
            return redirect('res_admin/category');
        };
    }
}
