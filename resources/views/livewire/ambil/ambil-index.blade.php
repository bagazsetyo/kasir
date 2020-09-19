<div>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">            
                Update
            </h2>
        </x-slot>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="h-100">
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
                         <div class="container mx-auto sm:px-8">
                            <div class="my-2 flex row-auto sm:flex-row flex-col justify-between">
                                <input type="hidden" wire:model="stockid">
                                <div class="block relative">
                                    <input
                                        readonly
                                        wire:model="name" 
                                        placeholder="Name"
                                        class="appearance-none h-10 sm:rounded-l-none border border-gray-400 border-b block pl-8 pr-6 py-2 w-full bg-white text-sm placeholder-gray-400 text-gray-700 focus:bg-white focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none uppercase" />
                                </div>
                                <div class="block relative">
                                    <input
                                        min="0"
                                        max="{{$qty_stock}}"
                                        type="number"
                                        wire:model="use_stock" 
                                        placeholder="ambil"
                                        class="uppercase  appearance-none h-10 sm:rounded-l-none border border-gray-400 border-b block pl-8 pr-6 py-2 w-full bg-white text-sm placeholder-gray-400 text-gray-700 focus:bg-white focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none" />
                                </div>
                                <div class="block relative">
                                    <input
                                        type="text"
                                        wire:model="price" 
                                        placeholder="price"
                                        required
                                        class="uppercase  appearance-none h-10 sm:rounded-l-none border border-gray-400 border-b block pl-8 pr-6 py-2 w-full bg-white text-sm placeholder-gray-400 text-gray-700 focus:bg-white focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none" />
                                </div>  
                                <button wire:click="ambil" 
                                        class="block h-10 uppercase float-right shadow bg-blue-500 hover:bg-blue-600 focus:shadow-outline focus:outline-none text-white text-xs py-3 px-10 ">
                                    Ambil
                                </button>
                                <a href="{{url('/dashboard')}}" class="justify-end block h-10 uppercase float-right shadow bg-blue-500 hover:bg-blue-600 focus:shadow-outline focus:outline-none text-white text-xs py-3 px-10 ">
                                    Create
                                </a>
                            </div>   
                         </div>
                         <hr class="mt-4">
                            <div class="container mx-auto sm:px-8">
                                <div class="py-2">
                                    <div class="my-2 flex sm:flex-row flex-col">
                                        <div class="block relative">
                                            <input
                                                wire:model="search" 
                                                placeholder="Search"
                                                class="appearance-none h-10 sm:rounded-l-none border border-gray-400 border-b block pl-8 pr-6 py-2 w-full bg-white text-sm placeholder-gray-400 text-gray-700 focus:bg-white focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none" />
                                        </div>
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
                                                            use stock
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
                                                                            {{$i->name}}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                                                                <p class="text-gray-900 whitespace-no-wrap">{{$i->qty_stock}}</p>
                                                            </td>
                                                             <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                                                                <p class="text-gray-900 whitespace-no-wrap">
                                                                    {{$i->use_stock ? $i->use_stock : '0'}}
                                                                </p>
                                                            </td>
                                                            <td class="text-right px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                                <span
                                                                    class="relative inline-block px-3 py-1 font-semibold text-red-900 leading-tight">
                                                                    <span aria-hidden
                                                                        class="absolute inset-0 bg-red-300 opacity-50 rounded-full"></span>
                                                                            <a href="{{route('update',$i->id)}}">
                                                                                <span class="relative">edit</span>
                                                                            </a>
                                                                </span>
                                                                <span
                                                                    class="relative inline-block px-3 py-1 font-semibold text-red-900 leading-tight">
                                                                    <span aria-hidden
                                                                        class="absolute inset-0 bg-red-300 opacity-50 rounded-full"></span>
                                                                            <a href="{{route('use',$i->id)}}">
                                                                                <span class="relative">ambil</span>
                                                                            </a>
                                                                </span>
                                                                <span
                                                                    class="relative inline-block px-3 py-1 font-semibold text-red-900 leading-tight">
                                                                    <span aria-hidden
                                                                        class="absolute inset-0 bg-red-300 opacity-50 rounded-full"></span>
                                                                            <button wire:click="destroy({{$i->id}})">
                                                                                <span class="relative">X</span>
                                                                            </button>
                                                                </span>
                                                            </td>
                                                        </tr>
                                                    @empty
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                        {{$items->links()}}
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
</div>
