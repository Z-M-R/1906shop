<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <title>注册</title>
</head>
<body>
<div class="content">
<div class="bg"></div>
<div class="container">
    <div class="line bouncein">
        <div class="xs6 xm4 xs3-move xm4-move">
            <!-- <div style="height:150px;"></div> -->
            <div class="media media-y margin-big-bottom"></div>         
            <form action="/reg_do" method="post">
            <div class="panel loginbox">
                <div class="text-center margin-big padding-big-top"><h1>注册</h1> <a href="{{ url('login') }}">已有账号？ 去登录</a></div>

                <div class="panel-body" style="padding:5px; padding-bottom:5px; padding-top:10px;">
                    <div class="form-group">
                        用户名：
                        <div class="field field-icon-right">
                            <input type="text" class="input input-big" name="username" placeholder="用户名" data-validate="required:请填写用户名" />
                            <span class="icon icon-user margin-small"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        邮箱：
                        <div class="field field-icon-right">
                            <input type="text" class="input input-big" name="email" placeholder="email" data-validate="required:请填写邮箱" />
                            <span class="icon icon-user margin-small"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        手机号：
                        <div class="field field-icon-right">
                            <input type="text" class="input input-big" name="mobile" placeholder="手机号" data-validate="required:请填写手机号" />
                            <span class="icon icon-user margin-small"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        密码：
                        <div class="field field-icon-right">
                            <input type="password" class="input input-big" name="password" placeholder="登录密码" data-validate="required:请填写密码" />
                            <span class="icon icon-key margin-small"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        确认密码：
                        <div class="field field-icon-right">
                            <input type="password" class="input input-big" name="pwd" placeholder="确认密码" data-validate="required:请填写确认密码" />
                            <span class="icon icon-key margin-small"></span>
                        </div>
                    </div>
                </div>
                <div style="padding:10px;"><input type="submit" class="button button-block bg-main text-big input-big" value="注册"></div>
            </div>
            </form>          
        </div>
    </div>
</div>
</div>
</body>
</html>
