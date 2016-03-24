<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-COMPATIBLE" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="icon" href="https://res.wx.qq.com/mpres/htmledition/images/favicon218877.ico">

    <title>微信公众号菜单设置后台</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <!-- 可选的Bootstrap主题文件（一般不用引入） -->
    <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="" style="text-align: center">
                <h1>互动区</h1>
            </div>
            <div class="col-md-12">
                <table class="table" contenteditable="false">
                    <thead>
                        <tr class="success">
                            <th>编号</th>
                            <th>功能</th>
                            <th>完成状态</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="success">
                            <td>1</td>
                            <td>用户关注公众号后立刻得到用户的基本信息，插入users表</td>
                            <td>已解决</td>
                        </tr>
                        <tr class="success">
                            <td>2</td>
                            <td>用户取消关注公众号后，软删除users表，并且msg_text和msg_img表中该用户信息软删除</td>
                            <td>已解决</td>
                        </tr>
                        <tr class="success">
                            <td>3</td>
                            <td>用户发文本信息，微信互动区能显示对应的文本内容</td>
                            <td>已解决</td>
                        </tr>
                        <tr class="success">
                            <td>4</td>
                            <td>用户发图片信息，前台以气泡形式显示图片</td>
                            <td>已解决</td>
                        </tr>
                        <tr class="success">
                            <td>5</td>
                            <td>用户发语音信息，前台显示对应的文本信息</td>
                            <td>已解决</td>
                        </tr>
                        <tr class="success">
                            <td>6</td>
                            <td>用户发表情信息，微信互动区只能显示对应的文本，不能显示表情</td>
                            <td>已解决</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-12">
                <table class="table" contenteditable="false">
                    <thead>
                        <tr class="warning">
                            <th>编号</th>
                            <th>功能</th>
                            <th>完成状态</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="warning">
                            <td>1</td>
                            <td>一段时间内，定时推送图文信息，用于说明节目内容，里面可以利用微信自带的投票功能做投票展示</td>
                            <td>待解决</td>
                        </tr>
                        <tr class="warning">
                            <td>2</td>
                            <td>抓取用户投票后的数据，可以用图形方式展现，可展示在前台或者后台</td>
                            <td>待解决</td>
                        </tr>
                        <tr class="warning">
                            <td>3</td>
                            <td>模仿微现场做个状态栏实现页面切换</td>
                            <td>待解决</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="" style="text-align: center">
                <h1>抽奖区</h1>
            </div>
            <div class="col-md-12">
                <table class="table" contenteditable="false">
                    <thead>
                        <tr class="success">
                            <th>编号</th>
                            <th>功能</th>
                            <th>完成状态</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="success">
                            <td>1</td>
                            <td>利用人名实现滚轮抽奖</td>
                            <td>已解决</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-12">
                <table class="table" contenteditable="false">
                    <thead>
                        <tr class="warning">
                            <th>编号</th>
                            <th>功能</th>
                            <th>完成状态</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="warning">
                            <td>1</td>
                            <td>摇一摇抽奖</td>
                            <td>待解决</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="" style="text-align: center">
                <h1>签到区</h1>
            </div>
            <div class="col-md-12">
                <table class="table" contenteditable="false">
                    <thead>
                        <tr class="success">
                            <th>编号</th>
                            <th>功能</th>
                            <th>完成状态</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="success">
                            <td>1</td>
                            <td>图片泡泡签到</td>
                            <td>已解决</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-12">
                <table class="table" contenteditable="false">
                    <thead>
                        <tr class="warning">
                            <th>编号</th>
                            <th>功能</th>
                            <th>完成状态</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="warning">
                            <td>1</td>
                            <td>静态图片上墙签到</td>
                            <td>待解决</td>
                        </tr>
                        <tr class="warning">
                            <td>1</td>
                            <td>图片PPT展示，翻页效果</td>
                            <td>待解决</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="" style="text-align: center">
                <h1>后台区</h1>
            </div>
            <div class="col-md-12">
                <table class="table" contenteditable="false">
                    <thead>
                        <tr class="success">
                            <th>编号</th>
                            <th>功能</th>
                            <th>完成状态</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
            <div class="col-md-12">
                <table class="table" contenteditable="false">
                    <thead>
                        <tr class="warning">
                            <th>编号</th>
                            <th>功能</th>
                            <th>完成状态</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="warning">
                            <td>1</td>
                            <td>后台界面完全抄袭微现场后台界面</td>
                            <td>待解决</td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>




    <script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
    <script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>