<?php
namespace App\Http\Controllers;

use App\Reply;
use App\Message;
use Illuminate\Http\Request;

class ReplyController extends Controller{
    public function index($id){
        $Message=Message::find($id);
        $reply=Reply::where('mid',$id)->get();
        return view('replyindex',['Message'=>$Message,'replys'=>$reply]);
    }
    public function reply($id){
        $content=Message::find($id);
        return view('reply',['content'=>$content]);
    }
    public function replysolve(Request $request,$id,$mastername){
        $data=$request->input('reply');
        $reply=new Reply();
        $reply->nickname=$data['nickname'];
        $reply->mastername=$mastername;
        $reply->mid=$id;
        $reply->content=$data['content'];
        $reply->replytime=date("Y-m-d H:i",time());
        $reply->save();
        return redirect()->route('replyindex',[$id]);
    }
    public function rereply($id){
        $content=Reply::find($id);
        return view('rereply',['content'=>$content]);
    }
    public function rereplysolve(Request $request,$mid,$mastername){
        $data=$request->input('reply');
        $reply=new Reply();
        $reply->nickname=$data['nickname'];
        $reply->mastername=$mastername;
        $reply->mid=$mid;
        $reply->content=$data['content'];
        $reply->replytime=date("Y-m-d H:i",time());
        $reply->save();
        return redirect()->route('replyindex',[$mid]);
    }
}
