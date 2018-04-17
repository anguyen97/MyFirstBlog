@extends('admin.layouts.master')

@section('css.section')
<link rel="stylesheet" href="{{ asset('admin_assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
<style>
#modalShow th{
	width: 25%;
}
</style>
@endsection



@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			<i class="fa fa-address-card"><i class="text-uppercase"> &nbsp;Category Management</i></i>
			
			{{-- <small>advanced tables</small> --}}
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="glyphicon glyphicon-home"></i> Home</a></li>
			<li><a href="#">Category</a></li>
			<li class="active">List</li>
		</ol>
	</section>

	<!-- Main content  -->
	<section class="content">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title"><b><i>All of Category</i></b></h3>
				<a type="button" class="btn btn-success fa fa-plus" style="float: right;" data-toggle="modal" data-target="#modalAdd"> Add Category</span></a>
			</div>
			<!-- /.box-header -->

			
			<!-- Modal Add-->
			<div id="modalAdd" class="modal fade" role="dialog">
				<div class="modal-dialog">

					<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Add New Category</h4>
						</div>
						<div class="modal-body">
							<form role="form" id="formAddCategory" name="formAddCategory">

								{{ csrf_field() }}

								<div class="form-group">
									<label for="">Name</label>
									<input type="text" class="form-control" id="name" placeholder="" name="name">
								</div>
								<div class="form-group">
									<label for="">Parent category</label>
									<select name="parent_id" id="parent_id" class="form-control" >
										<option value="0" data-level="0">Select Sub category</option>
										@foreach ($categories as $category)
										<option value="{{$category['id']}}" data-level={{$category['level']}}>{{$category['name']}}</option>
										@endforeach
										
									</select>
								</div>
								<div class="form-group">
									<label for="">Description</label>
									<input type="textarea" class="form-control" id="description" placeholder="" name="description" >
								</div>							

								<button type="submit" class="btn btn-primary" name="submit">Add</button>
							</form>
						</div>
					</div>

				</div>
			</div>

			{{-- table of category --}}
			<div class="box-body">
				<table id="tblCategory" class="table table-bordered table-striped table-responsive">
					<thead>
						<tr>
							<th>ID</th>
							<th>Name</th>
							<th>Level Cate</th>
							<th>Parent Cate</th>
							<th>Created_at</th>
							{{-- <th>Lastest updated</th> --}}
							<th>Action</th>
						</tr>
					</thead>
					<tbody>	
						@foreach ($categories as $category)
						<tr id="row-{{$category['id']}}">
							<td width="5%"><a class="btn-circle btn-default btn" href="{{ asset('admin/categories/') }}/{{ $category['id'] }}/posts">{{ $category['id'] }}</a></td>
							<td>{{ $category['name'] }}</td>
							<td>{{$category['level']}}</td>
							<td>{{$category['parent_id'] }}</td>
							<td> {{ $category['created_at'] }}</td>
							<td width="20%">
								<a title="Detail" class="btn btn-info btn-sm glyphicon glyphicon-eye-open btnShow" data-category-id={{$category['id']}}></a>
								<a title="Update" class="btn btn-warning btn-sm glyphicon glyphicon-edit btnEdit" data-category-id={{$category['id']}}></a>
								<a title="Delete" class="btn btn-danger btn-sm glyphicon glyphicon-trash btnDelete" data-category-id={{$category['id']}}></a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			<!-- /.box-body -->

		</div>
		<!-- /.box -->

	</section>
	<!--  /. main content  -->

	<!-- Modal Shows-->
	<div id="modalShow" class="modal fade" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Information of category: <span id="showC-name"></span></h4>
				</div>
				<div class="modal-body">
					<table class="table table-hover">
						<tr>
							<th>ID</th>
							<td id="showC-id"></td>
						</tr>
						<tr>
							<th>Category parent</th>
							<td id="showC-parent-id"></td>
						</tr>
						<tr>
							<th>Description</th>
							<td id="showC-description"></td>
						</tr>
						<tr>
							<th>Created_at</th>
							<td id="showC-created-at"></td>
						</tr>
						<tr>
							<th>Lastest updated</th>
							<td id="showC-updated-at"></td>
						</tr>
						
					</table>
				</div>

			</div>
		</div>
	</div>
	<!-- ./ModalShow -->

	<!-- Modal Edit-->
	<div id="modalEdit" class="modal fade" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Edit category: <span id="edit-name"></span></h4>
				</div>
				<div class="modal-body">
					<div class="container-fluid">
						<form  class="form-horizontal" role="form" id="formEdit">
							@csrf
							{{ method_field('put')}}

							<input type="hidden" name="id" value="" id="id">
							<div class="form-group">
								<label for="">Name</label>
								<input type="text" class="form-control" id="editC-name" name="name">
							</div>
							<div class="form-group">
								<label for="">Parent category</label>
								<select name="parent_id" id="parent_id" class="form-control" >
									<option value="" data-level="" id="editC-parent-old"></option>
									@foreach ($categories as $category)
									<option value="{{$category['id']}}" data-level={{$category['level']}}>{{$category['name']}}</option>
									@endforeach								
								</select>
							</div>
							<div class="form-group">
								<label for="">Description</label>
								<input type="text" class="form-control" id="editC-description" name="description" >
							</div>
							
							<button type="submit" class="btn btn-primary">Submit</button>

						</form>
					</div>					
				</div>
			</div>
		</div>
	</div>
	<!-- ./ModalEdit -->

</div>
@endsection

