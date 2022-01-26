@extends('layouts.layout')

@section('content')

    <body>

        <div id="main" class="row">

            @yield('content')

        </div>

        <div>
            <h1 class="mx-auto pt-5" style="width: 300px; margin-bottom: 1.5rem;">{!! $post->title !!}</h1>
        </div>

        <div class="thing" style="width: 60%; margin: 0 auto; margin-top: 1.5rem; padding-bottom: 3rem">

            {!! $post->body !!}

        </div>

    </body>

@endsection
