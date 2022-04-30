@extends('layouts.layout')

@section('content')

    <body style="padding-bottom:250px;width:100%;">

        <div id="main" class="row">

            @yield('content')

        </div>

        <div>
            <h1 class="mx-auto pt-5" style="word-break: break-word;margin-bottom: 1.5rem;text-align:center;">{!! $post->title !!} {{ $post->excerpt }}
            </h1>
        </div>

        <div class="thing"
            style="width:90%; height: 90%; margin: 0 auto; margin-top: 1.5rem; padding-bottom: 3rem">

            <div style="overflow: hidden;">

                <p class="mx-auto pt-5" style="width: 80%; margin-bottom: 1.5rem;text-align:center;">
                    {!! $post->body !!}
                </p>


                @php
                $directory = 'images/blogPostImages/'. $post->image_path;

                $images = glob($directory . '/*.png');



                for ($i = 0; $i < count($images); $i++) {
                    if ($i % 2 == 0) {
                        echo '<img style="height: 40%; width: 40%;box-shadow: rgba(0, 0, 0, 0.3) 0px 19px 38px, rgba(0, 0, 0, 0.22) 0px 15px 12px;float:left;margin: 5px;clear: right; " src="/' . $images[$i] . '" /><br /><br />';
                    }else{
                        echo '<img style="height: 40%; width: 40%;box-shadow: rgba(0, 0, 0, 0.3) 0px 19px 38px, rgba(0, 0, 0, 0.22) 0px 15px 12px;float:right;margin: 5px;clear: left; " src="/' . $images[$i] . '" /><br /><br />';
                    }
                }

                @endphp
            </div>

        </div>



    </body>
@endsection
