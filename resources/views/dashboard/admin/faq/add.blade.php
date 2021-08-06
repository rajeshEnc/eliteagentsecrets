@extends('dashboard.admin.layouts.master')
@section('title', 'Admin | FAQs')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>FAQs</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                <li class="breadcrumb-item active">Add FAQ</li>
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
                  <h3 class="card-title">Add FAQ</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('admin.contents.faqs.save') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="question">Question</label>
                            <input type="text" name="question" class="form-control" id="question" value="{{ old('question') }}">
                            <span class="text-danger">@error('question'){{ $message }}@enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="answer">Answer</label>
                            <textarea name="answer" class="form-control" id="answer">{{ old('answer') }}</textarea>
                            <span class="text-danger">@error('answer'){{ $message }}@enderror</span>
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
        CKEDITOR.replace('answer', {
            filebrowserUploadUrl: "{{ route('admin.contents.faqs.upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });
    </script>
@endpush
