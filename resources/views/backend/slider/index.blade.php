@extends('layouts.app')
@section('htmlheader_title')
Slider List
@endsection
@section('main-content')
<div class="spark-screen slider-wrap">

<div class="row page-status-bar">
	
	<div class="col-md-12 col-md-12">
		<a href="{{ route('slides.create') }}" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-plus"></span> Add Slider</a>
	</div>
</div>
<div class="row">
	<div class="col-md-12 list">
		@if (count($sliders) > 0)
		<table class="table table-bordered table-striped" id="example" width="100%">
			<thead>
				<tr>
					<th>S.N.</th>
					<th>Slider Id</th>
					<th>Title</th>
					<th>Action</th>
				</tr>
			</thead>
			
			
			<tbody>
				<?php $k = 1; ?>
				@foreach ($sliders as $key=>$slider)
				<tr>
					<td>{{ $k }}</td>
					<td> {{ $slider->sliderid }}
					</td>
					<td>{{ $slider->title }}</td>
					<td><a class="btn btn-info btn-sm" href="{{ route('slider.edit',['parameter' => $slider->sliderid]) }}"><i class="fa fa-pencil"></i> </a> | <a class="btn btn-danger btn-sm" href="{{ route('slider.delete',['parameter' => $slider->sliderid]) }}"><i class="fa fa-trash-o"></i></a></td>
				</tr>
				<?php $k++; ?>
				@endforeach
			</tbody>
		</table>
		@else
		<div class="box box-danger">
				        <div class="box-header with-border">
				          <h3 class="box-title">Information</h3>
				          <span class="label label-danger pull-right"><i class="fa fa-eye"></i></span>
				        </div><!-- /.box-header -->
				        <div class="box-body">
				          <p>No Slider Added
				          </p>
				        </div><!-- /.box-body -->
      				</div>
		@endif
	</div>
</div>
</div>
@endsection