<?php

namespace App\Http\Livewire\Gudang;

use Livewire\Component;

// models
use App\Models\Stock;
use Auth;

class GudangCreate extends Component
{
    public $qty_stock, $name;
    public function resetinput()
    {
        $this->qty_stock = null;
        $this->name = null;
    }

    public function render()
    {
        return view('livewire.gudang.gudang-create');
    }
    public function store()
    {
        $this->validate([
            'name' => 'required|string|max:255|min:3',
            'qty_stock' => 'required|integer',
        ]);

        $permission = auth()->user()->currentTeam;
        
        if(auth()->user()->hasTeamPermission($permission, 'create') != 1){
            session()->flash('message', 'You Dont Have Permission');
        }else{
            $stock = Stock::where('name', $this->name)->first();
            if ($stock) {
                Stock::find($stock->id)->update([
                    'qty_stock' => $stock->qty_stock + $this->qty_stock,
                ]);
            }else{
                Stock::create([
                    'name' => $this->name,
                    'qty_stock' => $this->qty_stock,
                 ]);
            }
            session()->flash('success', 'Create Successfully!!');
        }
        
        //          
       

        $this->resetinput();
        //listener
        $this->emit('cartAdded');
    }
}
