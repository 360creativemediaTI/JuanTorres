<?php

namespace App\Http\Livewire\Admin\Player;

use App\Models\Player;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $name;
    public $last_name;
    public $age;
    public $status;
    
    protected $rules = [
        'name' => 'required|min:3|max:50',
        'last_name' => 'required|min:3|max:50',        
    ];

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function create()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('CreatedMessage', ['name' => __('Player') ])]);
        
        Player::create([
            'name' => $this->name,
            'last_name' => $this->last_name,
            'age' => $this->age,
            'status' => $this->status,
            'user_id' => auth()->id(),
        ]);

        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.player.create')
            ->layout('admin::layouts.app', ['title' => __('CreateTitle', ['name' => __('Player') ])]);
    }
}
