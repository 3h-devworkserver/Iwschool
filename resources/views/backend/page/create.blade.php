@extends('layouts.app')

@section('htmlheader_title')
	Home
@endsection


@section('main-content')
<div class="spark-screen add-page">
	<div class="row page-status-bar">
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
	{!! Form::open( array( 'route'=> 'page.store','files' => true,'accept-charset'=>'UTF-8','method'=>'POST', 'class'=>'form-horizontal' ) ) !!}


	<!-- start of main-content -->
	<div class="col-md-9 col-sm-9">
		<div class="box">
			<div class="box-body">
				<div class="form-group">
					{!! Form::label('title','Title',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
					<div class="col-sm-12 col-md-12">
						{!! Form::text('title', '' ,['class' => 'form-control'] ) !!}
					</div>
				</div>

				<div class="form-group">
					{!! Form::label('quotes','Quote',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
					<div class="col-sm-12 col-md-12">
						{!! Form::textarea('quotes','',['class' => 'form-control','id' => 'quotedesc'] ) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('description','Content',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
					<div class="col-sm-12 col-md-12">
						{!! Form::textarea('description','',['class' => 'form-control','id' => 'pagedesc'] ) !!}
					</div>
				</div>
			</div>
		</div>

		
		<div class="box box-default">
			<div class="box-header with-border">
			<h3 class="box-title">SEO Options</h3>
			<div class="box-tools pull-right">
			<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-angle-up"></i></button>
			</div><!-- /.box-tools -->
			</div><!-- /.box-header -->
			<div class="box-body">					

				<div class="form-group">
					{!! Form::label('meta_title','Meta Title',array('class'=>'col-sm-3 col-sm-3 control-lable')) !!}
					<div class="col-sm-9 col-md-9">
						{!! Form::text('meta_title','',['class' => 'form-control'] ) !!}
					</div>
				</div>

				<div class="form-group">
					{!! Form::label('meta_key','Meta Keyword',array('class'=>'col-sm-3 col-md-3 control-lable')) !!}
					<div class="col-sm-9 col-md-9">
					{!! Form::text('meta_key','',['class' => 'form-control'] ) !!}
					</div>
				</div>

				<div class="form-group">
					{!! Form::label('meta_desc','Meta Description',array('class'=>'col-sm-3 col-md-3 control-lable')) !!}
					<div class="col-sm-9 col-md-9">
						{!! Form::text('meta_desc','',['class' => 'form-control'] ) !!}
					</div>
				</div>
			</div>
		</div>

		
	</div>
	<!-- end of main-content -->

	<!-- start of sidebar -->
	<div class="col-md-3 col-sm-3 right-sidebar">
		
			<div class="box box-default">
				<div class="box-header with-border">
									<h3 class="box-title">
									Upload Featured Image
									</h3>
								<div class="box-tools pull-right">
										<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-angle-up"></i></button>
								</div><!-- /.box-tools -->
						</div><!-- /.box-header -->
					<div class="box-body upload-block">
					<span class="btn btn-default btn-file">
						<i class="fa fa-folder-open"></i>Upload Image
							<input type="file" name="file" onchange="readfeatured10(this,'bg-img');" accept="image/*" id="icon-upload" class="icon-upload">
					</span>
				 <div class="bg-img" id="bgimg"></div>
				</div>
			</div>
		

		
			<div class="box box-default">
				<div class="box-header with-border">
				<h3 class="box-title">
					Status
				</h3>
				<div class="box-tools pull-right">
				<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-angle-up"></i></button>
				</div><!-- /.box-tools -->
				</div><!-- /.box-header -->
				<div class="box-body">
					{!! Form::select('status',array('draft'=>'Draft','publish'=>'Publish'),'', ['class' => 'form-control'] ) !!}

				</div>
			</div>
			<div class="box box-default">
				<div class="box-header with-border">
				<h3 class="box-title">
					Choose Slider
				</h3>
				<div class="box-tools pull-right">
				<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-angle-up"></i></button>
				</div><!-- /.box-tools -->
				</div><!-- /.box-header -->
				<div class="box-body">
					@if($slider)
					 <select name="slider" id="slider" class="form-control">
					 	<option value="">Select Slider</option>
					 	@foreach($slider as $s)
								<option value="{{ $s->sliderid }}">{{ $s->title }}</option>
					 	@endforeach

					 </select>
					 @endif
				</div>
			</div>
		
		
			<div class="text-right">
				{!! Form::submit('Publish',array('class' => 'btn btn-primary')) !!}
			</div>
		
		
	</div>
	<!-- end of sidebar -->

	{!! Form::close() !!}
</div>

</div>

@endsection