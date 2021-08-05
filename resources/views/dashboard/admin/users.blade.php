@extends('dashboard.admin.layouts.master')
@section('title', 'Users')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Users</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                <li class="breadcrumb-item active">Users</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">

                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Sl No.</th>
                            <th>Email</th>
                            <th>Entered Code</th>
                            <th>Referral Code</th>
                            <th>Total Refer</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            @php
                                $count = App\Models\User::where('entered_code', $user->reffer_code)->count();
                            @endphp
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->entered_code }}</td>
                                <td>{{ $user->reffer_code }}</td>
                                <td>{{ $count }}</td>
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
      <!-- /.content -->
@endsection

@push('scripts')
<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>
@endpush