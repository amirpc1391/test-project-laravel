@extends("panel.master")

@section("header")
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>ایجاد دسته‌بندی جدید</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">خانه</a></li>
                        <li class="breadcrumb-item active">ایجاد دسته‌بندی</li>
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
                        <h3 class="card-title">ایجاد دسته‌بندی جدید</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('categories.store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">نام دسته‌بندی</label>
                                <input name="name" type="text" class="form-control" id="name" placeholder="نام دسته‌بندی را وارد کنید" value="{{ old('name') }}" required>
                                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group">
                                <label for="slug">اسلاگ</label>
                                <input name="slug" type="text" class="form-control" id="slug" placeholder="اسلاگ را وارد کنید" value="{{ old('slug') }}" required>
                                @error('slug') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">ایجاد دسته‌بندی</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
@endsection
