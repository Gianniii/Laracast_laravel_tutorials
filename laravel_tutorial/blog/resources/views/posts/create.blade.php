<x-layout>
    <x-slot name="content">

    <x-setting heading="Publish New Post">
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
    </x-setting>
       
    </x-slot>
</x-layout>