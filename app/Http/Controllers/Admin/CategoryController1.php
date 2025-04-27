<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'meta_title' => 'required',
            'meta_description' => 'required',
            'meta_keyword' => 'required',
            'description' => 'required',
            'category_image' => 'required',
        ]);
        $category_image = null;
        if( $request->hasFile('category_image') ){
            $path = 'images/category/';
            $file = $request->file('category_image');
            $filename = 'CIMG_'.time().uniqid().'.'.$file->getClientOriginalExtension();

            $maxWidth = 380;
            $maxHeight = 380;
            $full_path = $path.$filename;
            $image = Image::make($file->path());

            $image->height() > $image->width() ? $maxWidth = null : $maxHeight = null;
            $image->fit($maxWidth, $maxHeight, function($constraint){
                $constraint->upsize();
            });
            $upload = $image->save($full_path);

            // $upload = $file->move(public_path($path), $filename);
            if( $upload ){
                $category_image = $filename;
            }
        }
        $category = Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->slug),
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_keyword' => $request->meta_keyword,
            'status' => $request->status == true ? '1': '0',
            'description' => $request->description,
            'image' => $category_image,
        ]);

        session()->flash('success', 'Category Successfully Created');
        return redirect(route('category.index'));
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
        $category = Category::findOrFail($id);
        dd($category);
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
        // $
    }
}
