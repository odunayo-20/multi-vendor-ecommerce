<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Models\Color;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Size;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::where('status', '0')->latest()->get();
        $brands = Brand::where('status', '0')->latest()->get();
        $colors = Color::where('status', '0')->latest()->get();
        $sizes = Size::where('status', '0')->latest()->get();

        return view('admin.product.create', compact(['categories', 'brands', 'colors', 'sizes']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'name' => 'required|string',
            'category_id' => 'required|integer',
            'brand_id' => 'required|integer',
            'slug' => 'required|string',
            'small_description' => 'required|string',
            'description' => 'required|string',
            // 'image' => 'nullable|mimes:png,jpg,jpeg',
            'meta_title' => 'required|string',
            'meta_keyword' => 'required|string',
            'meta_description' => 'required|string',
            'original_price' => 'required|integer',
            'selling_price' => 'required|integer',
            'quantity' => 'required|integer',
            'trending' => 'nullable',
            'status' => 'nullable',
        ]);

        $category = Category::findOrFail($request->category_id);

        $product = $category->products()->create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'brand_id' => $request->brand_id,
            'slug' => Str::slug($request->slug),
            'small_description' => $request->small_description,
            'description' => $request->description,
            'meta_title' => $request->meta_title,
            'meta_keyword' => $request->meta_keyword,
            'meta_description' => $request->meta_description,
            'original_price' => $request->original_price,
            'selling_price' => $request->selling_price,
            'quantity' => $request->quantity,
            'trending' => $request->trending == true ? '1' : '0',
            'status' => $request->status == true ? '1' : '0',

        ]);

        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $imageFile) {

                $i = 0;
                $uploadPath = 'images/';
                $request->validate(['image*' => 'nullable|mimes:png,jpg,jpeg']);
                $ext = $imageFile->getClientOriginalExtension();
                $filename = 'PIMG_'.$i++.time() . '.' . $ext;
                $full_path = $uploadPath . $filename;
                $resize = Image::make($imageFile)->resize(1000, 1000);
                $upload = $resize->save($full_path);
                if ($upload) {

                    $finalImagePathName = $full_path;
                    $product->productImages()->create([
                        'product_id' => $product->id,
                        'image' => $finalImagePathName,
                    ]);
                }


            }
        }

        if ($request->has('colors')) {
            foreach ($request->colors as $key => $color) {
                // $request->validate([
                //     'color_id'
                // ])
                $product->productColors()->create([
                    'color_id' => $color,
                    'product_id' => $product->id,
                    'quantity' => $request->color_quantity[$key] ?? 0,
                ]);
            }
        }

        if ($request->has('sizes')) {
            foreach ($request->sizes as $key => $size) {
                // $request->validate([
                //     'color_id'
                // ])
                $product->productSizes()->create([
                    'size_id' => $size,
                    'product_id' => $product->id,
                    'quantity' => $request->size_quantity[$key] ?? 0,
                ]);
            }
        }

        session()->flash('success', 'Product Successfully created');

        return redirect(route('admin.product'));
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
        $product = Product::findOrFail($id);
        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        $colors = Color::latest()->get();

        return view('admin.product.edit', compact(['product', 'brands', 'categories', 'colors']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'category_id' => 'required|integer',
            'brand_id' => 'required|integer',
            'slug' => 'required|string',
            'small_description' => 'required|string',
            'description' => 'required|string',
            'meta_title' => 'required|string',
            'meta_keyword' => 'required|string',
            'meta_description' => 'required|string',
            'original_price' => 'required|integer',
            'selling_price' => 'required|integer',
            'quantity' => 'required|integer',
            'trending' => 'nullable',
            'featured' => 'nullable',
            'status' => 'nullable',
        ]);
        $product = Category::findOrFail($request->category_id)->products()->where('id', $id)->first();

        if ($product) {
            # code...
            $product->name = $request->name;
            $product->category_id = $request->category_id;
            $product->brand_id = $request->brand_id;
            $product->slug = Str::slug($request->slug);
            $product->small_description = $request->small_description;
            $product->description = $request->description;
            $product->meta_title = $request->meta_title;
            $product->meta_keyword = $request->meta_keyword;
            $product->meta_description = $request->meta_description;
            $product->original_price = $request->original_price;
            $product->selling_price = $request->selling_price;
            $product->quantity = $request->quantity;
            $product->trending = $request->trending == true ? '1' : '0';
            $product->featured = $request->featured == true ? '1' : '0';
            $product->status = $request->status == true ? '1' : '0';
            $product->update();
            $i = 0;
            if ($request->hasFile('image')) {
                $uploadPath = 'uploads/Products/';
                foreach ($request->file('image') as $imageFile) {
                    $request->validate(['image*' => 'nullable|mimes:png,jpg,jpeg']);

                    $uploadPath = 'images/';
                $ext = $imageFile->getClientOriginalExtension();
                $filename = 'PIMG_'.$i++.time() . '.' . $ext;
                $full_path = $uploadPath . $filename;
                $resize = Image::make($imageFile)->resize(1000, 1000);
                $upload = $resize->save($full_path);
                if ($upload) {

                    $finalImagePathName = $full_path;
                    $product->productImages()->create([
                        'product_id' => $product->id,
                        'image' => $finalImagePathName,
                    ]);
                }

                }
            }

            if ($request->has('colors')) {
                foreach ($request->colors as $key => $color) {
                    $product->productColors()->create([
                        'color_id' => $color,
                        'product_id' => $product->id,
                        'quantity' => $request->color_quantity[$key] ?? 0,
                    ]);
                }
            }

            session()->flash('success', 'Product Successfully Updated');
            return redirect(route('admin.product'));
        } else {
            session()->flash('error', 'No such product id found');
            return redirect(route('admin.product'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // dd($id);
        $product = Product::findOrFail($id);
        if ($product->productImages) {
            foreach ($product->productImages as $image) {
                if (File::exists($image->image)) {
                    File::delete($image->image);
                }
                $image->delete();
            }
        }

        if ($product->productColors) {
            foreach ($product->productColors as $color) {
                $color->delete();
            }
        }
        $product->delete();
        session()->flash('success', 'Product Successfully Deleted');
        return redirect()->back();
    }


    public function removeImage(ProductImage $image)
    {
        if (File::exists($image->image)) {
            File::delete($image->image);
        }
        $image->delete();
        session()->flash('success', 'Image successfully Removed');
        return redirect()->back();
    }
}
