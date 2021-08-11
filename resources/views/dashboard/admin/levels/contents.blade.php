@extends('dashboard.admin.layouts.master')
@section('title', 'Admin | Levels')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Levels</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.levels') }}">Levels</a></li>
                <li class="breadcrumb-item active">{{ $level_details->title }}</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
                @if (Session::get('success'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    {{ Session::get('success') }}
                </div>
                @endif
              <div class="card">
                <div class="card-header">
                  <a href="{{ route('admin.level.add', $level_details->id) }}" class="btn btn-dark" style="float:right;">Add Level Content</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Sl No.</th>
                            <th>Title</th>
                            <th>Sub Title</th>
                            <th>Video Link</th>
                            <th>Content</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($level_contents as $content)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $content->title }}</td>
                                <td>{{ $content->subtitle }}</td>
                                <td>{{ $content->video_link }}</td>
                                <td>{!! $content->content !!}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('admin.level.edit', [$level_details->id, $content->id]) }}" class="text-primary"><i class="fas fa-edit"></i></a>
                                        <a href="{{ route('admin.level.delete', [$level_details->id, $content->id]) }}" class="text-danger"><i class="fas fa-trash-alt"></i></a>
                                    </div>
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
