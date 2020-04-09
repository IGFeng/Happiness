@extends('layouts')
@section('title')
浏览回复
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
<h2>
<span class="leftarea">
<div style="color:#4f98ca;font-weight:500;">{{$Message->nickname}}于{{$Message->systime}}发表留言：</div>
</span>
<span class="midarea">
    @if(!Session::has('admin_pass'))
        <a href='{{url('reply',['id'=>$Message->id])}}'>回复</a>
    @else
        <a href='{{url('delete',['id'=>$Message->id])}}' onclick="if(confirm('确定删除此留言吗?')==false) return false;">删除</a>
    @endif
</span>
</h2>
<div class="content">
{{$Message->content}}
</div>
@foreach($replys as $reply)
    <h2>
    <span class="leftarea">
    <div style="color:#4f98ca;font-weight:500;font-size:80%;color:green">{{$reply->nickname}}于{{$reply->replytime}}回复{{$reply->mastername}}:</div>
    </span>
    <span class="midarea">
        @if(Session::has('admin_pass'))
            <a href='{{url('redelete',['id'=>$reply->id])}}' onclick="if(confirm('确定删除此留言吗?')==false) return false;">删除</a>
        @else
        <a href='{{url('rereply',['id'=>$reply->id])}}'>回复</a>
        @endif
    </span>
    </h2>
    <div class="content" style="font-size: 80%">
        {{$reply->content}}
    </div>
@endforeach
</div><!--listmain结束-->
</div><!--list结束-->
</div>
<!--最外层主要区域结束-->
@endsection