@section('js.section')
<script src="{{ asset('admin_assets/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin_assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
	$('#tblCategory').DataTable();

	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN' : $('meta[name="csrf_token"]').attr('content')
		}
	});

	//add new category
	$('#formAddCategory').on('submit', function(event) {
		//khong tao cua so moi
		event.preventDefault();

		var id = $("#parent_id option:selected").attr("data-level");

		// DAU PHAY, reponse: gia tri controller tra ve
		$.ajax({
			type: 'post',
			url: '{{ route('categories.store') }}',
			data: {
				name: $("#name").val(),
				description: $("#description").val(),
				parent_id: $("#parent_id").val(),
				level: id,
			},

			success: function (response) {
				// alert(response.message);
				$('#modalAdd').modal('hide');

				toastr["success"]("Add new Category successfully!");

				$('#tblCategory').prepend('<tr><td width="5%">'+response.id+'</td><td>'+response.name+'</td><td>'+response.level+'</td><td>'+response.parent_id+'</td><td>'+response.created_at+'</td><td width="20%"><a title="Detail" class="btn btn-info btn-sm glyphicon glyphicon-eye-open btnShow" data-category-id="'+response.id+'"></a>&nbsp;&nbsp;<a title="Update" class="btn btn-warning btn-sm glyphicon glyphicon-edit btnEdit" data-category-id="'+response.id+'"></a>&nbsp;&nbsp;<a title="Delete" class="btn btn-danger btn-sm glyphicon glyphicon-trash btnDelete" data-category-id="'+response.id+'"></a><td></tr>');

			},
			error: function (xhr, status, errorThrown){
				$errs = xhr.responseJSON.errors;
				console.log($errs);
				toastr['error'](errorThrown);
				toastr['error']($errs['name'][0]);
				toastr['error']($errs['description'][0]);
			}
		})
	});

	//show an category
	$('.btnShow').on('click', function (event) {
		$('#modalShow').modal('show');

		var id = $(this).data('category-id');
		// alert(id);
		$.ajax({
			url: '{{ asset('') }}admin/categories/'+id,
			type: 'GET',
			success: function(response) {
				$('#showC-id').text(response.id),
				$('#showC-name').text(response.name),
				$('#showC-description').text(response.description);
				$('#showC-updated-at').text(response.updated_at);
				$('#showC-created-at').text(response.created_at);
				$('#showC-parent-id').text(response.parent_id);
				$('#showC-level').text(response.level);
			},

			error: function() {
				// body...
			}
		})		
	})

	//delete 
	$('.btnDelete').on('click', function(e){

		var id = $(this).data('category-id');
		
		var parent = $(this).parent();

		e.preventDefault();

		swal({			
			title: "Are you sure?",
			text: "Once deleted, you will not be able to recover this category!",
			icon: "warning",
			buttons: true,
			dangerMode: true,
		})
		.then((willDelete) => {

			if (willDelete) {

				$.ajax({

					type: "delete",
					url: '{{ asset('') }}admin/categories/delete/'+id,

					success: function(res)
					{
						toastr.success('The category has been deleted!');
					},

					error: function (xhr, ajaxOptions, thrownError) {
						console.log(xhr.responseJSON.errors);
						toastr.error(thrownError);
					}
				});

				parent.slideUp(300, function () {
					parent.closest("tr").remove();
				});

			} else {
				swal("The category is safety!");
			}
		});
	});

	// show info to update
	$('.btnEdit').on('click', function (event) {
		$('#modalEdit').modal('show');

		var id = $(this).data('category-id');
		// alert(id);
		$.ajax({
			url: '{{ asset('') }}admin/categories/'+id,
			type: 'GET',
			success: function(response) {
				$('#edit-name').text(response.name);
				$('#formEdit #id').attr('value', response.id);
				$('#editC-name').attr('value', response.name);
				$('#editC-description').attr('value',response.description);
				$('#editC-parent-old').attr('value',response.parent_id);
				$('#editC-parent-old').attr('data-level',response.level);
				$('#editC-parent-old').text(response.parent_id);
				// $('#editC-level-old').val(response.level);
				// $("#parent_id option[value='"+response.id+"']").prop("selected", "selected");
			},

			error: function() {
				// body...
			}
		})		
	})

	//update category
	$('#formEdit').on('submit', function(event) {
		//khong tao cua so moi
		event.preventDefault();

		var id = $('#formEdit #id').val();

		var level = $("#formEdit #parent_id option:selected").attr("data-level"); //

		var row = document.getElementById('row-'+id); //row: category update

		// DAU PHAY, reponse: gia tri controller tra ve
		$.ajax({
			type: 'put',
			url: '{{ asset('') }}admin/categories/update/'+id,
			data: {
				name: $("#editC-name").val(),
				description: $("#editC-description").val(),
				parent_id: $("#formEdit #parent_id option:selected").val(),
				level: level,
			},

			success: function (response) {
				// alert(response.message);
				$('#modalEdit').modal('hide');
			
				row.remove();

				toastr["success"]("Update Category successfully!");

				$('#tblCategory').prepend('<tr><td width="5%">'+response.id+'</td><td>'+response.name+'</td><td>'+response.level+'</td><td>'+response.parent_id+'</td><td>'+response.created_at+'</td><td width="20%"><a title="Detail" class="btn btn-info btn-sm glyphicon glyphicon-eye-open btnShow" data-category-id="'+response.id+'"></a>&nbsp;&nbsp;<a title="Update" class="btn btn-warning btn-sm glyphicon glyphicon-edit btnEdit" data-category-id="'+response.id+'"></a>&nbsp;&nbsp;<a title="Delete" class="btn btn-danger btn-sm glyphicon glyphicon-trash btnDelete" data-category-id="'+response.id+'"></a><td></tr>');

				

			},
			error: function (xhr, status, errorThrown){
				// toastr.error(thrownError);
			}
		})
	});
	
</script>
@endsection