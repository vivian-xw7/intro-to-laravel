
<x-layout>

    <section class="px-6 py-8">

        <main class="max-w-lg mx-auto mt-10 p-6 rounded-xl">

            <x-panel>
                <h1 class="text-center font-bold text-xl">Log In!</h1>

                <form method="POST" action="/login" class="mt-10"> {{-- The action endpoint needs to match the route endpoint --}}

                    @csrf

                    <x-form.input name="email" type="email" autocomplete="username" />

                    <x-form.input name="password" type="password" autocomplete="password" />

                    <x-form.button>Log In</x-form.button>


                    {{-- @if ($errors->any())
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li class="text-red-500 text-xs">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif --}}

                </form>
            </x-panel>

        </main>

    </section>

</x-layout>

