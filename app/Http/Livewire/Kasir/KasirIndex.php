<?php

namespace App\Http\Livewire\Kasir;

use Livewire\Component;

// models
use App\Models\Product;
use App\Models\Cart;
use App\Models\Purchase;
use App\Models\PurchaseDetail;
use Auth;

use Illuminate\Http\Request;

class KasirIndex extends Component
{
    public $name, $price, $uuid, $qty;
    public function resetinput()
    {
        $this->name = null;
        $this->price = null;
    }

    public function render()
    {
        $items = Cart::with('CartKasir')->get();

        return view('livewire.kasir.kasir-index')->with([
            'items' => $items,
        ]);
    }
    public function find()
    {
        $this->validate([
            // 'username' => 'required|string|exists:users,username',
            'uuid' => 'required|string|exists:products,uuid',
        ]);

        $product = Product::where('uuid',$this->uuid)->first();
        
        // $product
        Cart::Create([
            'product_id' => $product->id,
            'qty' => 1,
        ]);

        $this->uuid = null;

    }
    public function destroy($id)
    {
        $permission = auth()->user()->currentTeam;
        if(auth()->user()->hasTeamPermission($permission, 'delete') != 1){
            session()->flash('message', 'You Dont Have Permission');
        }
        else
        {
            $record = Cart::where('id', $id);
                $record->delete();
                session()->flash('success', 'Delete Successfully!!');
        }   
       
        
        // dd($id);
    }
    public function qty($i, $id)
    {
        
        // dd($k, $id);
        $test = Cart::find($id);
        $update = $test->qty + $i;
        // dd($test->qty + $i);
        $test->update([
            'qty' => $update,
        ]);
    }
    public function checkout($total)
    {
        $uuid = 'TRX' . mt_rand(00,99) . mt_rand(10000,99999);
        $data = Cart::all();
        // dd($data, $total);
        $purchare = Purchase::create([
            'uuid_ourchase' => $uuid,
            'total' => $total,
        ]);

        // PurchaseDetail::
        foreach ($data as $i) {
            $id[] = $i->product_id;
            $qty[] = $i->qty; 
        }
        // dd($qty);
        foreach($id as $index => $code )
        {
            $details[] = new PurchaseDetail([
                'transactions_id' => $purchare->id,
                'product_id' => $code, //id barang
                'qty' => $qty[$index], //jumlah barang yang di pesan
            ]);
        } 
         $purchare->details()->saveMany($details);
         Cart::truncate();
         session()->flash('success', 'Checkouts Successfully!!');
    }
    public function clear()
    {
        Cart::truncate();
    }

}

