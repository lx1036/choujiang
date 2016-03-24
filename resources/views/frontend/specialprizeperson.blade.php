<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>特等奖抽奖结果</title>
    <!-- 新 Bootstrap 核心 CSS 文件 -->
    <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <style>
        body,html{
            background: #ff0000;
        }
        th,td{
            text-align: center;
        }
        .container{
            width: 100%;
            height: 100%;
        }
        h3{
            text-align: center;
            -webkit-text-fill-color: #ffffff;
            mso-scheme-fill-color: #ffffff;
            mso-fills-color: #ffffff;
        }
        .small{
            text-align: center;
            margin-bottom: -50px;
            -webkit-text-fill-color: #ffffff;
            mso-scheme-fill-color: #ffffff;
            mso-fills-color: #ffffff;
        }

    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <h3>特等奖抽奖结果</h3>
        <table class="table" contenteditable="false">
            <thead>
                <tr class="success">
                    <th>序号</th>
                    <th>员工号</th>
                    <th>姓名</th>
                    <th>部门</th>
                </tr>
            </thead>
            <tbody>
            @foreach($special_persons as $key => $special_person)
                <tr class="danger">
                    <td>{!! $key !!}</td>
                    <td>{!! $special_person->number !!}</td>
                    <td>{!! $special_person->name !!}</td>
                    <td>{!! $special_person->department !!}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {{--</div>--}}
        {{--</div>--}}
    </div>

</div>
<div class="small">
    <small>土豪,咱俩做朋友吧!!!</small>
</div>

<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
<script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script>

</script>
</body>
</html>