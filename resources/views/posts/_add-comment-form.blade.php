@auth {{-- Only the author can view this --}}

    <x-panel>

        <form method="POST" action="/posts/{{ $post->slug }}/comments" class="">
            @csrf

            <header class="flex items-center">
                <img src="http://i.pravatar.cc/60" alt="" width="40" height="40" class="rounded-full">
                <h2 class="ml-4">Leave a comment</h2>
            </header>

            <div class="mt-6">
                <textarea 
                    name="body" 
                    class="w-full text-sm focus:outline-none focus:ring" 
                    placeholder="Say something..." 
                    rows="5"
                    required></textarea>

                @error('body')
                    <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror

            </div>

            <div class="flex justify-end mt-6 pt-6 border-t border-gray-200 pt-6">

                <x-form.button>Post</x-form.button>
                
            </div>

        </form>

        

    </x-panel>

@else
    
    <p>
        <a class="hover:underline bg-blue-200" href="/register">Register</a> or <a class="hover:underline bg-blue-200" href="/login">Login</a> to leave a comment.
    </p>

@endauth