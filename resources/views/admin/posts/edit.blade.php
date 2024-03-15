<x-layout>
    <x-setting :heading="'Editing Post:' . $post->title">
        <form action="/admin/posts/{{ $post->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <x-form.input name="title" :value="old('title', $post->title)" required/>
            <x-form.input name="slug" :value="old('slug', $post->slug)" required/>
            <div class="flex mt-6">
                <div class="flex-1">
                <x-form.input name="thumbnail" type="file" :value="old('thumbnail', $post->thumbnail)"/>

                </div>
                    @if (Storage::disk('public')->exists($post->thumbnail))
                        <img src="{{ asset('/storage/' . $post->thumbnail) }}" alt="Blog Post illustration" class="rounded-xl ml-6" width="100">
                    @else
                        <img src="{{ asset('/images/illustration-' . rand(1,5) .'.png') }}" alt="Blog Post illustration" class="rounded-xl ml-6" width="100">
                    @endif
            </div>
            <x-form.textarea name="excerpt" required >{{ old('excerpt', $post->excerpt) }}</x-form.textarea>
            <x-form.textarea name="body" required >{{ old('body', $post->body) }}</x-form.textarea>

            <x-form.field class="mx-auto">
                <x-form.label name="category" class="sr-only" />
                <select name="category_id" id="category_id" class="block py-2.5 px-0 text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200">
                    @foreach(\App\Models\Category::all() as $category)
                        <option
                            value="{{ $category->id }}"
                            {{ old('category_id', $post->category_id) == $category->id ? 'selected' : ''}}
                        >{{ ucwords($category->name) }}
                        </option>
                    @endforeach
                </select>
                <x-form.error name="category"/>
            </x-form.field>

            <x-form.button>Update</x-form.button>
        </form>
    </x-setting>
</x-layout>
