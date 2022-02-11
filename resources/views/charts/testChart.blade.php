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

{{--
const DATA_COUNT = 5;
const NUMBER_CFG = {count: DATA_COUNT, min: 0, max: 100};

const data = {
  labels: ['Red', 'Orange', 'Yellow', 'Green', 'Blue'],
  datasets: [
    {
      label: 'Dataset 1',
      data: Utils.numbers({
          "count": 5,
          "min": 0,
          "max": 100
    }),
      backgroundColor: Object.values(Utils.CHART_COLORS),
    }
  ]
};


const config = {
    type: 'doughnut',
    data: {
        labels: ['Red', 'Orange', 'Yellow', 'Green', 'Blue'],
        datasets: [
          {
            label: 'Dataset 1',
            data: Utils.numbers({
                "count": 5,
                "min": 0,
                "max": 100
          }),
            backgroundColor: Object.values(Utils.CHART_COLORS),
          }
        ]
      },
    options: {
      responsive: true,
      plugins: {
        legend: {
          position: 'top',
        },
        title: {
          display: true,
          text: 'Chart.js Doughnut Chart'
        }
      }
    },
  };  --}}
