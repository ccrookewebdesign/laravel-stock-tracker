<x-layout>
    <x-section>
        <h1 class="font-bold text-lg">Create a Post</h1>

        <form method="post" action="/posts"
              x-data
              @submit.prevent="$dispatch('recaptcha')"
              @recaptcha-complete.window="$el.submit()  ">
            @csrf
            <div class="mb-6">
                <label for="title" class="block mb-2 uppercase font-bold text-xs text-gray-700">Title</label>
                <input type="text"
                       name="title"
                       id="title"
                       required
                       class="border border-gray-400 p-2 w-full">
            </div>

            @error('title')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror

            <div class="mb-6">
                <label for="body" class="block mb-2 uppercase font-bold text-xs text-gray-700">Body</label>
                <textarea name="body"
                          id="body"
                          required
                          class="border border-gray-400 p-2 w-full"></textarea>
            </div>

            @error('body')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror

            <x-recaptcha/>

            <div class="mb-6">
                <button class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">Submit</button>
            </div>

            <ul>
                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                @endif
            </ul>
        </form>
    </x-section>
</x-layout>

