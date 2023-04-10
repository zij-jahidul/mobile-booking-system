@extends('layouts.admin_layout.admin_layout')

@section('admin_css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
@endsection

{{--  Slider Status start --}}
@section('sidebar_status_Dashboard')
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
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row justify-content-center">
          <!-- ./col -->
          <div class="col-lg-6 col-12">
            <!-- small box -->
            <div class="small-box bg-warning p-5">
              <div class="inner">
                <h2>User Registrations</h2>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="{{ url('admin/new/user') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          {{-- <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>65</h3>

                <p>Unique Visitors</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div> --}}
          <!-- ./col -->
        </div>
        <!-- /.row -->

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">


                @if(session()->has('success_message'))
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session()->get('success_message') }}  
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                @endif


                <div class="card">

                    <div class="card-header">
                      <div class="card-header">
                        <h3 class="card-title">Booking List</h3>
                        <a href="{{ url('admin/show-booking') }}" style="max-width: 200px; float:right; display: inline-block" class="btn btn-success btn-block">Show Completed Booking</a>
                      </div>
                    </div>

                  


                    <!-- /.card-header -->
                    <div class="card-body">

                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>Sl. No</th>
                          <th>Name</th>
                          <th>Phone</th>
                          <th>Problems</th>
                          <th>Photos</th>
                          <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                          @foreach ($bookings as $booking)
                           <tr>
                             <td>1</td>
                             <td>{{ $booking->name }}</td>
                             <td>{{ $booking->phone }}</td>
                             <td>{{ $booking->problems }}</td>
                             <td>
                              <img src="{{ asset('uploads/booking_photos') }}/{{ $booking->image }}" alt="" width="60">
                             </td>

                             <td>
                              <div class="btn-group" role="group" aria-label="Basic example">
                                <a href = "{{ url('admin/booking/complete')}}/{{ $booking->id }}" type="button" class="btn btn-success">Complete</a>
                              </div>


                             </td>
                           </tr>
                              
                          @endforeach

                        {{-- @foreach ($orders as $order)
                        
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $order['id'] }}</td>
                            <td>{{ $order['user']['name'] }}</td>

                            <td>{{ $order['total'] }}</td>
                            <td>
                                @if ($order['payment_option']==1)
                                    Cash on Delivary
                                @else
                                    Card
                                @endif
                            </td>
                            <td>
                                @if ($order['payment_status']==1)
                                    <span class="badge badge-danger">Unpaid</span>
                                @else
                                    <span class="badge badge-success">Paid</span>
                                @endif
                            </td>
                            <td>
                                @if ($order['order_status']==1)
                                    <span class="badge badge-success">Accept</span>
                                @elseif($order['order_status']==2)
                                    <span class="badge badge-danger">cancel</span>
                                @endif

                            </td>
                            <td>
                                <a href="{{ url('admin/new/order/detail/'.$order['id']) }}" class="btn btn-danger">Detail</a>
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    @if ($order['payment_status']==1)
                                    <a href="{{ url('admin/new/order/paid/'.$order['id']) }}" class="btn btn-warning">paid</a>
                                    @endif
                                    @if ($order['order_status']==0)
                                    <a href="{{ url('admin/new/order/accept/'.$order['id']) }}" class="btn btn-success">Accept</a>
                                    <a href="{{ url('admin/new/order/cancel/'.$order['id']) }}" class="btn btn-danger">cancel</a>
                                    @endif
                                  </div>
                            </td>

                        </tr>
                        @endforeach --}}
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

{{-- Chart js --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
      });

    });
  </script>
@endsection
