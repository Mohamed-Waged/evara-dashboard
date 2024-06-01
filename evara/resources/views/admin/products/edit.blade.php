@extends('admin.layouts.app')

@section('title')
    Edit Product
@endsection


@section('content')
    <section class="content-main">
        <div class="row">
            <div class="col-12">
                <div class="content-header">
                    <h2 class="content-title">Edit Product</h2>
                    <div>
                        <a href="{{ route('products.index') }}"
                            class="btn btn-light rounded font-sm mr-5 text-body hover-up">Back</a>

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <form action="{{ route('products.update', $product->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')

                            <div class="row">
                                <div class="col-md-3">
                                    <h6>1. General info</h6>
                                </div>
                                <div class="col-md-9">
                                    <div class="mb-4">
                                        <label class="form-label">Product title</label>
                                        <input type="text" name="name" value="{{ old('name') ?? $product->name }}"
                                            placeholder="Type here" class="form-control">
                                        @error('name')
                                            <div class="text-danger">*{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">Description</label>
                                        <textarea name="desc" placeholder="Type here" class="form-control" rows="4">{{ old('desc') ?? $product->desc }}</textarea>
                                        @error('desc')
                                            <div class="text-danger">*{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div> <!-- col.// -->
                            </div> <!-- row.// -->
                            <hr class="mb-4 mt-0">
                            <div class="row">
                                <div class="col-md-3">
                                    <h6>2. Pricing</h6>
                                </div>
                                <div class="col-md-9">
                                    <div class="mb-4">
                                        <label class="form-label">Cost in USD</label>
                                        <input type="number" name="price" value="{{ old('price') ?? $product->price }}" placeholder="$00.0"
                                            class="form-control">
                                        @error('price')
                                            <div class="text-danger">*{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div> <!-- col.// -->
                            </div> <!-- row.// -->
                            <hr class="mb-4 mt-0">
                            <div class="row">
                                <div class="col-md-3">
                                    <h6>3. Media</h6>
                                </div>
                                <div class="col-md-9">
                                    <div class="mb-4">
                                        <label class="form-label">Images</label>
                                        <input name="image" class="form-control" type="file">
                                        <img src="{{ Storage::url($product->image) }}" width="100" alt="">
                                        @error('image')
                                            <div class="text-danger">*{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div> <!-- col.// -->
                            </div> <!-- .row end// -->
                            <div class="text-end">
                                <button type="submit" class="btn btn-md rounded font-sm hover-up">Publich</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
