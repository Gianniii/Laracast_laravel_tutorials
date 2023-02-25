<x-layout>
    <x-slot name="content">

    <x-setting heading="Edit Post: {{$post->title}}">
        <form method="POST", action ="/admin/posts/{{$post->id}}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            
            <x-form.input name="title" :value="$post->title" />
            <x-form.input name="slug" :value="$post->slug"/>

            <div class="flex mt-6">
                <div class="flex-1">
                    <x-form.input name="thumbnail" type="file" :value="old('thumbnail', $post->thumbnail)" /> 
                </div>
                <img src="{{ asset('storage/'.$post->thumbnail) }}" alt="" class="rounded-xl ml-6" width="100">
            </div>
            <x-form.textarea name="excerpt">{{old('excerpt', $post->excerpt)}} </x-form.textarea>
            <x-form.textarea name="body">{{old('body', $post->body)}}</x-form.textarea>

            <x-form.field>
                <x-form.label name="category"/>
                <select name="category_id" id="category_id">
                    @php
                        $categories = \App\Models\Category::all();
                    @endphp
                    @foreach ($categories as $category)
                        <option value ="{{$category->id}}"
                            {{old('category_id', $post->category_id) == $category->id ? 'selected' : ''}}
                            >{{ucwords($category->name)}} </option>
                    @endforeach
                </select>
                <x-form.error name="category_id"/>
            </x-form.field>

            <x-form.field>
                <button type="submit"
                class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500"
                  > Update </button>

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