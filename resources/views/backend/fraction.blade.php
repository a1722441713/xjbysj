@extends('backend.layouts.default')
@section('content')

    <div class="col-md-10">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 align="center">测试结果</h4>
                <div class="container row">
                    <div class="col-md-8">
                        <form class="form-inline" action="{{ route('admin.search.fraction') }}" method="POST">
                            @csrf
                            <div class="form-group">         
                                <input type="text" class="form-control" placeholder="表单名称" name='name'>        
                                <button class="btn btn-primary" type="submit">搜索</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="panel-body" >
                <table class="table table-hover">
                    <tr>
                        <th>姓名</th>
                        <th>测试标题</th>
                        <th>成绩</th>
                    </tr>
                    <tbody>
                    <!--这里和我跟你们说的ul里面的li标签一样我们学的是对li标签循环,这里直接对tr标签进行循环-->
                    @foreach($data as $message)
                    <tr>
                        <td>{{ $message->student->name }}</td>
                        <td>{{ $message->form->name }}</td>
                        <td>{{ $message->fraction }}</td>
   
                        {{-- <td>
                            <a href="{{ route('show.update.form',$message->id) }}">
                                <button type="button" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-pencil "></i></button>
                            </a>
                            <a href="{{ route('admin.del.question',$message->id) }}">
                                <button type="button" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash "></i></button>
                            </a>
                        </td> --}}
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{-- <div align="center">{{ $data->links() }}</div> --}}
    </div>
@endsection