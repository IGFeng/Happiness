@extends('layouts')
@section('title')
签写留言
@endsection
@section('style')
<style>
    html,body{
        background-image: linear-gradient(to right, #ffecd2 0%, #ffafbd 100%);
        background-size:100% 100%;
        background-attachment: fixed;
     }
    </style>
@section('content')
    @include('validator')
        <div id="main">
        <div id="submit">
        <form name="form1" method="post" action="{{url('create')}}">
            @csrf
        <div class="add-form-div"><label for="username">昵称:</label><input type="text" id="username" name="message[nickname]" value="{{old('message')['nickname']}}" placeholder=""></div>
        <div id="add-form-textarea"><label for="content">内容:</label><textarea id="content" name="message[content]" cols="70" rows="9" placeholder="幸福一颗可以传递的种子">{{old('message')['content']}}</textarea></div>
        <div class="add-form-div"><label for="ifqqh" id="add-form-more">悄悄话</label>
        <span id="add-form-explain">仅管理员可见</span>
        <input name="message[ifqqh]" type="checkbox" id="ifqqh" value="1">
        </div>
        <div class="add-form-div">
            <input type="submit" id="sbutton" value="确 定" style="cursor: pointer">
        </div>
        </form>
        </div>
        </div>
        @endsection
</html>
