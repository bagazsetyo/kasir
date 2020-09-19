<?php

namespace App\Http\Livewire\Ambil;

use Livewire\Component;

// models
use App\Models\Stock;
use App\Models\Product;
//plugin
use Livewire\WithPagination;

class AmbilIndex extends Component
{
    use WithPagination;
    public $search, $stockid, $use_stock, $name, $qty_stock, $price;
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
        return view('livewire.ambil.ambil-index')->with([
            'items' => $items,
        ]);
    }
    public function ambil()
    {
        $this->validate([
            'name' => 'required|string',
            'price' => 'required|integer',
            'use_stock' => 'required|integer',
        ]);

        $data = Stock::find($this->stockid);
        
        if ($this->use_stock === null) {
            $data->update([
                        'qty_stock' => $data->qty_stock -= 1,
                        'use_stock' => $data->use_stock += 1,
                    ]);
        }else{
            $data->update([
                        'qty_stock' => $data->qty_stock -= $this->use_stock,
                        'use_stock' => $data->use_stock += $this->use_stock,
                    ]);
        }
        $uuid = 'TRX' . mt_rand(0,999999);

        $product = Product::where('name', $data->name)->first();
        if ($product === null) {
            Product::create([
                'name' => $this->name,
                'price' => $this->price,
                'uuid' => $uuid,
                'gundang_id' => $data->id,
            ]);
        }else{
            $product->update([
                'price' => $this->price,
            ]);
        }
        session()->flash('success', 'Get Data Successfully!!');
        $this->use_stock = null;
        $this->price = null;
    }
}
