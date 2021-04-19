<div class="wrapper">
    <?php
    include("header.php");
    ?>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <script src="https://cdn.jsdelivr.net/npm/roughjs@3.1.0/dist/rough.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-rough@0.2.0"></script>

    <div id="content">
        <div class="container-fluid" style="padding-left: 0; padding-right: 0;">
            <div class="row">
                <div class="col-3">            
                    <div class="sm-sidenav">
                        <div class="container">
                            <div class="btn-group-vertical btn-block">
                                <button id="bar_chart" class="btn btn-primary">Bar Chart</button>
                                <button id="pie_chart" class="btn btn-primary">pie Chart</button>
                                <button id="line_chart" class="btn btn-primary">line Chart</button>
                                <button id="polar_chart" class="btn btn-primary">polar Chart</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-9">
                    <h2>Social Media Activity For CryptoCurrency</h2>
                    <h3>Reddit</h3>
                    <div class="container">
                        <canvas id="myChart" width="400" height="400"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <script>

            var chartColors = {
                red: 'rgb(255, 99, 132)',
                orange: 'rgb(255, 159, 64)',
                yellow: 'rgb(255, 205, 86)',
                green: 'rgb(75, 192, 192)',
                blue: 'rgb(54, 162, 235)',
                purple: 'rgb(153, 102, 255)',
                grey: 'rgb(201, 203, 207)'
            };


            var Query_URL = "https://min-api.cryptocompare.com/data/social/coin/histo/day?";
            var Api_Key = "&api_key=86c8dd466a461331543dc4eeb88131f61e43a9d13515e3133fc8859e93487a6a";


            var label = [];
            var dataBar = [];
            var chart_type = "bar";
            var list = [];
            var i_list = [];


            $.ajax({
                url: (Query_URL + Api_Key),
                type: "GET",
                dataType: "json",
                success: function (data) {
                    console.log(data);
                    // Loops API data into arrays to be used in the Chart Creation
                    for (var i = 0; i <= data.Data.length; i++) {
                        dataBar.push(data.Data[i]);
                        label.push(data.Data[i]);
                    }

                    createChart();

                }

            });

            function createChart() {

                var color = Chart.helpers.color;
                var config = {
                    type: chart_type,
                    data: {
                        labels: ["Reddit Comments Per Hour"],
                        datasets: [
                            { // puts data in dataset to be displayed
                                label: "Active Users: " + [label[0].reddit_active_users],
                                backgroundColor: chartColors.red,
                                borderColor: chartColors.blue,
                                borderWidth: 1,
                                data: [dataBar[0].reddit_comments_per_hour],
                                
                                rough: {
                                    fillStyle: 'cross-hatch',
                                    hachureGap: 5
                                }
                            },
                            {
                                label: "Active Users: " + [label[1].reddit_active_users],
                                backgroundColor: chartColors.orange,
                                borderColor: chartColors.blue,
                                borderWidth: 1,
                                data: [dataBar[1].reddit_comments_per_hour],
                            }, {
                                label: "Active Users: " + [label[2].reddit_active_users],
                                backgroundColor: chartColors.purple,
                                borderColor: chartColors.blue,
                                borderWidth: 1,
                                data: [dataBar[2].reddit_comments_per_hour],
                            }, {
                                label: "Active Users: " + [label[3].reddit_active_users],
                                backgroundColor: chartColors.green,
                                borderColor: chartColors.blue,
                                borderWidth: 1,
                                data: [dataBar[3].reddit_comments_per_hour],
                            }, {
                                label: "Active Users: " + [label[4].reddit_active_users],
                                backgroundColor: chartColors.grey,
                                borderColor: chartColors.blue,
                                borderWidth: 1,
                                data: [dataBar[4].reddit_comments_per_hour],
                            }, {
                                label: "Active Users: " + [label[5].reddit_active_users],
                                backgroundColor: chartColors.yellow,
                                borderColor: chartColors.blue,
                                borderWidth: 1,
                                data: [dataBar[5].reddit_comments_per_hour],
                            }, {
                                label: "Active Users: " + [label[6].reddit_active_users],
                                backgroundColor: chartColors.blue,
                                borderColor: chartColors.blue,
                                borderWidth: 1,
                                data: [dataBar[6].reddit_comments_per_hour],
                            },
                            {
                                label: "Active Users: " + [label[7].reddit_active_users],
                                backgroundColor: chartColors.purple,
                                borderColor: chartColors.blue,
                                borderWidth: 1,
                                data: [dataBar[7].reddit_comments_per_hour],
                            }
                        ]
                    },
                    // configuration options for chart
                    plugins: [ChartRough],
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        legend: {
                            display: true
                        },
                        title: {
                            display: true,
                            fontColor: 'black',
                        },
                        plugins: {
                            rough: {
                                enabled: true
                            }
                        }
                    },
                };


                Chart.defaults.global.defaultFontFamily = '"Indie Flower", cursive';
                Chart.defaults.global.defaultFontSize = 14;


                window.onload = function createChart() {
                    var ctx = document.getElementById('myChart').getContext('2d');
                    window.myChart = new Chart(ctx, config);
                };

                document.getElementById('bar_chart').addEventListener('click', function () {
                    window.myChart.destroy();
                    chart_type = "bar";
                    window.createChart();
                });

                document.getElementById('pie_chart').addEventListener('click', function () {
                    window.myChart.destroy();
                    chart_type = "pie";
                    window.createChart();
                });

                document.getElementById('line_chart').addEventListener('click', function () {
                    chart_type = "line";
                    window.myChart.update();
                });

                document.getElementById('polar_chart').addEventListener('click', function () {
                    chart_type = "polar";
                    window.myChart.update();
                });
            }

        </script>

        <!-- You guys need to include EOF so that jquery and bootstrap js works -->
        <?php
        include("eof.php");
        ?>

    </div>

</div>