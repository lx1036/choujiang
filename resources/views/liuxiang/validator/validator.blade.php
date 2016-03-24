<html>
    <head>
        <title>Laravel Validator Test</title>
        <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">

    </head>
    <body>
    {{--<div class="container">--}}
        {{--<div class="row">--}}
            {{--<div class="col-md-12">--}}
                {{--<form action="{{ url('/liuxiang/laravel/validator') }}" accept-charset="UTF-8" enctype="multipart/form-data" method="post">--}}
                    {{--<div class="form-group">--}}
                        {{--<label for="exampleInputEmail1">Email address</label>--}}
                        {{--<input type="email" class="form-control" id="exampleInputEmail1" name="exampleInputEmail1" placeholder="Email">--}}
                    {{--</div>--}}
                    {{--<div class="form-group">--}}
                        {{--<label for="exampleInputPassword1">Password</label>--}}
                        {{--<input type="password" class="form-control" id="exampleInputPassword1" name="exampleInputPassword1" placeholder="Password">--}}
                    {{--</div>--}}
                    {{--@if(count($errors) > 0)--}}
                        {{--<div class="alert alert-danger">--}}
                            {{--<ul>--}}
                                {{--@foreach($errors->all() as $error)--}}
                                    {{--<li>{{$error}}</li>--}}
                                {{--@endforeach--}}
                            {{--</ul>--}}
                        {{--</div>--}}
                    {{--@endif--}}
                    {{--<div class="form-group">--}}
                        {{--<label for="exampleInputFile">File input</label>--}}
                        {{--<input type="file" id="exampleInputFile">--}}
                        {{--<p class="help-block">Example block-level help text here.</p>--}}
                    {{--</div>--}}
                    {{--<div class="checkbox">--}}
                        {{--<label>--}}
                            {{--<input type="checkbox"> Check me out--}}
                        {{--</label>--}}
                    {{--</div>--}}
                    {{--<button type="submit" class="btn btn-default">Submit</button>--}}
                {{--</form>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{url('liuxiang/laravel/test/validator')}}" method="POST">
                        {{--{!! csrf_field() !!}--}}
                        <legend style="text-align: center">表单提交</legend>
                        <legend style="text-align: center">Person</legend>
                        <label style="margin-left: 50%">Name</label>
                        <input type="text" name="person[1][name]">
                        <label style="margin-left: 50%">Age</label>
                        <input type="text" name="person[1][age]">
                        {{--<label style="margin-left: 50%">Name</label>--}}
                        {{--<input type="text" name="person[2][name]">--}}
                        {{--<label style="margin-left: 50%">Age</label>--}}
                        {{--<input type="text" name="person[2][age]">--}}
                        {{--<label style="margin-left: 50%">Name</label>--}}
                        {{--<input type="text" name="person[3][name]">--}}
                        {{--<label style="margin-left: 50%">Age</label>--}}
                        {{--<input type="text" name="person[3][age]">--}}
                        {{--<h3>Employees</h3>--}}
                        {{--<div class="add-employee">--}}
                        {{--<label>Employee Name</label>--}}
                        {{--<input type="text" name="employee[1][name]">--}}
                        {{--<label>Employee Title</label>--}}
                        {{--<input type="text" name="employee[1][title]">--}}
                        {{--</div>--}}
                        {{--<div class="add-employee">--}}
                        {{--<label>Employee Name</label>--}}
                        {{--<input type="text" name="employee[2][name]">--}}
                        {{--<label>Employee Title</label>--}}
                        {{--<input type="text" name="employee[2][title]">--}}
                        {{--</div>--}}
                        <button type="submit" class="btn btn-success">Submit</button>
                        {{--<input type="submit">--}}
                    </form>
                    <button type="button" class="btn btn-default btn-lg">
                        <span class="glyphicon glyphicon-star" aria-hidden="true"></span>Star
                    </button>
                    @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        </div>

    <script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
    <script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    </body>
</html>