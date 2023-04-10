
@extends('layouts.admin_layout.admin_layout')

@section('admin_css')
<!-- DataTables -->
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
            <h1 class="m-0 text-dark">product</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Admin Product</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
      @if (Session::has('success_message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> {{ Session::get('success_message') }}.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
      @endif
    </div>
    <!-- /.content-header -->
    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">product</h3>
                      <a href="{{ url('admin/add-product') }}" style="max-width: 150px; float:right; display: inline-block" class="btn btn-success btn-block">Add Product</a>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">

                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>Sl. No</th>

                          <th>Name</th>
                          <th>Parent Product</th>

                          <th>Description</th>

                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)


                            @if (!empty($product->product_quantity) && $product->product_quantity <= $product->alert_quantity)
                             <tr class="bg-danger">
                             @else
                                 <tr class="">
                            @endif
                            {{-- <tr class="bg-danger"> --}}
                                <td>{{ $loop->index + 1 }}</td>

                                <td>
                                    {{ $product->product_name }}
                                </td>
                                <td>{{ $product->category->category_name }}</td>

                                <td>
                                    <a href="{{ url('admin/description-edit-product') }}/{{ $product->id }}">
                                    view
                                    </a>

                                    {{-- <a href="{{ url('admin/description-edit-product') }}/{{ $product->id }}">{{ html_entity_decode($product->product_description) }}</a> --}}
                                </td>
                               <td>
                                    @if ($product->status == 1)
                                     <a class="updateProductStatus" id="product-{{ $product->id }}" product_id="{{ $product->id }}" href="javascript:void(0)">Active</a>
                                    @else
                                    <a class="updateProductStatus" id="product-{{ $product->id }}" product_id="{{ $product->id }}" href="javascript:void(0)">Inactive</a>
                                    @endif
                                </td>
                                <td>
                                    <a title="Add Attribute" href="{{ url('admin/add-attributes/'.$product->id) }}"><i class="fas fa-plus"></i></a>
                                    &nbsp;&nbsp;
                                    <a title="Add Details" href="{{ url('admin/add-details/'.$product->id) }}"><i class="fas fa-info-circle"></i></a>
                                    &nbsp;&nbsp;

                                    <a title="Edit" href="{{ url('admin/edit-product') }}/{{ $product->id }}"><i class="fas fa-edit"></i></a>

                                    &nbsp;&nbsp;
                                <a class="confirmDelete" record='product' recordid="{{ $product->id }}" href="javascript:void(0)"><i class="fas fa-trash"></i></a>
                                {{-- <a class="confirmDelete" href="{{ url('admin/delete-product/'.$product->id) }}">Delete</a> --}}
                                </td>
                            </tr>
                            @endforeach

                        </tbody>

                      </table>
                    </div>
                    <!-- /.card-body -->
                  </div>

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
<!-- DataTables -->
<script src="{{ url('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ url('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ url('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ url('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
{{-- sweetalert2 --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
      });

    });
  </script>



@endsection
