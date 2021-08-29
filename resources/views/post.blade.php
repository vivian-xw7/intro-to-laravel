
<link rel="stylesheet" href="/app.css">

<x-layout>

    <article>

        <h1>
            {{ $post->title }}
        </h1>

            <p>
                <!-- reflect the way you speak: the auther of the post instead of the user of the post. -->
                By <a href="">{{ $post->author->name }}</a> in <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a>
            </p>


        <div>
            {!! $post->body !!}
        </div>

    </article>

    <a href="/">Home</a>

</x-layout>

















