<!DOCTYPE html>
<html lang="zh-CN">
	@include('backend.head')
	<body>
		<div class="container-fluid">
			@include('backend.navigate')
			<div class="row-fluid">
				<div class="span1"></div>
				<div class="span2">
					<ul class="nav nav-list" id="scenemanagement_left">
						<li class="nav-header"> 消息手动过滤 </li>
						<li class="active"> <a href="javascript:;">文本消息</a> </li>
						<li> <a href="javascript:;">图片消息</a> </li>
						<li class="nav-header"> 抽奖名单 </li>
						<li> <a href="javascript:;">一等奖抽奖名单</a> </li>
						<li> <a href="javascript:;">二等奖抽奖名单</a> </li>
						<li> <a href="javascript:;">三等奖抽奖名单</a> </li>
					</ul>
				</div>
				<div class="span7">	
					<div class="row-fluid">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>序号</th>
									<th>昵称</th>
									<th>发送时间</th>
									<th>消息内容</th>
									<th>是否过滤</th>
								</tr>
							</thead>
							<tbody id="text_msg">
								@foreach($messages as $message)
									<tr><td>{{$message->iter}}</td><td>{{$message->nickname}}</td><td>{{$message->created_at}}</td><td>{{$message->content}}</td><td><input type='checkbox' row_id="{{$message->id}}"/></td></tr>
								@endforeach
							</tbody>
						</table>
					</div>
					<div class="row-fluid">
						<center id="scenemanagement_right">
							<label class="checkbox inline"> 全选</label>
							<input type="checkbox" id="select_all">&nbsp;&nbsp;&nbsp;&nbsp;
							<button class="btn" id="commit_filter">提交</button>
						</center>
					</div>
					<div class="row-fluid">
						<center id="scenemanagement_right">
							<div class="pagination">
								<?php echo $messages->render(); ?>
							</div>
						</center>
					</div>
					<div class="row-fluid">
					
					</div>
				</div>
				<div class="span1"></div>
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
		<script src="{{ asset("js/backend/scenemanagement.js") }}"></script>
	</body>
</html>

