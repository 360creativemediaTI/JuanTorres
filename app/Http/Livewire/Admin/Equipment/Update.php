<?php

namespace App\Http\Livewire\Admin\Equipment;

use App\Models\Equipment;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $equipment;

    public $name;
    
    protected $rules = [
        'name' => 'required|min:3|max:50',        
    ];

    public function mount(Equipment $Equipment){
        $this->equipment = $Equipment;
        $this->name = $this->equipment->name;        
    }

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function update()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('UpdatedMessage', ['name' => __('Equipment') ]) ]);
        
        $this->equipment->update([
            'name' => $this->name,
            'user_id' => auth()->id(),
        ]);
    }

    public function render()
    {
        return view('livewire.admin.equipment.update', [
            'equipment' => $this->equipment
        ])->layout('admin::layouts.app', ['title' => __('UpdateTitle', ['name' => __('Equipment') ])]);
    }
}
