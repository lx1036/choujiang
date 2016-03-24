<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
        <title>当当年会节目投票结果</title>
        <!-- 新 Bootstrap 核心 CSS 文件 -->
        <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <style>
            body{
                background-color: #ff0000;
            }
            legend{
                text-align: center;
                -webkit-text-fill-color: #ffffff;
                mso-scheme-fill-color: #ffffff;
                mso-fills-color: #ffffff;
            }
            li{
                font-size: large;
            }
            span{
                -webkit-text-fill-color: #ff0000;
                mso-scheme-fill-color: #ff0000;
                mso-fills-color: #ff0000;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-12" style="margin-top: 20%">
                    <legend>当当年会节目投票结果</legend>
                    <ul class="list-group">
                        @foreach($vote_results as $vote_result)
                        <li class="list-group-item">
                            <span>{!! $vote_result->name !!}</span>共得到:
                            <span>{!! $vote_result->vote_count !!}</span>票!!!
{{--                            {!! $vote_result->name.': 共得到'.$vote_result->vote_count.'票!!!' !!}--}}
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
        <script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
        <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
        <script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script>

        </script>
    </body>
</html>