<?php

namespace App\Http\Controllers\Admin;

use App\Models\Color;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $colors = Color::all();
        return view('admin.color.index', compact('colors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.color.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|unique:colors,name',
            'code' => 'required|unique:colors,code',
        ]);

        Color::create([
            'name' => $request->name,
            'code' => $request->code,
            'status' => $request->status == 0 ? 'visible' : 'hidden',
        ]);
session()->flash('success', 'Color Successfully Created');

        return redirect(route('color.index'));

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // dd($id);

        $color =  Color::findOrFail($id);
        $color->delete();
        session()->flash('success', 'Color Successfully Deleted');
        return redirect(route('color.index'));
    }
}
