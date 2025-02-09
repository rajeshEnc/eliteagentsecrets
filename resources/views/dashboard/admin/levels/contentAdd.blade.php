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
            <!-- left column -->
            <div class="col-md-12">
                @if (Session::get('fail'))
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    {{ Session::get('fail') }}
                </div>
                @endif
              <!-- jquery validation -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Add Level Content</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('admin.level.save') }}" method="POST">
                    @csrf
                    <input type="hidden" name="level_id" value="{{ $level_details->id }}">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control" id="title" value="{{ old('title') }}">
                            <span class="text-danger">@error('title'){{ $message }}@enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="subtitle">Sub Title</label>
                            <input type="text" name="subtitle" class="form-control" id="subtitle" value="{{ old('subtitle') }}">
                            <span class="text-danger">@error('subtitle'){{ $message }}@enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="video_link">Video Link</label>
                            <input type="text" name="video_link" class="form-control" id="video_link" value="{{ old('video_link') }}">
                            <span class="text-danger">@error('video_link'){{ $message }}@enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea rows="5" name="content" class="form-control" id="content"></textarea>
                            <span class="text-danger">@error('content'){{ $message }}@enderror</span>
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
    CKEDITOR.replace('content', {
        filebrowserUploadUrl: "{{ route('admin.contents.faqs.upload', ['_token' => csrf_token()]) }}",
        filebrowserUploadMethod: 'form'
    });
</script>
@endpush
