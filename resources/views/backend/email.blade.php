@extends('backend.layouts.default')
@section('content')
	<div class="col-md-10">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 align="center">添加部门</h4>
			</div>
			<div class="panel-body">
				<!--这里是修改表单,首先把文章显示出来再修改-->
				<form method="POST" action="{{ route('admin.send.email') }}" class="form-horizontal">
					@csrf
					<div class="form-group">
						<label for="article-content" class="col-sm-2 control-label">表单名称</label>
						<div class="col-sm-10">
							<select name="form_id"  class="form-control">
								@foreach(\App\Models\Form::all() as $form)
								<option value="{{ $form->id }}">{{ $form->name }}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="form-group">
							<label for="article-content" class="col-sm-2 control-label">发送至</label>
						<div class="col-sm-10">
							<input type="email" class="form-control" name="email" placeholder="邮箱地址">
						</div>
					</div>
					
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10" align="center">
							<button type="submit" class="btn btn-default">发送</button>
						</div>
					</div>
				</form>

			</div>
		</div>
	</div>


	@if(!empty(session('success')))    　　
	<div class="alert alert-success" role="alert" style="z-index: 999">
		　　　　{{session('success')}}
	</div>
	<script>
		setInterval(function(){
			$('.alert').remove();
		},3000);
	</script>
	@endif
	
@endsection
