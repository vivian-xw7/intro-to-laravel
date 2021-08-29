
<x-layout>

    @foreach ($posts as $post)

        <article>

            <h1>
                <a href="/posts/{{ $post->slug }}">
                    {{ $post->title }}
                </a>
            </h1>

            <p>
                <!-- reflect the way you speak: the auther of the post instead of the user of the post. -->
                By <a href="">{{ $post->author->name }}</a> in <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a>
            </p>


            <div>
                {{ $post->exerpt }}
            </div>

        </article>

    @endforeach



</x-layout>




















