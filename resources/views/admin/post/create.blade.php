@extends('admin.layouts.master')

@section('css.section')
<link rel="stylesheet" href="{{ asset('admin_assets/bower_components/bootstrap-fileinput-master/css/fileinput.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin_assets/bower_components/bootstrap-tagsinput-master/src/bootstrap-tagsinput.css') }}">
<style type="text/css" >
	.errors{
		color: red;
	}
</style>
@endsection

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			<i class="glyphicon glyphicon-list-alt"><i class="text-uppercase"> &nbsp;Posts Management</i></i>
			
			{{-- <small>advanced tables</small> --}}
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="glyphicon glyphicon-home"></i> Home</a></li>
			<li><a href="#">Posts</a></li>
			<li class="active">Add</li>
		</ol>
	</section>
	<!-- Main content  -->
	<section class="content">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title"><b><i>Add new Post</i></b></h3>
				{{-- <a type="button" class="btn btn-success fa fa-plus" style="float: right;" href="{{ route('admin.posts.create') }}"> Add Post</span></a> --}}
			</div>
			<!-- /.box-header -->

			{{-- table of post --}}
			<div class="box-body">
				<form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data" id="post-create">
					{{csrf_field()}}
					<div class="portlet-body">
						<div class="row">
							<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
								<div class="form-group">
									<label for="">Title(<span style="color: red">*</span>)</label>
									<input type="text" class="form-control" id="title" placeholder="Tiêu đề" name="title">
									@if ($errors->has('title'))
									<span class="errors">{{$errors->first('title')}}</span>
									@endif
								</div>
								<div class="form-group">
									<label for="">Description(<span style="color: red">*</span>)</label>
									<textarea class="form-control" name="description" id="Mô tả" cols="30" rows="4" placeholder="Description"></textarea> 
									@if ($errors->has('description'))
									<span class="errors">{{$errors->first('description')}}</span>
									@endif
								</div>
								<div class="form-group">
									<label for="">Content(<span style="color: red">*</span>)</label>
									<textarea class="form-control" name="content" id="content" cols="30" rows="10" placeholder="Content"></textarea> 
									@if ($errors->has('content'))
									<span class="errors">{{$errors->first('content')}}</span>
									@endif
								</div>
							</div>

							<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">

								{{-- categories --}}
								<div class="portlet light bordered">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-list font-green" aria-hidden="true"></i>
											<span class="caption-subject font-green bold">Category</span>
										</div>
									</div>
									<div class="portlet-body">
										<select class="form-control" name="category_id">
											@if (count($categories)>0) @foreach ($categories as $category)
											<option value="{{$category->id}}">{{$category->name}}</option>
											@endforeach @endif
										</select>
									</div>
								</div>

								{{-- featured image  --}}
								<div class="portlet light bordered">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-picture-o font-green" aria-hidden="true"></i>
											<span class="caption-subject font-green bold">Thumbnail</span>
										</div>
									</div>
									<div class="portlet-body">
										<div class="fileinput fileinput-new" data-provides="fileinput">
											<div class="fileinput-new thumbnail" style="width: 250px; height: 200px;">
												<img id="previewimg" src="{{url('images/no-image.png')}}" alt="No Image" /> 
											</div>
											<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 250px; max-height: 200px;"> </div>
											<div style="margin-top: 10px;">
												<span class="input-group-btn">
													<a id="lfm" data-input="thumbnail" data-preview="previewimg" class="btn btn-primary">
														<input type="file" name="thumbnail">
													</a>
												</span>
												@if ($errors->has('thumbnail'))
												<span class="errors">{{$errors->first('thumbnail')}}</span>
												@endif
											</div>
										</div>
									</div>
								</div>

								{{-- Tags --}}
								<div class="portlet light bordered">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-tags font-green" aria-hidden="true"></i>
											<span class="caption-subject font-green bold">Tags</span>
										</div>
									</div>
									<div class="portlet-body">
										<div class="form-group">
											<select multiple name="tags[]" id="tags" data-role="tagsinput">
											</select>
											@if ($errors->has('tags'))
											<span class="errors">{{$errors->first('tags')}}</span>
											@endif
										</div>
									</div>
								</div>                    

								<div class="portlet light bordered">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-tags font-green" aria-hidden="true"></i>
											<span class="caption-subject font-green bold">Action</span>
										</div>
									</div>
									<div class="portlet-body">
										<div class="form-group">
											<button type="submit" id="add-post" class="btn btn-sm green btn-circle" style="width: 40%"> Save </button>                               
											<input type="reset" class="btn btn btn-sm btn-circle" style="width: 40%" value="Reset">
										</div>
									</div>
								</div>

							</div>
						</div>

					</div>
				</form>
			</div>
			<!-- /.box-body -->
		</div>
		<!-- /.box -->
	</section>
	<!--  /. main content  -->
</div>

@endsection

@section('js.section')

<script src="{{ asset('admin_assets/bower_components/tinymce/js/tinymce/jquery.tinymce.min.js')}}"></script>

<script src="{{ asset('admin_assets/bower_components/prism-gh-pages/prism.js') }}"></script>

<script src="{{ asset('admin_assets/bower_components/bootstrap-fileinput-master/js/fileinput.min.js') }}"></script>

<script src="{{ asset('admin_assets/bower_components/bootstrap-tagsinput-master/dist/bootstrap-tagsinput.min.js') }}"></script>

<script>

	tinymce.init({
		selector: '#content',
		height: 500,
		theme: 'modern',
		menubar: false,
		autosave_ask_before_unload: false,
		plugins: [
		"advlist autolink link image lists charmap print preview hr anchor pagebreak",
		"searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
		"table contextmenu directionality emoticons template textcolor paste textcolor colorpicker textpattern codesample"
		],
		toolbar1: "newdocument | forecolor backcolor cut copy paste bullist numlist bold italic underline strikethrough| alignleft aligncenter alignright alignjustify | styleselect formatselect fontselect fontsizeselect  | searchreplace  | outdent indent | undo redo | link unlink anchor code | insertdatetime preview | table | hr removeformat | subscript superscript | charmap emoticons | print fullscreen | codesample",
		image_advtab: true,
		content_css: [
		'//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
		'//www.tinymce.com/css/codepen.min.css'
		],
		setup: function (ed) {
			ed.on('init', function (e) {
				ed.execCommand("fontName", false, "Tahoma");
			});
		},
		relative_urls: false,
		remove_script_host : false,
		file_browser_callback : function(field_name, url, type, win) {
			var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
			var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

			var cmsURL = route_prefix + '?field_name=' + field_name;
			if (type == 'image') {
				cmsURL = cmsURL + "&type=Images";
			} else {
				cmsURL = cmsURL + "&type=Files";
			}

			tinyMCE.activeEditor.windowManager.open({
				file : cmsURL,
				title : 'Image manager',
				width : x * 0.9,
				height : y * 0.9,
				resizable : "yes",
				close_previous : "no"
			});
		}
	});

	$('#post-create').on('keyup keypress', function(e) {
		var keyCode = e.keyCode || e.which;
		if (keyCode === 13) { 
			e.preventDefault();
			return false;
		}
	});
</script>

@endsection