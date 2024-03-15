<x-layout>
    <x-setting heading="Publish New Post">
        <form action="/admin/posts/" method="POST" enctype="multipart/form-data">
            @csrf

            <x-form.input name="title" required/>
            <x-form.input name="slug" required/>
            <x-form.input name="thumbnail" type="file" required/>
            <x-form.textarea name="excerpt"/>
            <x-form.textarea name="body"/>

            <x-form.field class="mx-auto">
                <x-form.label name="category" class="sr-only" />
                <select name="category_id" id="category_id" required class="block py-2.5 px-0 text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200">
                    <option value="" selected>Selecione a Categoria</option>
                    @foreach(\App\Models\Category::all() as $category)
                        <option
                            value="{{ $category->id }}"
                        >{{ ucwords($category->name) }}
                        </option>
                    @endforeach
                </select>
                <x-form.error name="category"/>
            </x-form.field>

            <x-form.button>Publish</x-form.button>
        </form>
    </x-setting>
</x-layout>
