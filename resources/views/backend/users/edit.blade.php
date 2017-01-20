@extends('layouts.app')
@section('htmlheader_title')
Edit User
@endsection
@section('main-content')
<div class="spark-screen edit-page">
	<div class="row">
		{!! Form::open( array( 'route'=> array('user.update',$users->id),'files' => true,'accept-charset'=>'UTF-8','method'=>'PATCH', 'class'=>'form-horizontal' ) ) !!}
		<!-- start of main-content -->
		<div class="col-md-9 col-sm-9">
			<div class="box">
				<div class="box-body">
					<div class="form-group">
						{!! Form::label('name','Name',array('class'=>'col-sm-3 col-sm-3 control-lable')) !!}
						<div class="col-sm-9 col-md-9">
							{!! Form::text('name',( isset($users) || !empty($users->name) ) ? $users->name : '',['class' => 'form-control'] ) !!}
						</div>
					</div>
					<div class="form-group">
						{!! Form::label('email','Email Address',array('class'=>'col-sm-3 col-md-3 control-lable')) !!}
						<div class="col-sm-9 col-md-9">
							{!! Form::email('email',( isset($users) || !empty($users->email) ) ? $users->email : '',['class' => 'form-control'] ) !!}
						</div>
					</div>
				</div>
			</div>
			</div>
			<div class="col-md-3">
					<div class="box box-default">
						<div class="box-header with-border">
						<h3 class="box-title">
							Upload profile Image
							<!-- {!! Form::label('file','Upload Featured Image',array('class'=>'control-lable')) !!} -->
						</h3>
						<div class="box-tools pull-right">
						<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-angle-up"></i></button>
						</div><!-- /.box-tools -->
						</div><!-- /.box-header -->
						<div class="box-body upload-block">
							<span class="btn btn-default btn-file">
								<i class="fa fa-folder-open"></i>Browse Image 
								<input type='file' onchange="readURL(this,'');" name="upload" id="upload" />
	</span>
  							@if(!empty($users->image))
							<div class="bg-img" id="userimg" style="background-image:url('{{ asset('/img/user/'. $users->image) }}');"></div>
							@else
							<div class="bg-img" id="bgimg"></div>
							@endif
						</div>
					</div>
			<div class="text-right">
				{!! Form::submit('Update',array('class' => 'btn btn-primary')) !!}
			</div>
			
		</div>
			{!! Form::close() !!}
		</div>
	</div>
@endsection