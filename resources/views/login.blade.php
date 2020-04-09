@extends('layouts')
@section('title')
管理员登陆
@endsection
@section('style')
<style>
    html,body{
        background-image: linear-gradient(120deg, #f6d365 0%, #fd7167 100%);
        background-size:100% 100%;
        background-attachment: fixed;
        background-image: url("pictures/ghostblade.jpg")
    }
</style>
@endsection
@section('content')
<div id="main">
<div id="submit">
<form name="form1" method="post" action="{{url('admin')}}">
    @csrf
<div id="submit_div">
<div class="add-form-div"><label for="admin_user"> 管理员账号</label><input name="admin[account]" type="text" id="admin_user"></div>
<div class="add-form-div"><label for="admin_pass">管理员密码</label><input name="admin[password]" type="password" id="admin_pass"></div>
<div class="add-form-div"><input type="submit" id="sbutton"value="确 定" style="cursor:pointer"></div>
</div>
</form>
</div>
</div>
@endsection
