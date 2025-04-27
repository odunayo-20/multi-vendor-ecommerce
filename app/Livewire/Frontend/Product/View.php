<?php

namespace App\Livewire\Frontend\Product;

use App\Models\Product;
use Livewire\Component;

class View extends Component
{

    public $product, $category;
    public $quantityCount = 1;
    public $productSelectedQuantity;
    public $productColorId;


    public function mount($category, $product){
$this->product = $product;
$this->category = $category;
    }


public function incrementQuantity(){
    
}
public function decrementQuantity(){

}
public function addToCart($productId){
if($this->product = Product::where('id', $productId)->where('status', '0')->exists()){
// dd("jnkdfdkjf");



}


}






    public function render()
    {
        return view('livewire.frontend.product.view', [
            'category' => $this->category,
            'product' => $this->product,
        ]);
    }
}
