@extends('layouts.layout')

@section('content')

    <body style="margin-bottom: 25px;">

        <div id="main" class="row">

            @yield('content')

        </div>

        <div>
            <h1 class="mx-auto pt-5" style="width: 200px;">Blog Posts</h1>
        </div>

        @foreach ($posts as $post)
            <a href="/blog/{{ $post->slug }}">
                <article class="thing" style="width: 60%; margin: 0 auto; margin-top: 1.5rem; padding-bottom: 3rem">

                    <h1>{{ $post->title }}</h1>


                    <p>{{ $post->excerpt }}</p>


                </article>
            </a>
        @endforeach

    </body>
@endsection
