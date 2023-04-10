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
@section('sidebar_status_Banner')
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
            <h1 class="m-0 text-dark">banner</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Admin Banner</li>
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
                      <h3 class="card-title">banner</h3>
                      <a href="{{ url('admin/add-banner') }}" style="max-width: 150px; float:right; display: inline-block" class="btn btn-success btn-block">Add Banner</a>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">

                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>Sl. No</th>
                          <th>Id</th>
                          <th>Name</th>
                          <th>Background Image</th>
                          <th>Front Image</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($banners as $banner)
                            {{-- parent banner ase naki nai  --}}
                            {{-- @if (!isset($banner->category->category_name))
                                @php
                                    $parent_category = 'Root';
                                @endphp
                            @else
                                @php
                                    $parent_category = $banner->category->category_name;
                                @endphp
                            @endif --}}
                            {{-- end parent banner ase naki nai  --}}

                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $banner->id }}</td>
                                <td>
                                    {{ $banner->banner_title }}
                                </td>
                                <td>
                                    @if (!empty($banner->banner_main_image))
                                    <img style="height: 100px;" src="{{ asset('images/banner_images') }}/{{ $banner->banner_main_image }}" alt="">
                                    @endif
                                </td>

                                <td>
                                  @if (!empty($banner->banner_image))
                                  <img style="height: 100px;" src="{{ asset('images/banner_short_image') }}/{{ $banner->banner_image }}" alt="">
                                  @endif
                              </td>

                                <td>
                                    @if ($banner->status == 1)
                                     <a class="updateBannerStatus" id="banner-{{ $banner->id }}" banner_id="{{ $banner->id }}" href="javascript:void(0)">Active</a>
                                    @else
                                    <a class="updateBannerStatus" id="banner-{{ $banner->id }}" banner_id="{{ $banner->id }}" href="javascript:void(0)">Inactive</a>
                                    @endif
                                </td>
                                <td>

                                    <a href="{{ url('admin/edit-banner') }}/{{ $banner->id }}">edit</a>
                                    &nbsp;&nbsp;
                                <a class="confirmDelete" record='banner' recordid="{{ $banner->id }}" href="javascript:void(0)">Delete</a>
                                {{-- <a class="confirmDelete" href="{{ url('admin/delete-banner/'.$banner->id) }}">Delete</a> --}}
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
