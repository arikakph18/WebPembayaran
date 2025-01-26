@extends('layouts.master')

@section('content')
<div class="page-heading">
    <h3>Tambah Student</h3>
</div>

<div class="page-content">
    <section class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>Form Tambah Student</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('students.store') }}" method="POST">
                        @csrf

                        <!-- Input Nama Student -->
                        <div class="form-group mb-3">
                            <label for="nama" class="form-label">Nama Student</label>
                            <input 
                                type="text" 
                                name="nama" 
                                id="nama" 
                                class="form-control" 
                                placeholder="Masukkan Nama" 
                                required>
                        </div>

                        <!-- Select Status -->
                        <div class="form-group mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select 
                                name="status" 
                                id="status" 
                                class="form-select" 
                                required>
                                <option value="Active">Aktif</option>
                                <option value="Reactive">Reactive</option>
                                <option value="Stop">Stop</option>
                                <option value="Cuti">Cuti</option>
                            </select>
                        </div>

                        <!-- Select Produk -->
                        <div class="form-group mb-3">
                            <label for="products" class="form-label">Produk</label>

                            <select id="level" class="form-control" name="product_id" required>
                                <option value="">Pilih produk</option>
                            @foreach ($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->nama_produk }} - {{ $product->level }}</option>
                                @endforeach
                                        </select>
                            
                        </div>

                        <!-- Tombol Aksi -->
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save"></i> Simpan
                            </button>
                            <a href="{{ route('students.index') }}" class="btn btn-secondary">
                                <i class="bi bi-arrow-left"></i> Kembali
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
