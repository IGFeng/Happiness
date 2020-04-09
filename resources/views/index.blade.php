@extends('layouts')
@section('title')
浏览留言
@endsection
@section('style')
<style>
    #main{
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-content: flex-start;
    }
</style>
@endsection
@section('content')
<!--最外层主要区域开始-->
<div id="main">
  <div id="list">
      <div id="listmain">
        @foreach($messages as $message)
<h2>
<span class="leftarea">
<div style="color:#4f98ca;font-weight:500;">{{$message->nickname}}于 {{$message->systime}} 发表留言：</div>
 @if($message->settop!=0)
 <img src="" alt=已置顶>
 @endif
</span>
<span class="midarea">
@if(Session::has('admin_pass'))
    @if($message->ifshow==0)
        <a href="{{url('verify',['id'=>$message->id])}}" onclick="if(confirm('确定审核通过此留言吗?')==false) return false;">审核</a>
    @else
    <a href="{{url('hide',['id'=>$message->id])}}" onclick="if(confirm('确定隐藏此留言吗?')==false) return false;">隐藏</a>
    @endif
    <a href="{{url('delete',['id'=>$message->id])}}" onclick="if(confirm('确定删除此留言吗?')==false) return false;">删除</a>
    <a href="{{url('replyindex',['id'=>$message->id])}}" >回复</a>
    @if($message->settop==0)
    <a href="{{url('settop',['id'=>$message->id])}}" onclick="if(confirm('确定置顶此留言吗?')==false) return false;">置顶</a>
    @else
    <a href="{{url('unsettop',['id'=>$message->id])}}" onclick="if(confirm('确定取消置顶吗?')==false) return false;">取消置顶</a>
    @endif
@else
@if($message->ifshow!=0)
@if(!empty(session('like')))
@if(!in_array($message->id,session('like')))
<a href="{{url('like',['id'=>$message->id])}}"><img src="pictures/点赞1.png" alt="点赞" title="点赞" onmouseover='src="pictures/点赞.png"' onmouseout='src="pictures/点赞1.png"'></a>
{{$message->like}}
@else <a href="" onclick="confirm('您已赞过')"><img src="pictures/点赞.png" alt="您已赞过" title="您已赞过" onmouseover='src="pictures/点赞1.png"' onmouseout='src="pictures/点赞.png"'></a>
{{$message->like}}
@endif
@else
<a href="{{url('like',['id'=>$message->id])}}"><img src="pictures/点赞1.png" alt="点赞" title="点赞" onmouseover='src="pictures/点赞.png"' onmouseout='src="pictures/点赞1.png"'></a>
{{$message->like}}
@endif
<a href="{{url('replyindex',['id'=>$message->id])}}"><img src="pictures/回复.png" alt="回复" title="回复"></a>
@endif
@endif
</span>
</h2>
<div class="content">
@if(!Session::has('admin_pass'))
	@if($message->ifqqh==1)
            <span class=ftcolor_999>（此留言为悄悄话，只有管理员才能看哦……）</span>
    @else
        @if($message->ifshow==0)
			<span class=ftcolor_999>（此留言正在通过审核，当前不可见……）</span>
		@else
            {{$message->content}}
        @endif
    @endif
@else
{{$message->content}}
@endif
</div>
@if(!empty($message->reply))
<div class="reply"><p><span class="ftcolor_FF9"><b>管理员</b>于{{$message->replytime}}回复:</span></p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
{{$message->reply}}
</div>
@endif
@endforeach
</div><!--listmain结束-->
</div><!--list结束-->
<div class="paginate">
{{$messages->links()}}
</div>
<!--最外层主要区域结束-->
</div>
@endsection
</html>
