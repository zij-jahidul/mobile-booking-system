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
@section('sidebar_status_Contact')
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
            <h1 class="m-0 text-dark"></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ url('admin/new/order') }}">Message</a></li>
              <li class="breadcrumb-item active">Message Detail</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->

    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
              <!-- SELECT2 EXAMPLE -->
              <div class="card card-default">
                <div class="card-header">
                  <h3 class="card-title">Customer Message</h3>



                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <div class="row">

                    <div class="col-12 col-sm-6">
                        <div class="form-group">
                            <label for="product_name">User Name: {{ $contact->name }}</label>
                          </div>
                          <div class="form-group">
                            <label for="product_code">Email: {{ $contact->email }}</label>
                          </div>



                    </div>

                    <div class="col-12 col-sm-6">
                        <div class="form-group">
                            <label for="product_color">Subject: {{ $contact->subject }}</label>
                        </div>
                          <div class="form-group">
                            <label for="product_color">Send Time: {{ $contact->created_at }}</label>
                        </div>


                    </div>

                  </div>
                </div>
                <div class="card-footer">
                </div>


        </div><!-- /.container-fluid -->
    </section>



    <section class="content">
        <div class="container-fluid">
              <!-- SELECT2 EXAMPLE -->
              <div class="card card-default">
                <div class="card-header">
                  <h3 class="card-title">Message</h3>



                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <div class="row">

                    <div class="col-12 col-sm-6">

                        <p>{{ $contact->message }}</p>

                    </div>



                  </div>
                </div>
                <div class="card-footer">
                </div>


        </div><!-- /.container-fluid -->
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
