@extends('backend.layouts.default')
@section('content')

    <div class="col-md-10">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 align="center">表单管理</h4>
                <div class="container row">
                    <div class="col-md-8">
                        {{-- <form class="form-inline" action="{{ route('admin.search.question') }}" method="POST">
                            @csrf
                            <div class="form-group">         
                                <input type="text" class="form-control" placeholder="名称" name='name'>        
                                <button class="btn btn-primary" type="submit">搜索</button>
                            </div>
                        </form> --}}
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                            添加表单
                        </button>
                        <!-- Modal -->
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">添加表单</h4>
                        </div>
                        <div class="modal-body">
                        <form action="{{ route('admin.add.form') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">表单标题:</label>
                                <input type="title" class="form-control" name="name">
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="control-label">生成方式:</label>
                                <!-- <input type="text" class="form-control" id="recipient-name"> -->
                                <label class="radio-inline" style="margin-left: 25px">
                                <input type="radio" name="generate" id="type" value="1" checked>随机生成
                                </label>
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="control-label">生成数量:</label>
                                <!-- <input type="text" class="form-control" id="recipient-name"> -->
                                <label class="radio-inline" style="margin-left: 25px">
                                <input type="radio" name="generate_number" id="inlineRadio1" value="20" checked> 20
                                </label>
                                <label class="radio-inline">
                                <input type="radio" name="generate_number" id="inlineRadio2" value="50"> 50
                                </label>
                                <label class="radio-inline">
                                <input type="radio" name="generate_number" id="inlineRadio3" value="100"> 100
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="generate_number" id="inlineRadio2" value="2"> 测试 2 个
                                </label>
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="control-label">开始时间:</label>
                                <input type="datetime-local" class="form-control" name="start_time">
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="control-label">结束时间:</label>
                                <input type="datetime-local" class="form-control" name="end_time">
                            </div>                   
                            <div class="modal-footer">
                            <button type="submit" class="btn btn-default" data-dismiss="modal">Close</button>
                            <!-- <button class="btn btn-default" type="submit" data-dismiss="modal">取消</a> -->
                            <button type="submit" class="btn btn-primary">Save changes</button>
                            <!-- <button class="btn btn-primary" type="submit">确认</a> -->
                        </div>
                        </form>
                            
                        </div>
                        </div>
                    </div>
                    </div>
                    </div>
                </div>
            </div>
            <div class="panel-body" >
                <table class="table table-hover">
                    <tr>
                        <th>表单名称</th>
                        {{-- <th>二维码</th> --}}
                        {{-- <th>操作</th> --}}
                    </tr>
                    <tbody>
                    <!--这里和我跟你们说的ul里面的li标签一样我们学的是对li标签循环,这里直接对tr标签进行循环-->
                    @foreach($data as $message)
                    <tr>
                        <td>{{ $message->name }}</td>
                        {{-- <td>{{ $message->url }}</td> --}}
                        {{-- <td>{!! QrCode::size(10)->generate($message->url); !!}</td> --}}
                        
                        {{-- <td>
                            <a href="#">
                                <button type="button" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash "></i></button>
                            </a>
                        </td> --}}
                    </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>

        </div>
        <div align="center">{{ $data->links() }}</div>
    </div>


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
@endsection