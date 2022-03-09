@extends('layouts.layout')

@section('content')

    <body>

        <div id="main" class="row">

            @yield('content')

        </div>


        <div id="mainForm" class="form">
            <form action="/addchart" method="POST">

                @csrf
                <div class="mt-3 form-group">
                    <label for="chartName">Chart Name</label>
                    <input type="text" class="form-control" id="chartName" placeholder="Enter Chart Name" value="chartName" maxlength="18"
                        name="chartName">
                </div>

                {{-- the type of chart --}}
                <div class="mt-3 form-group">
                    <label for="charts">Type Of Chart</label>
                    <select class="form-control" id="chart" value="chartType" name="chartType">
                        <option>pie</option>
                        <option>line</option>
                    </select>
                </div>


                {{-- the number of data points --}}
                <div class="mt-3 form-group">
                    <label for="datasets">Amount Of Data Points</label>
                    <select id="dataset" multiple="multiple" class="form-control" value="amountDataPoints"
                        name="amountDataPoints">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>

                {{-- data names and values --}}
                <div id="datasets" class="form-group"></div>

                <button style="margin:auto;" type="submit" class="mt-3 button btn btn-success btn-lg center-block" id="submitBtn">Add Chart</button>

            </form>


            <script type="text/javascript">
                //get the amount of data sets in the chart

                document.getElementById('dataset').addEventListener('change', function() {

                    //console.log('You selected: ', this.value);

                    //wipe excisting data point inputs
                    $(datasets).empty();

                    //generate the inputs for data points
                    makeData(this.value);
                });



                function clearBox(elementID) {
                    document.getElementById(elementID).innerHTML = "";
                }

                function makeData(number) {

                    for (let i = 0; i < number; i++) {

                        let divL = document.createElement("label"); // Create a new element
                        divL.className = 'mt-3';
                        divL.setAttribute('for', 'DataTextArea');
                        divL.setAttribute('value', 'dataTextAreaL' + i);
                        divL.setAttribute('name', 'dataTextAreaL' + i); // Change the text of the element
                        divL.setAttribute('id', 'dataTextAreaL' + i); // Change the text of the element


                        //is the data points name
                        let divT = document.createElement("textarea"); // Create a new element
                        divT.className = 'mt-3 form-control';
                        divT.setAttribute('id', 'dataTextAreaD1' + i); // Change the text of the element
                        divT.setAttribute('name', 'dataTextAreaD1' + i); // Change the text of the element
                        divT.setAttribute('row', '1');

                        let divL2 = document.createElement("label"); // Create a new element
                        divL2.className = 'mt-3';
                        divL2.setAttribute('for', 'DataTextArea');
                        divL2.setAttribute('value', 'dataTextAreaL' + i);
                        divL2.setAttribute('name', 'dataTextAreaL' + i); // Change the text of the element

                        //data points valuer
                        let divT2 = document.createElement("input"); // Create a new element
                        divT2.className = 'mt-3 form-control';
                        divT2.setAttribute('id', 'dataTextAreaD2' + i); // Change the text of the element
                        divT2.setAttribute('name', 'dataTextAreaD2' + i); // Change the text of the element
                        divT2.setAttribute('row', '1');
                        divT2.setAttribute('min', '0'); // Change the text of the element
                        divT2.setAttribute('step', '1'); // Change the text of the element
                        divT2.setAttribute('data-bind', 'value:' + 'dataTextAreaD2' + i); // Change the text of the element
                        divT2.setAttribute('type', 'number'); // Change the text of the element


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
                        data.push(intval(document.getElementById("dataTextArea2" + i).value));

                    }

                    let colours = randomInteger(dataPointAmount);

                });



                function generateChartJson(chartName, chartType, label, data, colours) {


                    console.log({
                        'type': chartType,
                        'data': {
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
                    for (let i = 0; i < amount; i++) {
                        console.log(
                            `rgb(${Math.floor(Math.random()*(255 + 1))} , ${Math.floor(Math.random()*(255 + 1))}, ${Math.floor(Math.random()*(255 + 1))})`
                        );
                        backgroundColor.push(
                            `rgb(${Math.floor(Math.random()*(255 + 1))} , ${Math.floor(Math.random()*(255 + 1))}, ${Math.floor(Math.random()*(255 + 1))})`
                        );
                    }
                    return backgroundColor;
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
