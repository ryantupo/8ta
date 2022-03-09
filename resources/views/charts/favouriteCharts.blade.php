@extends('layouts.layout')

@section('content')

    <body>


        <div id="main" class="row">

            @yield('content')

        </div>

        <div class="drag-list" id="chartBox0" style="border: none;border-style: none; margin-left:15%;">

            <?php try{ ?>
            <div class="drag-item" draggable="false"
                style="margin:10px;box-shadow: rgba(0, 0, 0, 0.2) 0px 7px 29px 0px;">


                <div class="adjust-me-based-on-size">

                    <div>
                        <h1 class="mx-auto pt-1" style="width: 70%;text-align:center;font-size: x-small;">
                            {{ $chart[0]->chart_name }}</h1>
                    </div>

                    <canvas id="myChart"></canvas>
                </div>

                <div id="chart" data-type="{{ $chart[0]->config }}">
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

                    </div>
                </div>
            </div>
            <?php }catch(\Exception $e){ ?>

                echo '<style type="text/css">
                    #chartBox0 {
                        display: none;
                    }
                    </style>';

            <?php } ?>

            <?php try{ ?>
            <div class="drag-item" id="chartBox1" draggable="false"
                style="margin:10px;box-shadow: rgba(0, 0, 0, 0.2) 0px 7px 29px 0px;">
                <div class="adjust-me-based-on-size">
                    <div>
                        <h1 class="mx-auto" style="width: 70%;text-align:center;font-size: x-small;margin-top:-35px">
                            {{ $chart[1]->chart_name }}</h1>
                    </div>
                    <canvas id="myChart1"></canvas>
                </div>
                <div id="chart1" data-type="{{ $chart[1]->config }}">
                    <div>
                        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                        <script>
                            var elem = document.getElementById('chart1');
                            var config = JSON.parse(elem.getAttribute('data-type'));
                        </script>

                        <script>
                            const myChart1 = new Chart(
                                document.getElementById('myChart1'),
                                config
                            );
                        </script>
                    </div>
                </div>
            </div>
            <?php }catch(\Exception $e){ ?>
D
                echo '<style type="text/css">
                    #chartBox1 {
                        display: none;
                    }
                    </style>';

            <?php } ?>

            <?php try{ ?>
            <div class="drag-item" id="chartBox2" draggable="false"
                style="margin:10px;box-shadow: rgba(0, 0, 0, 0.2) 0px 7px 29px 0px;">
                <div class="adjust-me-based-on-size">
                    <div>
                        <h1 class="mx-auto" style="width: 70%;text-align:center;font-size: x-small;margin-top:-35px">
                            {{ $chart[2]->chart_name }}</h1>
                    </div>
                    <canvas id="myChart2"></canvas>
                </div>
                <div id="chart2" data-type="{{ $chart[2]->config }}">
                    <div>
                        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                        <script>
                            var elem = document.getElementById('chart2');
                            var config = JSON.parse(elem.getAttribute('data-type'));
                        </script>

                        <script>
                            const myChart2 = new Chart(
                                document.getElementById('myChart2'),
                                config
                            );
                        </script>
                    </div>
                </div>
            </div>
            <?php }catch(\Exception $e){ ?>

                echo '<style type="text/css">
                    #chartBox2 {
                        display: none;
                    }
                    </style>';

            <?php } ?>

            <?php try{ ?>
            <div class="drag-item" id="chartBox3"  draggable="false"
                style="margin:10px;box-shadow: rgba(0, 0, 0, 0.2) 0px 7px 29px 0px;">
                <div class="adjust-me-based-on-size">
                    <div>
                        <h1 class="mx-auto" style="width: 70%;text-align:center;font-size: x-small;margin-top:-35px">
                            {{ $chart[3]->chart_name }}</h1>
                    </div>
                    <canvas id="myChart3"></canvas>
                </div>
                <div id="chart3" data-type="{{ $chart[3]->config }}">
                    <div>
                        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                        <script>
                            var elem = document.getElementById('chart3');
                            var config = JSON.parse(elem.getAttribute('data-type'));
                        </script>

                        <script>
                            const myChart3 = new Chart(
                                document.getElementById('myChart3'),
                                config
                            );
                        </script>
                    </div>
                </div>
            </div>
            <?php }catch(\Exception $e){ ?>

                echo '<style type="text/css">
                    #chartBox3 {
                        display: none;
                    }
                    </style>';

            <?php } ?>

            <?php try{ ?>
            <div class="drag-item" id="chartBox4" draggable="false"
                style="margin:10px;box-shadow: rgba(0, 0, 0, 0.2) 0px 7px 29px 0px;">
                <div class="adjust-me-based-on-size">
                    <div>
                        <h1 class="mx-auto" style="width: 70%;text-align:center;font-size: x-small;margin-top:-35px">
                            {{ $chart[4]->chart_name }}</h1>
                    </div>
                    <canvas id="myChart4"></canvas>
                </div>
                <div id="chart4" data-type="{{ $chart[4]->config }}">
                    <div>
                        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                        <script>
                            var elem = document.getElementById('chart4');
                            var config = JSON.parse(elem.getAttribute('data-type'));
                        </script>

                        <script>
                            const myChart4 = new Chart(
                                document.getElementById('myChart4'),
                                config
                            );
                        </script>
                    </div>
                </div>
            </div>
            <?php }catch(\Exception $e){ ?>

                echo '<style type="text/css">
                    #chartBox4 {
                        display: none;
                    }
                    </style>';

            <?php } ?>


            <?php try{ ?>
            <div class="drag-item" id="chartBox5" draggable="false"
                style="margin:10px;box-shadow: rgba(0, 0, 0, 0.2) 0px 7px 29px 0px;">
                <div class="adjust-me-based-on-size">
                    <div>
                        <h1 class="mx-auto" style="width: 70%;text-align:center;font-size: x-small;margin-top:-35px">
                            {{ $chart[5]->chart_name }}</h1>
                    </div>
                    <canvas id="myChart5"></canvas>
                </div>
                <div id="chart5" data-type="{{ $chart[5]->config }}">
                    <div>
                        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                        <script>
                            var elem = document.getElementById('chart5');
                            var config = JSON.parse(elem.getAttribute('data-type'));
                        </script>

                        <script>
                            const myChart5 = new Chart(
                                document.getElementById('myChart5'),
                                config
                            );
                        </script>
                    </div>
                </div>
            </div>
            <?php }catch(\Exception $e){ ?>


                echo '<style type="text/css">
                    #chartBox5 {
                        display: none;
                    }
                    </style>';

            <?php } ?>

            <?php try{ ?>
            <div class="drag-item" id="chartBox6" draggable="false"
                style="margin:10px;box-shadow: rgba(0, 0, 0, 0.2) 0px 7px 29px 0px;">
                <div class="adjust-me-based-on-size">
                    <div>
                        <h1 class="mx-auto" style="width: 70%;text-align:center;font-size: x-small;margin-top:-35px">
                            {{ $chart[6]->chart_name }}</h1>
                    </div>
                    <canvas id="myChart6"></canvas>
                </div>
                <div id="chart6" data-type="{{ $chart[6]->config }}">
                    <div>
                        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                        <script>
                            var elem = document.getElementById('chart6');
                            var config = JSON.parse(elem.getAttribute('data-type'));
                        </script>

                        <script>
                            const myChart6 = new Chart(
                                document.getElementById('myChart6'),
                                config
                            );
                        </script>
                    </div>
                </div>
            </div>
            <?php }catch(\Exception $e){ ?>


                echo '<style type="text/css">
                    #chartBox6 {
                        display: none;
                    }
                    </style>';

            <?php } ?>


            <?php try{ ?>
            <div class="drag-item" id="chartBox7" draggable="false"
                style="margin:10px;box-shadow: rgba(0, 0, 0, 0.2) 0px 7px 29px 0px;">
                <div class="adjust-me-based-on-size">
                    <div>
                        <h1 class="mx-auto" style="width: 70%;text-align:center;font-size: x-small;margin-top:-35px">
                            {{ $chart[7]->chart_name }}</h1>
                    </div>
                    <canvas id="myChart7"></canvas>
                </div>
                <div id="chart7" data-type="{{ $chart[7]->config }}">
                    <div>
                        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                        <script>
                            var elem = document.getElementById('chart7');
                            var config = JSON.parse(elem.getAttribute('data-type'));
                        </script>

                        <script>
                            const myChart7 = new Chart(
                                document.getElementById('myChart7'),
                                config
                            );
                        </script>
                    </div>
                </div>
            </div>
            <?php }catch(\Exception $e){ ?>


                echo '<style type="text/css">
                    #chartBox7 {
                        display: none;
                    }
                    </style>';

            <?php } ?>


            <?php try{ ?>
            <div class="drag-item" id="chartBox8" draggable="false"
                style="margin:10px;box-shadow: rgba(0, 0, 0, 0.2) 0px 7px 29px 0px;">
                <div class="adjust-me-based-on-size">
                    <div>
                        <h1 class="mx-auto" style="width: 70%;text-align:center;font-size: x-small;margin-top:-35px">
                            {{ $chart[8]->chart_name }}</h1>
                    </div>
                    <canvas id="myChart8"></canvas>
                </div>
                <div id="chart8" data-type="{{ $chart[8]->config }}">
                    <div>
                        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                        <script>
                            var elem = document.getElementById('chart8');
                            var config = JSON.parse(elem.getAttribute('data-type'));
                        </script>

                        <script>
                            const myChart8 = new Chart(
                                document.getElementById('myChart8'),
                                config
                            );
                        </script>
                    </div>
                </div>
            </div>
            <?php }catch(\Exception $e){ ?>

                echo '<style type="text/css">
                    #chartBox8 {
                        display: none;
                    }
                    </style>';

            <?php } ?>




        </div>


        <style>
            .adjust-me-based-on-size {
                margin-top: 50%;
                width: 100%;
                height: 100%;
                margin: auto;
            }

        </style>



        <style>
            [draggable] {
                -webkit-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
            }

            .drag-list {
                overflow: hidden;
                margin: 10px auto;
                width: 80%;
                border: 1px solid #ccc;
            }

            .drag-item {
                float: left;
                padding: 50px 20px;
                width: 250px;
                height: 250px;
                text-align: center;
                color: #555;
                background: #ddd;
                border: 1px solid #ccc;
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                box-sizing: border-box;
                -webkit-transition: 0.25s;
                -moz-transition: 0.25s;
                -o-transition: 0.25s;
                -ms-transition: 0.25s;
                transition: 0.25s;
            }

            .drag-start {
                opacity: 0.8;
                -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=80)";
                filter: alpha(opacity=80);
            }

            .drag-enter {
                opacity: 0.5;
                -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=50)";
                filter: alpha(opacity=50);
                -webkit-transform: scale(0.9);
                -moz-transform: scale(0.9);
                -o-transform: scale(0.9);
                -ms-transform: scale(0.9);
                transform: scale(0.9);
            }

        </style>


        <script>
            function DragNSort(config) {
                this.$activeItem = null;
                this.$container = config.container;
                this.$items = this.$container.querySelectorAll("." + config.itemClass);
                this.dragStartClass = config.dragStartClass;
                this.dragEnterClass = config.dragEnterClass;
            }

            DragNSort.prototype.removeClasses = function() {
                [].forEach.call(
                    this.$items,
                    function($item) {
                        $item.classList.remove(this.dragStartClass, this.dragEnterClass);
                    }.bind(this)
                );
            };

            DragNSort.prototype.on = function(elements, eventType, handler) {
                [].forEach.call(
                    elements,
                    function(element) {
                        element.addEventListener(eventType, handler.bind(element, this), false);
                    }.bind(this)
                );
            };

            DragNSort.prototype.onDragStart = function(_this, event) {
                _this.$activeItem = this;

                this.classList.add(_this.dragStartClass);
                event.dataTransfer.effectAllowed = "move";
                event.dataTransfer.setData("text/html", this.innerHTML);
            };

            DragNSort.prototype.onDragEnd = function(_this) {
                this.classList.remove(_this.dragStartClass);
            };

            DragNSort.prototype.onDragEnter = function(_this) {
                this.classList.add(_this.dragEnterClass);
            };

            DragNSort.prototype.onDragLeave = function(_this) {
                this.classList.remove(_this.dragEnterClass);
            };

            DragNSort.prototype.onDragOver = function(_this, event) {
                if (event.preventDefault) {
                    event.preventDefault();
                }

                event.dataTransfer.dropEffect = "move";

                return false;
            };

            DragNSort.prototype.onDrop = function(_this, event) {
                if (event.stopPropagation) {
                    event.stopPropagation();
                }

                if (_this.$activeItem !== this) {
                    _this.$activeItem.innerHTML = this.innerHTML;
                    this.innerHTML = event.dataTransfer.getData("text/html");
                }

                _this.removeClasses();

                return false;
            };

            DragNSort.prototype.bind = function() {
                this.on(this.$items, "dragstart", this.onDragStart);
                this.on(this.$items, "dragend", this.onDragEnd);
                this.on(this.$items, "dragover", this.onDragOver);
                this.on(this.$items, "dragenter", this.onDragEnter);
                this.on(this.$items, "dragleave", this.onDragLeave);
                this.on(this.$items, "drop", this.onDrop);
            };

            DragNSort.prototype.init = function() {
                this.bind();
            };

            // Instantiate
            var draggable = new DragNSort({
                container: document.querySelector(".drag-list"),
                itemClass: "drag-item",
                dragStartClass: "drag-start",
                dragEnterClass: "drag-enter"
            });
            draggable.init();
        </script>



    </body>
@endsection
