<?php

namespace App\Http\Livewire\Kasirdata;

use Livewire\Component;

use App\Models\Product;

use Livewire\WithPagination;

class KasirEdit extends Component
{
    use WithPagination;
    public $search, $stockid, $name, $price;
    protected $updatesQueryString = ['search'];

    public function mount($id)
    {
        $items = Product::find($id);
        // dd($items);
        if ($items) {
            $this->stockid =  $items->id;
            $this->name =  $items->name;
            $this->price =  $items->price;
        }
    }
    public function render()
    {
        $this->validate([
            'name' => 'required|string|min:3',
            'price' => 'required|integer|min:1',
        ]);
        if ($this->search !== null) {
           $items = Product::where('name','like','%'.$this->search.'%')
                            ->orWhere('uuid','like','%'.$this->search.'%')
                            ->orderBy('updated_at', 'desc')
                            ->paginate(10);
        }else
        {
            $items = Product::orderBy('updated_at', 'desc')->paginate(10);
        }
        return view('livewire.kasirdata.kasir-edit')->with([
            'items' => $items,
        ]);
    }
    public function update()
    {
        $this->validate([
            'name' => 'required|string|min:3',
            'price' => 'required|integer|min:1',
        ]);
        
        $permission = auth()->user()->currentTeam;
        
        if(auth()->user()->hasTeamPermission($permission, 'edit') != 1){
            session()->flash('message', 'You Dont Have Permission');
        }
        else{
            Product::find($this->stockid)->update([
                'name' => $this->name,
                'price' => $this->price,
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
            Product::find($id)->delete();
            session()->flash('success', 'Delete Successfully!!');
        }    
    }
}
