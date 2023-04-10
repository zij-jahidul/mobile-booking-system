@extends('layouts.front_layout.front_layout')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- /.content -->
    <section class="content">
        <div class="container">
          <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Order List</h3>

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
                        </tr>
                        </thead>
                        <tbody>

                          @foreach ($bookings as $booking)
                           <tr>
                             <td>{{ $loop->index + 1 }}</td>
                             <td>{{ $booking->name }}</td>
                             <td>{{ $booking->phone }}</td>
                             <td>{{ $booking->problems }}</td>
                             <td>
                              <img src="{{ asset('uploads/booking_photos') }}/{{ $booking->image }}" alt="" width="60">
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
