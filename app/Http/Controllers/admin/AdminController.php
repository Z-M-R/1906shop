<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\reg;

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
		if($get==[]){
			return redirect('/login');
		}else{
			return redirect('/index');
		}
	}
}
