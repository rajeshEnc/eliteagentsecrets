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
                <li class="breadcrumb-item active">Edit Level</li>
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
            <div class="col-md-6">
                @if (Session::get('fail'))
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    {{ Session::get('fail') }}
                </div>
                @endif
              <!-- jquery validation -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Edit Level</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('admin.levels.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="lid" value="{{ $level->id }}">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control" id="title" value="{{ $level->title }}">
                            <span class="text-danger">@error('title'){{ $message }}@enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="heading">Heading</label>
                            <input type="text" name="heading" class="form-control" id="heading" value="{{ $level->heading }}">
                            <span class="text-danger">@error('heading'){{ $message }}@enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="heading_color">Heading Color (use HEX Code only i.e. #d91919)</label>
                            <input type="text" name="heading_color" class="form-control" id="heading_color" value="{{ $level->heading_color }}">
                            <span class="text-danger">@error('heading_color'){{ $message }}@enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="referrals">Total Referrals</label>
                            <input type="number" name="referrals" class="form-control" id="referrals" value="{{ $level->referrals }}">
                            <span class="text-danger">@error('referrals'){{ $message }}@enderror</span>
                        </div>
                        <div class="form-group">
                          <label for="referrals">Level Icon</label>
                          <input type="file" name="icon" class="form-control" accept="image/png, image/jpeg">
                        </div>
                        <div class="form-group">
                          <input type="hidden" name="oldfilename" value="{{ $level->icon }}">
                          @if ($level->icon)
                            <img src="{{ asset('uploads/').'/'.$level->icon }}" style="width:66px;">
                          @endif
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">UPDATE</button>
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
