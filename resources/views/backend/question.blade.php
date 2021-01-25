@extends('backend.layouts.default')
@section('content')

    <div class="col-md-10">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 align="center">题目管理</h4>
                <div class="container row">
                    <div class="col-md-8">
                        <form class="form-inline" action="{{ route('admin.search.question') }}" method="POST">
                            @csrf
                            <div class="form-group">         
                                <input type="text" class="form-control" placeholder="问题名称" name='name'>        
                                <button class="btn btn-primary" type="submit">搜索</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                            添加题目
                        </button>
                        <!-- Modal -->
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">添加题目</h4>
                        </div>
                        <div class="modal-body">
                        <form action="{{ route('admin.add.question') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">问题:</label>
                                <textarea class="form-control" name="question"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="control-label">答案A:</label>
                                <input type="text" class="form-control" name="answer_one">
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="control-label">答案B:</label>
                                <input type="text" class="form-control" name="answer_two">
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="control-label">答案C:</label>
                                <input type="text" class="form-control" name="answer_three">
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="control-label">答案D:</label>
                                <input type="text" class="form-control" name="answer_four">
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="message-text" class="control-label"> 5分答案:</label>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="message-text" class="control-label"> 3分答案:</label>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="message-text" class="control-label"> 1分答案:</label>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="message-text" class="control-label"> 0分答案:</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" name="option_one">
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" name="option_two">
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" name="option_three">
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" name="option_four">
                                    </div>
                            </div>
                            {{-- <div class="form-group">
                                <label for="message-text" class="control-label">参考答案:</label>
                                <!-- <input type="text" class="form-control" id="recipient-name"> -->
                                <label class="radio-inline" style="margin-left: 25px">
                                <input type="radio" name="option" id="inlineRadio1" value="A"> A
                                </label>
                                <label class="radio-inline">
                                <input type="radio" name="option" id="inlineRadio2" value="B"> B
                                </label>
                                <label class="radio-inline">
                                <input type="radio" name="option" id="inlineRadio3" value="C"> C
                                </label>
                                <label class="radio-inline">
                                <input type="radio" name="option" id="inlineRadio4" value="D"> D
                                </label>
                            </div> --}}
                            <br>
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
                        <th>问题</th>
                        <th>类型</th>
                        <th>答案A</th>
                        <th>答案B</th>
                        <th>答案C</th>
                        <th>答案D</th>
                        <th>操作</th>
                    </tr>
                    <tbody>
                    <!--这里和我跟你们说的ul里面的li标签一样我们学的是对li标签循环,这里直接对tr标签进行循环-->
                    @foreach($data as $message)
                    <tr>
                        <td>{{ $message->text }}</td>
                        <td>@if($message->type_id == 1) 单选题 @endif</td>
                        <td>{{ $message->answer_one }}</td>
                        <td>{{ $message->answer_two }}</td>
                        <td>{{ $message->answer_three }}</td>
                        <td>{{ $message->answer_four }}</td>
                        <td>
                            {{-- <a href="{{ route('show.update.form',$message->id) }}">
                                <button type="button" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-pencil "></i></button>
                            </a> --}}
                            <a href="{{ route('admin.del.question',$message->id) }}">
                                <button type="button" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash "></i></button>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div align="center">{{ $data->links() }}</div>
    </div>
@endsection