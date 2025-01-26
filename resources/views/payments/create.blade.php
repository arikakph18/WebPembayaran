@extends('layouts.master')

@section('content')
<div class="page-heading">
    <h3>Tambah Pembayaran Baru</h3>
</div>

<div class="page-content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Form Pembayaran</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('payment.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <!-- Nama Siswa -->
                            <div class="col-md-6 mb-3">
                                <label for="student_id" class="form-label">Nama Siswa</label>
                                <select name="student_id" id="student_id" class="form-control" required>
                                    <option value="" disabled selected>Pilih Nama Siswa</option>
                                    @foreach($students as $student)
                                    <option value="{{ $student->id }}">{{ $student->nama }}</option>
                                    @endforeach
                                </select>
                                @error('student_id')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Tanggal -->
                            <div class="col-md-6 mb-3">
                                <label for="tanggal" class="form-label">Tanggal Pembayaran</label>
                                <input type="date" name="tanggal" id="tanggal" class="form-control" required>
                                @error('tanggal')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Pengirim -->
                            <div class="col-md-6 mb-3">
                                <label for="pengirim" class="form-label">Nama Pengirim</label>
                                <input type="text" name="pengirim" id="pengirim" class="form-control" required>
                                @error('pengirim')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Jumlah Transfer -->
                            <div class="col-md-6 mb-3">
                                <label for="jumlah_transfer" class="form-label">Jumlah Transfer</label>
                                <input type="number" name="jumlah_transfer" id="jumlah_transfer" class="form-control" required>
                                @error('jumlah_transfer')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Bulan Bayar -->
                            <div class="col-md-6 mb-3">
                                <label for="bulan_bayar" class="form-label">Bulan Bayar</label>
                                <input type="text" name="bulan_bayar" id="bulan_bayar" class="form-control" required>
                                @error('bulan_bayar')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Selisih -->
                            <div class="col-md-6 mb-3">
                                <label for="selisih" class="form-label">Selisih</label>
                                <input type="number" name="selisih" id="selisih" class="form-control">
                                @error('selisih')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Harga -->
                            <div class="col-md-6 mb-3">
                                <label for="harga" class="form-label">Harga</label>
                                <input type="number" name="harga" id="harga" class="form-control" required>
                                @error('harga')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Catatan -->
                            <div class="col-md-12 mb-3">
                                <label for="catatan" class="form-label">Catatan</label>
                                <textarea name="catatan" id="catatan" class="form-control" rows="3"></textarea>
                                @error('catatan')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Tombol Submit -->
                            <div class="col-md-12 text-end">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-save"></i> Simpan
                                </button>
                                <a href="{{ route('payment.index') }}" class="btn btn-secondary">
                                    <i class="bi bi-arrow-left"></i> Kembali
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
