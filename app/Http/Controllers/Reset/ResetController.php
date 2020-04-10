<?php

namespace App\Http\Controllers\Reset;

use App\Model\UserModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
class ResetController extends Controller
{
     //修改密码视图
    public function reset(){

            return view('reset.reset');
    }

        // 执行修改密码
       public function resetdo(Request $request){
          $user_name= $request->input('user_name');
           $new_pass= $request->input('new_pass');
           if ($input= $request->input()) {
            $rules = [
                'user_name'=>'required',
                'origin_pass'=>'required',
                'new_pass'=>'required|between:6,20|confirmed',
            ];
            $msg = [
                'user_name.required'=>'用户名不能为空！',
                'origin_pass.required'=>'密码不能为空！',
                'new_pass.between'=>'密码必须在6~20位之间！',
                'new_pass.confirmed'=>'新密码与确认密码不一致！',
            ];
            $validator = Validator::make($input,$rules,$msg);

            if ($validator->passes()) {
                $name=UserModel::where('username',$request->input('user_name'))->first();
                if($name==""){
                    echo"<script>location.href='/reset',alert('用户名不存在')</script>";
                }else{
                    $origin_pass=$request->input('origin_pass');
                    $user_pass=UserModel::where('username',$user_name)->get('password')->first()->password;
                    if($origin_pass==$user_pass) {
                        $where=[
                          ['username',$user_name]
                        ];
                      $res= UserModel::where($where)->update(['password'=>$new_pass]);
                         if($res){
                             echo"<script>location.href='/login',alert('修改成功请登录')</script>";
                         }

                    }else{
                        echo"<script>location.href='/reset',alert('原密码错误')</script>";
                    }

                }
            }else{
                return back()->withErrors($validator);
            }


        }else{
            return view('admin/reset');
        }

    }
}
