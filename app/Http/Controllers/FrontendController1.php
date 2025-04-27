<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class FrontendController1 extends Controller
{
    public function index(){
        $categories = Category::where('status', '0')->take(12)->get();
        $productFeatured = Product::where('status', '0')->where('featured', '1')->take(12)->get();
        $productTreading = Product::where('status', '0')->where('trending', '1')->take(12)->get();
        $productLatest = Product::where('status', '0')->take(12)->latest()->get();
        // $productLatest = Product::where('status', '0')->where('treading', '1')->take(12)->get();
        return view('frontend.index', compact([
            'categories','productFeatured', 'productTreading', 'productLatest'
        ]));
    }
    public function detail(){
        return view('frontend.detail');
    }
    public function contact(){
        return view('frontend.contact');
    }
    public function shop(){
        return view('frontend.shop');
    }
    public function cart(){
        return view('frontend.cart');
    }
    public function order(){
        return view('frontend.order');
    }
    public function category(){

        $categories = Category::where('status', '0')->get();
        // $productCount = Product::where('category_id', $categories->id)->count();

        return view('frontend.collections.category.index', compact('categories'));
    }
    public function check_out(){
        return view('frontend.check-out');
    }


    public function product($category_slug){
        $category = Category::where('slug', $category_slug)->first();
        if($category){
            $products = $category->products()->get();
            return view('frontend.collections.products.index', compact(['category', 'products']));
        }else{
            return redirect()->back();
        }
    }


    public function productView($category_slug, $product_slug)
    {
        $category = Category::where("slug", $category_slug)->first();

        if($category){
$product = $category->products()->where('slug', $product_slug)->first();
// dd($product);
if($product){
    return view('frontend.collections.products.view', compact([
        'category',
        'product'
    ]));

}else{
   return redirect()->back();
}
        }else{
return redirect()->back();
        }
    }


}
