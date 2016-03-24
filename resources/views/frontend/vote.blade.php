<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
        <title>当当年会节目投票</title>
        <style>
            body{
                /*background-color: #ff0000;*/
            }
            h3{
                text-align: center;
                border-top: 10px;
                -webkit-text-fill-color: #ffffff;
                mso-scheme-fill-color: #ffffff;
                mso-fills-color: #ffffff;
                fill-color: #ffffff;
            }
            div.container{
                background-color: #ff0000;
            }
            label{
                font-size: medium;
                /*font-size: large;*/
            }
            input{
                zoom: 150%;
            }
            .alert{
                font-size: large;
            }
        </style>
        <!-- 新 Bootstrap 核心 CSS 文件 -->
        <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="vote_form">
                        <form action="{{ url('/liuxiang/vote?open_id='.$open_id) }}" accept-charset="UTF-8" enctype="multipart/form-data" method="post" name="wechat_vote_form">
                            <h3>当当节目投票<small>(每个人最多只能投三票)</small></h3>
                            @if(Session::has('up_to_counts'))
                                <div class="alert alert-danger" role="alert">你太坏了,每个人只能投三票啊,不要多投哦!!!</div>
                            @elseif(Session::has('down_to_counts'))
                                <div class="alert alert-danger" role="alert">嗨,这么多美妙的节目,你总不能一票不投啊!!!</div>
                            @endif
                            <ul class="vote_option_list list-group">
                                @for($i = 0; $i < count($item_name); $i++)
                                    <li class="vote_option list-group-item">
                                        <input type="checkbox" class="" id="vote_checkbox_{!! $i !!}" name="vote_checkbox_{!! $i !!}" value="{!! $i !!}">
                                        <label for="vote_checkbox_{!! $i !!}" class="form_checkbox_label">
                                            <span class="form_checkbox_word">{!! $item_name[$i] !!}</span>
                                        </label>
                                    </li>
                                @endfor
                            </ul>
                            <button type="submit" id="vote_users" class="btn btn-success btn-lg" style="text-align: center; width: 100%">提交投票</button>
                        </form>


                    </div>
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