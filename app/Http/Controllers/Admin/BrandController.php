<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::all();
        return view('admin.brand.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get();
        return view('admin.brand.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
       $validated = $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'category_id' => 'required',
        ]);
$brand= Brand::create([
    'name' => $request->name,
    'slug' => Str::slug( $request->slug),
    'category_id' => $request->category_id,
    'status' => $request->status == 0 ? 'visible' : 'hidden',
]);
session()->flash('success', 'Brand Successfully Created');
return redirect(route('brand.index'));

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
$brand = Brand::findOrFail($id);
$brand->delete();
session()->flash('success', 'Brand Successfully Created');
return redirect()->back();
    }
}
