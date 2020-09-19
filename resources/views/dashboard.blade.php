<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            
                    {{auth()->user()->currentTeam->name}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="h-100">
                    @if(auth()->user()->currentTeam->id === 2)
                      @if(Laravel\Jetstream\Jetstream::hasTeamFeatures())
                                <livewire:kasir.kasir-index>
                        @endif
                        @elseif(auth()->user()->currentTeam->id === 3)
                                <livewire:gudang.gudangindex>
                        @elseif(auth()->user()->currentTeam->id === 6)
                                <livewire:pembelian.pembelian-index>
                        @elseif(auth()->user()->currentTeam->id === 7)
                                <livewire:kasirdata.kasir-index>
                        @elseif(auth()->user()->personalTeam())
                        {{-- {{auth()->user()->ownsTeam($team)}} --}}
                       
                        {{-- @elseif(auth()->user ()->currentTeam->name = null) --}}
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
    
            {{-- perission --}}
        {{-- @php 
        $permission = auth()->user()->currentTeam;
        @endphp
        @if(auth()->user()->hasTeamPermission($permission, 'delete') != 1)

        @else
        
        @endif --}}