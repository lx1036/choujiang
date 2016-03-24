<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
        <title>幸运书单抽奖</title>
        <!-- 新 Bootstrap 核心 CSS 文件 -->
        <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <style>
            body{
                background-color: #ff0000;
            }
            .input-group{
                margin-top: 10px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-12">
                    <legend style="text-align: center;margin-top: 20%">幸运书单</legend>
                    <form action="{{ url('/liuxiang/wechat/luckbook') }}" accept-charset="UTF-8" enctype="multipart/form-data" method="post">
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1">员工号:</span>
                            <input type="text" class="form-control" placeholder="请输入您的员工号" aria-describedby="basic-addon1" name="luckbook_number">
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon2">姓名:</span>
                            <input type="text" class="form-control" placeholder="请输入您的姓名" aria-describedby="basic-addon2" name="luckbook_name">
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon3">第一本心愿书名</span>
                            <input type="text" class="form-control" placeholder="请输入您的第一本心愿书名" aria-describedby="basic-addon3" name="luckbook_book[]">
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon4">第二本心愿书名</span>
                            <input type="text" class="form-control" placeholder="请输入您的第二本心愿书名" aria-describedby="basic-addon4" name="luckbook_book[]">
                        </div>
                        <button type="submit" id="vote_users" class="btn btn-success btn-lg" style="text-align: center; width: 100%;margin-top: 10px">提交</button>
                        @if(count($errors) > 0)
                            <div class="alert alert-danger" style="margin-top: 10px">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{$error}}</li>
                                        @endforeach
                                    </ul>
                            </div>
                        @endif
                    </form>
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