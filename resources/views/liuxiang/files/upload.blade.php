<html>
<head>
    <title>Excel文件上传</title>
    <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
</head>
<body>
    <div id="container">
        <div id="row">
            <div class="col-md-12">
                {{--<form class="form-horizontal">--}}
                    {{--<fieldset>--}}
                        {{--<div id="legend" class="">--}}
                            {{--<legend class="">Excel文件导入</legend>--}}
                        {{--</div>--}}
                        {{--<div class="control-group">--}}
                            {{--<label class="control-label">File Button</label>--}}

                            {{--<!-- File Upload -->--}}
                            {{--<div class="controls">--}}
                                {{--<input class="input-file" id="fileInput" type="file">--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="control-group">--}}
                            {{--<label class="control-label">Button</label>--}}

                            {{--<!-- Button -->--}}
                            {{--<div class="controls">--}}
                                {{--<button class="btn btn-success">Button</button>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                    {{--</fieldset>--}}
                {{--</form>--}}
                {!! Form::open(array('url'=>'upload', 'method'=>'post', 'enctype'=>'multipart/form-data')) !!}
                {!! Form::file('excel') !!}
                {!! Form::submit('upload!!!') !!}
                {!! Form::close() !!}
            </div>
        </div>

    </div>

    <script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
    <script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>

</html>