@extends('layouts')
@section('title')
回复留言
@endsection
@section('style')
<style>
.error{
            font-size: 15px;
            margin:0;
            color:red;
        }
</style>
@endsection
@section('content')
<div id="main">
    <div id="submit">
    <form name="form1" method="post" action="{{url('replysolve',['id'=>$content->id,'mastername'=>$content->nickname])}}">
        @csrf
    <div style="font-weight: 600;color:#4f98ca;" id="reply_nol">
    {{$content->nickname}}<span style="color:#999;font-weight:normal">于{{$content->systime}}发表留言：</span>
    </div>
            <textarea name="content" cols="70" rows="9" id="reply_content" disabled="disabled">{{$content->content}}</textarea>
            昵称：<input type="text" name="reply[nickname]">
            <div id="reply_adv"><span style="color:#6a8caf;font-weight:600"></span>回复的内容:</div>
            <textarea name="reply[content]" cols="50" rows="6" id="reply_textarea">{{old('reply')}}</textarea><br>
            <div class='error'>{{$errors->first('reply')}}</div>
            <input type="submit"  value="回复" style="cursor:pointer" id="reply_submit" style="cursor:pointer">
    </form>
    </div>
</div>


@endsection
