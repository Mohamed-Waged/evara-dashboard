@extends('admin.layouts.app')

@section('title')
    Products
@endsection


@section('content')
    <section class="content-main">
        <div class="content-header">
            <div>
                <h2 class="content-title card-title">Products List</h2>
                <p>Lorem ipsum dolor sit amet.</p>
            </div>
            <div>
                <a href="#" class="btn btn-light rounded font-md">Export</a>
                <a href="#" class="btn btn-light rounded font-md">Import</a>
                <a href="{{ route('products.create') }}" class="btn btn-primary rounded p-2">Create new</a>
            </div>
        </div>
        <div class="card mb-4">
            <header class="card-header">
                <div class="row align-items-center">
                    <div class="col col-check flex-grow-0">
                        <div class="form-check ms-2">
                            <input class="form-check-input" type="checkbox" value="">
                        </div>
                    </div>
                    <div class="col-md-3 col-12 me-auto mb-md-0 mb-3">
                        <select class="form-select">
                            <option selected>All category</option>
                            <option>Electronics</option>
                            <option>Clothes</option>
                            <option>Automobile</option>
                        </select>
                    </div>
                    <div class="col-md-2 col-6">
                        <input type="date" value="02.05.2022" class="form-control">
                    </div>
                    <div class="col-md-2 col-6">
                        <select class="form-select">
                            <option selected>Status</option>
                            <option>Active</option>
                            <option>Disabled</option>
                            <option>Show all</option>
                        </select>
                    </div>
                </div>
            </header> <!-- card-header end// -->
            <div class="card-body">

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Price</th>
                            <th scope="col">Image</th>
                            <th scope="col">Handle</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $product)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->desc }}</td>
                                <td>{{ $product->price }} $</td>
                                <td>
                                    <img class='rounded' style='width:100px' src="{{ Storage::url($product->image) }}" alt="">
                                </td>
                                <td>
                                    <a href="{{ route('products.edit', $product->id) }}"
                                        class="btn btn-sm btn-warning">Edit</a>
                                    <a href="#" data-bs-toggle="modal" data-url="{{ route('products.destroy', $product->id) }}" data-bs-target="#delleteProductModal"
                                        class="btn btn-sm btn-danger delteBtn">Delete</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">No Products Yet!</td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>





            </div> <!-- card-body end// -->
        </div> <!-- card end// -->
        <div class="pagination-area mt-30 mb-50">
            {{ $products->links() }}
        </div>
    </section>


    <!-- Modal -->
    <div class="modal fade" id="delleteProductModal" tabindex="-1" aria-labelledby="delleteProductModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="delleteProductModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="deleteProductForm" method="post">
                    @csrf
                    @method('delete')
                    <div class="modal-body">
                        Are You Sure !!!
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection



@section('js')
    <script>
        $(document).on('click', '.delteBtn', function(){
            $('#deleteProductForm').attr('action', $(this).data('url'));
        });
    </script>
@endsection