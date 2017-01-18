@extends('layouts.app')
@section('htmlheader_title')
Gallery List
@endsection
@section('main-content')
<div class="spark-screen gallery-wrap">

<div class="row page-status-bar">
	
	<div class="col-md-12 col-md-12">
		<a href="{{ route('admin.gallery.create') }}" class="btn btn-primary btn-sm">
			<span class="glyphicon glyphicon-plus"></span> Add Gallery</a>
	</div>
</div>
<div class="row">
	<div class="col-md-12 list">
		@if (count($galleries) > 0)
		<?php //echo '<pre>'; print_r($sliders); die(); ?>
		<table class="table table-bordered table-striped" id="example" width="100%">
			<thead>
				<tr>
					<th>S.N.</th>
					<th>Title</th>
					<th>Action</th>
				</tr>
			</thead>
			
			
			<tbody>
				<?php $k =1; ?>
				@foreach ($galleries as $key=>$gallery)
				<tr>
					<td> {{ $k }}
					</td>
					<td>{{ $gallery->title }}</td>
					<td><a class="btn btn-info btn-sm" href="{{ route('admin.gallery.edit',['parameter' => $gallery->id]) }}"><i class="fa fa-pencil"></i> </a> | <a class="btn btn-danger btn-sm" href="{{ route('admin.gallery.delete',['parameter' => $gallery->id]) }}"><i class="fa fa-trash-o"></i></a></td>
				</tr>
				<?php $k++ ; ?>
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
				          <p>No Gallery Added
				          </p>
				        </div><!-- /.box-body -->
      				</div>
		@endif
	</div>
</div>
</div>
@endsection