<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>test</title>
    <link rel="stylesheet" href="{{ asset('admin/css/bootstrap.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}"> --}}
</head>
<body>

    @if(!empty(session('tip')))    　　
        <div class="alert alert-danger" role="alert" style="z-index: 999">
            　　　　{{session('tip')}}
        </div>
        <script>
            setInterval(function(){
                $('.alert').remove();
            },20000);
        </script>
    @endif
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