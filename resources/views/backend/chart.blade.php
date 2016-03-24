<html lang="en">
    <head>
        <title>Chart</title>
        <!-- 新 Bootstrap 核心 CSS 文件 -->
        <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <style>
            .bg_tp{ background:url('{!! asset('images/wechat/bg_tp.jpg') !!}') repeat center top;background-size: cover;}
            .tp{width:1260px;height:651px; overflow:hidden; background:#fff; margin:95px auto 0; border-radius:30px;}
            body,html{
                /*background: #ff0000;*/
            }
            /*.chart{*/

            /*}*/
            /*legend{*/
                /*text-align: center;*/
                /*margin-top: 2%;*/
                /*-webkit-text-fill-color: #ff0000;*/
                /*mso-scheme-fill-color: #ff0000;*/
                /*mso-fills-color: #ff0000;*/
            /*}*/
            /*#myChart{*/
                /*margin: 0 auto;*/
                /*width: 1000px;*/
                /*height: 600px;*/
            /*}*/
            canvas{
                padding-left: 0;
                padding-right: 0;
                /*margin: auto auto;*/
                margin-top: 20px;
                margin-left: auto;
                margin-right: auto;
                display: block;
                width: 1200px;
                height: 600px;
            }
        </style>
    </head>
    <body class="bg_tp">
        <div class="chart tp">
            {{--<legend>投票图</legend>--}}
            {{--<div>--}}
                <canvas id="myChart"></canvas>
            {{--</div>--}}
        </div>
        {{--<div id="chart_data" style="display: none">--}}
            {{--{{$chart_data}}--}}
        {{--</div>--}}

        <!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
        <script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
        <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
        <script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script src="//cdn.bootcss.com/Chart.js/1.0.2/Chart.min.js"></script>
        {{--<script src="//cdn.bootcss.com/Chart.js/2.0.0-alpha2/Chart.min.js"></script>--}}
        {{--<script src="//cdn.bootcss.com/Chart.js/2.0.0-alpha2/Chart.js"></script>--}}
        {{--<script src="//cdn.bootcss.com/Chart.js/2.0.0-alpha3/Chart.min.js"></script>--}}
        {{--<script src="//cdn.bootcss.com/Chart.js/2.0.0-beta2/Chart.min.js"></script>--}}
        <script>
//            var drawChart = function () {
//                $.ajax({
//                    type    : 'GET',
//                    url     : '/liuxiang/wechat/chart',
//                    success : function (data) {
//                        var context = $('#myChart').get(0).getContext('2d');
//                        var options = {
////                        scaleOverlay : false,
//                            scaleLineColor     : "rgba(255,0,0,0.5)",
//                            scaleLineWidth     : 2,
//                            scaleShowLabels    : true,
//                            scaleFontFamily    : "'Arial'",
//                            scaleGridLineColor : "rgba(255,0,0,0.1)",
//                            animation          : false
//                        };
//                        window.myBarChart = new Chart(context).Bar(data, options);
//                    }
//                });
//            };
            drawChart();
            setInterval(drawChart,5000);
            function drawChart(){
                $.getJSON('/liuxiang/wechat/chart',function(data){
                    var context = $('#myChart').get(0).getContext('2d');
                    {{--Bar.defaults = {--}}
                        {{--//Boolean - If we show the scale above the chart data--}}
                        {{--scaleOverlay : false,--}}

                        {{--//Boolean - If we want to override with a hard coded scale--}}
                        {{--scaleOverride : false,--}}

                        {{--//** Required if scaleOverride is true **--}}
                        {{--//Number - The number of steps in a hard coded scale--}}
                        {{--scaleSteps : null,--}}
                        {{--//Number - The value jump in the hard coded scale--}}
                        {{--scaleStepWidth : null,--}}
                        {{--//Number - The scale starting value--}}
                        {{--scaleStartValue : null,--}}

                        {{--//String - Colour of the scale line--}}
                        {{--scaleLineColor : "rgba(0,0,0,.1)",--}}

                        {{--//Number - Pixel width of the scale line--}}
                        {{--scaleLineWidth : 1,--}}

                        {{--//Boolean - Whether to show labels on the scale--}}
                        {{--scaleShowLabels : false,--}}

                        {{--//Interpolated JS string - can access value--}}
                        {{--scaleLabel : "<%=value%>",--}}

                        {{--//String - Scale label font declaration for the scale label--}}
                        {{--scaleFontFamily : "'Arial'",--}}

                        {{--//Number - Scale label font size in pixels--}}
                        {{--scaleFontSize : 12,--}}

                        {{--//String - Scale label font weight style--}}
                        {{--scaleFontStyle : "normal",--}}

                        {{--//String - Scale label font colour--}}
                        {{--scaleFontColor : "#666",--}}

                        {{--///Boolean - Whether grid lines are shown across the chart--}}
                        {{--scaleShowGridLines : true,--}}

                        {{--//String - Colour of the grid lines--}}
                        {{--scaleGridLineColor : "rgba(0,0,0,.05)",--}}

                        {{--//Number - Width of the grid lines--}}
                        {{--scaleGridLineWidth : 1,--}}

                        {{--//Boolean - If there is a stroke on each bar--}}
                        {{--barShowStroke : true,--}}

                        {{--//Number - Pixel width of the bar stroke--}}
                        {{--barStrokeWidth : 2,--}}

                        {{--//Number - Spacing between each of the X value sets--}}
                        {{--barValueSpacing : 5,--}}

                        {{--//Number - Spacing between data sets within X values--}}
                        {{--barDatasetSpacing : 1,--}}

                        {{--//Boolean - Whether to animate the chart--}}
                        {{--animation : true,--}}

                        {{--//Number - Number of animation steps--}}
                        {{--animationSteps : 60,--}}

                        {{--//String - Animation easing effect--}}
                        {{--animationEasing : "easeOutQuart",--}}

                        {{--//Function - Fires when the animation is complete--}}
                        {{--onAnimationComplete : null--}}
                    {{--};--}}
                    var options = {
//                        scaleOverlay : false,
                        scaleFontSize      : 16,
                        scaleLineColor     : "rgba(255,0,0,0.5)",
                        scaleLineWidth     : 2,
                        scaleShowLabels    : true,
                        scaleFontFamily    : "'Arial'",
                        scaleGridLineColor : "rgba(255,0,0,0.1)",
                        animation          : false
                    };
//                    window.myBarChart = new Chart(context, {
//                        type: 'bar',
//                        data: data,
//                        options: options
//                    });
//                    var myBarChart = Chart.Bar(context, {
//                        data: data,
//                        options: options
//                    });
                    window.myBarChart = new Chart(context).Bar(data, options);
                });
            }
        </script>
    </body>
</html>