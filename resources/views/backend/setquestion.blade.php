@extends('backend.admin.layouts.default')
@section('content')
	<div class="col-md-10">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 align="center">修改问题</h4>
			</div>
			<div class="panel-body">
				<!--这里是修改表单,首先把文章显示出来再修改-->
				<form method="POST" action="{{ route('web.update.user',$user->id) }}" class="form-horizontal">
					{{ csrf_field() }}
					<div class="form-group">
						<label for="article-title" class="col-sm-2 control-label">姓名</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="article-title" placeholder="请输入员工的姓名" name="name" value="{{ $user->name }}">
						</div>
					</div>
					<div class="form-group">
						<label for="article-content" class="col-sm-2 control-label">邮箱</label>
						<div class="col-sm-10">
							<input type="text" name="email" id="article-content"  class="form-control" placeholder="请输入邮箱(用户登陆名)" value="{{ $user->email }}">
						</div>
					</div>
					<div class="form-group">
						<label for="article-content" class="col-sm-2 control-label">密码</label>
						<div class="col-sm-10">
							<input type="text" name="password" id="article-content"  class="form-control" placeholder="请输入密码（直接修改）">
						</div>
					</div>
					<div class="form-group">
						<label for="article-content" class="col-sm-2 control-label">性别</label>
						<div class="col-sm-10">
							<select name="sex" class="form-control">
								@if($user->sex == 2)
									<option value="2">女</option>
									<option value="1">男</option>
								@else
									<option value="1">男</option>
									<option value="2">女</option>
								@endif
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="article-content" class="col-sm-2 control-label">手机号码</label>
						<div class="col-sm-10">
							<input type="text" name="phone" id="article-content"  class="form-control" placeholder="请输入手机号码" value="{{ $user->phone }}">
						</div>
					</div>
					<div class="form-group">
						<label for="article-content" class="col-sm-2 control-label">地址</label>
						<div class="col-sm-10">
							<input type="text" name="address" id="article-content"  class="form-control" placeholder="请输入所住地址" value="{{ $user->address }}">
						</div>
					</div>
					<div class="form-group">
						<label for="article-content" class="col-sm-2 control-label">部门</label>
						<div class="col-sm-10">
							<select name="department_id"  class="form-control">
								<option value="{{ $user->department->id }}">{{ $user->department->name }}</option>
								@foreach(\App\Model\Department::all() as $department)
								<option value="{{ $department->id }}">{{ $department->name }}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="article-content" class="col-sm-2 control-label">身份</label>
						<div class="col-sm-10">
							<select name="identity"  class="form-control">
								@if($user->identity == 2)
									<option value="2">普通员工</option>
									<option value="1">管理员</option>
								@else
									<option value="1">管理员</option>
									<option value="2">普通员工</option>
								@endif

							</select>
						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10" align="center">
							<button type="submit" class="btn btn-default">提交</button>
						</div>
					</div>
				</form>

			</div>
		</div>
	</div>
@endsection
