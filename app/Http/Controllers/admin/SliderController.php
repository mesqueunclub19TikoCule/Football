<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Slider;
use Illuminate\Http\Request;
use Validator;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = Slider::orderBy('position', 'asc')->get();
        return view('admin.slider-list', compact('images'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/slider-add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate
        $valid = Validator::make($request->all(), [
            'images' => 'required',
            'images.*' => 'image|mimes:jpeg,jpg,png,gif|max:2048'
        ]);
        // Redirect
        if ($valid->fails()) {
            return redirect()->route('slider.create')->withErrors($valid);
        }
        // Copy to my directory && Save to data base
        if ($request->hasfile('images')) {
            foreach ($request->file('images') as $image) {
                $name = $image->getClientOriginalName();
                $image->move(public_path() . '/images/', $name);

                $slider = new Slider();
                $slider->name = $name;

                if ($slider->save()) {
                    if ($slider->id == 0) {
                        $slider->position = 1;
                        $slider->save();
                    } else {
                        $slider->position = $slider->id;
                        $slider->save();
                    }
                };
            }
            return redirect('res_admin/slider')->with('status', 'Your images has been successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }


    public function change_image_order(Request $request)
    {
        $position = 1;
        foreach ($request->ids as $id) {
            Slider::where('id',$id)->update(['position'=>$position]);
            $position++;
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = Slider::find($id);
        if ($image->delete()) {
            return redirect('res_admin/slider');
        };
    }
}
