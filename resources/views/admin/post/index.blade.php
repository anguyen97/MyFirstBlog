@extends('admin.layouts.master')

@section('css.section')
<link rel="stylesheet" type="text/css" href="{{asset('admin_assets/bower_components/prism-gh-pages/themes/prism.css')}}">
<link rel="stylesheet" href="{{ asset('admin_assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin_assets/bower_components/bootstrap-fileinput-master/css/fileinput.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin_assets/bower_components/bootstrap-tagsinput-master/src/bootstrap-tagsinput.css') }}">
<style>
span{
	line-height: 2 !important;
}
img {
	display: block !important;
	max-width: 100%;
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
			<li class="active">List</li>
		</ol>
	</section>

	<!-- Main content  -->
	<section class="content">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title"><b><i>All of Posts</i></b></h3>
				<a type="button" class="btn btn-success fa fa-plus btnAdd" style="float: right;" data-toggle="modal" data-target="#modalAdd"> Add Post</span></a>
			</div>
			<!-- /.box-header -->

			{{-- table of post --}}
			<div class="box-body">
				<table class="table table-striped table-bordered table-hover" id="posts-table">
					<thead>
						<tr>
							<th class="stl-column color-column">Id</th>
							<th class="stl-column color-column">Thumbnail</th>
							<th class="stl-column color-column" style="width: 25%">Title</th>
							<th class="stl-column color-column">User add</th>
							<th class="stl-column color-column">Category</th>
							<th class="stl-column color-column">Created at</th>
							<th class="stl-column color-column">Status</th>
							<th class="stl-column color-column">Action</th>
						</tr>
					</thead>
					<tbody>
						
						@if (count($posts)>0) @foreach ($posts as $post)
						<tr>
							<td class="stl-column" id="post-row-{{$post->id}}">{{$post->id}}</td>
							<td><img src="http://blog.anhnt/storage/app/{!! $post->thumbnail !!}" class="center-block img-rounded img-thumbnail img-responsive"></td>
							<td id="post-title-{{$post->title}}">{{$post->title}}</td>
							{{-- <td class="stl-column">{{$post->user->name}}</td> --}}
							<td class="stl-column">{{$post->category_id}}</td>
							{{-- <td class="stl-column">{{$post->category->name}}</td> --}}
							<td class="stl-column">{{$post->user_id}}</td>
							<td class="stl-column">{{date('d-m-Y H:i:s', strtotime($post->created_at))}}</td>
							<td class="stl-column">
								@if ($post->status == 1)
								Posted
								@elseif ($post->status == 2)
								Updated
								@elseif ($post->status == 0)
								New
								@endif
							</td>
							<td class="stl-column">
								
								<a class="btn btn-info glyphicon glyphicon-eye-open showBtn" data-id="{{$post->id}}"></a>					
								
								{{-- @if (Request::is('admin/posts')) --}}
								<a href="" class="btn btn-success glyphicon glyphicon-edit" data-id="{{$post->id}}"></a>    
								{{-- @elseif (Request::is('admin/posts/draft'))   --}}
								{{-- <a class="btn btn-success draftBtn " data-id="{{$post->id}}">Đăng bài</a>  --}}
								{{-- @endif --}}
								{{-- {!! Form::submit($text, []) !!} --}}
								<a class="btn btn-danger deleteBtn glyphicon glyphicon-trash" data-id="{{$post->id}}" data-token="{{ csrf_token() }}"></a>
							</td>
						</tr>
						@endforeach 
						@else
						<h4>No post was created!</h4>
						@endif
					</tbody>
				</table>
			</div>
			<!-- /.box-body -->
		</div>
		<!-- /.box -->
	</section>
	<!--  /. main content  -->
</div>

{{-- modalShow --}}
<div class="modal fade" id="modalShow" style="width: 100%">
	<div class="modal-dialog" style="width: 100%">
		<div class="modal-content" style="width: 80%; margin-left: 10%">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Detail of Post: [<span class="showP-id"></span>] <span class="showP-title"></span></h4>
			</div>
			<div class="modal-body">

				<div class="showP-title"></div>
				<hr/>
				<div class="showP-description"></div>
				<br/>
				<div class="showP-content"></div>
				<hr/>

				<table class="table table-hover">
					<tr>
						<th>Author</th>
						<td class="showP-author"></td>
					</tr>
					<tr>
						<th>Danh mục</th>
						<td class="showP-category"></td>
					</tr>
					<tr>
						<th>Tag</th>
						<td class="showP-tag"></td>
					</tr>
					<tr>
						<th>Created at</th>
						<td class="showP-created-at"></td>
					</tr>
					<tr>
						<th>Updated at</th>
						<td class="showP-updated-at"></td>
					</tr>
				</table>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>


{{-- modalAdds --}}
<div class="modal fade" id="modalAdd">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Add Post</h4>
			</div>
			<div class="modal-body">
				<form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data" id="post-create">
					{{csrf_field()}}
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

					{{-- categories --}}
					<div class="form-group">
						<label for="">
							<i class="fa fa-list font-green" aria-hidden="true"> Category</i>
						</label>

						<select class="form-control" name="category_id">
							@if (count($categories)>0) @foreach ($categories as $category)
							<option value="{{$category->id}}">{{$category->name}}</option>
							@endforeach @endif
						</select>
					</div>

					{{-- featured image  --}}
					<div class="form-group">
						<label for="">
							<i class="fa fa-picture-o font-green" aria-hidden="true"> Thumbnail</i>
						</label>			
						<div class="fileinput fileinput-new" data-provides="fileinput">
							<div class="fileinput-new thumbnail" style="max-width: 250px;">
								<img id="previewimg" src="{{url('images/posts/post_thumbnail_default.jpg')}}" alt="No Image" class="img-responsive" /> 
							</div>
							<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 250px; max-height: 200px;"> </div>
							<div style="margin-top: 10px;">
								<span class="input-group-btn">
									<a id="lfm" data-input="thumbnail" data-preview="previewimg" class="btn btn-primary">
										<input type="file" name="thumbnail" id="thumbnail">
									</a>
								</span>
								@if ($errors->has('thumbnail'))
								<span class="errors">{{$errors->first('thumbnail')}}</span>
								@endif
							</div>
						</div>
					</div>

					{{-- Tags --}}
					<div class="form-group">
						<label for="">
							<i class="fa fa-tags font-green" aria-hidden="true"> Tags</i>
						</label>
						<div class="form-group">
							<select multiple name="tags[]" id="tags" data-role="tagsinput">
							</select>
							@if ($errors->has('tags'))
							<span class="errors">{{$errors->first('tags')}}</span>
							@endif
						</div>
					</div>
					<div class="form-group">
						<label for="">
							<i class="fa fa-tags font-green" aria-hidden="true">Action</i>
						</label>
						<br/>
						<button type="submit" id="add-post" class="btn btn-sm green btn-circle" style="width: 33%"> Save </button>                               
						<input type="reset" class="btn btn-sm btn-circle" style="width: 33%" value="Reset">
						<button type="button" class="btn btn-sm btn-circle" data-dismiss="modal" style="width: 33%">Close</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

@endsection

@if (!empty(session('msg')))
{!!session('msg')!!}
@endif

@section('js.section')
<script src="{{ asset('admin_assets/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin_assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>

<script src="{{ asset('admin_assets/bower_components/tinymce/js/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('admin_assets/bower_components/prism-gh-pages/prism.js') }}"></script>
<script src="{{ asset('admin_assets/bower_components/bootstrap-fileinput-master/js/fileinput.min.js') }}"></script>
<script src="{{ asset('admin_assets/bower_components/bootstrap-tagsinput-master/src/bootstrap-tagsinput.js') }}"></script>
<script src="{{ asset('admin_assets/bower_components/toastr/toastr.js') }}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
	$(function() {
		$('#posts-table').DataTable({
			"ordering": false
		});
	});

	tinymce.init({
		selector: '#content',
		height: 300,
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

	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

	$('.draftBtn').on('click', function(e){
		var post_id = $(this).data('id');

		e.preventDefault();
		swal({
			title: "Bạn có muốn đăng bài viết này không?",
			icon: "info",
			buttons: {
				cancel: 'Hủy',
				confirm: 'Đăng bài'
			}
		})
		.then((willDelete) => {
			if (willDelete) {
				

				$.ajax({
					type: "POST",
					
					//url: "route('admin.posts.draft.update')",
					data: {
						post_id : post_id,
					},
					success: function(res)
					{
						if(!res.error) {
							toastr.success('Bài viết đã được đăng!');

							setTimeout(function () {   
								window.location.reload();
							}, 1000)

						}
					},
					error: function (xhr, ajaxOptions, thrownError) {
						toastr.error(thrownError);

					}
				});
			} else {
				swal("Bạn đã hủy đăng bài viết!");
			}
		});
	});  

	$('.deleteBtn').on('click', function(e){

		e.preventDefault();

		var id = $(this).data('id');
		var parent = $(this).parent();
		var token = $(this).data('token');
		
		swal({
			dangerMode: true,
			title: "Are you sure?",
			icon: "warning",
			buttons: {
				cancel: 'Cancel',
				confirm: 'Delete'
			}
		})
		.then((willDelete) => {
				// alert($id);
				if (willDelete) {

					$.ajax({
						type: "delete",
						data: {_method: 'delete', _token :token, id: id},
						url: '{{ asset('admin/posts/delete') }}/'+id,
						success: function(res)
						{
							if(!res.error) {
								toastr.success('The Post was succefully delete!');

								// setTimeout(function () {   
								// 	window.location.reload();
								// }, 1000)
							}
							parent.slideUp(300, function () {
								parent.closest("tr").remove();
							});
						},
						error: function (xhr, ajaxOptions, thrownError) {
							// console.log(xhr.responseJSON.errors);
							toastr.error("Delete was failed");

						}
					});
				} else {
					swal("The post is safety!");
				}
			});
	});

	$('.showBtn').on('click', function(e) {
		$('#modalShow').modal('show');

		var id = $(this).data('id');
		// alert(id);
		$.ajax({
			url: '{{ asset('') }}admin/posts/'+id,
			type: 'GET',
			success: function(response) {
				$('.showP-id').text(response.id),
				$('.showP-title').text(response.title),
				$('.showP-description').text(response.description);
				$('.showP-content').text(response.content);
				$('.showP-author').text(response.description);
				$('.showP-category').text(response.category);
				$('.showP-tag').text(response.tag);
				$('.showP-updated-at').text(response.updated_at);
				$('.showP-created-at').text(response.created_at);
			},

			error: function() {
				// body...
			}
		})		
	});

	$('#post-create').on('submit',function (e) {
		e.preventDefault();
		// var url = $(this).attr('data-url');
		var thumbnail = $('#thumbnail').get(0).files[0];
		// var content= CKEDITOR.instances.editor_content.getData();
		var content = tinyMCE.activeEditor.getContent({format : 'raw'});
		var newPost = new FormData();
		newPost.append('title',$('#title').val());
		newPost.append('thumbnail',thumbnail);
		newPost.append('description',$('#description').val());
		newPost.append('content',content);
		// alert(dd(newPost));
		
		// newPost.append('slug',slug($('#title').val()));
	    //newPost.append('user_id',$('#user_id').val());
	    newPost.append('category_id',$('#category_id').val());
	    //newPost.append('tags',$('#tags').val());
	    $.ajax({
	    	type: 'post',
	    	url: '{{ asset('admin/posts/store') }}',
	    	data:newPost,
	    	dataType:'json',
	    	async:false,
	    	processData: false,
	    	contentType: false,
	    	success: function (response) {
	    		$('#modalAdd').modal('hide');
	    		toastr.success('Thành công!');
	    		console.log(response.thumbnail);
	    		$('#table-body').prepend('<tr id="post-row-'+response.id+'"><td>'+response.id+'</td><td><img style="width: 70px;" class="center-block img-rounded img-thumbnail img-responsive" src="http://blog.anhnt/storage/app/'+response.thumbnail+'" alt=""></td><td id="post-title-'+response.id+'">'+response.title+'</td><td>just now</td><td>public</td><td>'+response.category_id+'</td><td>'+response.user_id+'</td><td><button type="button" class="btn btn-xs btn-info" data-url="blog.anhnt/admin/post/'+response.id+'"><i class="fa fa-eye" aria-hidden="true"></i></button><button type="button" class="btn btn-xs btn-warning" data-url="blog.anhnt/posts/'+response.id+'"><i class="fa fa-pencil" aria-hidden="true"></i></button><button type="button" class="btn btn-xs btn-danger" data-id="'+response.id+'" data-url="blog.anhnt/posts/'+response.id+'"><i class="fa fa-trash" aria-hidden="true"></i></button></td></tr>');
	    	},
	    	error: function (xhr, ajaxOptions, thrownError) {
	    		// console.log(xhr);
	    		toastr.error(xhr.responseJSON.message);
	    	}
	    })
	});

	


</script>
@endsection