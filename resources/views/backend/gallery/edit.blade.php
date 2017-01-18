@extends('layouts.app')
@section('htmlheader_title')
Gallery edit
@endsection
@section('main-content')
<div class="spark-screen slider-edit-page">
	<div class="row">
		{!! Form::open( array( 'route'=> array('admin.gallery.update',$galleries->id),'files' => true,'accept-charset'=>'UTF-8','method'=>'PATCH', 'class'=>'form-horizontal' ) ) !!}
		<div class="col-md-9" id="add-slider-wrap">
			<div class="inner-wrap">
				
				<div class="box box-solid">
					<div class="box-body">
						<div class="form-group">
							{!! Form::label('title','Title',array('class'=>'col-sm-12 col-md-12')) !!}
							<div class="col-sm-12 col-md-12">
								{!! Form::text('title', isset($galleries) ? $galleries->title : '' ,['class' => 'form-control'] ) !!}
							</div>
						</div>
						<div class="form-group">
							{!! Form::label('caption','Caption',array('class'=>'col-sm-12 col-md-12 ')) !!}
							<div class="col-sm-12 col-md-12">
								{!! Form::textarea('caption',isset($galleries) ? $galleries->caption : '',['class' => 'form-control','id' => 'sliderdesc'] ) !!}
							</div>
						</div>
						
					</div>
				</div>
				
				
				
			</div>
		</div>
		<!-- end of main-content -->
		<!-- start of sidebar -->
		<div class="col-md-3">
			<div class="box box-default">
				<div class="box-header with-border">
					<h3 class="box-title">
					Update Image
					</h3>
					<div class="box-tools pull-right">
						<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-angle-up"></i></button>
						</div><!-- /.box-tools -->
						</div><!-- /.box-header -->
						<div class="box-body upload-block">
							<span class="btn btn-default btn-file">
								<i class="fa fa-folder-open"></i>Update Image
								<input type='file' onchange="readURL(this,'');" name="galleryimg" id="galleryimg" />
							</span>
							@if(!empty($galleries->images))
							<div class="bg-img" style="background-image:url('{{ asset('/img/gallery/'. $galleries->images) }}');"></div>
							@else
							<div class="bg-img"></div>
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