<?php

namespace App\Http\Livewire\Gudang;

use Livewire\Component;
// models
use App\Models\Stock;
//plugin
use Livewire\WithPagination;

class GudangEdit extends Component
{
    use WithPagination;
    public $search, $stockid, $name, $qty_stock;
    protected $updatesQueryString = ['search'];

    public function mount($id)
    {
        $items = Stock::find($id);
        // dd($items);
        if ($items) {
            $this->stockid =  $items->id;
            $this->name =  $items->name;
            $this->qty_stock =  $items->qty_stock;
        }
    }
    public function render()
    {
        if ($this->search !== null) {
            $items = Stock::where('name','like','%'.$this->search.'%')->orderBy('updated_at', 'desc')->paginate(10);
        }else
        {
            $items = Stock::orderBy('updated_at', 'desc')->paginate(10);
        }
        return view('livewire.gudang.gudang-edit')->with([
            'items' => $items,
        ]);
    }
    public function update()
    {
        $this->validate([
            'name' => 'required|string|max:255|min:3',
            'qty_stock' => 'required|integer',
        ]);
        
        $permission = auth()->user()->currentTeam;
        
        if(auth()->user()->hasTeamPermission($permission, 'edit') != 1){
            session()->flash('message', 'You Dont Have Permission');
        }
        else{
            Stock::find($this->stockid)->update([
                'name' => $this->name,
                'qty_stock' => $this->qty_stock,
            ]);
            session()->flash('success', 'Update Successfully!!');    
        }
        
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
