@extends('layouts.master')

@section('content')
<section id="basic-horizontal-layouts">
    <div class="row match-height">
        <div class="col-md-6 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Create Product</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form action="{{ route('products.store') }}" method="POST" class="form form-horizontal">
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <!-- Nama Produk -->
                                    <div class="col-md-4">
                                        <label for="nama-produk">Nama Produk</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <select id="nama-produk" class="form-control" name="nama_produk" required>
                                            <option value="Robotics">Robotics Class-Creativity</option>
                                            <option value="Robotics">Robotics Class-Construction</option>
                                            <option value="Robotics">Robotics Class-Robotics</option>
                                            <option value="Coding Class">Coding Class-Scratch Jr</option>
                                            <option value="Coding Class">Coding Class-Scratch</option>
                                            <option value="Coding Class">Coding Class-AI</option>
                                            <option value="Coding Class">Coding Class-MIT</option>
                                            <option value="Coding Class">Coding Class-Arduino</option>
                                            <option value="Coding Class">Coding Class-Python</option>
                                            <option value="Coding Class">Coding Class-Web</option>
                                        </select>
                                    </div>
                                    
                                    <!-- Tipe -->
                                    <div class="col-md-4">
                                        <label for="tipe">Tipe</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <select id="tipe" class="form-control" name="tipe" required>
                                            <option value="Online">Online</option>
                                            <option value="Offline">Offline</option>
                                        </select>
                                    </div>
                                    
                                    <!-- Level -->
                                    <div class="col-md-4">
                                        <label for="level">Level</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <select id="level" class="form-control" name="level" required>
                                            <option value="Scratch Jr">Scratch Jr</option>
                                            <option value="Scratch">Scratch</option>
                                            <option value="AI">AI</option>
                                            <option value="MIT">MIT</option>
                                            <option value="Arduino">Arduino</option>
                                            <option value="Python">Python</option>
                                            <option value="Web">Web</option>
                                        </select>
                                    </div>
                                    
                                    <!-- Harga -->
                                    <div class="col-md-4">
                                        <label for="harga">Harga</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input type="number" id="harga" class="form-control" name="harga" placeholder="Harga" required>
                                    </div>
                                    
                                    <!-- Submit Buttons -->
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Create</button>
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
