
<link rel="stylesheet" href="/app.css">

<x-layout>

    <article>

        <h1>
            {{ $post -> title }}
        </h1>

        <div>
            {!! $post -> body !!}
        </div>

    </article>

    <a href="/">Home</a>

</x-layout>

















