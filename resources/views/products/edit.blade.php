@extends('layouts.master')

@section('content')
<section id="basic-horizontal-layouts">
    <div class="row match-height">
        <div class="col-md-6 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Product</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form action="{{ route('products.update', $product) }}" method="POST" class="form form-horizontal">
                            @csrf
                            @method('PUT')
                            <div class="form-body">
                                <div class="row">
                                    <!-- Nama Produk -->
                                    <div class="col-md-4">
                                        <label for="nama-produk">Nama Produk</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input type="text" id="nama-produk" class="form-control" name="nama_produk" value="{{ $product->nama_produk }}" required>
                                    </div>
                                    
                                    <!-- Tipe -->
                                    <div class="col-md-4">
                                        <label for="tipe">Tipe</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <select id="tipe" class="form-control" name="tipe" required>
                                            <option value="Online" {{ $product->tipe == 'Online' ? 'selected' : '' }}>Online</option>
                                            <option value="Offline" {{ $product->tipe == 'Offline' ? 'selected' : '' }}>Offline</option>
                                        </select>
                                    </div>
                                    
                                    <!-- Level -->
                                    <div class="col-md-4">
                                        <label for="level">Level</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <select id="level" class="form-control" name="level" required>
                                            <option value="Scratch Jr" {{ $product->level == 'Scratch Jr' ? 'selected' : '' }}>Scratch Jr</option>
                                            <option value="Scratch" {{ $product->level == 'Scratch' ? 'selected' : '' }}>Scratch</option>
                                            <option value="AI" {{ $product->level == 'AI' ? 'selected' : '' }}>AI</option>
                                            <option value="MIT" {{ $product->level == 'MIT' ? 'selected' : '' }}>MIT</option>
                                            <option value="Arduino" {{ $product->level == 'Arduino' ? 'selected' : '' }}>Arduino</option>
                                            <option value="Python" {{ $product->level == 'Python' ? 'selected' : '' }}>Python</option>
                                            <option value="Web" {{ $product->level == 'Web' ? 'selected' : '' }}>Web</option>
                                        </select>
                                    </div>
                                    
                                    <!-- Harga -->
                                    <div class="col-md-4">
                                        <label for="harga">Harga</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input type="number" id="harga" class="form-control" name="harga" value="{{ $product->harga }}" required>
                                    </div>
                                    
                                    <!-- Submit Buttons -->
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Update</button>
                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
