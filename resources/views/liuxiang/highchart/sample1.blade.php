<!doctype html>
<html lang="en">
<head>
    <style>
        div{
            margin: 10% auto;
        }
    </style>
</head>
<body>
    <div id="container" style="min-width:700px;height:400px"></div>


    <script type="text/javascript" src="http://cdn.hcharts.cn/jquery/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="http://cdn.hcharts.cn/highcharts/highcharts.js"></script>
    <script type="text/javascript" src="http://cdn.hcharts.cn/highcharts/modules/exporting.js"></script>
    <script>
        function setChart(name, categories, data, color) {
            chart.xAxis[0].setCategories(categories, false);
            chart.series[0].remove(false);
            chart.addSeries({
                name: name,
                data: data,
                color: color || 'white'
            }, false);
            chart.redraw();
        }
        var drawChart = function () {
            $.getJSON('/liuxiang/wechat/highchart', function (data) {
                var colors = Highcharts.getOptions().colors,
                        categories = data['categories'],
                        name       = 'Browser brands';
                data['data'].forEach(function (element, index, array) {
                    element['color'] = colors[index];
                });
                var json = JSON.stringify(data);
                console.log(json);



                var chart = $('#container').highcharts({
                            chart: {
                                type: 'column'
                            },
                            title: {
                                text: '当当年会节目投票'
                            },
                            subtitle: {
                                text: 'Click the columns to view versions. Click again to view brands.'
                            },
                            xAxis: {
                                categories: categories
                            },
                            yAxis: {
                                title: {
                                    text: 'Total percent market share'
                                }
                            },
                            plotOptions: {
                                column: {
                                    cursor: 'pointer',
                                    point: {
                                        events: {
                                            click: function() {
                                                var drilldown = this.drilldown;
                                                if (drilldown) { // drill down
                                                    setChart(drilldown.name, drilldown.categories, drilldown.data, drilldown.color);
                                                } else { // restore
                                                    setChart(name, categories, data);
                                                }
                                            }
                                        }
                                    },
                                    dataLabels: {
                                        enabled: true,
                                        color: colors[0],
                                        style: {
                                            fontWeight: 'bold'
                                        },
                                        formatter: function() {
                                            return this.y +'%';
                                        }
                                    }
                                }
                            },
                            tooltip: {
                                formatter: function() {
                                    var point = this.point,
                                            s = this.x +':<b>'+ this.y +'% market share</b><br/>';
                                    if (point.drilldown) {
                                        s += 'Click to view '+ point.category +' versions';
                                    } else {
                                        s += 'Click to return to browser brands';
                                    }
                                    return s;
                                }
                            },
                            series: [{
                                name: name,
                                data: json,
                                color: 'white'
                            }],
                            exporting: {
                                enabled: false
                            }
                        }).highcharts(); // return chart

//                console.log(chart);
            })
        };

        drawChart();
//        setInterval(drawChart, 5000);
    </script>
</body>
</html>