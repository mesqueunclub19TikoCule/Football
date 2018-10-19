<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Staff;
use Illuminate\Support\Facades\Validator;
class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $staff=Staff::all();
        return view('admin.staff-list',compact('staff'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.staff-add');
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
            'surname' => 'required|min:3|max:255',
            'img' => 'required|image|mimes:jpeg,jpg,png,gif|max:2048',
            'prof' => 'required|min:5|max:255',
            'desc' => 'required',
        ]);
        // Redirect
        if ($valid->fails()) {
            return redirect()->route('staff.create')->withErrors($valid)->withInput();
        }
        // Copy avatar to my directory
        if ($request->hasfile('img')) {
            $avatar = $request->file('img');
            $avatar->move(public_path() . '/images/', $avatar->getClientOriginalName());
            $inputs['img'] = $avatar->getClientOriginalName();
        }

        // Save in data base
        $new_staff_member = new Staff();
        $new_staff_member->fill($inputs);
        if ($new_staff_member->save()) {
            return redirect('/res_admin/staff')->with('status', 'Staff member successfully added !!!');
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
        $member = Staff::find($id);
        return view('admin.staff-edit',compact('member'));
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
            'surname' => 'required|min:3|max:255',
            'prof' => 'required|min:5|max:255',
            'desc' => 'required',
        ]);
        // Redirect
        if ($valid->fails()) {
            return redirect()->route('staff.edit', $id)->withErrors($valid)->withInput();
        }
        // Save avatar
        if ($request->hasfile('new_img')) {
            $avatar = $request->file('new_img');
            $avatar->move(public_path() . '/images/', $avatar->getClientOriginalName());
            $inputs['img'] = $avatar->getClientOriginalName();
            unset($inputs['new_img']);
        }
        // Save in data base
        $update_staff_member = Staff::find($id);
        $update_staff_member->fill($inputs);
        if ($update_staff_member->update()) {
            return redirect('/res_admin/staff')->with('status', 'Staff member successfully updated !!!');
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
        $bu=Staff::find($id);
        if($bu->delete()){
            return redirect('res_admin/staff');
        };
//        dd($id);

    }
}
