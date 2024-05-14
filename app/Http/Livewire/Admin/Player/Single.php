<?php

namespace App\Http\Livewire\Admin\Player;

use App\Models\Player;
use Livewire\Component;

class Single extends Component
{

    public $player;

    public function mount(Player $Player){
        $this->player = $Player;
    }

    public function delete()
    {
        $this->player->delete();
        $this->dispatchBrowserEvent('show-message', ['type' => 'error', 'message' => __('DeletedMessage', ['name' => __('Player') ]) ]);
        $this->emit('playerDeleted');
    }

    public function render()
    {
        return view('livewire.admin.player.single')
            ->layout('admin::layouts.app');
    }
}
