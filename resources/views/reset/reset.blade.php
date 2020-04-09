<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<div class="card card-small mb-4">
    <ul class="list-group list-group-flush">
        <li class="list-group-item p-3">
            @if (count($errors)>0)
                {{ $errors->first() }}
            @else
                <strong class="text-muted d-block mb-2">Forms</strong>
            @endif
            <form  action="/resetdo"  method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="origin_pass">用户名</label>
                    <input type="text" class="form-control" name="user_name" id="origin_pass" placeholder="">
                </div>
                <div class="form-group">
                    <label for="origin_pass">原密码</label>
                    <input type="password" class="form-control" name="origin_pass" id="origin_pass" placeholder="">
                </div>
                <div class="form-group">
                    <label for="new_pass">新密码</label>
                    <input type="password" class="form-control" name="new_pass" id="new_pass" placeholder="">
                </div>
                <div class="form-group">
                    <label for="repeat_pass">确认密码</label>
                    <input type="password" class="form-control" name="new_pass_confirmation" id="repeat_pass" placeholder="">
                </div>
                <button type="submit" class="btn btn-primary btn-lg btn-block">提交</button>
                <button type="" class="btn btn-default btn-lg btn-block">返回</button>
            </form>
        </li>
    </ul>
</div>
</body>
</html>