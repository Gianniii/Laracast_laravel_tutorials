@props(['trigger'])


<div class="relative lg:inline-flex items-center bg-gray-100 rounded-xl">
            
    <div x-data="{show: false }" @click.away="show= false">
        <div @click="show = !show">
            {{$trigger}}
        </div>

        {{-- links --}}
        <div x-show="show" class ="position:relative max-h-52 py-2 absolute bg-gray-100 w-full mt-2 rounded-xl z-50"style="overflow:hidden display: none">
           {{ $slot }}
        </div>
    </div>