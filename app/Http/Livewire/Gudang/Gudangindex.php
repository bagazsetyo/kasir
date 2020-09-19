<?php

namespace App\Http\Livewire\Gudang;

use Livewire\Component;
// models
use App\Models\Stock;
//plugin
use Livewire\WithPagination;

class Gudangindex extends Component
{
    use WithPagination;

    public $search, $id_stock, $name, $qty_stock;
    public $updateMode = false;

    protected $updatesQueryString = ['search'];

    //listener update data realtime
    protected $listeners = ['cartAdded'];

    //listener
    public function cartAdded()
    {
        // $this->addedMessageVisible = true;
        $this->cartAdded = Stock::all();
    }

    public function render()
    {
        if ($this->search !== null) {
            $items = Stock::where('name','like','%'.$this->search.'%')
                            ->orWhere('qty_stock','like','%'.$this->search.'%')
                            ->orWhere('use_stock','like','%'.$this->search.'%')
                            ->orderBy('updated_at', 'desc')
                            ->paginate(10);
        }else
        {
            $items = Stock::orderBy('updated_at', 'desc')->paginate(10);
        }
        return view('livewire.gudang.gudangindex')->with([
            'items' => $items,
        ]);
    }
    public function destroy($id)
    {
        
        $permission = auth()->user()->currentTeam;
        if(auth()->user()->hasTeamPermission($permission, 'delete') != 1){
            session()->flash('message', 'You Dont Have Permission');
        }
        else
        {
            Stock::find($id)->delete();
            session()->flash('success', 'Delete Successfully!!');
        }       
    }
}
