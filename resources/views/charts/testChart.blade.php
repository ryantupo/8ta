@extends('layouts.layout')

@section('content')

    <body>

        <div id="main" class="row">

            @yield('content')

        </div>

        <div>
            <h1 class="mx-auto pt-5" style="width: 200px;">Test Chart</h1>
        </div>

        <div style="width: 60%; margin:auto;">
            <canvas id="myChart"></canvas>
        </div>

        <div id="chart" data-type="{{$chart->config}}"><div>

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

@endsection

