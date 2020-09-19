<div>
     @if($errors->any())
            <div role="alert">
              <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                <p>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </p>
              </div>
            </div>
        @endif
        {{-- permission message --}}
        @if (session()->has('message'))
            <div role="alert">
                <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                    {{ session('message') }}
                </div>
            </div>
        @elseif (session()->has('success'))
            <div role="alert">
                <div class="border border-t-0 border-green-400 rounded-b bg-green-100 px-4 py-3 text-green-700">
                    {{ session('success') }}
                </div>
            </div>
        @endif
     <div class="container mx-auto sm:px-8">
         <div>
            <h2 class="text-2xl font-semibold leading-tight">Create</h2>
        </div>
                <div class="my-2 flex sm:flex-row flex-col">
                    <div class="block relative">
                        <input
                            autocapitalize="on"
                            wire:model="name" 
                            placeholder="Name"
                            class="appearance-none h-10 sm:rounded-l-none border border-gray-400 border-b block pl-8 pr-6 py-2 w-full bg-white text-sm placeholder-gray-400 text-gray-700 focus:bg-white focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none uppercase" />
                    </div>
                    <div class="block relative ml-5">
                        <input
                            wire:model="qty_stock" 
                            placeholder="Quantity"
                            class="uppercase appearance-none h-10 sm:rounded-l-none border border-gray-400 border-b block pl-8 pr-6 py-2 w-full bg-white text-sm placeholder-gray-400 text-gray-700 focus:bg-white focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none" />
                    </div> 
                    <button wire:click="store" 
                            class="block h-10 uppercase float-right shadow bg-blue-500 hover:bg-blue-600 focus:shadow-outline focus:outline-none text-white text-xs py-3 px-10 ">
                        Create
                    </button>
                </div>   
            </div>    
</div>
