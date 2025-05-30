@extends("panel.master")
@section("header")
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit users</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Home</a></li>
                    <li class="breadcrumb-item active">create user</li>
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
          <h3 class="card-title">Create a User</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('users.store') }}" method="POST">
          @csrf
          <div class="card-body">
            <div class="form-group">
              <label for="name">Full Name</label>
              <input name="name" type="text" class="form-control" id="name" placeholder="Enter full name" required>
            </div>

            <div class="form-group">
              <label for="email">Email address</label>
              <input name="email" type="email" class="form-control" id="email" placeholder="Enter email" required>
            </div>

            <div class="form-group">
              <label for="password">Password</label>
              <input name="password" type="password" class="form-control" id="password" placeholder="Password" required>
            </div>
          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Create User</button>
          </div>
        </form>
      </div>
      <!-- /.card -->
    </div>
  </div>
</div>
@endsection

