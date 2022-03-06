@extends('layouts.layout')

@section('content')

    <body>

        <div id="main" class="row">

            @yield('content')

        </div>

        <div>
            <h1 class="mx-auto pt-5" style="width: 200px;">Test Chart</h1>
        </div>

        <div class="adjust-me-based-on-size">
            <canvas id="myChart"></canvas>
        </div>

        <div id="chart" data-type="{{ $chart->config }}">
            <div>

                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                <script>
                    var elem = document.getElementById('chart');
                    var config = JSON.parse(elem.getAttribute('data-type'));
                </script>

                <script>
                    const myChart = new Chart(
                        document.getElementById('myChart'),
                        config
                    );
                </script>

    </body>

    <style>
        .adjust-me-based-on-size{
            width: 600px;
            height:600px;
            margin: auto;
          }
          @media only screen and (min-width: 800) and (max-width: 1200) {
            .adjust-me-based-on-size {
                width: 500px;
                height: 500px;
            }
          }
          @media only screen and (max-width: 800px) {
            .adjust-me-based-on-size {
                width: 400px;
                height: 400px;
            }
          }

          @media only screen and (max-width: 400px) {
            .adjust-me-based-on-size {
                width: 300px;
                height: 300px;
            }
          }
    </style>
@endsection
