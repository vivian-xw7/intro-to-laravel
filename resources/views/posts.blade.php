
<x-layout>

    @foreach ($posts as $post)

        <article>

            <h1>
                <a href="/posts/{{ $post->id }}">
                    {{ $post->title }}
                </a>
            </h1>

            <div>
                {{ $post->exerpt }}
            </div>

        </article>

    @endforeach



</x-layout>




















