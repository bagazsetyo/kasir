<div>
<style>
  input[type='number']::-webkit-inner-spin-button,
  input[type='number']::-webkit-outer-spin-button {
    -webkit-appearance: none;
    margin: 0;
  }

  .custom-number-input input:focus {
    outline: none !important;
  }

  .custom-number-input button:focus {
    outline: none !important;
  }
</style>
        {{-- error --}}
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


       

        @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
        <body class="antialiased font-sans bg-gray-200">
            <div class="container mx-auto px-4 sm:px-8">
                <div class="py-8">
                    <div>
                        <h2 class="text-2xl font-semibold leading-tight">Kasir</h2>
                    </div>
                    <div class="my-2 flex sm:flex-row flex-col">
                        <div class="block relative">
                            <input
                                wire:model="uuid" 
                                placeholder="Search"
                                class="appearance-none h-10 sm:rounded-l-none border border-gray-400 border-b block pl-8 pr-6 py-2 w-full bg-white text-sm placeholder-gray-400 text-gray-700 focus:bg-white focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none" />
                        </div>
                                <button wire:click="find" class="block h-10 uppercase float-right shadow bg-blue-500 hover:bg-blue-600 focus:shadow-outline focus:outline-none text-white text-xs py-3 px-10 ">
                                                cek
                                            </button>
                    </div>
                    {{-- {{$search}} --}}
                    <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                        <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                            <table class="min-w-full leading-normal">
                                <thead>
                                    <tr>
                                        <th
                                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                            name
                                        </th>
                                        <th
                                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider text-center">
                                            qty
                                        </th>
                                        <th
                                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider text-center">
                                            price
                                        </th>
                                        <th
                                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider text-right">
                                            delete
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($items as $i)
                                        <tr>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <div class="flex items-center">
                                                    <div class="flex-shrink-0 w-10 h-10">
                                                       <p class="text-gray-900 whitespace-no-wrap">
                                                            {{$i->CartKasir->name}}
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                                                {{-- <p class="text-gray-900 whitespace-no-wrap">{{$i->qty}}</p> --}}
                                                <!-- component -->
                                            <div class="mx-auto w-32">
                                                <div class="custom-number-input h-10">
                                                    <div class="flex flex-row h-10 w-full rounded-lg relative bg-transparent mt-1">
                                                        <button wire:click="qty(-1, {{$i->id}})" data-action="decrement" class=" bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-l cursor-pointer outline-none">
                                                            <span class="m-auto text-2xl font-thin">−</span>
                                                        </button>
                                                        <input type="number" class="outline-none focus:outline-none text-center w-full bg-gray-300 font-semibold text-md hover:text-black focus:text-black  md:text-basecursor-default flex items-center text-gray-700  outline-none" name="custom-input-number" value="{{$i->qty}}"></input>
                                                        <button wire:click="qty(+1, {{$i->id}})" data-action="increment" class="bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-r cursor-pointer">
                                                            <span class="m-auto text-2xl font-thin">+</span>
                                                        </button>
                                                     </div>
                                                </div>
                                            </div>
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 text-sm text-center items-center justify-center object-center origin-center self-center center">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                   $ {{$i->CartKasir->price}}
                                                </p>
                                            </td>
                                            <td class="text-right px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <span
                                                    class="relative inline-block px-3 py-1 font-semibold text-red-900 leading-tight">
                                                    <span aria-hidden
                                                        class="absolute inset-0 bg-red-300 opacity-50 rounded-full"></span>
                                                        {{-- @foreach (Auth::user()->first()->allTeams() as $team) --}}
                                                            {{-- @if(auth()->user()->hasTeamPermission($team, 'delete')) --}}
                                                                <button wire:click="destroy({{$i->id}})">
                                                                    <span class="relative">X</span>
                                                                </button>
                                                            {{-- @endif --}}
                                                        {{-- @endforeach --}}
                                                </span>
                                            </td>
                                        </tr>
                                    @empty
                                    @endforelse

                                    {{-- checkouts --}}
                                    @forelse($items as $k)
                                        <tr>
                                        <td colspan="4" class="text-right px-5 py-5 border-gray-200 bg-white text-sm">
                                        @php 
                                            $subtotal = 0; foreach($items as $item){ 
                                        @endphp
                                                @php 
                                                    $subtotal += $item->qty * $item->CartKasir->price;
                                                @endphp
                                         @php 
                                            } 
                                        @endphp
                                         total = ${{$subtotal}}
                                        </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="text-right px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <button wire:click="checkout({{$subtotal}})" class="block uppercase float-right shadow bg-blue-500 hover:bg-blue-600 focus:shadow-outline focus:outline-none text-white text-xs py-3 px-10">
                                                    Checkout
                                                </button>
                                                <button wire:click="clear" class="block uppercase float-right shadow bg-pink-500 hover:bg-pink-600 focus:shadow-outline focus:outline-none text-white text-xs py-3 px-10">
                                                    clear
                                                </button>
                                            </td>
                                        </tr>
                                    @empty
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </body>
        @endif
</div>