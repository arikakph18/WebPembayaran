@extends('layouts.master')

@section('content')
<div class="page-heading">
    <h3>Daftar Pembayaran</h3>
</div>

<div class="page-content">
    <div class="row">
        <div class="col-12">
            <!-- Tambah tombol untuk pembayaran baru -->
            <div class="mb-3">
                <a href="{{ route('payments.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus-circle"></i> Tambah Pembayaran
                </a>
            </div>

            <!-- Tabel daftar pembayaran -->
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Data Pembayaran</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>Nama Siswa</th>
                                    <th>Tanggal</th>
                                    <th>Pengirim</th>
                                    <th>Jumlah Transfer</th>
                                    <th>Bulan Bayar</th>
                                    <th>Selisih</th>
                                    <th>Harga</th>
                                    <th>Level</th>
                                    <th>Status</th>
                                    <th>Tipe</th>
                                    <th>Catatan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($payments as $payment)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $payment->student->nama ?? 'Tidak Ada Data' }}</td>
                                    <td>{{ $payment->tanggal ? $payment->tanggal->format('d-m-Y') : '-' }}</td>
                                    <td>{{ $payment->pengirim }}</td>
                                    <td>{{ number_format($payment->jumlah_transfer, 0, ',', '.') }}</td>
                                    <td>{{ $payment->bulan_bayar }}</td>
                                    <td>{{ $payment->selisih ? number_format($payment->selisih, 0, ',', '.') : '-' }}</td>
                                    <td>{{ number_format($payment->harga, 0, ',', '.') }}</td>
                                    <td> 
                                        @forelse ($payment->student->products as $p)
                                        {{$p->level}}
                                        @empty 
                                        tidak ada Level
                                        @endforelse

                                    </td>
                                    <td>{{ $payment->student->status ?? 'Tidak Ada Data' }}</td>
                                    <td> 
                                        @forelse ($payment->student->products as $p)
                                        {{$p->tipe}}
                                        @empty 
                                        tidak ada data
                                        @endforelse

                                    </td>
                                    <td>{{ $payment->catatan ?? '-' }}</td>
                                    <td>
                                        <!-- Tombol Edit -->
                                        <a href="{{ route('payments.edit', $payment->id) }}" class="btn btn-sm btn-warning" title="Edit">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <!-- Tombol Hapus -->
                                        <form action="{{ route('payments.destroy', $payment->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')" title="Hapus">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="12" class="text-center">Tidak ada data pembayaran.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
