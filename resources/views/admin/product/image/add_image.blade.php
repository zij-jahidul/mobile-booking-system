@php
    error_reporting(0);
@endphp

@extends('layouts.admin_layout.admin_layout')

@section('admin_css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ url('plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ url('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
@endsection

{{--  Slider Status start --}}
@section('sidebar_status_Catalogue_open')
menu-open
@endsection
@section('sidebar_status_Catalogues')
active
@endsection
@section('sidebar_status_Product')
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
            <h1 class="m-0 text-dark">Catalogues</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ url('admin/product') }}">Product</a></li>
              <li class="breadcrumb-item active">Add Product Imagae</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
      @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
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
      @if (Session::has('error_message'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Success!</strong> {{ Session::get('error_message') }}.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
      </div>
    @endif
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <form name="addImageForm" id="addImageForm" method="POST" action="{{ url('admin/add-images-post/'.$products->id) }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="product_id" value="{{ $products->id }}">
              <!-- SELECT2 EXAMPLE -->
              <div class="card card-default">
                <div class="card-header">
                  <h3 class="card-title">Image</h3>


                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <div class="row">

                    <div class="col-12 col-sm-6">
                        <div class="form-group">
                            <label for="product_name">Product Name: {{ $products->product_name }}</label>
                          </div>
                          <div class="form-group">
                            <label for="product_code">Product Code: {{ $products->product_code }}</label>
                          </div>
                          <div class="form-group">
                            <label for="product_color">Product Color: {{ $products->product_color }}</label>
                        </div>

                    </div>

                    <div class="col-12 col-sm-6">
                        <div class="form-group">
                            <label for="exampleInputFile">Main Image</label>
                        @if (!empty($products->product_main_image))
                          <div style="height:100px; margin-top:5px;">
                            <img style="width:80px;" src="{{ asset('images/product_images/small') }}/{{ $products->product_main_image }}" alt="">
                          </div>
                          @endif
                          </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <div class="form-group">
                            <div class="field_wrapper">
                                <div>
                                    {{-- <input id="size" name="size" type="text" placeholder="Size" value="" required/> --}}
                                    <div class="form-group">
                                        <label for="product_main_image">Product Images</label>
                                        <input type="file" class="form-control" id="image" name="image" placeholder="Enter Image">
                                      </div>
                                    {{-- <a href="javascript:void(0);" class="add_button" title="Add field">Add</a> --}}
                                </div>
                            </div>
                          </div>
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Add Images</button>
                </div>
              </form>
            <!-- /.card-body -->
          <!-- /.card -->

        </div><!-- /.container-fluid -->
      </section>

      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
                <form name="editImageForm" id="editImageForm" action="{{ url('admin/edit-images/'.$products->id) }}" method="POST">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                          <h3 class="card-title">Added Product Images</h3>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">

                          <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                              <th>Sl. No</th>
                              <th>Id</th>
                              <th>image</th>
                              <th>Status</th>
                              <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                                @foreach ($products->images as $image)
                                <input style="display: none;" type="text" name="image_id" value="{{ $image->id }}">
                                <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $image->id }}</td>
                                <td>
                                    <img style="width: 100px;" src="{{ asset('images/product_images/multiple/'.$image->image) }}" alt="">
                                </td>


                                <td>
                                    {{-- @if ($image->status == 1)
                                     <a class="updateImageStatus" id="image-{{ $image->id }}" image_id="{{ $image->id }}" href="javascript:void(0)">Active</a>
                                    @else
                                    <a class="updateImageStatus" id="image-{{ $image->id }}" image_id="{{ $image->id }}" href="javascript:void(0)">Inactive</a>
                                    @endif --}}
                                    @if ($image->status == 1)
                                     <a  href="{{ url('admin/update-image-status') }}/{{ $image->id }}">Active</a>
                                    @else
                                    <a href="{{ url('admin/update-image-status') }}/{{ $image->id }}">Inactive</a>
                                    @endif
                                </td>
                                <td>
                                    <a title="Delete" class="confirmDelete" record='image' recordid="{{ $image->id }}" href="javascript:void(0)" ><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>

                          </table>
                        </div>
                        <div class="card-footer">
                          <button type="submit" class="btn btn-primary">Update Images</button>
                      </div>
                        <!-- /.card-body -->
                      </div>
                    </form>

                  ---

              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>

  </div>
  <!-- /.content-wrapper -->
  @endsection

  @section('admin_script')
  <script src="{{ url('plugins/select2/js/select2.full.min.js') }}"></script>
  <script src="{{ url('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ url('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ url('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ url('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
{{-- sweetalert2 --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <script>
    $(function () {
        $('.select2').select2()

    });
  </script>
  <script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
      });

    });
  </script>
  @endsection
