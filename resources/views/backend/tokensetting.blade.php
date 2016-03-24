<div class="row-fluid">
    <form action="{{ url('/liuxiang/shake/tokensetting') }}" accept-charset="UTF-8" enctype="multipart/form-data" method="post">
        <legend>摇一摇口令设置</legend>
        <div class="form-group">
            <label for="sel1">抽奖轮数设置</label>
            <select class="form-control" id="count_setting" name="count_setting">
                <option>1</option>
                <option>2</option>
                <option>3</option>
            </select>
        </div>
        <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">抽奖人数</span>
            <input name="number_person" type="text" class="form-control" placeholder="输入抽奖人数" aria-describedby="basic-addon1">
        </div>
        <div class="input-group">
            <span class="input-group-addon" id="basic-addon2">摇一摇口令</span>
            <input name="shake_token" type="text" class="form-control" placeholder="输入该轮抽奖口令" aria-describedby="basic-addon2">
        </div>
        @if(count($errors) > 0)
{{--        @if(Session::has('errors'))--}}
            <div class="alert alert-danger">
                <ul>
                  @foreach($errors->all() as $error)
                      <li>{!! $error !!}</li>
                  @endforeach
                </ul>
            </div>
        @endif
        <button type="submit" class="btn btn-success">Submit</button>
        {{--<input class="btn btn-default" type="submit" value="Submit">--}}
        <div class="span1"></div>
        <legend></legend>
    </form>

    <form action="{{ url('/liuxiang/shake/tokendelete') }}" accept-charset="UTF-8" enctype="multipart/form-data" method="post">
        <legend>摇一摇数据库重置</legend>
        <h3>软删除摇一摇数据表,不要轻易点击</h3>
        <button type="submit" class="btn btn-danger">Reset!!!</button>
        <legend></legend>
    </form>

    <form action="{{ url('/liuxiang/shake/toggle') }}" accept-charset="UTF-8" enctype="multipart/form-data" method="post">
        <legend>摇一摇口令开关</legend>
        <div class="form-group">
            <label for="sel1">抽奖轮数设置</label>
            <select class="form-control" id="shake_toggle" name="shake_toggle">
                <option>1</option>
                <option>2</option>
                <option>3</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success" name="start" value="start">Start!!!</button>
        <button type="submit" class="btn btn-danger" name="close" value="close">Close!!!</button>
{{--        <h1>{!! $data['key_word'] !!}</h1>--}}
        @if(Session::has('data'))
            {{--@foreach($data as $value)--}}
            {{--<h1>该轮抽奖关键词:</h1>--}}
            {{--@endforeach--}}
        @endif
        <legend></legend>
    </form>

    <legend>摇一摇口令查询</legend>
    <button type="submit" class="btn btn-success" id="query_token" name="query_token" value="start">Query!!!</button>
    <div class="col-md-12">
        <table class="table" contenteditable="false" id="query_token">
            <thead>
                <tr class="success">
                    <th>抽奖次数</th>
                    <th>抽奖人数</th>
                    <th>抽奖口令</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
</div>