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
            $filename = "CIMG_".time().uniqid().'.'.$file->getClientOriginalExtension();


            $full_path = $path.$filename;
            $resize = Image::make($request->category_image)->resize(1000,1000);


            $upload = $resize->save($full_path);

            if( $upload ){
                $category_image = $full_path;
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
        return redirect(route('admin.category'));
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
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'name' => "required|unique:categories,name,$id",
            'slug' => "required|unique:categories,slug,$id",
            'meta_title' => 'required',
            'meta_description' => 'required',
            'meta_keyword' => 'required',
            'description' => 'required',
            // 'category_image' => 'required',
            ]
        );

        $category = Category::findOrFail($id);
        $category_image = null;
        if( $request->hasFile('category_image') ){
            $path_old = $category->image;
            if(File::exists($path_old)){
                File::delete($path_old);
            }
            $path = 'images/category/';
            $file = $request->file('category_image');
            $filename = "CIMG_".time().uniqid().'.'.$file->getClientOriginalExtension();

            $full_path = $path.$filename;
            $resize = Image::make($request->category_image)->resize(1000,1000);
            $upload = $resize->save($full_path);

            if( $upload ){
                $category_image = $full_path;
            }
        }else{
            $category_image = $category->image;
        }
        $category->name = $request->name;
    $category->slug = Str::slug($request->slug);
    $category->description = $request->description;
    $category->image = $category_image;
    $category->meta_title = $request->meta_title;
    $category->meta_description = $request->meta_description;
    $category->meta_keyword = $request->meta_keyword;
    $category->status = $request->status == true ? '1' : '0';
    $category->update();
    return redirect(route('admin.category'))->with('success', 'Category Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        $path_old = $category->image;
            if(File::exists($path_old)){
                File::delete($path_old);
            }
        $category->delete();
        session()->flash('success', 'Category Successfully Deleted');
        return redirect()->back();

    }
}
