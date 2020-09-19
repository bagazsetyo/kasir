<?php

namespace App\Http\Livewire\Kasirdata;

use Livewire\Component;
// models
use App\Models\Product;

class KasirIndex extends Component
{
    public $search;
    protected $updatesQueryString = ['search'];

    public function render()
    {
        if ($this->search != null) {
            $items = Product::where('name','like','%'.$this->search.'%')
                            ->orWhere('uuid','like','%'.$this->search.'%')
                            ->orderBy('updated_at', 'desc')
                            ->paginate(10);
        }else
        {
            $items = Product::orderBy('updated_at', 'desc')->paginate(10);
        }

        return view('livewire.kasirdata.kasir-index')->with([
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
            Product::find($id)->delete();
            session()->flash('success', 'Delete Successfully!!');
        }    
    }
}
