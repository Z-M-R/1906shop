<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\reg;
use Illuminate\Support\Facades\Mail;            //Mail

class AdminController extends Controller
{
    //注册
	public function reg()
	{
		return view('login/reg');
	}
	//注册
	public function reg_do()
	{
		$post=Request()->all();
		//dd($post);
		if($post['password'] != $post['pwd']){
            return redirect('/reg');
        }else{
        	$post=request()->except($post['pwd']);
        $res=reg::create($post);
        if($res){
            return redirect('/login');
        }
        }
	}

    //登录
	public function login()
	{
		return view('login/login');

	}
	//执行登录
	public function login_do()
	{
		$post=Request()->all();
		$get=reg::where('mobile',$post['mobile'])->get()->toArray();
		//dd($get);

		//登录成功----发送邮件
        $url = [];
        Mail::send('login.email', $url, function ($message) {
            $to = [
                '877673916@qq.com'
            ];

            $message->to($to)->subject("登录成功");

        });

		if($get==[]){
			return redirect('/login');
		}else{
			return redirect('/index');
		}

	}
	
}
