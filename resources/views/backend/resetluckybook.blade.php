<div class="row-fluid">
    <form action="{{ url('/employee/resetluckybooklist') }}" accept-charset="UTF-8" enctype="multipart/form-data" method="get" name="wechat_votechart_form" target="_blank">
        <button type="submit" class="btn btn-success btn-lg" style="text-align: center; ">重置幸运书单</button>
    </form>
    <form action="{{ url('/liuxiang/button/resetvoteusers') }}" accept-charset="UTF-8" enctype="multipart/form-data" method="get" name="wechat_votechart_form" target="_blank">
        <button type="submit" class="btn btn-danger btn-lg" style="text-align: center; ">重置投票人员,慎重点击!!!</button>
    </form>
    <form action="{{ url('/liuxiang/button/resetvoteitem') }}" accept-charset="UTF-8" enctype="multipart/form-data" method="get" name="wechat_votechart_form" target="_blank">
        <button type="submit" class="btn btn-danger btn-lg" style="text-align: center; ">重置投票项目,慎重点击!!!</button>
    </form>
</div>