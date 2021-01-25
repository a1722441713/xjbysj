<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>test</title>
    <link rel="stylesheet" href="{{ asset('admin/css/bootstrap.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}"> --}}
</head>
<body>
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-12">
          <div class="thumbnail">
            <div class="caption" align="center">
              <h4 align="left">尊敬的用户，您好：</h4>
              <p>你有一封最新的心理测试等待你的回答：</p>
              <p>请使用手机扫描下列二维码进入答题界面</p>
              <p class="text-primary">注:请使用手机打开邮件</p>
              {!! QrCode::size(200)->generate($url); !!}
              <p>或点击按钮前往答题界面</p>
              <a href="{{ $url }}"><button type="button" class="btn btn-primary btn-sm">前往答题</button></a>
            </div>
          </div>
        </div>
      </div>
    </div>
</body>

<script src="{{ asset('admin/js/jquery.min.js') }} "></script>
<script src="{{ asset('admin/js/popper.min.js') }}"></script>
<script src="{{ asset('admin/js/bootstrap.min.js') }}"></script>
<script>
    $(function () {
      $('[data-toggle="tooltip"]').tooltip(),
      $('[data-toggle="popover"]').popover()
    })
  </script>
</html>