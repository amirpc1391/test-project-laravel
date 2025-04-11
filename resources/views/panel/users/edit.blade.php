@extends("panel.master")

@section("header")
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Edit User</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Home</a></li>
          <li class="breadcrumb-item active">Edit User</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
@endsection

@section("content")
<div class="row">
  <div class="col-12">
    <div class="col-md-6" style="margin:auto;">
      <!-- general form elements -->
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Edit User</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('users.update', $user->id) }}" method="POST">
          @csrf
          @method('PUT')

          <div class="card-body">
            <div class="form-group">
              <label for="name">Full Name</label>
              <input name="name" type="text" class="form-control" id="name" value="{{ $user->name }}" required>
            </div>

            <div class="form-group">
              <label for="email">Email address</label>
              <input name="email" type="email" class="form-control" id="email" value="{{ $user->email }}" required>
            </div>

            <div class="form-group">
              <label for="password">Password</label>
              <input name="password" type="password" class="form-control" id="password" placeholder="New password">
            </div>
          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Update User</button>
          </div>
        </form>
      </div>
      <!-- /.card -->
    </div>
  </div>
</div>
@endsection
