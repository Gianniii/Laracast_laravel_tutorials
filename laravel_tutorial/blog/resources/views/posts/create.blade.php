<x-layout>
    <x-slot name="content">
        <section class="px-6 py-8">
            <main class ="max-w-lg, mx-auto mt-10 bg-gray-100 border-gray-200 p-6 rounded-xl" style="max-width:600px">
                <h1 class ="text-center font-bold text-xl">Publish New Post</h1>
                
                <form method="POST", action ="/admin/posts" enctype="multipart/form-data">
                    @csrf
                    
                    <x-form.input name="title" />
                    <x-form.input name="slug" />
                    <x-form.input name="thumbnail" type="file" /> 
                    <x-form.textarea name="excerpt" />
                    <x-form.textarea name="body" />

                    <x-form.field>
                        <x-form.label name="category"/>
                        <select name="category_id" id="category_id">
                            @php
                                $categories = \App\Models\Category::all();
                            @endphp
                            @foreach ($categories as $category)
                                <option value ="{{$category->id}}"
                                    {{old('category_id') == $category->id ? 'selected' : ''}}
                                    >{{ucwords($category->name)}} </option>
                            @endforeach
                        </select>
                        <x-form.error name="category_id"/>
                    </x-form.field>

                    <x-form.field>
                        <button type="submit"
                        class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500"
                          > Publish </button>

                    </x-form.field>
                      
                    @if ($errors->any())
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li class ="text-red-500 text-xs"> {{$error}}</li>
                            @endforeach
                        </ul>
                    @endif
                </form>
    </x-slot>
</x-layout>