<?php

namespace App\Http\Controllers;

use App\Staff;
use App\Category;
use App\Slider;
use Mail;
use App\Mail\TestMail;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    function get_all(){
        $staff = Staff::all();
        $category = Category::all();
        $slider = Slider::orderBy('position','asc')->get();
        return view('welcome',compact('staff','category','slider'));

    }
   public function send(Request $request){
       Mail::send(new TestMail($request->all()));
       return redirect()->back()->with('status', 'Message successfully sending !!!');
    }
}


