@extends('dashboard.admin.layouts.master')
@section('title', 'Admin | Contents | Refer')

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
                <li class="breadcrumb-item active">Refer Content</li>
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
                  <h3 class="card-title">Refer Content</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('admin.contents.refer.save') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="top_text">Top Text</label>
                            <textarea name="top_text" class="form-control" id="top_text">{{ $content->top_text }}</textarea>
                            <span class="text-danger">@error('top_text'){{ $message }}@enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="center_text">Center Text</label>
                            <textarea name="center_text" class="form-control" id="center_text">{{ $content->center_text }}</textarea>
                            <span class="text-danger">@error('center_text'){{ $message }}@enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="bottom_text">Bottom Text</label>
                            <textarea name="bottom_text" class="form-control" id="bottom_text">{{ $content->bottom_text }}</textarea>
                            <span class="text-danger">@error('bottom_text'){{ $message }}@enderror</span>
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
@endsection

@push('scripts')
    <script src="//cdn.ckeditor.com/4.16.1/full/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('top_text', {
            filebrowserUploadUrl: "{{ route('admin.contents.faqs.upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });
        CKEDITOR.replace('center_text', {
            filebrowserUploadUrl: "{{ route('admin.contents.faqs.upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });
        CKEDITOR.replace('bottom_text', {
            filebrowserUploadUrl: "{{ route('admin.contents.faqs.upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });
    </script>
@endpush