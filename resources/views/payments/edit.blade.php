@extends('layouts.master')

@section('content')
<div class="page-heading">
    <h3>Edit Pembayaran</h3>
</div>

<div class="page-content">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Form Edit Pembayaran</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('payments.update', $payment->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-3">
                            <label for="student_id" class="form-label">Nama Siswa</label>
                            <select name="student_id" id="student_id" class="form-control" required>
                                <option value="" disabled>Pilih Siswa</option>
                                @foreach($students as $student)
                                    <option value="{{ $student->id }}" {{ $payment->student_id == $student->id ? 'selected' : '' }}>
                                        {{ $student->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label for="tanggal" class="form-label">Tanggal</label>
                            <input type="date" name="tanggal" id="tanggal" class="form-control" value="{{ $payment->tanggal }}" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="pengirim" class="form-label">Pengirim</label>
                            <input type="text" name="pengirim" id="pengirim" class="form-control" value="{{ $payment->pengirim }}" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="jumlah_transfer" class="form-label">Jumlah Transfer</label>
                            <input type="number" name="jumlah_transfer" id="jumlah_transfer" class="form-control" value="{{ $payment->jumlah_transfer }}" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="bulan_bayar" class="form-label">Bulan Bayar</label>
                            <input type="text" name="bulan_bayar" id="bulan_bayar" class="form-control" value="{{ $payment->bulan_bayar }}" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga</label>
                            <input type="number" name="harga" id="harga" class="form-control" value="{{ $payment->harga }}" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="selisih" class="form-label">Selisih</label>
                            <input type="number" name="selisih" id="selisih" class="form-control" value="{{ $payment->selisih }}">
                        </div>
                        
                        <div class="mb-3">
                            <label for="level" class="form-label">Level</label>
                            <input type="text" name="level" id="level" class="form-control" value="{{ $payment->level }}">
                        </div>
                        
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <input type="text" name="status" id="status" class="form-control" value="{{ $payment->status }}">
                        </div>
                        
                        <div class="mb-3">
                            <label for="catatan" class="form-label">Catatan</label>
                            <textarea name="catatan" id="catatan" class="form-control">{{ $payment->catatan }}</textarea>
                        </div>
                        
                        <div class="text-end">
                            <a href="{{ route('payments.index') }}" class="btn btn-secondary">Batal</a>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
