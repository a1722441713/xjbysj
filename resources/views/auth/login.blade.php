<!DOCTYPE html>
<html lang="zh-CN">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
  <title>论坛</title>
  <!-- Bootstrap -->
  <link href="{{ asset('admin/css/bootstrap.min.css') }}" rel="stylesheet">
  <style>

  </style>
  <title></title>
</head>

<body>
  <div class="w-auto p-5" style="background-color: #eee;"></div>
  <div class="w-auto p-2" style="background-color: #fff;"></div>
  <div class="container">
    <div class="card mb-4 text-center" style="max-width: 100%;">
      <div class="row">
      <br><br><br><br><br><br><br>
        <div class="col-md-12">
          <div class="card-body">
            <h4 class="card-title"><strong>后台管理系统</strong></h4>
            <hr>
            <form method="POST" action="{{ route('admin.login') }}">
              @csrf
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">邮箱:</label>
                <div class="col-sm-10">
                  <input type="email" class="form-control" id="inputEmail3" name="email">
                </div>
              </div>
              @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
              <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">密码:</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" id="inputPassword3" name="password">
                </div>
              </div>
              @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
              <div class="form-group row">
                <label for="inputVerificationCode" class="col-sm-2 col-form-label">验证码:</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" id="inputVerificationCode" name="captcha">
                </div>
                <div class="col-sm-4">
                  <!-- <input type="text" class="form-control" id="inputVerificationCode" placeholder="这里是验证码占用的位置"> -->
                  <img class="thumbnail captcha" src="{{ captcha_src('flat') }}" onclick="this.src='{{ captcha_src('flat') }}'+Math.random()" title="点击图片重新获取验证码">       
                </div>
              </div>
              @error('captcha')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
              <div class="w-auto p-2" style="background-color: #fff;"></div>
              <div class="form-group row">
                <div class="col-sm-12">
                  <button type="submit" class="btn btn-primary btn-sm btn-block">登陆</button>
                </div>

              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="w-auto p-4" style="background-color: #fff;"></div>
  <div class="w-auto p-5" style="background-color: #eee;">
    <div class="text-center text-black-50">
      2020@创造你我的世界
    </div>
  </div>

    <script src="{{ asset('admin/js/jquery.min.js') }}"></script>
</body>

</html>