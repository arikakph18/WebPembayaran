@extends('layouts.master')

@section('content')
<!-- <a href="{{ route('products.create') }}">Create Product</a>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama Produk</th>
            <th>Tipe</th>
            <th>Level</th>
            <th>Harga</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->nama_produk }}</td>
            <td>{{ $product->tipe }}</td>
            <td>{{ $product->level }}</td>
            <td>{{ $product->harga }}</td>
            <td>
                <a href="{{ route('products.edit', $product) }}">Edit</a>
                <form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table> -->

<section class="section">
        <div class="row" id="basic-table">
            <div class="col-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Data Product</h4>
                        <a  class="btn btn-primary" href="{{ route('products.create') }}">Create Product</a> 
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <!-- Table with outer spacing -->
                            <div class="table-responsive">
                                <table class="table table-striped">
                                <thead>
                                    <tr>
                                    <th>ID</th>
                                       <th>Nama Produk</th>
                                       <th>Tipe</th>
                                       <th>Level</th>
                                       <th>Harga</th>
                                       <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <!-- Looping data dari database -->
                                        @foreach ($products as $product)
                                    <tr>
                                        <td  class="text-bold-500">{{ $product->id }}</td>
                                        <td class="text-bold-500">{{ $product->nama_produk }}</td>
                                        <td class="text-bold-500">{{ $product->tipe }}</td>
                                        <td class="text-bold-500">{{ $product->level }}</td>
                                        <td class="text-bold-500">{{ $product->harga }}</td>
                                        <td class="text-bold-500">
                <a href="{{ route('products.edit', $product) }}">Edit</a>
                <form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
               </tr>
                      </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Basic Tables end -->
@endsection
