<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>论坛</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('admin/css/bootstrap.min.css') }}">
    <style>
    </style>
    <title></title>
</head>

<body onload="tip()">
  @if(!empty(session('tip')))    　　
  <div class="alert alert-danger" role="alert" style="z-index: 999">
      　　　　{{session('tip')}}
  </div>
  <script>
      setInterval(function(){
          $('.alert').remove();
      },3000);
  </script>
  @endif
    <div class="container">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-2 col-md-2"></div>
                <div class="col-sm-2 col-md-2">
                    <img src="{{ asset('admin/images/logo.jpg') }}" alt="..." class="img-circle" width="70px">
                </div>
                <div class="col-sm-8 col-md-8">
                    <h1>欢迎来到心理测试平台</h1>
                </div>
            </div>
        </div>
        <form action="{{ route('paper.test') }}" method="POST">
          @csrf
        <div class="form-group">
          <label for="exampleInputName2">Name</label>
          <input type="text" class="form-control" name="name" placeholder="请输入您的姓名">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail2">Email</label>
          <input type="email" class="form-control" name="email" placeholder="请输入您的邮箱">
        </div>
        <hr>
        <h3 align="center">{{ $name }}</h3>
        <input type='text' name='form_name' value='{{ $name }}' hidden>
        @foreach ($questions as $question)
        <ul class="list-group">
            <li class="list-group-item">{{ $question->text }}</li>
            <li class="list-group-item">
                <div class="radio">
                    <label>
                      <input type="radio" name="{{ $question->id }}" id="optionsRadios1" value="A">
                      {{ $question->answer_one }}
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="{{ $question->id }}" id="optionsRadios2" value="B">
                      {{ $question->answer_two }}
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="{{ $question->id }}" id="optionsRadios3" value="C">
                      {{ $question->answer_three }}
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="{{ $question->id }}" id="optionsRadios4" value="D">
                      {{ $question->answer_four }}
                    </label>
                  </div>
            </li>
          </ul>
          @endforeach
          <button type="submit" class="btn btn-primary btn-sm btn-block">提交</button>
          <form>
    </div>
</body>
<script language="javascript">
    function tip()
    {
      //  alert("温馨提示：\n 1. 本次测试姓名、邮箱信息为必填项，若不填写则不计入统计。\n 2. 本次测试没有自动提交,请手动提交。 \n 3. 注意测试提交时间,若提交失败超过测试结束时间,则提交失败。 \n 注：请留有足够时间提交测试,勿因其他因素错过时间。");
    }
</script>
<script src='{{ asset('admin\js\jquery.min.js') }}'></script>
<script src='{{ asset('admin\js\bootstrap.min.js') }}'></script>
<script src="{{ asset('admin\js\popper.min.js') }}"></script>
</html>