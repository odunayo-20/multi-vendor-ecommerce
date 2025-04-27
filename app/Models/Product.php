<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];


    // public function productColors(){
    //     return $this->belongsTo(ProductColor::class);
    // }
    // public function productImages(){
    //     return $this->belongsTo(ProductImage::class);
    // }

    public function category(){
        return $this->belongsTo(Category::class, 'category_id','id');
    }

    public function brand(){
    return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }

    public function size(){
        return $this->belongsTo(Size::class, 'size_id', 'id');
    }

    
    public function productImages(){
            return $this->hasMany(ProductImage::class, 'product_id', 'id');
        }

        public function productColors(){
            return $this->hasMany(ProductColor::class, 'product_id', 'id');
        }
        public function productSizes(){
            return $this->hasMany(ProductSize::class, 'product_id', 'id');
        }



}
