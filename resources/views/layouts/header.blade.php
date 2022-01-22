<body class="antialiased">
    <div class="flex justify-center pt-8 sm:justify-start sm:pt-0 bg-gray-100 dark:bg-gray-900">
        <a href="/"><img src="{{ asset('images/8taLogo.png') }}" class="w-30 p-6" alt="8talogo" title="" /></a>
    </div>
    <div
        class="">
        @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                    <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log
                        in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                    @endif
                @endauth
            </div>
        @endif
    </div>
</body>
