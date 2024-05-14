<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $product;

    public $description;
    public $stock;
    public $price;
    
    protected $rules = [
        'description' => 'required|min:3|max:50',
        'stock' => 'required|min:0',        
    ];

    public function mount(Product $Product){
        $this->product = $Product;
        $this->description = $this->product->description;
        $this->stock = $this->product->stock;
        $this->price = $this->product->price;        
    }

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function update()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('UpdatedMessage', ['name' => __('Product') ]) ]);
        
        $this->product->update([
            'description' => $this->description,
            'stock' => $this->stock,
            'price' => $this->price,
            'user_id' => auth()->id(),
        ]);
    }

    public function render()
    {
        return view('livewire.admin.product.update', [
            'product' => $this->product
        ])->layout('admin::layouts.app', ['title' => __('UpdateTitle', ['name' => __('Product') ])]);
    }
}
