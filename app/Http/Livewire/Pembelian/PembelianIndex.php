<?php

namespace App\Http\Livewire\Pembelian;

use Livewire\Component;
// models
use App\Models\Product;
use App\Models\Purchase;
use App\Models\Stock;

class PembelianIndex extends Component
{
    public $search;
    protected $updatesQueryString = ['search'];

    public function render()
    {
        $stock = Stock::count('id');
        $product = Product::count('id');
        $purchases = Purchase::count('id');
        $total = Purchase::sum('total');

        if ($this->search != null) {
            $items = Purchase::where('uuid_ourchase','like','%'.$this->search.'%')->orderBy('updated_at', 'desc')->paginate(10);
        }else
        {
            $items = Purchase::orderBy('updated_at', 'desc')->paginate(10);
        }
        // dd($total);
        return view('livewire.pembelian.pembelian-index')->with([
            'items' => $items,
            'stock' => $stock,
            'purchases' => $purchases,
            'total' => $total,
            'product' => $product,
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
            Purchase::find($id)->delete();
            session()->flash('success', 'Delete Successfully!!');
        }      
    }
}
