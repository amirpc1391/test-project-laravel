@extends("panel.master")
@section("header")
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create Product</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Home</a></li>
                        <li class="breadcrumb-item active">Create Product</li>
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
                        <h3 class="card-title">Create a Product</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('products.store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Product Name</label>
                                <input name="name" type="text" class="form-control" id="name" placeholder="Enter product name" required>
                            </div>

                            <div class="form-group">
                                <label for="slug">Product Slug</label>
                                <input name="slug" type="text" class="form-control" id="slug" placeholder="Enter product slug" required>
                            </div>

                            <div class="form-group">
                                <label for="number">Product Quantity</label>
                                <input name="number" type="number" class="form-control" id="number" placeholder="Enter product quantity" required>
                            </div>

                            <div class="form-group">
                                <label for="category_id">Category</label>
                                <select name="category_id" id="category_id" class="form-control" required>
                                    <option value="">Select a category</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Create Product</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
@endsection
