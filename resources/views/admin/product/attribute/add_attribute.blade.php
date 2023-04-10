{{-- @php
    error_reporting(0);
@endphp --}}

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
              <li class="breadcrumb-item active">Add Product Attribute</li>
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
            <form name="addAttributeForm" id="addAttributeForm" method="POST" action="{{ url('admin/add-attributes-post/'.$products->id) }}">
                @csrf
                <input type="hidden" name="product_id" value="{{ $products->id }}">
              <!-- SELECT2 EXAMPLE -->
              <div class="card card-default">
                <div class="card-header">
                  <h3 class="card-title">Attribute</h3>



                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <div class="row">

                    <div class="col-12 col-sm-6">
                        <div class="form-group">
                            <label for="product_name">Product Name: {{ $products->product_name }}</label>
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
                    <div class="col-12 col-sm-12">
                        <div class="form-group">
                            <div class="field_wrapper">
                                <div>
                                    <input id="size" name="size" type="text" placeholder="name" value="" required/>
                                    <input id="price" name="price" type="text" placeholder="details" value="" required/>
                                    {{-- <a href="javascript:void(0);" class="add_button" title="Add field">Add</a> --}}
                                </div>



                            </div>
                          </div>
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Add Attributes</button>
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
                <form name="editAttributeForm" id="editAttributeForm" action="{{ url('admin/edit-attributes/'.$products->id) }}" method="POST">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                          <h3 class="card-title">Added Product Attributes</h3>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">

                          <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                              <th>Sl. No</th>
                              <th>Id</th>

                              <th>Name</th>
                              <th>Details</th>
                              <th>Status</th>
                              <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                                @foreach ($products->attributes as $attribute)
                                <input style="display: none;" type="text" name="attrId[]" value="{{ $attribute->id }}">
                                <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $attribute->id }}</td>
                                <td>
                                    <input type="text" name="size[]" value="{{ $attribute->size }}" required>
                                </td>

                                <td>
                                    <input type="text" name="price[]" value="{{ $attribute->price }}" required>
                                </td>
                                <td>
                                    {{-- @if ($attribute->status == 1)
                                     <a class="updateAttributeStatus" id="attribute-{{ $attribute->id }}" attribute_id="{{ $attribute->id }}" href="javascript:void(0)">Active</a>
                                    @else
                                    <a class="updateAttributeStatus" id="attribute-{{ $attribute->id }}" attribute_id="{{ $attribute->id }}" href="javascript:void(0)">Inactive</a>
                                    @endif --}}
                                    @if ($attribute->status == 1)
                                     <a  href="{{ url('admin/update-attribute-status') }}/{{ $attribute->id }}">Active</a>
                                    @else
                                    <a href="{{ url('admin/update-attribute-status') }}/{{ $attribute->id }}">Inactive</a>
                                    @endif
                                </td>
                                <td>
                                    <a title="Delete" class="confirmDelete" record='attribute' recordid="{{ $attribute->id }}" href="javascript:void(0)" ></a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>

                          </table>
                        </div>
                        <div class="card-footer">
                          <button type="submit" class="btn btn-primary">Update Attributes</button>
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
