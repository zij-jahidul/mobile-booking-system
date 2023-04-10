@extends('layouts.admin_layout.admin_layout')

{{--  Slider Status start --}}
@section('sidebar_status_Catalogue_open')
menu-open
@endsection
@section('sidebar_status_Catalogues')
active
@endsection
@section('sidebar_status_Social')
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
            <h1 class="m-0 text-dark">Add Social Link</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Add social</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            {{-- error start  --}}
                {{-- @if (Session::has('error_message'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> {{ Session::get('error_message') }}.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif --}}
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
                    {{-- error end  --}}
          <div class="row">
            <!-- left column -->
            <div class="col-12">
                {{-- {{ $tag_info }} --}}
                <section class="content">
                    <div class="container-fluid">
                      <!-- SELECT2 EXAMPLE -->
                    <form action="{{ url('admin/edit-social-post') }}" method="POST">
                        @csrf
                        <input type="hidden" name="social_id" value="{{ $social['id'] }}">
                      <div class="card card-default card-primary">
                        <div class="card-header">
                          <h3 class="card-title">Social Media Link</h3>


                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                          <div class="row">

                            <div class="col-12 col-sm-12">
                                <div class="form-group">
                                    <label for="meta_keywords">Facebook Link</label>
                                    <input type="text" class="form-control" id="facebook" name="facebook" placeholder="Enter facebook URL" value="{{ $social->facebook }}">
                                  </div>
                            </div>
                            <div class="col-12 col-sm-12">
                                <div class="form-group">
                                    <label for="meta_keywords">Twitter Link</label>
                                    <input type="text" class="form-control" id="twitter" name="twitter" placeholder="Enter twitter URL" value="{{ $social->twitter }}">
                                  </div>
                            </div>
                            <div class="col-12 col-sm-12">
                                <div class="form-group">
                                    <label for="meta_keywords">Youtube Link</label>
                                    <input type="text" class="form-control" id="youtube" name="youtube" placeholder="Enter youtube URL" value="{{ $social->youtube }}">
                                  </div>
                            </div>
                            <div class="col-12 col-sm-12">
                                <div class="form-group">
                                    <label for="meta_keywords">Instagram Link</label>
                                    <input type="text" class="form-control" id="instagram" name="instagram" placeholder="Enter instagram URL" value="{{ $social->instagram }}">
                                  </div>
                            </div>
                            <div class="col-12 col-sm-12">
                                <div class="form-group">
                                    <label for="meta_keywords">Google Link</label>
                                    <input type="text" class="form-control" id="google" name="google" placeholder="Enter google URL" value="{{ $social->google }}">
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
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @endsection

  @section('admin_script')

  @endsection
