@extends('layouts.admin_layout.admin_layout')

{{--  Slider Status start --}}
@section('sidebar_status_Settings_open')
menu-open
@endsection
@section('sidebar_status_Settings')
active
@endsection
@section('sidebar_status_Details')
active
@endsection
{{--  Slider Status end --}}

@section('content')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Update Admin Details</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Admin Settings</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <!-- left column -->
            <div class="col-md-6">
              <!-- general form elements -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Update Admin Details</h3>
                </div>
                <!-- /.card-header -->
                @if (Session::has('error_message'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> {{ Session::get('error_message') }}.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                @if (Session::has('success_message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> {{ Session::get('success_message') }}.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <!-- form start -->
                <form role="form" action="{{ url('admin/update-admin-details') }}" method="POST" name="updateAdminDetails" id="updateAdminDetails" enctype="multipart/form-data">
                    @csrf
                  <div class="card-body">
                    {{-- <div class="form-group">
                      <label for="exampleInputEmail1">Admin Name</label>
                      <input type="text" class="form-control" value="{{ $user->name }}" placeholder="Enter Admin name" id="admin_name" name="admin_name">
                    </div> --}}
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email address</label>
                      <input class="form-control" value="{{ $user->email }}" readonly>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Admin type</label>
                      <input class="form-control" value="{{ $user->type }}" readonly>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Admin Name</label>
                      <input type="text" class="form-control" name="admin_name" id="admin_name" placeholder="Enter Admin Name" value="{{ $user->name }}">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Admin mobile</label>
                      <input type="text" class="form-control" name="admin_mobile" id="admin_mobile" placeholder="Enter Admin mobile" value="{{ $user->mobile }}" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Image</label>
                      <input type="file" class="form-control" name="admin_image" id="admin_image">
                    </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @endsection

  @section('admin_script')

  @endsection
