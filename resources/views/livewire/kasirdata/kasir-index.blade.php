<div>
    <div>
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
    <body class="antialiased font-sans bg-gray-200">
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
                    <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                        <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                            <table class="min-w-full leading-normal">
                                <thead>
                                    <tr>
                                        <th
                                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                            uuid
                                        </th>
                                        <th
                                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider text-center">
                                            name
                                        </th>
                                        <th
                                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider text-center">
                                            price
                                        </th>
                                        <th
                                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider text-right">
                                            action
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
                                                            {{$i->uuid}}
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    {{$i->name}}
                                                </p>
                                            </td>
                                             <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    $ {{$i->price}}
                                                </p>
                                            </td>
                                            <td class="text-right px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                
                                                <span
                                                    class="relative inline-block px-3 py-1 font-semibold text-red-900 leading-tight">
                                                    <span aria-hidden
                                                        class="absolute inset-0 bg-red-300 opacity-50 rounded-full"></span>
                                                            <a href="{{route('kasir.edit',$i->id)}}">
                                                                <span class="relative">edit</span>
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
                        {{-- {{$items->links()}} --}}
                    </div>
                </div>
            </div>
        </body>
</div>


</div>
