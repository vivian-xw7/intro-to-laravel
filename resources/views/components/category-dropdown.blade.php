

<x-dropdown>

    <x-slot name="trigger">
        <button class="py-2 pl-3 pr-9 text-sm font-semibold w-32 text-left inline-flex">

            {{ isset($currentCategory) ? ucwords($currentCategory->name) : 'Categories' }}

            <x-down-arrow />

        </button>
    </x-slot>


    <x-dropdown-item href="/" 
        :active="request()->routeIs('home')"
    >All</x-dropdown-item>
    

    @foreach ($categories as $category)

        {{-- {{ isset($currentCategory) && $currentCategory->id == $category->id ? "bg-blue-500 text-white" : "" }} --}}

        <x-dropdown-item 
            {{-- href="/categories/{{ $category->slug }}" --}}

            {{-- I end up with a URL like: http://127.0.0.1:8000/?category=aut-totam-id-deleniti-esse-ad& --}}
            href="/?category={{ $category->slug }}&{{ http_build_query(request()->except('category')) }}"

            {{-- :active="isset($currentCategory) && $currentCategory->is($category)" --}}
            :active="request()->is('categories/{$category->slug}')"

        >{{ ucwords($category->name) }}</x-dropdown-item>


    @endforeach

</x-dropdown>
