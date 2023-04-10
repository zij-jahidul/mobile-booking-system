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
@section('sidebar_status_Blog')
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
            <h1 class="m-0 text-dark">blog</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Admin Blog</li>
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
                      <h3 class="card-title">blog</h3>
                      <a href="{{ url('admin/add-blog') }}" style="max-width: 150px; float:right; display: inline-block" class="btn btn-success btn-block">Add Blog</a>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">

                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>Sl. No</th>
                          <th>Id</th>
                          <th>Name</th>
                          <th>Description</th>
                          <th>URL</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($blogs as $blog)
                            {{-- parent blog ase naki nai  --}}
                            {{-- @if (!isset($blog->category->category_name))
                                @php
                                    $parent_category = 'Root';
                                @endphp
                            @else
                                @php
                                    $parent_category = $blog->category->category_name;
                                @endphp
                            @endif --}}
                            {{-- end parent blog ase naki nai  --}}

                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $blog->id }}</td>
                                <td>
                                    {{ $blog->blog_title }}
                                </td>
                                <td>
                                    <a href="{{ url('admin/edit-blog') }}/{{ $blog->id }}">
                                    view
                                    </a>

                                    {{-- <a href="{{ url('admin/description-edit-blog') }}/{{ $blog->id }}">{{ html_entity_decode($blog->blog_description) }}</a> --}}
                                </td>
                                <td><a href="{{ url('admin/url-edit-blog') }}/{{ $blog->id }}">{{ \Illuminate\Support\Str::limit($blog->blog_url, 5) }}</a> </td>
                                <td>
                                    @if ($blog->status == 1)
                                     <a class="updateBlogStatus" id="blog-{{ $blog->id }}" blog_id="{{ $blog->id }}" href="javascript:void(0)">Active</a>
                                    @else
                                    <a class="updateBlogStatus" id="blog-{{ $blog->id }}" blog_id="{{ $blog->id }}" href="javascript:void(0)">Inactive</a>
                                    @endif
                                </td>
                                <td>

                                    <a href="{{ url('admin/edit-blog') }}/{{ $blog->id }}">edit</a>
                                    &nbsp;&nbsp;
                                    <a href="{{ url('admin/meta-edit-blog') }}/{{ $blog->id }}">SEO</a>
                                    &nbsp;&nbsp;
                                <a class="confirmDelete" record='blog' recordid="{{ $blog->id }}" href="javascript:void(0)">Delete</a>
                                {{-- <a class="confirmDelete" href="{{ url('admin/delete-blog/'.$blog->id) }}">Delete</a> --}}
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
