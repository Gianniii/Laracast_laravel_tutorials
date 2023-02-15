

<x-layout>
    <x-slot name="content">
        @include ('posts._header') <!-- include partial view -->

        <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
            <x-posts-grid :posts="$posts"/>
            {{$posts->links()}}
        </main>
    </x-slot>
</x-layout>


