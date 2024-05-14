<?php

namespace App\Http\Livewire\Admin\Equipment;

use App\Models\Equipment;
use Livewire\Component;

class Single extends Component
{

    public $equipment;

    public function mount(Equipment $Equipment){
        $this->equipment = $Equipment;
    }

    public function delete()
    {
        $this->equipment->delete();
        $this->dispatchBrowserEvent('show-message', ['type' => 'error', 'message' => __('DeletedMessage', ['name' => __('Equipment') ]) ]);
        $this->emit('equipmentDeleted');
    }

    public function render()
    {
        return view('livewire.admin.equipment.single')
            ->layout('admin::layouts.app');
    }
}
