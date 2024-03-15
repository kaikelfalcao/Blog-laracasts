@auth()
    <x-panel>
        <form method="POST" action="/posts/{{ $post->slug }}/comments">
            @csrf

            <header class="flex items-center">
                <img src="https://i.pravatar.cc/60?u={{ auth()->id() }}" alt="" width="40" height="60" class="rounded-full">
                <h2 class="ml-4">Want to participate ?</h2>
            </header>

            <x-form.textarea name="body" placeholder="Quick, think of something to say!"/>

            <div class="flex justify-end mt-6 pt-6 border-t border-gray-200">
                <x-form.button>Post</x-form.button>
            </div>
        </form>
    </x-panel>
@else
    <p class="text-center border border-gray-200 p-6 rounded-xl font-semibold">
        <a href="/register" class=" text-blue-500 text-lg hover:text-blue-300">Register</a> or <a href="/login" class=" text-blue-500 text-lg hover:text-blue-300">Log in</a> to leave a comment.
    </p>
@endauth
