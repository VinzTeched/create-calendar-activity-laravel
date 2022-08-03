@extends('layouts.app')


@section('headSection')

  <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">

@endsection

@section('main-content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>User Show Page</h1>
          </div>
		 
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active">Users</li>
            </ol>
          </div>
        </div>
		 @include('inc.messages')
      </div><!-- /.container-fluid -->
    </section>


    <!-- Main content -->
    <section class="content">
            <div class="col-lg-12 p-2">
                <form id="logout-form" action="{{ route('activity.find') }}">
                    @csrf
                    <input type="date" name="start" placeholder="Start Date" required/>
                    <input type="date" name="end" placeholder="Start Date" required/>
                    <button class="btn btn-success" type="submit">
                    <i class="fas fa-search"></i>
                    </button>
                </form>
            </div>

           <div class="card">
            <div class="card-header">
              <h3 class="card-title">Table of Created Users</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-1">
              <table id="example1" class="table table-bordered  table-striped">
                <thead>
                <tr>
                  <th>S.No</th>
                  <th>Title</th>
                  <th>Description</th>
                  <th>User</th>
                  <th>Activity Date</th>
                  <th>Delete</th> 
                </tr>
                </thead>
                <tbody>
				@foreach($activities as $activity)
					<tr>
					  <td>{{ $loop->index + 1 }}</td>
					  <td>{{ $activity->title }}</td>
					  <td>{{ $activity->description }}</td>
					  <td>{{ $activity->name }}</td>
					  <td>{{ $activity->start}}</td>
					  <form id="delete-form-{{ $activity->id }}" method="post" action="{{ route('user.destroy', $activity->id) }}" style="display: none">
						{{ csrf_field() }}
							{{ method_field('DELETE') }}
					  </form>
						<td><a href="" onclick="
												if(
													confirm('Are you sure, you want to delete this?')){
														event.preventDefault();
														document.getElementById('delete-form-{{ $activity->id }}').submit();
														}else{
															event.preventDefault();
															}">
															<i class="fa fa-trash"></i></a></td>
					</tr>
				@endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>S.No</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>User</th>
                    <th>Activity Date</th>
                    <th>Delete</th> 
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

@section('footerSection')
<!-- DataTables -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>
@endsection