<?php

namespace App\Http\Livewire\Admin\Equipment;

use App\Models\Equipment;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $name;
    
    protected $rules = [
        'name' => 'required|min:3|max:50',        
    ];

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function create()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('CreatedMessage', ['name' => __('Equipment') ])]);
        
        Equipment::create([
            'name' => $this->name,
            'user_id' => auth()->id(),
        ]);

        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.equipment.create')
            ->layout('admin::layouts.app', ['title' => __('CreateTitle', ['name' => __('Equipment') ])]);
    }
}
