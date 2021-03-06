@extends('layouts.app')

@section('htmlheader_title')
	Home
@endsection


@section('main-content')

<div class="spark-screen edit-page">
<div class="row">
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{!! Form::open( array( 'route'=> array('admin.notice.update',$posts->id),'files' => true,'accept-charset'=>'UTF-8','method'=>'PATCH', 'class'=>'form-horizontal' ) ) !!}
<!-- start of main-content -->
		<div class="col-md-9 col-sm-9">
			<div class="box">
				<div class="box-body">
					<div class="form-group">
						{!! Form::label('title','Title',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
						<div class="col-sm-12 col-md-12">
							{!! Form::text('title', isset($posts) ? $posts->title : '' ,['class' => 'form-control'] ) !!}
						</div>
					</div>
					<div class="form-group">
						{!! Form::label('excerpt','Excerpt',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
						<div class="col-sm-12 col-md-12">
							{!! Form::text('excerpt',isset($posts) ? $posts->excerpt :'',['class' => 'form-control','id' => 'pagedesc'] ) !!}
						</div>
					</div>
					<div class="form-group">
						{!! Form::label('content','Content',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
						<div class="col-sm-12 col-md-12">
							{!! Form::textarea('content',isset($posts) ? $posts->content : '' ,['class' => 'form-control','id' => 'pagedesc'] ) !!}
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
			    <h3 class="box-title">Image</h3>
			    <div class="box-tools pull-right">
			      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-angle-up"></i></button>
			    </div><!-- /.box-tools -->
			  </div><!-- /.box-header -->
			  <div class="box-body">
					 <div id="preview" class="manage-width featured-img" style="background-image:url({{ asset('/img/notice/'.$posts->image) }});"/></div>
					 	<span class="btn btn-primary btn-file btn-sm">
					<i class="fa fa-folder-open"></i>Change Image<input type="file" name="upload" onchange="readfeatured(this);" accept="image/*" class="icon-upload">
					</span>
					
			</div><!-- /.box-body -->
			
			</div><!-- /.box -->
       <!-- </div> -->
<div class="box box-default">
									<div class="box-header with-border">
										<h3 class="box-title">Notice Date</h3>
										<div class="box-tools pull-right">
											<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-angle-up"></i></button>
											</div><!-- /.box-tools -->
											</div><!-- /.box-header -->
											<div class="box-body">
												{!! Form::text('n_date', isset($posts) ? $posts->n_date : '', ['class'=>'form-control datepicker']) !!}
												</div><!-- /.box-body -->
												</div><!-- /.box -->
       	<div class="box box-default">
			  <div class="box-header with-border">
			    <h3 class="box-title">Post Order</h3>
			    <div class="box-tools pull-right">
			      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-angle-up"></i></button>
			    </div><!-- /.box-tools -->
			  </div><!-- /.box-header -->
			  <div class="box-body">
			  	{!! Form::text('post_order', isset($posts) ? $posts->notice_order : '', ['min' => '0', 'class'=>'form-control', 'placeholder'=>'Enter Order']) !!}
			  </div><!-- /.box-body -->
			</div><!-- /.box -->
		  <div class="box-body">
				{!! Form::submit('Update',['class'=>'btn btn-primary']) !!}
				
		  </div><!-- /.box-body -->
      </div> 
	
{!! Form::close() !!}

</div>


	</div>

@endsection