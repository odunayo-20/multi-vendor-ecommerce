<?php

namespace App\Livewire\Frontend\Product;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;


class Index extends Component
{
    use WithPagination;
    public $category, $products=[];
    public $perPage = 5;

public function mount($category){
    $this->category = $category;
}


public function loadMore(){
    $this->perPage += 1;
}

    public function render()
    {
// $this->products = Product::where('category_id', $this->category->id)->where('status', '0')->paginate($this->perPage)->withQueryString();
$this->products = Product::where('category_id', $this->category->id)->where('status', '0')->get();
        return view('livewire.frontend.product.index', [
            'products'=> $this->products,
            'category' => $this->category,
        ]);
    }
}
