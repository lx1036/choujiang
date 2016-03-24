<!DOCTYPE html>
<html lang="zh-CN">
	@include('backend.head')
	<body>
		<div class="container-fluid">
			@include('backend.navigate')
			<div class="row-fluid">
				<div class="span3"></div>
				<div class="span6">
					<div class="row-fluid">
						<div class="span12" style="padding-bottom: 100px;" >
							<center><h1>后台管理</h1></CENTER>
						</div>
					</div>
					<div class="row-fluid">
						<div class="span12">

							<center>
							<table class="table">
								<?php
									$index = 1;
									foreach($msgs as $msg){
											echo "<tr><td>$index</td><td>{$msg['info']}</td><td>{$msg['show']}</td></tr>";
											$index += 1;
									}
								?>
							</table>
							</center>
						</div>
					</div>
				</div>
				<div class="span3"></div>
			</div>
		</div>
		@include('backend.foot')
	</body>
</html>

