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
						<li class="active"> <a href="javascript:;" value="0">特定奖获奖名单</a> </li>
						<li> <a href="javascript:;" value="1">一等奖获奖名单</a> </li>
						<li> <a href="javascript:;" value="2">二等奖获奖名单</a> </li>
					</ul>
				</div>
				<div class="span7">
					<center id="resultshow_management_right">
						<div class="row-fluid">
						</div>
						<div class="row-fluid">
						</div>
						<div class="row-fluid">
						</div>
						</div>
					</center>
				</div>
				<div class="span1"> </div>
			</div>
		</div>
		@include('backend.foot')
	</body>
</html>

