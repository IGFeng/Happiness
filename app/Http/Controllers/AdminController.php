<?php
 namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Message;
use App\Reply;

class AdminController extends Controller{
     public function login(){
         return view('login');
     }
     public function admin(Request $request){
         $data=$request->input('admin');
         if($data['account']=="UMR"&&$data['password']==123456){
             Session::put('admin_pass','1');
             return redirect('index');
         }
         else{
             return redirect()->back();
         }
         }
     public function logout(){
         Session::forget('admin_pass');
         return redirect('index');
     }

    public function verify($id)
        {
            $Message=Message::find($id);
            $Message->ifshow=1;
            $Message->save();
            return redirect('index');
        }
    public function delete($id)
        {
            $Message=Message::find($id);
            $Message->delete();
            if(Reply::where('mid',$id)->count()!=0){
                Reply::where('mid',$id)->delete();
            }
            return redirect('index');
        }
    public function hide($id)
        {
            $Message=Message::find($id);
            $Message->ifshow=0;
            $Message->save();
            return redirect('index');
        }
    public function settop($id)
        {
            $Message=Message::find($id);
            $Message->settop=1;
            $Message->save();
            return redirect('index');
        }
    public function unsettop($id)
        {
            $Message=Message::find($id);
            $Message->settop=0;
            $Message->save();
            return redirect('index');
        }
    public function redelete($id){
        $reply=Reply::find($id);
        $target=$reply->mid;
        $reply->delete();
        return redirect()->route('replyindex',[$target]);
 }
}
