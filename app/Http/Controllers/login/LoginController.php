<?php

namespace App\Http\Controllers\login;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\reg;
use Illuminate\Support\Facades\Mail;            //Mail
use App\Model\UserModel;

class LoginController extends Controller
{
    //注册
	public function reg()
	{
		return view('login/reg');
	}
	//执行注册
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
			echo"<script>location.href='/login',alert('注册成功，请登录')</script>";
        }
        }
	}

    //登录
	public function login()
	{
		return view('login/login');

	}
	//执行登录
	public function login_do(Request $request)
	{
		$post=Request()->all();
		$get=reg::where('mobile',$post['mobile'])->get()->toArray();
		//dd($get);
		$email=UserModel::where('username',$post['username'])->first()->email;
//          var_dump($email);exit;die;
		//登录成功----发送邮件
        $url = [];
        Mail::send('login.email', $url, function ($message) use ($email){

            $message->to($email)->subject("登录成功");

        });

		if($get==[]){
			return redirect('/login');
		}else{
			return redirect('/index');
		}

	}
	//注册
	public function index()
	{
		return view('login/index');
	}
	
}
