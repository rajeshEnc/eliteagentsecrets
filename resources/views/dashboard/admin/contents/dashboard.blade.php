@extends('dashboard.admin.layouts.master')
@section('title', 'Contents | Dashboard')

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
                <li class="breadcrumb-item active">Dashboard Content</li>
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
                  <h3 class="card-title">Dashboard Content</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('admin.contents.dashboard.save') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Page Title</label>
                            <input type="text" name="title" class="form-control" id="title" value="{{ $content[0]->page_title }}">
                            <span class="text-danger">@error('title'){{ $message }}@enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="info_title">Title</label>
                            <input type="text" name="info_title" class="form-control" id="info_title" value="{{ $content[0]->info_heading }}">
                            <span class="text-danger">@error('info_title'){{ $message }}@enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="info_text">Text</label>
                            <textarea name="info_text" rows="4" class="form-control" id="info_text">{{ $content[0]->info_tex }}</textarea>
                            <span class="text-danger">@error('info_text'){{ $message }}@enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="info_atext">Alert Text</label>
                            <input type="text" name="info_atext" class="form-control" id="info_atext" value="{{ $content[0]->info_alert }}">
                            <span class="text-danger">@error('info_atext'){{ $message }}@enderror</span>
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
