<!DOCTYPE html>
<html lang="zh-CN">
    @include('backend.head')
    <body>
        <div class="container-fluid">
            @include('backend.navigate')
            <div class="row-fluid">
                <div class="span1"></div>
                <div class="span2">
                    <ul class="nav nav-list" style="position: fixed;" id="lottery_management_left">
                        <li class="nav-header"> 特等奖抽奖 </li>
                        <li class="active"> <a href="javascript:;" value="0">特定奖抽奖名单导入</a> </li>
                        <li> <a href="javascript:;" value="1">特等奖过滤</a> </li>
                        <li> <a href="javascript:;" value="2">重置所有特等奖</a> </li>
                        
                        <li class="divider"> </li> 
                        <li class="nav-header"> 微信管理 </li>
                        <li> <a href="javascript:;" value="3">微信抽奖设置</a> </li>
                        <li> <a href="javascript:;" value="4">抽奖图片设置</a> </li>
                        <li> <a href="javascript:;" value="5">抽奖口令设置</a> </li>
                        <li> <a href="javascript:;" value="6">微信号菜单设置</a> </li>
                        <li> <a href="javascript:;" value="7">微信号素材设置</a> </li>
                        <li> <a href="javascript:;" value="8">投票柱状图</a> </li>
                        <li> <a href="javascript:;" value="9">重置幸运书单</a> </li>
                        <li> <a href="javascript:;" value="10">摇一摇抽奖重置</a> </li>
                    </ul>
                </div>
                <div class="span7">
                    <center id="lottery_management_right">
                        <div class="row-fluid">
                            <form action="{{ url('/upload') }}" accept-charset="UTF-8" enctype="multipart/form-data" method="post">
                                <fieldset>
                                    <legend> 上传特等奖人员名单</legend>
                                    <input type="file" class="input-medium" name="excel">
                                    <button type="submit" class="btn">提交</button>
                                </fieldset>
                            </form>
                        </div>
                        <div class="row-fluid">
                            <div class="row-fluid">
                                <form>
                                    <fieldset>
                                        <legend> 排除已获奖人员</legend>
                                        <input type="text"class="search-query" id="search_winner_text">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input type="button" class="btn" id="search_winner" value="搜索">
                                    </fieldset>
                                </form>
                            </div>
                            <div class="row-fluid" style="text-align:center">
                                <table class="table">
                                    <thead>
                                        <tr><th>序号</th><th>员工编号</th><th>员工姓名</th><th>部门</th><th>标记</th></tr>
                                    </thead>
                                    <tbody id="search_result"> </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <legend> 重置所有特等奖用户</legend>
                            <center> 
                                <textarea id="specialfilter" rows="20" cols="100"></textarea>
                                <button type="button" class="btn" id="reset_btn" click="javascript:;" style="margin-bottom: 20px;">重置</button></center>
                        </div>
                        <div class="row-fluid">
                            <legend> 抽奖设置</legend>
                            <div class="span1"></div>
                            <div class="span6">
                                <form class="form-horizontal"  action="/backend/setconfig">
                                    <div class="control-group">
                                        <label class="control-label" for="inputEmail">第几次抽奖：</label>
                                        <div class="controls">
                                            <label class="radio inline">
                                                <input type="radio" name="times" value="1" checked="checked">1
                                            </label>
                                            <label class="radio inline">
                                                <input type="radio" name="times" value="2"> 2
                                            </label>
                                            <label class="radio inline">
                                                <input type="radio" name="times" value="3"> 3
                                            </label>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="lottery_num">抽奖人数：</label>
                                        <div class="controls">
                                            <input type="text" id="lottery_num" placeholder="5">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="images_count">奖品图片个数：</label>
                                        <div class="controls">
                                            <input type="text" id="images_count"  placeholder="5">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="shake_passwd">摇一摇口令：</label>
                                        <div class="controls">
                                            <input type="text" id="shake_passwd" placeholder="当当">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="shake_begin_time">口令开始时间：</label>
                                        <div class="controls">
                                            <input type="text" id="shake_begin_time" placeholder="" class="date-input-style">
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <div class="controls">
                                            <input type="button" class="btn" id="setconfig" value="提交">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="span5"></div>
                        </div>
                        <div class="row-fluid">
                            <legend> 奖品图片设置</legend>
                            <div class="span12 lottery_image">
                                <img src="{{asset('images/p.jpg')}}" class="img-polaroid">
                                <img src="{{asset('images/p.jpg')}}" class="img-polaroid">
                            </div>
                            <div class="span1"></div>
                            <div class="span7">
                                <form class="form-horizontal" accept-charset="UTF-8" enctype="multipart/form-data">
                                    <div class="control-group">
                                        <label class="control-label" for="inputEmail">第几次抽奖：</label>
                                        <div class="controls">
                                            <label class="radio inline">
                                                <input type="radio" name="optionsRadios" value="1" checked="checked"> 1
                                            </label>
                                            <label class="radio inline">
                                                <input type="radio" name="optionsRadios" value="2"> 2
                                            </label>
                                            <label class="radio inline">
                                                <input type="radio" name="optionsRadios" value="3"> 3
                                            </label>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="controls">
                                            <input type="file"  class="input-medium" multiple="multiple" name="images[]" >
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <div class="controls">
                                            <input type="button" class="btn" value="提交">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="span4"></div>
                        </div>
						@include('backend.tokensetting')
                        @include('backend.wechatmenu')
                        @include('backend.media')
                        @include('backend.voteresult')
                        @include('backend.resetluckybook')
                        @include('backend.resetwechatwinners')
                    </center>
                </div>
                <div class="span1"> </div>
            </div>
        </div>
        <div class="modal hide fade" id="modal">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="modal_close_x">&times;</button>
                <h3 id="modal_head"></h3>
            </div>
            <div class="modal-body">
                <p id="modal_data"></p>
            </div>
            <div class="modal-footer">
                <a href="javascript:;" class="btn" id="close_modal">关闭</a>
            </div>
        </div>
        @include('backend.foot')
        <script src="{{ asset("js/backend/lotterymanagement.js") }}"></script>
    </body>
</html>
