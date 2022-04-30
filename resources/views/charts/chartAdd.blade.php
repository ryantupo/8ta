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
                    <input type="text" class="form-control" id="chartName" placeholder="Enter Chart Name" value="chartName"
                        maxlength="18" name="chartName" required>
                </div>

                {{-- the type of chart --}}
                <div class="mt-3 form-group">
                    <label for="charts">Type Of Chart</label>
                    <select class="form-control" id="chart" value="chartType" name="chartType">
                        <option>pie</option>
                        <option>line</option>
                    </select>
                </div>


                <div class="mt-3 form-group">
                    <p style="font-size: 12px;" for="chartJsonData">Example of formatter Json ->
                        {"YjKMR":271,"WYox6":939,"BG1VE":406,"2ULc1":917} <- </p>
                            <label for="chartJsonData">chartJsonData</label>
                            <input type="text" class="form-control" id="chartJsonData" placeholder="Enter Chart json data"
                                value='{}' name="chartJsonData" required>
                </div>

                {{-- data names and values --}}
                <div id="datasets" class="form-group"></div>

                <button style="margin:auto;" type="submit" class="mt-3 button btn btn-success btn-lg center-block"
                    id="submitBtn">Add Chart</button>

            </form>
        </div>
    </body>

    <style>
        .form {
            margin: auto;
            margin-top: 50px;
            width: 50%;
        }

        .label {
            display: inline-flex;
            align-items: center;
            cursor: pointer;
            color: #394a56;
        }

        .label-text {
            margin-left: 16px;
        }

        .toggle {
            margin-left: 15px;
            margin-right: 15px;
            isolation: isolate;
            position: relative;
            height: 30px;
            width: 100px;
            border-radius: 15px;
            overflow: hidden;
            box-shadow:
                -8px -4px 8px 0px #ffffff,
                8px 4px 12px 0px #d1d9e6,
                4px 4px 4px 0px #d1d9e6 inset,
                -4px -4px 4px 0px #ffffff inset;
        }

        .toggle-state {
            display: none;
        }

        .indicator {
            height: 100%;
            width: 200%;
            background: #ecf0f3;
            border-radius: 15px;
            transform: translate3d(-75%, 0, 0);
            transition: transform 0.4s cubic-bezier(0.85, 0.05, 0.18, 1.35);
            box-shadow:
                -8px -4px 8px 0px #ffffff,
                8px 4px 12px 0px #d1d9e6;
        }

        .toggle-state:checked~.indicator {
            transform: translate3d(25%, 0, 0);
        }



        #toggle:checked~.control-me {
            display: none;
            /*this works*/
        }

        #toggle:~.control-me {
            visibility: visible;
            /*this works*/
        }

        #toggle:checked~.value {
            display: none;
            /*this does not work*/
        }

    </style>
@endsection
