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
			<i class="fa fa-address-card"><i class="text-uppercase"> &nbsp;Tags Management</i></i>
			
			{{-- <small>advanced tables</small> --}}
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="glyphicon glyphicon-home"></i> Home</a></li>
			<li><a href="#">Tag</a></li>
			<li class="active">List</li>
		</ol>
	</section>

	<!-- Main content  -->
	<section class="content">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title"><b><i>All of Tag</i></b></h3>
				<a type="button" class="btn btn-success fa fa-plus" style="float: right;" data-toggle="modal" data-target="#modalAdd"> Add Tag</span></a>
			</div>
			<!-- /.box-header -->

			
			<!-- Modal Add-->
			<div id="modalAdd" class="modal fade" role="dialog">
				<div class="modal-dialog">

					<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Add New Tag</h4>
						</div>
						<div class="modal-body">
							<form role="form" id="formAddtag" name="formAddtag">

								{{ csrf_field() }}

								<div class="form-group">
									<label for="">Name</label>
									<input type="text" class="form-control" id="name" placeholder="" name="name">
								</div>
								
								<button type="submit" class="btn btn-primary" name="submit">Add</button>
							</form>
						</div>
					</div>

				</div>
			</div>

			{{-- table of tag --}}
			<div class="box-body">
				<table id="tbltag" class="table table-bordered table-striped table-responsive">
					<thead>
						<tr>
							<th>ID</th>
							<th>Name</th>
							<th>Created_at</th>
							<th>Lastest updated</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>	
						@foreach ($tags as $tag)
						<tr id="row-{{$tag['id']}}">
							<td width="5%">{{ $tag['id'] }}</td>
							<td>{{ $tag['name'] }}</td>
							<td> {{ $tag['created_at'] }}</td>
							<td> {{ $tag['updated_at'] }}</td>
							<td width="20%">
								<a title="Detail" class="btn btn-info btn-sm glyphicon glyphicon-eye-open btnShow" data-tag-id={{$tag['id']}}></a>
								<a title="Update" class="btn btn-warning btn-sm glyphicon glyphicon-edit btnEdit" data-tag-id={{$tag['id']}}></a>
								<a title="Delete" class="btn btn-danger btn-sm glyphicon glyphicon-trash btnDelete" data-tag-id={{$tag['id']}}></a>
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
					<h4 class="modal-title">Information of tag: <span id="showT-name"></span></h4>
				</div>
				<div class="modal-body">
					<table class="table table-hover">
						<tr>
							<th>ID</th>
							<td id="showT-id"></td>
						</tr>
						<tr>
							<th>Name</th>
							<td id="showT-name-1"></td>
						</tr>
						<tr>
							<th>Created_at</th>
							<td id="showT-created-at"></td>
						</tr>
						<tr>
							<th>Lastest updated</th>
							<td id="showT-updated-at"></td>
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
					<h4 class="modal-title">Edit tag: <span id="edit-name"></span></h4>
				</div>
				<div class="modal-body">
					<div class="container-fluid">
						<form  class="form-horizontal" role="form" id="formEdit">
							@csrf
							{{ method_field('put')}}

							<input type="hidden" name="id" value="" id="id">
							<div class="form-group">
								<label for="">Name</label>
								<input type="text" class="form-control" id="editT-name" name="name">
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
	$('#tbltag').DataTable();

	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN' : $('meta[name="csrf_token"]').attr('content')
		}
	});

	//add new tag
	$('#formAddtag').on('submit', function(event) {
		//khong tao cua so moi
		event.preventDefault();

		// DAU PHAY, reponse: gia tri controller tra ve
		$.ajax({
			type: 'post',
			url: '{{ route('admin.tags.store') }}',
			data: {
				name: $("#name").val(),
			},

			success: function (response) {
				// alert(response.message);
				$('#modalAdd').modal('hide');

				toastr["success"]("Add new tag successfully!");

				$('#tbltag').prepend('<tr><td width="5%">'+response.id+'</td><td>'+response.name+'</td><td>'+response.created_atd+'</td><td>'+response.updated_at+'</td><td width="20%"><a title="Detail" class="btn btn-info btn-sm glyphicon glyphicon-eye-open btnShow" data-tag-id="'+response.id+'"></a>&nbsp;&nbsp;<a title="Update" class="btn btn-warning btn-sm glyphicon glyphicon-edit btnEdit" data-tag-id="'+response.id+'"></a>&nbsp;&nbsp;<a title="Delete" class="btn btn-danger btn-sm glyphicon glyphicon-trash btnDelete" data-tag-id="'+response.id+'"></a><td></tr>');

			},
			error: function (xhr, status, errorThrown){
				$errs = xhr.responseJSON.errors;
				console.log($errs);
				toastr['error'](errorThrown);
				toastr['error']($errs['name'][0]);
			}
		})
	});

	//show an tag
	$('.btnShow').on('click', function (event) {
		$('#modalShow').modal('show');

		var id = $(this).data('tag-id');
		// alert(id);
		$.ajax({
			url: '{{ asset('') }}admin/tags/'+id,
			type: 'GET',
			success: function(response) {
				$('#showT-id').text(response.id),
				$('#showT-name').text(response.name),
				$('#showT-name-1').text(response.name),
				$('#showT-updated-at').text(response.updated_at);
				$('#showT-created-at').text(response.created_at);
			},

			error: function() {
				// body...
			}
		})		
	})

	//delete 
	$('.btnDelete').on('click', function(e){

		var id = $(this).data('tag-id');
		
		var parent = $(this).parent();

		e.preventDefault();

		swal({			
			title: "Are you sure?",
			text: "Once deleted, you will not be able to recover this tag!",
			icon: "warning",
			buttons: true,
			dangerMode: true,
		})
		.then((willDelete) => {

			if (willDelete) {

				$.ajax({

					type: "delete",
					url: '{{ asset('') }}admin/tags/delete/'+id,

					success: function(res)
					{
						parent.slideUp(300, function () {
							parent.closest("tr").remove();
						});
						toastr.success('The tag has been deleted!');
					},

					error: function (xhr, ajaxOptions, thrownError) {
						console.log(xhr.responseJSON.errors);
						toastr.error(thrownError);
					}
				});

				

			} else {
				swal("The tag is safety!");
			}
		});
	});

	// show info to update
	$('.btnEdit').on('click', function (event) {
		$('#modalEdit').modal('show');

		var id = $(this).data('tag-id');
		// alert(id);
		$.ajax({
			url: '{{ asset('') }}admin/tags/'+id,
			type: 'GET',
			success: function(response) {
				$('#edit-name').text(response.name);
				$('#formEdit #id').attr('value', response.id);
				$('#editT-name').attr('value', response.name);
			},

			error: function() {
				// body...
			}
		})		
	})

	//update tag
	$('#formEdit').on('submit', function(event) {
		//khong tao cua so moi
		event.preventDefault();

		var id = $('#formEdit #id').val();

		var level = $("#parent_id option:selected").attr("data-level"); //

		var row = document.getElementById('row-'+id); //row: tag update

		// DAU PHAY, reponse: gia tri controller tra ve
		$.ajax({
			type: 'put',
			url: '{{ asset('') }}admin/tags/update/'+id,
			data: {
				name: $("#editT-name").val(),
			},

			success: function (response) {
				// alert(response.message);
				$('#modalEdit').modal('hide');
				
				row.remove();

				toastr["success"]("Update tag successfully!");

				$('#tbltag').prepend('<tr><td width="5%">'+response.id+'</td><td>'+response.name+'</td><td>'+response.created_at+'</td><td>'+response.updated_at+'</td><td width="20%"><a title="Detail" class="btn btn-info btn-sm glyphicon glyphicon-eye-open btnShow" data-tag-id="'+response.id+'"></a>&nbsp;&nbsp;<a title="Update" class="btn btn-warning btn-sm glyphicon glyphicon-edit btnEdit" data-tag-id="'+response.id+'"></a>&nbsp;&nbsp;<a title="Delete" class="btn btn-danger btn-sm glyphicon glyphicon-trash btnDelete" data-tag-id="'+response.id+'"></a><td></tr>');

				

			},
			error: function (xhr, status, errorThrown){
				// toastr.error(thrownError);
			}
		})
	});
	
</script>
@endsection