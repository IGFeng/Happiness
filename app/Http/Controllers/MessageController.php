<?php
namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class MessageController extends Controller{
    public function index(){
        $messages=Message::orderBy('settop','desc')->orderBy('like','desc')->orderBy('id','desc')->paginate(7);
        return view('index',[
            'messages'=>$messages
        ]);
    }

    public function add(){
        return view('add');
    }
    public function create(Request $request){
        $validator=Validator::make($request->input(),
        [
            'message.nickname'=>'required|max:30',
            'message.content'=>'required|max:300',
        ],[
            'required'=>':attribute为必填项',
            'max'=>':attribute长度不超过:max个字符',
        ],[
            'message.nickname'=>'昵称',
            'message.content'=>'内容',
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $data=$request->input('message');
        $Message=new Message();
        $Message->nickname=$data['nickname'];
        $Message->content=$data['content'];
        if(empty($data['ifqqh']))
        $data['ifqqh']=0;
        $Message->ifqqh=$data['ifqqh'];
        $Message->systime=date("Y-m-d H:i",time());
        $Message->save();
        if($Message->save())
            return redirect('index');
        else return redirect()->back();

    }
    public function like($id){
        $Message=Message::find($id);
        $Message->like++;
        $Message->save();
        Session::push('like',$id);
        return redirect('index');
    }


}
