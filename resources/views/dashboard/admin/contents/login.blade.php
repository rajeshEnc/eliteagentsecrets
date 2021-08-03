@extends('dashboard.admin.layouts.master')
@section('title', 'Contents | Login')

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
                <li class="breadcrumb-item active">Login Content</li>
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
                  <h3 class="card-title">Login Content</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('admin.contents.login.save') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="text_one">Text One</label>
                            <input type="text" name="text_one" class="form-control" id="text_one" value="{{ $content->text_one }}">
                            <span class="text-danger">@error('text_one'){{ $message }}@enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="text_two">Text Two</label>
                            <input type="text_two" name="text_two" class="form-control" id="text_two" value="{{ $content->text_two }}">
                            <span class="text-danger">@error('text_two'){{ $message }}@enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="text_three">Text three</label>
                            <input type="text" name="text_three" class="form-control" id="text_three" value="{{ $content->text_three }}">
                            <span class="text-danger">@error('text_three'){{ $message }}@enderror</span>
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
