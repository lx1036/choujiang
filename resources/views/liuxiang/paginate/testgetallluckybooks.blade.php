<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>幸运书单抽奖结果</title>
    <!-- 新 Bootstrap 核心 CSS 文件 -->
    <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <style>
        body,html{
            background: #ff0000;
        }
        legend{
            margin-top: 15px;
            text-align: center;
            -webkit-text-fill-color: #ffffff;
            mso-fills-color: #ffffff;
            mso-scheme-fill-color: #ffffff;
        }
        table,th{
            text-align: center;
            border-radius: 10px;
        }
        .container{
            width: 90%;
            height: auto;
            /*border-radius: 2px;*/
        }
        h3{
            text-align: center;
            -webkit-text-fill-color: #FFFFFF;
            mso-scheme-fill-color: #ffffff;
            mso-fills-color: #ffffff;
        }
        div.pagination{
            width: 100%;
            text-align: center;
            margin-bottom: 10px;
            /*align-content: center;*/
            /*margin:auto auto;*/
        }
        ul.pagination{
            margin: 20px auto;
            /*margin-bottom: 10px;*/
        }
    </style>
</head>
<body>
    <legend>幸运书单全部名单</legend>
    <div class="container">
        <div class="row">
            {{--@foreach($all_lucky_books as $key=>$all_lucky_book)--}}
            {{--{!! $all_lucky_book->name !!}--}}
            {{--@endforeach--}}
            <table class="table" contenteditable="false">
                <thead>
                <tr class="success">
                    <th>序号</th>
                    <th>员工号</th>
                    <th>姓名</th>
                    <th>幸运书单一</th>
                    <th>幸运书单二</th>
                </tr>
                </thead>
                <tbody>
                @foreach($all_lucky_books as $key => $luck_book_result)
                    <tr class="danger">
                        <td>{!! $luck_book_result->id !!}</td>
                        <td>{!! $luck_book_result->number !!}</td>
                        <td>{!! $luck_book_result->name !!}</td>
                        <td>{!! $luck_book_result->book_name_1 !!}</td>
                        <td>{!! $luck_book_result->book_name_2 !!}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{--</div>--}}
            {{--</div>--}}
        </div>
    </div>
    <div class="pagination">
        {!! $all_lucky_books->appends(['name'=>'lx'])->fragment('foo')->render() !!}
    </div>


<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
<script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script>

</script>
</body>
</html>