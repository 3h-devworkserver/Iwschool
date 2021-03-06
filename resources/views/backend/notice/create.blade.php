@extends('layouts.app')
@section('htmlheader_title')
Notice Create
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
		<!-- <div class="panel-heading">Create Static Block</div> -->
		{!! Form::open( array( 'route'=> 'admin.notice.store','files' => true,'accept-charset'=>'UTF-8','method'=>'POST', 'class'=>'form-horizontal' ) ) !!}
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
						{!! Form::label('excerpt','Excerpt',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
						<div class="col-sm-12 col-md-12">
							{!! Form::text('excerpt','',['class' => 'form-control','id' => ''] ) !!}
						</div>
					</div>
					<div class="form-group">
						{!! Form::label('content','Content',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
						<div class="col-sm-12 col-md-12">
							{!! Form::textarea('content','',['class' => 'form-control','id' => 'pagedesc'] ) !!}
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
					<h3 class="box-title">Upload Image</h3>
					<div class="box-tools pull-right">
						<button class="btn btn-box-tool" data-widget="collapse">
						<i class="fa fa-angle-up"></i>
						</button>
						</div><!-- /.box-tools -->
						</div><!-- /.box-header -->
						<div class="box-body">
							<span class="btn btn-primary btn-file btn-sm">
								<i class="fa fa-folder-open"></i>Upload Image
								<input type="file" name="upload" onchange="readfeatured10(this,'bg-img');" accept="image/*" class="icon-upload">
							</span>
							<div id="preview" class="bg-img"/>
								
								</div><!-- /.box-body -->
								
								</div><!-- /.box -->
								<div class="box box-default">
									<div class="box-header with-border">
										<h3 class="box-title">Notice Date</h3>
										<div class="box-tools pull-right">
											<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-angle-up"></i></button>
											</div><!-- /.box-tools -->
											</div><!-- /.box-header -->
											<div class="box-body">
												{!! Form::text('n_date', null, ['class'=>'form-control datepicker']) !!}
												</div><!-- /.box-body -->
												</div><!-- /.box -->

												<div class="box box-default">
													<div class="box-header with-border">
														<h3 class="box-title">Order</h3>
														<div class="box-tools pull-right">
															<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-angle-up"></i></button>
															</div><!-- /.box-tools -->
															</div><!-- /.box-header -->
															<div class="box-body">
																{!! Form::text('post_order', null, ['class'=>'form-control', 'placeholder'=>'Enter Order']) !!}
																</div><!-- /.box-body -->
																</div><!-- /.box -->
																<div class="box-body">
																	{!! Form::submit('Add',['class'=>'btn btn-primary']) !!}
																	
																	</div><!-- /.box-body -->
																	
																</div>
																{!! Form::close() !!}
																
																
															</div>
														</div>
														@endsection