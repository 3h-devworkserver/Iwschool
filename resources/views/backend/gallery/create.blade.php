@extends('layouts.app')
@section('htmlheader_title')
Create Gallery
@endsection
@section('main-content')
<div class="spark-screen slider-wrap">
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
		
		
		{!! Form::open( array( 'route'=> 'admin.gallery.store','files' => true,'accept-charset'=>'UTF-8','method'=>'POST', 'class'=>'form-horizontal' ) ) !!}
		<!-- start of main-content -->
		<div class="gallery-wrap">
			<div class="inner-gallery-wrap">
			<div class="col-md-9" id="add-slider-wrap">
				
				<div class="inner-wrap">
					<input type="hidden" class="counter" name="counter[]" value="0">
					<div class="box box-solid">
						<div class="box-body">
							<div class="form-group">
								{!! Form::label('title','Title',array('class'=>'col-sm-12 col-md-12')) !!}
								<div class="col-sm-12 col-md-12">
									{!! Form::text('title[]', '' ,['class' => 'form-control'] ) !!}
								</div>
							</div>
							<div class="form-group">
								{!! Form::label('caption','Caption',array('class'=>'col-sm-12 col-md-12 ')) !!}
								<div class="col-sm-12 col-md-12">
									{!! Form::textarea('caption[]','',['class' => 'form-control textarea','id' => 'sliderdesc'] ) !!}
								</div>
							</div>
							
						</div>
					</div>
					
					
					
				</div>
			</div>
			<div class="col-md-3 col-sm-3">
				<div class="box box-default">
					<div class="box-header with-border">
						<h3 class="box-title">
						Upload Image
						</h3>
						<div class="box-tools pull-right">
							<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-angle-up"></i></button>
							</div><!-- /.box-tools -->
							</div><!-- /.box-header -->
							<div class="box-body upload-block">
								<span class="btn btn-default btn-file">
									<i class="fa fa-folder-open"></i>Browse Image
									<input type='file' onchange="readURL(this,'');" name="galleryimg[]" id="" />
								</span>
								
								<div class="bg-img"></div>
							</div>
						</div>
						<div class="text-right">
							{!! Form::submit('Publish',array('class' => 'btn btn-primary')) !!}
						</div>
					</div>
				</div>
				</div>
				{!! Form::close() !!}
				
				
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="addmore">
						<a href="javascript:;" class="addgallery btn btn-primary"><i class="fa fa-plus"></i> Add New</a>
					</div>
				</div>
			</div>
		</div>
		<div class="addnewgallery" style="display:none;">
			<div class="inner-wrap second">
				<input type="hidden" class="counter" name="counter[]" value="">
				<!-- start of main-content -->
				<div class="col-md-9 col-sm-9">
					
					<div class="box box-solid">
						<div class="box-body">
							<div class="form-group">
								{!! Form::label('title','Title',array('class'=>'col-sm-12 col-md-12')) !!}
								<div class="col-sm-12 col-md-12">
									{!! Form::text('title[]', '' ,['class' => 'form-control'] ) !!}
								</div>
							</div>
							<div class="form-group">
								{!! Form::label('caption','Caption',array('class'=>'col-sm-12 col-md-12 ')) !!}
								<div class="col-sm-12 col-md-12">
									{!! Form::textarea('caption[]','',['class' => 'form-control textarea','id' => 'sliderdesc'] ) !!}
								</div>
							</div>
							
						</div>
					</div>
				</div>
				<div class="col-sm-3 col-md-3">
					
					<div class="box box-default">
						<div class="box-header with-border">
							<h3 class="box-title">
							Upload Image
							</h3>
							<div class="box-tools pull-right">
								<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-angle-up"></i></button>
								</div><!-- /.box-tools -->
								</div><!-- /.box-header -->
								<div class="box-body upload-block ">
									<span class="btn btn-default btn-file">
										<i class="fa fa-folder-open"></i>Browse Image 
										<input type='file' onchange="" class="galleryimg" name="galleryimg[]" id="galleryimg"/>
									</span>
									
									<div class="bgimg" id="bgimg"></div>
								</div>
							</div>
						</div>
						
						
						<!-- end of main-content -->
					</div>
				</div>
				@endsection