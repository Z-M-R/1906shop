<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Model\UserModel;
use App\Model\ResetModel;

class UserController extends Controller
{
    
    public function vFind()
    {
        $data = [];
        return view('user.findpass',$data);
    }

    public function find(Request $request)
    {
        echo '<pre>';print_r($_POST);echo '</pre>';
        $user_name = $request->input('u');
        $u = UserModel::where(['username'=>$user_name])
            ->orWhere(['email'=>$user_name])
            ->orWhere(['mobile'=>$user_name])
            ->first();
        //var_dump($u);

        //找到用户 发送重置密码邮件
        if($u){
            echo "用户邮件：". $u->email;

            //生成密码重置连接

        }
    }


    public function vReset(Request $request)
    {

        //验证token是否有效
        $token = $request->input('token');
        if(empty($token)){
            die("未授权 缺少token");
        }

        $data = [
            'token' => $token
        ];
        return view('user.resetpass',$data);
    }

    public function reset(Request $request)
    {

        //echo '<pre>';print_r($_POST);echo '</pre>';
        $pass1 = $request->input('pass1');
        $pass2 = $request->input('pass2');
        $token = $request->input('reset_token');

        if($pass1 != $pass2){
            die("两次密码不一致");
        }

        //验证token 是否已使用 已过期
        $u = ResetModel::where(['token'=>$token])->first();
        if(empty($u)){
            die("未授权 token无效");
        }

        echo '<pre>';print_r($u->toArray());echo '</pre>';
        // token是否过期 ，过期则不能重置密码
        if($u->expire < time() ){
            die("token过期");
        }

        if($u->status==1){
            die("token 已被使用");
        }

        $uid = $u->uid;
        $new_pass = password_hash($pass1,PASSWORD_BCRYPT);
        echo $new_pass;

        //更新密码
        UserModel::where(['id'=>$uid])->update(['pass'=>$new_pass]);

        //设置token状态为 已使用
        ResetModel::where(['token'=>$token])->update(['status'=>1]);
        echo '<br>';
        echo "密码重置成功";



    }
}
