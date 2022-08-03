@extends('admin.layouts.app')


@section('main-content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3>Edit Profile</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
              <li class="breadcrumb-item active">Edit Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
   <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
			 <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Profile</h3>
              </div>
			  @include('inc.messages')
              <!-- /.card-header -->
              <!-- form start -->
          <form role="form" action="{{ route('user-update.update', $id->id) }}" method="post" enctype="multipart/form-data">
    				  {{ csrf_field() }}
    				  {{ method_field('PATCH') }}
                <div class="col-lg-6">
                <div class="card-body">
                  
            <div class="form-group">
            <label for="image"> Profile Picture</label>
            <div class="input-group">
              <div class="custom-file">
                <input type="file" class="custom-file-input" name="image" id="image">
                <label class="custom-file-label" for="image">Choose Image</label>
              </div>
            </div>
          </div>

                  <div class="form-group">
                    <label for="name">User Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="User Name" value="@if(old('name')){{ old('name') }} @else{{ $id->name }} @endif">
                  </div>
				  
				  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" disabled="disabled" name="email" placeholder="Email" value="@if(old('email')){{ old('email') }} @else{{ $id->email }} @endif">
                  </div>
				  
				  <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" value="@if(old('phone')){{ old('phone') }} @else{{ $id->phone }} @endif">
          </div>

          <div class="form-group mt-2">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('user.index') }}" class="btn btn-warning">Back</a>
              </div>
            </form>
          </div>
            <!-- /.card -->
		      </div>
        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


@endsection
@section('footerSection')
<script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>

<script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>

<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<script>
  
  $(document).ready(function () {
    bsCustomFileInput.init();
  });

</script>

@endsection