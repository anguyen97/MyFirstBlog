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
			<i class="fa fa-address-card"><i class="text-uppercase"> &nbsp;User Management</i></i>
			
			{{-- <small>advanced tables</small> --}}
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="glyphicon glyphicon-home"></i> Home</a></li>
			<li><a href="#">User</a></li>
			<li class="active">List</li>
		</ol>
	</section>

	<!-- Main content  -->
	<section class="content">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title"><b><i>All of User</i></b></h3>
				<a type="button" class="btn btn-success fa fa-user-plus" style="float: right;" data-toggle="modal" data-target="#modalAdd"></span></a>
			</div>
			<!-- /.box-header -->

			
			<!-- Modal Add-->
			<div id="modalAdd" class="modal fade" role="dialog">
				<div class="modal-dialog">

					<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Add New User</h4>
						</div>
						<div class="modal-body">
							<form role="form" id="formAdduser" name="formAdduser">

								{{ csrf_field() }}

								<div class="form-group">
									<label for="">Name</label>
									<input type="text" class="form-control" id="name" placeholder="" name="name">
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

			{{-- table of user --}}
			<div class="box-body">
				<table id="tbluser" class="table table-bordered table-striped table-responsive">
					<thead>
						<tr>
							<th>ID</th>
							<th>Name</th>
							<th>Email</th>
							<th>Phone</th>
							<th>Is admin</th>
							<th>Created_at</th>							
							<th>Action</th>
						</tr>
					</thead>
					<tbody></tbody>
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
					<h4 class="modal-title">Information of user: <span id="showC-name"></span></h4>
				</div>
				<div class="modal-body">
					<table class="table table-hover">
						<tr>
							<th>ID</th>
							<td id="showC-id"></td>
						</tr>
						<tr>
							<th>user</th>
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
					<h4 class="modal-title">Edit user: <span id="edit-name"></span></h4>
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
	// $('#tbluser').DataTable();
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN' : $('meta[name="csrf_token"]').attr('content')
		}
	});

	$(function() {
		$('#tbluser').DataTable({
			processing: true,
			serverSide: true,
			ajax: '{!! route('admin.users.list.datatable') !!}',
			columns: [
				{ data: 'id', name: 'id' },
				{ data: 'name', name: 'name' },
				{ data: 'email', name: 'email' },
				{ data: 'phone', name: 'phone' },
				{ data: 'is_admin', name: 'is_admin' },
				{ data: 'created_at', name: 'created_at' },
				{ data: 'action', name: 'action', orderable: false, searchable: false}
			]
		});

		//show an user
		$('.btnShow').on('click', function (event) {
			alert('jdvhsd');
			$('#modalShow').modal('show');

			var id = $(this).data('user-id');
			// alert(id);
			$.ajax({
				url: '{{ asset('') }}admin/users/'+id,
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
	});

	

	//add new user
	$('#formAdduser').on('submit', function(event) {
		//khong tao cua so moi
		event.preventDefault();

		// DAU PHAY, reponse: gia tri controller tra ve
		$.ajax({
			type: 'post',
			url: '{{ route('admin.users.store') }}',
			data: {
				name: $("#name").val(),
				description: $("#description").val(),
			},

			success: function (response) {
				// alert(response.message);
				$('#modalAdd').modal('hide');

				toastr["success"]("Add new user successfully!");

				$('#tbluser').prepend('<tr><td width="5%">'+response.id+'</td><td>'+response.name+'</td><td>'+response.level+'</td><td>'+response.parent_id+'</td><td>'+response.created_at+'</td><td width="20%"><a title="Detail" class="btn btn-info btn-sm glyphicon glyphicon-eye-open btnShow" data-user-id="'+response.id+'"></a>&nbsp;&nbsp;<a title="Update" class="btn btn-warning btn-sm glyphicon glyphicon-edit btnEdit" data-user-id="'+response.id+'"></a>&nbsp;&nbsp;<a title="Delete" class="btn btn-danger btn-sm glyphicon glyphicon-trash btnDelete" data-user-id="'+response.id+'"></a><td></tr>');

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

	//show an user
	$('.btnShow').on('click', function (event) {
		$('#modalShow').modal('show');

		var id = $(this).data('user-id');
		// alert(id);
		$.ajax({
			url: '{{ asset('') }}admin/users/'+id,
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

		var id = $(this).data('user-id');
		
		var parent = $(this).parent();

		e.preventDefault();

		swal({			
			title: "Are you sure?",
			text: "Once deleted, you will not be able to recover this user!",
			icon: "warning",
			buttons: true,
			dangerMode: true,
		})
		.then((willDelete) => {

			if (willDelete) {

				$.ajax({

					type: "delete",
					url: '{{ asset('') }}admin/users/delete/'+id,

					success: function(res)
					{
						toastr.success('The user has been deleted!');
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
				swal("The user is safety!");
			}
		});
	});

	// show info to update
	$('.btnEdit').on('click', function (event) {
		$('#modalEdit').modal('show');

		var id = $(this).data('user-id');
		// alert(id);
		$.ajax({
			url: '{{ asset('') }}admin/users/'+id,
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

	//update user
	$('#formEdit').on('submit', function(event) {
		//khong tao cua so moi
		event.preventDefault();

		var id = $('#formEdit #id').val();

		var level = $("#parent_id option:selected").attr("data-level"); //

		var row = document.getElementById('row-'+id); //row: user update

		// DAU PHAY, reponse: gia tri controller tra ve
		$.ajax({
			type: 'put',
			url: '{{ asset('') }}admin/users/update/'+id,
			data: {
				name: $("#editC-name").val(),
				description: $("#editC-description").val(),
				parent_id: $("#formEdit #parent_id").val(),
				level: level,
			},

			success: function (response) {
				// alert(response.message);
				$('#modalEdit').modal('hide');

				row.remove();

				toastr["success"]("Update user successfully!");

				$('#tbluser').prepend('<tr><td width="5%">'+response.id+'</td><td>'+response.name+'</td><td>'+response.level+'</td><td>'+response.parent_id+'</td><td>'+response.created_at+'</td><td width="20%"><a title="Detail" class="btn btn-info btn-sm glyphicon glyphicon-eye-open btnShow" data-user-id="'+response.id+'"></a>&nbsp;&nbsp;<a title="Update" class="btn btn-warning btn-sm glyphicon glyphicon-edit btnEdit" data-user-id="'+response.id+'"></a>&nbsp;&nbsp;<a title="Delete" class="btn btn-danger btn-sm glyphicon glyphicon-trash btnDelete" data-user-id="'+response.id+'"></a><td></tr>');

				

			},
			error: function (xhr, status, errorThrown){
				// toastr.error(thrownError);
			}
		})
	});
	
</script>


@endsection