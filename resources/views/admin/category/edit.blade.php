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
@section('sidebar_status_Categories')
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
            <h1 class="m-0 text-dark">category</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ url('admin/category') }}">Category</a></li>
              <li class="breadcrumb-item active">Edit Category</li>
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
                {{-- {{ $category_info }} --}}
                <section class="content">
                    <div class="container-fluid">
                      <!-- SELECT2 EXAMPLE -->
                    <form action="{{ url('admin/edit-category-post') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="category_id" value="{{ $category_info->id }}">
                      <div class="card card-default card-primary">
                        <div class="card-header">
                          <h3 class="card-title">Edit Category</h3>


                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                          <div class="row">
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label for="category_name">Category Name</label>
                                    <input type="text" class="form-control" id="category_name" name="category_name" placeholder="Enter Name" value="{{ $category_info->category_name }}">
                                  </div>
                            </div>
                            <!-- /.col -->

                            <!-- /.col -->
                            <div class="col-12 col-sm-6">
                                <div id="appendCategoriesLevel">
                                    <div class="form-group">
                                        <label>Select Category Level</label>
                                        <select name="parent_id" id="parent_id" class="form-control select2" style="width: 100%;">
                                            <option value="0">Main Category</option>
                                            @if (!empty($getCategories))
                                                @foreach ($getCategories as $category)
                                                    <option value="{{ $category['id'] }}">{{ $category['category_name'] }}</option>
                                                        @if (!empty($category['subcategories']))
                                                            @foreach ($category['subcategories'] as $subcategory)
                                                                <option value="{{ $subcategory['id'] }}">&nbsp;&raquo;&nbsp;
                                                                    {{ $subcategory['category_name'] }}
                                                                </option>
                                                            @endforeach
                                                        @endif
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- /.col -->


                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label for="category_image">Category Image</label>
                                    <input type="file" class="form-control" id="category_image" name="category_image" placeholder="Enter Image">
                                  </div>
                            </div>
                            @if (!empty($category_info->category_image))
                            <div class="col-12 col-sm-6">
                                <img style="height: 100px;" src="{{ asset('images/category_images') }}/{{ $category_info->category_image }}" alt="">
                                &nbsp;
                                {{-- <a href="{{ url('admin/delete-category-image') }}/{{ $category_info->id }}">Delete Image</a> --}}
                                <a class="confirmDelete" record='category-image' recordid="{{ $category_info->id }}" href="javascript:void(0)">Delete Image</a>
                            </div>
                            @endif
                            <!-- /.col -->

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
            .create( document.querySelector( '#category_description' ) )
            .then( editor => {
                    console.log( editor );
            } )
            .catch( error => {
                    console.error( error );
            } );
</script>

@endsection
