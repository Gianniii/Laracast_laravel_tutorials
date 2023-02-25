@props(['heading'])

<section class="px-6 py-8">
    <main class ="max-w-lg, mx-auto mt-10 bg-gray-100 border-gray-200 p-6 rounded-xl" style="max-width:700px">
        <h1 class ="text-center font-bold text-xl mb-6">{{$heading}}</h1>

        {{$slot}}
        
    </main>
</section>