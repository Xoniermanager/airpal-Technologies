<div id="revenue_chart_div"> </div>


    <script>
            $(document).ready(function() {
                var graphData = [];
                loadGrpahRevenueData('currentMonth');
                google.charts.load('current', {
                    packages: ['corechart', 'line']
                });
                google.charts.setOnLoadCallback(drawLogScales);

                $("#time-period-revenue").change(function() {
                    var period = $(this).val() ?? 'monthly';
                    loadGrpahRevenueData(period);
                });

                function loadGrpahRevenueData(period) {
                    period = period ?? 'currentMonth';
                    $.ajax({
                        url: "<?= route('revenue.report') ?>",
                        type: 'get',
                        data: {
                            'period': period
                        },
                        success: function(response) {
                            graphData = response;
                            // drawLogScales();
                        },
                        error: function(xhr, status, error) {
                            console.error(error);
                        }
                    });
                }

                // manage graph based on select 
                function drawLogScales() {
                    var data = new google.visualization.DataTable();
                    data.addColumn('number', 'X');
                    data.addColumn('number', 'rate');
                    data.addRows(graphData);

                    var view = new google.visualization.DataView(data);
                    view.setColumns([{
                            sourceColumn: 0,
                            type: 'string',
                            calc: function(dt, rowIndex) {
                                return String(dt.getValue(rowIndex, 0));
                            }
                        },
                        1
                    ]);

                    var options = {
                        hAxis: {
                            title: 'Periods',
                            logScale: false
                        },
                        vAxis: {
                            title: 'Amounts',
                            logScale: false
                        },
                        colors: ['#004cd4', '#097138']
                    };

                    var chart = new google.visualization.LineChart(document.getElementById('revenue_chart_div'));
                    chart.draw(view, options);
                }
            });
    </script>

