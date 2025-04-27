<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function index()
    {

        return view('admin.index');
    }


    public function profile()
    {
        // $admin = Admin::get();
        return view('admin.Profile.index');
    }
    public function profileEdit(Request $request, $id)
    {
        // dd($id);
        $admin = Admin::findOrFail($id);

        $request->validate([
            'image' => 'nullable|mimes:png,jpg',
        ]);

        return redirect()->back();

    }


}
