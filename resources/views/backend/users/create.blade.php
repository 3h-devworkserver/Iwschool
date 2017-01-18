@extends('layouts.app')
@section('htmlheader_title')
Home
@endsection
@section('main-content')
<div class="spark-screen add-page">
	<div class="row">
		<div class="col-md-12">
			@if (count($errors) > 0)
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
			@endif
		</div>
	</div>
	<div class="row">
		{!! Form::open( array( 'route'=> 'user.store','files' => true,'accept-charset'=>'UTF-8','method'=>'POST', 'class'=>'form-horizontal' ) ) !!}
		<!-- start of main-content -->
		<div class="col-md-9 col-sm-9">
			<div class="box">
				<div class="box-body">
					<div class="form-group">
						{!! Form::label('name','Name',array('class'=>'col-sm-3 col-sm-3 control-lable')) !!}
						<div class="col-sm-9 col-md-9">
							{!! Form::text('name',NULL,['class' => 'form-control'] ) !!}
						</div>
					</div>
					<div class="form-group">
						{!! Form::label('email','Email Address',array('class'=>'col-sm-3 col-md-3 control-lable')) !!}
						<div class="col-sm-9 col-md-9">
							{!! Form::email('email',NULL,['class' => 'form-control'] ) !!}
						</div>
					</div>
					<div class="form-group">
						{!! Form::label('password','Password',array('class'=>'col-sm-3 col-md-3 control-lable')) !!}
						<div class="col-sm-9 col-md-9">
							{!! Form::password('password',array('class' => 'form-control') ) !!}
						</div>
					</div>
					<div class="form-group">
						{!! Form::label('password_confirmation','Re-type Password',array('class'=>'col-sm-3 col-md-3 control-lable')) !!}
						<div class="col-sm-9 col-md-9">
							{!! Form::password('password_confirmation',array('class' => 'form-control') ) !!}
						</div>
					</div>
				</div>
			</div>
			<div class="text-right">
				{!! Form::submit('Submit',array('class' => 'btn btn-primary')) !!}
			</div>
			
		</div>
		<!-- end of main-content -->
		{!! Form::close() !!}
	</div>
</div>
@endsection