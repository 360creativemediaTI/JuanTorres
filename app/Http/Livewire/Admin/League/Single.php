<?php

namespace App\Http\Livewire\Admin\League;

use App\Models\League;
use Livewire\Component;

class Single extends Component
{

    public $league;

    public function mount(League $League){
        $this->league = $League;
    }

    public function delete()
    {
        $this->league->delete();
        $this->dispatchBrowserEvent('show-message', ['type' => 'error', 'message' => __('DeletedMessage', ['name' => __('League') ]) ]);
        $this->emit('leagueDeleted');
    }

    public function render()
    {
        return view('livewire.admin.league.single')
            ->layout('admin::layouts.app');
    }
}
