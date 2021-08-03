@extends('dashboard.admin.layouts.master')
@section('title', 'Contents | Register')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Contents</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                <li class="breadcrumb-item active">Register Content</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
    </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                @if (Session::get('success'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    {{ Session::get('success') }}
                </div>
                @endif
              <!-- jquery validation -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Register Content</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('admin.contents.register.save') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="text_one">Text One</label>
                            <input type="text" name="text_one" class="form-control" id="text_one" value="{{ $content->text_one }}">
                            <span class="text-danger">@error('text_one'){{ $message }}@enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="text_two">Text Two</label>
                            <input type="text" name="text_two" class="form-control" id="text_two" value="{{ $content->text_two }}">
                            <span class="text-danger">@error('text_two'){{ $message }}@enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="text_three">Text Three</label>
                            <input type="text" name="text_three" class="form-control" id="text_three" value="{{ $content->text_three }}">
                            <span class="text-danger">@error('text_three'){{ $message }}@enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="text_four">Text Four</label>
                            <input type="text" name="text_four" class="form-control" id="text_four" value="{{ $content->text_four }}">
                            <span class="text-danger">@error('text_four'){{ $message }}@enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="heading">Heading</label>
                            <input type="text" name="heading" class="form-control" id="heading" value="{{ $content->heading }}">
                            <span class="text-danger">@error('heading'){{ $message }}@enderror</span>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
              </div>
              <!-- /.card -->
              </div>
            <!--/.col (left) -->
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <a href="{{ route('admin.contents.register.add') }}" class="btn btn-dark" style="float:right;">Add Text</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Sl No.</th>
                            <th>Title</th>
                            <th>Text</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($texts as $text)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $text->title }}</td>
                                <td>{{ $text->text }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('admin.contents.register.edit', $text->id) }}" class="text-primary"><i class="fas fa-edit"></i></a>
                                        <a href="{{ route('admin.contents.register.delete', $text->id) }}" class="text-danger"><i class="fas fa-trash-alt"></i></a>
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
