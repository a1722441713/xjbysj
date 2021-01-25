<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>办公用品管理系统</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('admin/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
</head>
<body>
<div class="container">
    <div class="page-header ex-page-header">
        <h2 class="title">后台管理系统</h2>
        <a href="{{ route('admin.logout') }}" class="btn btn-large btn-primary" style="margin-left: 1000px;">退出登录</a>
    </div>
    <div class="body-container">
        <div class="row">
            <div class="col-md-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </div>
                    <div class="list-group">
                        <a href="{{ route('show.backend.form') }}" class="list-group-item">个人管理</a>
                        <a href="{{ route('show.all.question') }}" class="list-group-item">题目管理</a>
                        <a href="{{ route('show.all.form') }}" class="list-group-item">表单管理</a>
                        <a href="{{ route('send.email.form') }}" class="list-group-item">邀请邮件</a>
                        <a href="{{ route('show.all.fraction') }}" class="list-group-item">测试结果</a>
                    </div>
                </div>
            </div>
            @yield('content')
        </div>
    </div>
</div>
<footer class="copyright">
    &copy;
</footer>
</body>
<script src='{{ asset('admin\js\jquery.min.js') }}'></script>
<script src='{{ asset('admin\js\bootstrap.min.js') }}'></script>
</html>
