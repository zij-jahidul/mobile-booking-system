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
            <h1 class="m-0 text-dark">Brand</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Admin Brand</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Brand</h3>
                      <a href="{{ url('admin/add-brand') }}" style="max-width: 150px; float:right; display: inline-block" class="btn btn-success btn-block">Add Brand</a>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">

                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>Sl. No</th>
                          <th>Id</th>
                          <th>Name</th>
                          <th>URL</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                            @foreach ($brands as $brand)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $brand->id }}</td>
                            <td>{{ $brand->name }}</td>
                            <td><a href="{{ url('admin/url-edit-brand') }}/{{ $brand->id }}">{{ \Illuminate\Support\Str::limit($brand->brand_url, 5) }}</a> </td>
                            <td>
                                @if ($brand->status == 1)
                                 <a class="updateBrandStatus" id="brand-{{ $brand->id }}" brand_id="{{ $brand->id }}" href="javascript:void(0)">Active</a>
                                @else
                                <a class="updateBrandStatus" id="brand-{{ $brand->id }}" brand_id="{{ $brand->id }}" href="javascript:void(0)">Inactive</a>
                                @endif
                            </td>
                            <td>
                                <a href="{{ url('admin/edit-brand') }}/{{ $brand->id }}">edit</a>
                                &nbsp;&nbsp;
                                <a href="{{ url('admin/meta-edit-brand') }}/{{ $brand->id }}">SEO</a>
                                    &nbsp;&nbsp;
                            <a class="confirmDelete" record='brand' recordid="{{ $brand->id }}" href="javascript:void(0)">Delete</a>
                            {{-- <a class="confirmDelete" href="{{ url('admin/delete-category/'.$category->id) }}">Delete</a> --}}
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                      </table>
                    </div>
                    <!-- /.card-body -->
                  </div>

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
