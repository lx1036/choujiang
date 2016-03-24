<html lang="en">
<head>
    <title>URL Shortener</title>
    <link rel="stylesheet" href="{{asset('css/liuxiang/url/style.css')}}">
    {{--{{ HTML::style('css/liuxiang/url/style.css') }}--}}
</head>
    <body>
        <div id="container">
            <h2>短链接生成器</h2>

            @if(Session::has('errors'))
                <h3 class="error">{{$errors->first('link')}}</h3>
            @endif

            @if(Session::has('message'))
                <h3 class="error">{{Session::get('message')}}</h3>
            @endif

            @if(Session::has('link'))
                <h3 class="success">
    {{--                {{Html::link(Session::get('link'),url('/').'/'.Session::get('link'),['target','_blank'])}}--}}
                </h3>
            @endif


            {{Form::open(array('url'=>'/url','method'=>'post'))}}
            {{Form::text('link', '请输入您的网址!')}}
{{--            {{Form::text('link',Input::old('link'), array('placeholder'=>'请输入您的网址!'))}}--}}
            {{Form::close()}}
        </div>

    </body>
</html>