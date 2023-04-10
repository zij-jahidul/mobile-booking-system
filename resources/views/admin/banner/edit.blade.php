@extends('layouts.admin_layout.admin_layout')

@section('admin_css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<!-- Select2 -->
<link rel="stylesheet" href="{{ url('plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ url('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
<script src="https://cdn.ckeditor.com/ckeditor5/21.0.0/classic/ckeditor.js"></script>
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
              <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ url('admin/banner') }}">Banner</a></li>
              <li class="breadcrumb-item active">Edit Banner</li>
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
      @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    </div>
    <!-- /.content-header -->
    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">

                <section class="content">
                    <div class="container-fluid">
                      <!-- SELECT2 EXAMPLE -->
                    <form action="{{ url('admin/edit-banner-post') }}" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="banner_id" value="{{ $banner_info->id }}">
                        @csrf
                        {{-- @method('PATCH') --}}
                      <div class="card card-default card-primary">
                        <div class="card-header">
                          <h3 class="card-title">Edit Banner</h3>


                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                          <div class="row">
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label for="banner_title">Banner Name</label>
                                    <input type="text" class="form-control" id="banner_title" name="banner_title" placeholder="Enter Name" value="{{ $banner_info->banner_title }}">
                                  </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label for="banner_url">Banner URL</label>
                                    <input type="text" class="form-control" id="banner_url" name="banner_url" placeholder="Enter URL" value="{{ $banner_info->banner_url }}">
                                  </div>
                            </div>
                            <!-- /.col -->

                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label for="banner_main_image">Background Banner Image</label>
                                    <input type="file" class="form-control" id="banner_main_image" name="banner_main_image" placeholder="Enter Image">
                                    <span>Banner Size 1920x660</span>
                                </div>
                            </div>
                            @if (!empty($banner_info->banner_main_image))
                            <div class="col-12 col-sm-6">
                                <img style="height: 100px;" src="{{ asset('images/banner_images') }}/{{ $banner_info->banner_main_image }}" alt="">
                                &nbsp;
                                {{-- <a href="{{ url('admin/delete-category-image') }}/{{ $category_info->id }}">Delete Image</a> --}}
                                <a class="confirmDelete" record='banner-image' recordid="{{ $banner_info->id }}" href="javascript:void(0)">Delete Image</a>
                            </div>
                            @endif


                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label for="banner_image">Front Banner Image</label>
                                    <input type="file" class="form-control" id="banner_image" name="banner_image" placeholder="Enter Image">
                                    <span>Banner Size 300x168</span>
                                </div>
                            </div>
                            @if (!empty($banner_info->banner_image))
                            <div class="col-12 col-sm-6">
                                <img style="height: 100px;" src="{{ asset('images/banner_short_image') }}/{{ $banner_info->banner_image }}" alt="">
                                &nbsp;
                                {{-- <a href="{{ url('admin/delete-category-image') }}/{{ $category_info->id }}">Delete Image</a> --}}
                                <a class="confirmDelete" record='short-banner-image' recordid="{{ $banner_info->id }}" href="javascript:void(0)">Delete Image</a>
                            </div>
                            @endif
                            <!-- /.col -->

                            <div class="col-12 col-sm-12">
                                <div class="form-group">
                                    <label for="banner_long_description">Category Long Description</label>
                                    <textarea name="banner_long_description" id="banner_long_description" class="form-control" rows="3">
                                        @php
                                        echo html_entity_decode($banner_info->banner_long_description);
                                        @endphp
                                    </textarea>
                                  </div>
                            </div>

                          </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>
                    </form>
                      <!-- /.card -->
                    </div><!-- /.container-fluid -->
                  </section>

    

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
<!-- Select2 -->
<script src="{{ url('plugins/select2/js/select2.full.min.js') }}"></script>
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
  <script>
    $(function () {
      //Initialize Select2 Elements
      $('.select2').select2()
    })

  </script>
  <script>
    ClassicEditor
            .create( document.querySelector( '#banner_long_description' ) )
            .then( editor => {
                    console.log( editor );
            } )
            .catch( error => {
                    console.error( error );
            } );
</script>


@endsection
