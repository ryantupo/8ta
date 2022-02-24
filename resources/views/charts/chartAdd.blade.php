@extends('layouts.layout')

@section('content')

    <body>

        <div id="main" class="row">

            @yield('content')

        </div>


        <div action="" method="post" id="mainForm" class="form">
            <form method="post" action="{{ route('chart.store') }}">


                <div class="mt-3 form-group">
                    <label for="chartName">Chart Name</label>
                    <input type="text" class="form-control" id="chartName" placeholder="Enter Chart Name">
                </div>

                {{-- the type of chart --}}
                <div class="mt-3 form-group">
                    <label for="charts">Type Of Chart</label>
                    <select class="form-control" id="chart">
                        <option>Pie Chart</option>
                        <option>Line Chart</option>
                    </select>
                </div>


                {{-- the number of data points --}}
                <div class="mt-3 form-group">
                    <label for="datasets">Amount Of Data Points</label>
                    <select id="dataset" multiple="multiple" class="form-control">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>

                {{-- data names and values --}}
                <div id="datasets" class="form-group">
dfssdf

                </div>


                <button type="button" class="mt-3 button btn btn-success btn-lg center-block" id="submitBtn">Check it
                    out!</button>

            </form>


            <script type="text/javascript">
                //get the amount of data sets in the chart
                $("#dataset option").click(function() {
                    var value = $(this).attr("value");
                    console.log(value);

                    //seems like there is no built in funciton's but in jquery
                    $(datasets).empty();
                    makeData(value);



                });


                function clearBox(elementID) {
                    document.getElementById(elementID).innerHTML = "";
                }

                function makeData(number) {

                    for (let i = 0; i < number; i++) {

                        let divL = document.createElement("label"); // Create a new element
                        divL.className = 'mt-3';
                        divL.setAttribute('for', 'DataTextArea');
                        divL.setAttribute('value', 'Data textarea');

                        let divT = document.createElement("textarea"); // Create a new element
                        divT.className = 'mt-3 form-control';
                        divT.setAttribute('id', 'dataTextArea' + i); // Change the text of the element
                        divT.setAttribute('row', '1');

                        let divL2 = document.createElement("label"); // Create a new element
                        divL.className = 'mt-3';
                        divL2.setAttribute('for', 'DataTextArea');
                        divL2.setAttribute('value', 'Data textarea');

                        let divT2 = document.createElement("textarea"); // Create a new element
                        divT2.className = 'mt-3 form-control';
                        divT2.setAttribute('id', 'dataTextArea2' + i); // Change the text of the element
                        divT2.setAttribute('row', '1');

                        divL.appendChild(document.createTextNode("Data Point Name " + (i + 1)));
                        divL2.appendChild(document.createTextNode("Data Point Value " + (i + 1)));

                        //name of data point
                        document.getElementById("datasets").appendChild(divL);
                        document.getElementById("datasets").appendChild(divT);

                        //value of data
                        document.getElementById("datasets").appendChild(divL2);
                        document.getElementById("datasets").appendChild(divT2);
                    }
                }



                document.getElementById("submitBtn").addEventListener("click", function() {

                    {{-- chart name --}}
                    console.log(document.getElementById("chartName").value);
                    let chartName = document.getElementById("chartName").value;


                    {{-- chart type --}}
                    console.log(document.getElementById("chart").value);
                    let chartType = document.getElementById("chart").value;


                    {{-- amount of data sets --}}
                    console.log(document.getElementById("dataset").value);
                    let dataPointAmount = document.getElementById("dataset").value;


                    let label = [];
                    let data = [];

                    {{-- get all data point names and values --}}

                    for (let i = 0; i < dataPointAmount; i++) {
                        label.push(document.getElementById("dataTextArea" + i).value);
                    data.push(document.getElementById("dataTextArea2" + i).value);

                }

                let colours = randomInteger(dataPointAmount);

                generateChartJson(chartName, chartType, label, data, colours);

                });



                function generateChartJson(chartName, chartType, label, data, colours) {


                    console.log({
                        'type': chartType,
                        'data':{
                            'labels': label,
                            'datasets': [{
                              'label': chartName,
                              'data': data,
                              'backgroundColor': colours,
                              'hoverOffset': 4
                            }]
                          }
                      });

                }

                function randomInteger(amount) {
                    backgroundColor = [];
                    for (let i = 0; i <amount; i++){
                        console.log(`rgb(${Math.floor(Math.random()*(255 + 1))} , ${Math.floor(Math.random()*(255 + 1))}, ${Math.floor(Math.random()*(255 + 1))})`);
                        backgroundColor.push(`rgb(${Math.floor(Math.random()*(255 + 1))} , ${Math.floor(Math.random()*(255 + 1))}, ${Math.floor(Math.random()*(255 + 1))})`);
                    }
                    console.log("sadfsdafdsfds");
                    console.log(backgroundColor);
                    console.log("sadfsdafdsfds");
                    return backgroundColor;
                }

                function addElement() {
                    var newDiv = document.createElement('"<input type="text" name="chance" value="xx">"');
                    document.getElementById('tag-id').innerHTML = '<ol><li>html data</li></ol>';

                }


            </script>

        </div>
    </body>

    <style>
        .form {
            margin: auto;
            margin-top: 50px;
            width: 50%;
        }

    </style>

@endsection

{{-- const config = {
    type: 'pie',
    data:{
        labels: [
          'Red',
          'Blue',
          'Yellow'
        ],
        datasets: [{
          label: 'My First Dataset',
          data: [300, 50, 100],
          backgroundColor: [
            'rgb(255, 99, 132)',
            'rgb(54, 162, 235)',
            'rgb(255, 205, 86)'
          ],
          hoverOffset: 4
        }]
      };,
  }; --}}


{{-- text
  list of textfield
  text
  percents
  colours(this should be autogenerated)
  hoverover set a
uto to 4? --}}
