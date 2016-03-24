<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" cotent="IE-edge, chrome=1">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <link href="http://fonts.googleapis.com/css?family=Josefin+Slab:400,700" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="{{asset('/css/liuxiang/css3/css3test01/css3test01.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('/css/liuxiang/css3/css3test01/style.css')}}">
        <!-- 新 Bootstrap 核心 CSS 文件 -->
        {{--<link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">--}}
    </head>
    <body>
        <div class="container">
            <div class="st-container">

                <input type="radio" name="radio-set" checked="checked" id="st-control-1">
                <a href="#st-panel-1">Serendipity</a>
                <input type="radio" name="radio-set" id="st-control-2">
                <a href="#st-panel-2">Happiness</a>
                <input type="radio" name="radio-set" id="st-control-3">
                <a href="#st-panel-3">Tranquillity</a>
                <input type="radio" name="radio-set" id="st-control-4">
                <a href="#st-panel-4">Positivity</a>
                <input type="radio" name="radio-set" id="st-control-5">
                <a href="#st-panel-5">Passion</a>

                <div class="st-scroll">
                    <section class="st-panel" id="st-panel-1">
                        <div class="st-desc" data-icon="H"></div>
                        <h2>Serendipity</h2>
                        <p>PHPStorm PHPStorm PHPStorm PHPStorm PHPStorm PHPStorm PHPStorm</p>
                    </section>
                    <section class="st-panel st-color" id="st-panel-2">
                        <div class="st-desc" data-icon="2"></div>
                        <h2>Happiness</h2>
                        <p>PHPStorm PHPStorm PHPStorm PHPStorm PHPStorm PHPStorm PHPStorm</p>
                    </section>
                    <section class="st-panel" id="st-panel-3">
                        <div class="st-desc" data-icon="B"></div>
                        <h2>Tranquillity</h2>
                        <p>PHPStorm PHPStorm PHPStorm PHPStorm PHPStorm PHPStorm PHPStorm</p>
                    </section>
                    <section class="st-panel st-color" id="st-panel-4">
                        <div class="st-desc" data-icon="x"></div>
                        <h2>Positivity</h2>
                        <p>PHPStorm PHPStorm PHPStorm PHPStorm PHPStorm PHPStorm PHPStorm</p>
                    </section>
                    <section class="st-panel" id="st-panel-5">
                        <div class="st-desc" data-icon="C"></div>
                        <h2>Passion</h2>
                        <p>PHPStorm PHPStorm PHPStorm PHPStorm PHPStorm PHPStorm PHPStorm</p>
                    </section>
                </div>
            </div>
        </div>

        <!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
        {{--<script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>--}}
        <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
        {{--<script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>--}}
    </body>
</html>