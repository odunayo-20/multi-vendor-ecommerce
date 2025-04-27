<?php

namespace App\Livewire\Admin\Size;

use App\Models\Size;
use Livewire\Component;
use Illuminate\Support\Str;

class Index extends Component
{


    public $name, $status, $size;


public function storeSize(){
    $this->validate([
        'name' => 'required|string|unique:sizes,name',
    ]);

    Size::create([
        'name' => Str::upper($this->name),
        'status' => $this->status == true ? '1': '0',
    ]);

    session()->flash('success', 'Color Successfully Created');
    $this->reset();
    $this->dispatch('close-modal');
}

public function editSize(Size $size){
$this->size = $size;
$this->name = $size->name;
$this->status = $size->status == '1' ? true : false;
}



public function updateSize(){
    $this->validate([
        'name' => "required|string",
    ]);

    // dd($this->size);

    $this->size->update([
        'name' => Str::upper($this->name),
        'status' => $this->status == true ? '1' : '0',
    ]);
    session()->flash('success', value: 'Size Successfully Updated');
    $this->reset();
    $this->dispatch('close-modal');

}

public function deleteSize($size){
    $this->size = $size;
}

public function destroySize(){
    Size::findOrFail($this->size)->delete();
    session()->flash('success', 'Size Successfully Deleted');
    $this->dispatch('close-modal');
}


    public function render()
    {
        $sizes = Size::latest()->paginate(10);
        return view('livewire.admin.size.index', compact('sizes'))->extends('layouts.auth-layout')->section('content');
    }





}
