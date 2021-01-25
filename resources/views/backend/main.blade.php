@extends('backend.layouts.default')
@section('content')

                <div class="col-md-10">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 align="center">个人信息</h4>
                        </div>
                        <div class="panel-body" >
                            <p class="text-center"><strong>姓名：</strong>{{ $data->name }}</p>
                            <p class="text-center"><strong>邮箱：</strong>{{ $data->email }}</p>
                        </div>
                    </div>
                </div>

@endsection