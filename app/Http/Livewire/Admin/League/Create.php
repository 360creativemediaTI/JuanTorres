<?php

namespace App\Http\Livewire\Admin\League;

use App\Models\League;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $name;
    public $status;
    
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

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('CreatedMessage', ['name' => __('League') ])]);
        
        League::create([
            'name' => $this->name,
            'status' => $this->status,
            'user_id' => auth()->id(),
        ]);

        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.league.create')
            ->layout('admin::layouts.app', ['title' => __('CreateTitle', ['name' => __('League') ])]);
    }
}
