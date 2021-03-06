@extends('layouts.app')
@section('htmlheader_title')
Home
@endsection
@section('main-content')
<div class="spark-screen slider-edit-page">
<div class="row">
		{!! Form::open( array( 'route'=> array('slider.update',$id),'files' => true,'accept-charset'=>'UTF-8','method'=>'PATCH', 'class'=>'form-horizontal' ) ) !!}
		<div class="slider-wrap" id="slider-wrap">
		@foreach( $sliders as $key=>$slider)
			<div class="add-slider-wrap" id="add-slider-wrap">
			<div class="col-md-9" id="">
				<div class="inner-wrap @if($key > 0) {{ 'second' }} @endif ">
					<input type="hidden" class="count" name="count" value="{{ count($sliders) }}">
					<input type="hidden" class="id" name="id[]" value="{{ $slider->id }}">
					<input type="hidden" class="sliderid" name="sliderid" value="{{ $slider->sliderid }}">
					<input type="hidden" class="counter" name="counter[]" value="{{ $key }}">
					<div class="box box-solid">
						<div class="box-body">
							@if($key == 0)
							<div class="form-group">
								{!! Form::label('title','Title',array('class'=>'col-sm-12 col-md-12')) !!}
								<div class="col-sm-12 col-md-12">
									{!! Form::text('title', isset($slider) ? $slider->title : '' ,['class' => 'form-control'] ) !!}
								</div>
							</div>
							@endif
							<div class="form-group">
								{!! Form::label('caption','Caption',array('class'=>'col-sm-12 col-md-12 ')) !!}
								<div class="col-sm-12 col-md-12">
									{!! Form::textarea('caption[]',isset($slider) ? $slider->caption : '',['class' => 'form-control','id' => 'sliderdesc'] ) !!}
								</div>
							</div>
							
						</div>
					</div>

					<div class="box box-default">
						<div class="box-header with-border">
						<h3 class="box-title">
							Upload Slider Image
							<!-- {!! Form::label('file','Upload Featured Image',array('class'=>'control-lable')) !!} -->
						</h3>
						<div class="box-tools pull-right">
						<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-angle-up"></i></button>
						</div><!-- /.box-tools -->
						</div><!-- /.box-header -->
						<div class="box-body upload-block">
							<span class="btn btn-default btn-file">
								<i class="fa fa-folder-open"></i>Browse Image 
								@if($key == 0)
								<input type='file' onchange="readURL(this,'');" name="sliderimg[]" id="sliderimg" />
								@else
								<input type='file' onchange="readURL(this,<?php echo ($key); ?>);" name="sliderimg[]" id="sliderimg<?php echo ($key); ?>" />
								@endif
							</span>
  							@if($key == 0)
							<div class="bg-img" style="background-image:url('{{ asset('/img/slider/'. $slider->image) }}');"></div>
							@else
							<div class="bgimg" id="bgimg<?php echo ($key); ?>" style="background-image:url('{{ asset('/img/slider/'. $slider->image) }}');"></div>
							@endif
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
										Add Link
										<!-- {!! Form::label('file','Upload Featured Image',array('class'=>'control-lable')) !!} -->
									</h3>
									<div class="box-tools pull-right">
									<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-angle-up"></i></button>
									</div><!-- /.box-tools -->
									</div><!-- /.box-header -->
									<div class="box-body">
										{!! Form::text('link[]',isset($slider) ? $slider->link : '',['class' => 'form-control','id' => ''] ) !!}

									</div>
					</div>
					
					<div class="box box-default">
									<div class="box-header with-border">
									<h3 class="box-title">
										Video Url
										<!-- {!! Form::label('file','Upload Featured Image',array('class'=>'control-lable')) !!} -->
									</h3>
									<div class="box-tools pull-right">
									<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-angle-up"></i></button>
									</div><!-- /.box-tools -->
									</div><!-- /.box-header -->
									<div class="box-body">
										{!! Form::text('vurl[]',isset($slider) ? $slider->videolink : '',['class' => 'form-control','id' => ''] ) !!}

									</div>
					</div>
					
				</div>
				</div>
				@endforeach
				</div>
						<div class="text-right">
							{!! Form::submit('Update',array('class' => 'btn btn-primary')) !!}
						</div>
					
					
		{!! Form::close() !!}
		</div>

		<div class="row">
			<div class="col-md-12">
				<div class="addmore">
					<a href="javascript:;" class="addmoreslider btn btn-primary"><i class="fa fa-plus"></i> Add New Slide</a>
				</div>
			</div>
		</div>
</div>

<div class="addslider" style="display:none;">
	<div class="inner-wrap second">
		<input type="hidden" class="counter" name="counter[]" value="">
		<!-- start of main-content -->
		<div class="col-md-9">
					<div class="box box-solid">
						<div class="box-body">
							<div class="form-group">
								{!! Form::label('caption','Caption',array('class'=>'col-sm-12 col-md-12 ')) !!}
								<div class="col-sm-12 col-md-12">
									{!! Form::textarea('caption[]','',['class' => 'form-control textarea','id' => 'sliderdesc'] ) !!}
								</div>
							</div>
							
						</div>
					</div>

					<div class="box box-default">
						<div class="box-header with-border">
						<h3 class="box-title">
							Upload Slider Image
							<!-- {!! Form::label('file','Upload Featured Image',array('class'=>'control-lable')) !!} -->
						</h3>
						<div class="box-tools pull-right">
						<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-angle-up"></i></button>
						</div><!-- /.box-tools -->
						</div><!-- /.box-header -->
						<div class="box-body upload-block ">
							<span class="btn btn-default btn-file">
								<i class="fa fa-folder-open"></i>Browse Image <input type='file' onchange="" class="sliderimg" name="sliderimg[]" id="sliderimg"/>
							</span>
  							
							<div class="bgimgs" id="bgimg"></div>

						</div>
					</div>
					</div>
					<div class="col-md-3">
						
							<div class="box box-default">
									<div class="box-header with-border">
									<h3 class="box-title">
										Add Link
										<!-- {!! Form::label('file','Upload Featured Image',array('class'=>'control-lable')) !!} -->
									</h3>
									<div class="box-tools pull-right">
									<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-angle-up"></i></button>
									</div><!-- /.box-tools -->
									</div><!-- /.box-header -->
									<div class="box-body">
										{!! Form::text('link[]','',['class' => 'form-control','id' => ''] ) !!}

									</div>
							</div>
							<div class="box box-default">
									<div class="box-header with-border">
									<h3 class="box-title">
										Video Url
										<!-- {!! Form::label('file','Upload Featured Image',array('class'=>'control-lable')) !!} -->
									</h3>
									<div class="box-tools pull-right">
									<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-angle-up"></i></button>
									</div><!-- /.box-tools -->
									</div><!-- /.box-header -->
									<div class="box-body">
										{!! Form::text('vurl[]','',['class' => 'form-control','id' => ''] ) !!}

									</div>
						</div>
					</div>
					
		<!-- end of main-content -->

	</div>
</div>
@endsection