@foreach($msgTextArr as $msg)
		{{--<li class="row gender_{!! $msg->sex !!}">--}}
			{{--<div class="content_left">--}}
				{{--<span class="nickname">{!! $msg->nickname !!}</span>--}}
				{{--<div class="img_div"><img src="{!! $msg->headimgurl !!}"></div>--}}
			{{--</div>--}}
			{{--<div class="content_right">--}}
				{{--@if($msg->msg_type == 'text')--}}
					{{--<span class="content">{!! $msg->content !!}</span>--}}
					{{--@elseif($msg->msg_type == 'image')--}}
					{{--<img src="" class="content_image">--}}
				{{--@endif--}}
			{{--</div>--}}
		{{--</li>--}}
		<li>
			<span class="pic"><img src="{!! $msg->headimgurl !!}"></span>
			<span class="name">{!! $msg->nickname !!}</span>
			@if($msg->sex == 1)
				<span class="txt txt_boy"><i></i>{!! $msg->content !!}</span>
			@else
				<span class="txt txt_girl"><i></i>{!! $msg->content !!}</span>
			@endif
		</li>
@endforeach
