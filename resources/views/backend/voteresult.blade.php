<div class="row-fluid">
    <form action="{{ url('/liuxiang/button/chart') }}" accept-charset="UTF-8" enctype="multipart/form-data" method="get" name="wechat_votechart_form" target="_blank">
        <button type="submit" class="btn btn-success btn-lg" style="text-align: center; ">查看投票Chart图</button>
    </form>
    <form action="{{ url('/liuxiang/button/resetvoteusers') }}" accept-charset="UTF-8" enctype="multipart/form-data" method="get" name="wechat_votechart_form" target="_blank">
        <button type="submit" class="btn btn-danger btn-lg" style="text-align: center; ">重置投票人员,请慎重点击!!!</button>
    </form>
    <form action="{{ url('/liuxiang/button/resetvoteitem') }}" accept-charset="UTF-8" enctype="multipart/form-data" method="get" name="wechat_votechart_form" target="_blank">
        <button type="submit" class="btn btn-danger btn-lg" style="text-align: center; ">重置投票节目,请慎重点击!!!</button>
    </form>
</div>