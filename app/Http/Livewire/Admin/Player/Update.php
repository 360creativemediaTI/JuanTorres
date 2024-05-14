<?php

namespace App\Http\Livewire\Admin\Player;

use App\Models\Player;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $player;

    public $name;
    public $last_name;
    public $age;
    public $status;
    
    protected $rules = [
        'name' => 'required|min:3|max:50',
        'last_name' => 'required|min:3|max:50',        
    ];

    public function mount(Player $Player){
        $this->player = $Player;
        $this->name = $this->player->name;
        $this->last_name = $this->player->last_name;
        $this->age = $this->player->age;
        $this->status = $this->player->status;        
    }

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function update()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('UpdatedMessage', ['name' => __('Player') ]) ]);
        
        $this->player->update([
            'name' => $this->name,
            'last_name' => $this->last_name,
            'age' => $this->age,
            'status' => $this->status,
            'user_id' => auth()->id(),
        ]);
    }

    public function render()
    {
        return view('livewire.admin.player.update', [
            'player' => $this->player
        ])->layout('admin::layouts.app', ['title' => __('UpdateTitle', ['name' => __('Player') ])]);
    }
}
