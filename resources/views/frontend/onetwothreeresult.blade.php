<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>一二三等奖</title>
    <!-- 新 Bootstrap 核心 CSS 文件 -->
    <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <style>
        body,html{
            background: #ff0000;
        }
        th{
            text-align: center;
        }
        .container{
            width: 100%;
            height: 100%;
        }
        legend,table{
            text-align: center;
            font-size: 25px;
        }
        legend{
            -webkit-text-fill-color: #ffffff;
            mso-scheme-fill-color: #ffffff;
            mso-fills-color: #ffffff;
            margin-top: 10px;
        }
        img{
            width: 100px;
            height: 100px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        {{--<div class="col-xs-12 col-md-12">--}}
        {{--<div class="table-responsive">--}}
        @foreach($prizes as $key => $prize)
            @if($key == 'one')
                <legend>一等奖中奖名单</legend>
            @elseif($key == 'two')
                <legend>二等奖中奖名单</legend>
            @else
                <legend>三等奖中奖名单</legend>
            @endif
                <table class="table" contenteditable="false">
                    <thead>
                        <tr class="success">
                            <th>序号</th>
                            <th>工号</th>
                            <th>姓名</th>
                            <th>部门</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($prize as $k => $item)
                        <tr class="danger">
                            <td>{!! $k !!}</td>
                            <td>{!! $item->number !!}</td>
                            <td>{!! $item->name !!}</td>
                            <td>{!! $item->department !!}</td>
                            {{--<td><img src="{!! $item->headimgurl !!}"></td>--}}
                        </tr>
                    @endforeach
                    </tbody>
                </table>
        @endforeach
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