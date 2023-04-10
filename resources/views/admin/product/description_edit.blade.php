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
              <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ url('admin/product') }}">Product</a></li>
              <li class="breadcrumb-item active">Edit Product Description</li>
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
                    <form action="{{ url('admin/description-edit-product-post') }}" method="POST">
                        <input type="hidden" name="product_id" value="{{ $product_info->id }}">
                        @csrf
                        {{-- @method('PATCH') --}}
                      <div class="card card-default card-primary">
                        <div class="card-header">
                          <h3 class="card-title">Edit {{ $product_info->product_name }} Description</h3>

                          <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                          </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                          <div class="row">

                            <div class="col-12 col-sm-12">
                                <div class="form-group">
                                    <label for="product_short_description">Category Short Description</label>
                                    <textarea name="product_short_description" id="product_short_description" class="form-control" rows="3">
                                        @php
                                        echo html_entity_decode($product_info->product_short_description);
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
            .create( document.querySelector( '#product_short_description' ) )
            .then( editor => {
                    console.log( editor );
            } )
            .catch( error => {
                    console.error( error );
            } );
</script>
<script>
    ClassicEditor
            .create( document.querySelector( '#product_long_description' ) )
            .then( editor => {
                    console.log( editor );
            } )
            .catch( error => {
                    console.error( error );
            } );
</script>


@endsection
