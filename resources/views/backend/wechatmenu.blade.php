<div class="row-fluid">
    <form action="{{ url('/liuxiang/wechat/menu') }}" accept-charset="UTF-8" enctype="multipart/form-data" method="post" name="wechat_menu_form">
        <legend>微信菜单设置</legend>
        {{--<button type="button" class="btn btn-default" aria-label="Left Align">--}}
            {{--<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>添加一级菜单--}}
        {{--</button>--}}
        {{--<button type="button" class="btn btn-default btn-lg">--}}
            {{--<span class="glyphicon glyphicon-star" aria-hidden="true"></span>Star--}}
        {{--</button>--}}
        {{--<ul class="nav nav-tabs" contenteditable="false">--}}
            {{--<li class="active"><a href="#">首页</a></li>--}}
            {{--<li><a href="#">资料</a></li>--}}
            {{--<li class="disabled"><a href="#">信息</a></li>--}}
            {{--<li class="dropdown pull-right"><a class="dropdown-toggle" data-toggle="dropdown" href="#">下拉</a>--}}
                {{--<ul class="dropdown-menu">--}}
                    {{--<li><a href="#">添加二级菜单</a></li>--}}
                    {{--<li class="divider">&nbsp;</li>--}}
                {{--</ul>--}}
            {{--</li>--}}
            {{--<div class="input-group">--}}
                {{--<span class="input-group-addon">菜单名称</span>--}}
                {{--<input name="menu[1][name]" type="text" class="form-control" placeholder="输入菜单名称" aria-describedby="basic-addon1">--}}
            {{--</div>--}}
            {{--<div class="form-group">--}}
                {{--<label for="sel1">菜单类型</label>--}}
                {{--<select class="form-control" name="menu[1][option]">--}}
                    {{--<option>view</option>--}}
                    {{--<option>click</option>--}}
                {{--</select>--}}
            {{--</div>--}}
            {{--<div class="input-group">--}}
                {{--<span class="input-group-addon">菜单链接或图文消息</span>--}}
                {{--<input name="menu[1][link]" type="text" class="form-control" placeholder="输入菜单链接或图文消息ID" aria-describedby="basic-addon1">--}}
            {{--</div>--}}
        {{--</ul>--}}

        <legend></legend>
        <div class="form-group">
            <label for="sel1">主菜单设置</label>
            <select class="form-control" name="menu_grade">
                <option>0</option>
                <option>1</option>
                <option>2</option>
            </select>
        </div>
        <div class="input-group">
            <span class="input-group-addon">主菜单名称</span>
            <input name="menu_name" type="text" class="form-control" placeholder="输入主菜单名称" aria-describedby="basic-addon1">
        </div>
        <div class="form-group">
            <label for="sel1">主菜单类型</label>
            <select class="form-control" name="menu_type">
                <option>view</option>
                <option>click</option>
            </select>
        </div>
        <div class="input-group">
            <span class="input-group-addon">主菜单链接或图文消息</span>
            <input name="menu_link" type="text" class="form-control" placeholder="输入主菜单链接或图文消息ID" aria-describedby="basic-addon1">
        </div>
        <legend></legend>

        <legend></legend>

        <div class="sub_menu">
            <div class="form-group" id="sub_menu_selection">
                <label for="sel1">子菜单设置</label>
                <select class="form-control" id="sub_menu_grade" name="sub_menu_grade">
                    <option>None</option>
                    <option>0</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                </select>
            </div>
            <div id="sub_menu_content" style="display: none">
                <div class="input-group">
                    <span class="input-group-addon">子菜单名称</span>
                    <input name="sub_menu_name" type="text" class="form-control" placeholder="输入子菜单名称" aria-describedby="basic-addon1">
                </div>
                <div class="form-group">
                    <label for="sel1">子菜单类型</label>
                    <select class="form-control" name="sub_menu_type">
                        <option>view</option>
                        <option>click</option>
                    </select>
                </div>
                <div class="input-group">
                    <span class="input-group-addon">子菜单链接或图文消息</span>
                    <input name="sub_menu_link" type="text" class="form-control" placeholder="输入子菜单链接或图文消息ID" aria-describedby="basic-addon1">
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-success" name="submit">Submit</button>
    </form >

    <form action="{{ url('/liuxiang/wechat/getallmenus') }}" accept-charset="UTF-8" enctype="multipart/form-data" method="get" name="wechat_menu_form" target="_blank">
        <button type="submit" class="btn btn-success" name="submit">查看公众号菜单</button>
    </form>
</div>