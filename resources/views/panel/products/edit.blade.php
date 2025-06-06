@extends("panel.master")

@section("header")
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Product</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Home</a></li>
                        <li class="breadcrumb-item active">Edit Product</li>
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
                        <h3 class="card-title">Edit Product</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('products.update', $product->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Product Name</label>
                                <input name="name" type="text" class="form-control" id="name" value="{{ old('name', $product->name) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="slug">Product Slug</label>
                                <input name="slug" type="text" class="form-control" id="slug" value="{{ old('slug', $product->slug) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="number">Product Quantity</label>
                                <input name="number" type="number" class="form-control" id="number" value="{{ old('number', $product->number) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="category_id">Category</label>
                                <select name="category_id" id="category_id" class="form-control" required>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- تگ‌ها -->
                            <div class="form-group">
                                <label for="tags">Tags</label><br>
                                @foreach($tags as $tag)
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="tags[]" value="{{ $tag->id }}"
                                               @if($product->tags->contains($tag->id)) checked @endif>
                                        <label class="form-check-label" for="tags">{{ $tag->name }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update Product</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
@endsection
