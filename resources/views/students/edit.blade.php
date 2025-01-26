@extends('layouts.master')

@section('content')
<div class="page-heading">
    <h3>Edit Student</h3>
</div>

<div class="page-content">
    <section class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>Form Edit Student</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('students.update', $student->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Input Nama Student -->
                        <div class="form-group mb-3">
                            <label for="nama" class="form-label">Nama Student</label>
                            <input 
                                type="text" 
                                name="nama" 
                                id="nama" 
                                class="form-control" 
                                value="{{ old('nama', $student->nama) }}" 
                                placeholder="Masukkan Nama" 
                                required>
                            @error('nama')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Select Status -->
                        <div class="form-group mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select 
                                name="status" 
                                id="status" 
                                class="form-select" 
                                required>
                                <option value="Active" {{ $student->status == 'Active' ? 'selected' : '' }}>Aktif</option>
                                <option value="Reactive" {{ $student->status == 'Reactive' ? 'selected' : '' }}>Reactive</option>
                                <option value="Stop" {{ $student->status == 'Stop' ? 'selected' : '' }}>Stop</option>
                                <option value="Cuti" {{ $student->status == 'Cuti' ? 'selected' : '' }}>Cuti</option>
                            </select>
                            @error('status')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Select Produk -->
                        <div class="form-group mb-3">
                            <label for="product_id" class="form-label">Produk</label>
                            <select 
                                id="product_id" 
                                class="form-select" 
                                name="product_id" 
                                required>
                                <option value="" disabled>Pilih Produk</option>
        @foreach ($products as $product)
            <option value="{{ $product->id }}" 
                {{ $student->products->pluck('id')->contains($product->id) ? 'selected' : '' }}>
                {{ $product->nama_produk }}
            </option>
        @endforeach
                            </select>
                            @error('product_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Tombol Aksi -->
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save"></i> Simpan Perubahan
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
