<?php

namespace App\Http\Livewire\Admin\League;

use App\Models\League;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $league;

    public $name;
    public $status;
    
    protected $rules = [
        'name' => 'required|min:3|max:50',        
    ];

    public function mount(League $League){
        $this->league = $League;
        $this->name = $this->league->name;
        $this->status = $this->league->status;        
    }

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function update()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('UpdatedMessage', ['name' => __('League') ]) ]);
        
        $this->league->update([
            'name' => $this->name,
            'status' => $this->status,
            'user_id' => auth()->id(),
        ]);
    }

    public function render()
    {
        return view('livewire.admin.league.update', [
            'league' => $this->league
        ])->layout('admin::layouts.app', ['title' => __('UpdateTitle', ['name' => __('League') ])]);
    }
}
