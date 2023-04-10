@extends('layouts.admin_layout.admin_layout')

{{--  Slider Status start --}}
@section('sidebar_status_Catalogue_open')
menu-open
@endsection
@section('sidebar_status_Catalogues')
active
@endsection
@section('sidebar_status_Brand')
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
            <h1 class="m-0 text-dark">Add Brand</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ url('admin/brand') }}">Brand</a></li>
              <li class="breadcrumb-item active">Edit Brand</li>
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
                  <h3 class="card-title">Edit Brand</h3>
                </div>
                <!-- /.card-header -->

                {{-- error start  --}}
                {{-- @if (Session::has('error_message'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> {{ Session::get('error_message') }}.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif --}}
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
                    {{-- error end --}}
                <!-- form start -->
                <form action="{{ url('admin/edit-brand-post') }}" method="POST">
                    @csrf
                    <input type="hidden" name="brand_id" value="{{ $brand_info->id }}">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Brand Name</label>
                      <input type="text" class="form-control" value="{{ $brand_info->name }}" placeholder="Enter Brand name" name="name" required>
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
