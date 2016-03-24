<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-COMPATIBLE" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="icon" href="https://res.wx.qq.com/mpres/htmledition/images/favicon218877.ico">

    <title>图书专题页功能点</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <!-- 可选的Bootstrap主题文件（一般不用引入） -->
    <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
</head>
<body>

<div class="container">
    <div class="row">
        <div class="" style="text-align: center">
            <h1>图书专题页功能点</h1>
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
                        <td>点击加入购物车后，总价格和总数量也要随之更新，<strong>且页面刷新后保留数据</strong>，且在弹出层显示购买的商品</td>
                        <td>已解决</td>
                    </tr>
                    <tr class="success">
                        <td>2</td>
                        <td>未购买商品时，点击总价格按钮，显示“暂无商品”，再次点击消失</td>
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
                        <td>当未购买商品时，“-”和购物车按钮Disable，且鼠标为default状态，<em style="color: red;"><strong>样式应该为灰色，待可点击时变色</strong></em></td>
                        <td>待解决</td>
                    </tr>
                    <tr class="warning">
                        <td>2</td>
                        <td>当未购买商品时，购物车应该为灰色，购买数量大于0时，才可点击变红</td>
                        <td>待解决</td>
                    </tr>
                    <tr class="warning">
                        <td>3</td>
                        <td>商品加入商品栏时，以动画方式加入</td>
                        <td>待解决</td>
                    </tr>
                    <tr class="warning">
                        <td>4</td>
                        <td>在弹出层点击“+”和“-”按钮时，有时不能点击，好像有bug。应该点击后总数量和总价格实时更新，且刷新后也是更新后的数据</td>
                        <td>待解决</td>
                    </tr>
                    <tr class="warning">
                        <td>5</td>
                        <td style="color: red">点击删除按钮后，删除整个商品，且总数量和总价格实时更新，刷新后也是更新后的数据</td>
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