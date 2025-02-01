@extends('layouts.master')

@section('content')
<div class="page-heading">
    <h3>Daftar Students dan Relasi Produk</h3>
</div>

<div class="page-content">
    <section class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Daftar Students</h4>
                    <a href="{{ route('students.create') }}" class="btn btn-primary">Tambah data murid</a>
                </div>

                <div class="card-body">
                    <!-- Tabel Students -->
                    <table class="table table-striped" id="studentsTable">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>Nama</th>
                                <th>Produk</th>
                                <th>Level</th>
                                <th>Status</th>
                                <th>Tipe</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i = 1;
                            @endphp
                            @foreach ($students as $st)
                                <tr>
                                    <td class="text-bold-500">{{ $i++ }}</td>
                                    <td class="text-bold-500">{{ $st->nama }}</td>
                                    <td class="text-bold-500">
                                        @if ($st->products->isNotEmpty())
                                            @foreach ($st->products as $product)
                                                {{ $product->nama_produk }}<br>
                                            @endforeach
                                        @else
                                            No Products
                                        @endif
                                    </td>
                                    <td class="text-bold-500">
                                        @if ($st->products->isNotEmpty())
                                            @foreach ($st->products as $product)
                                                {{ $product->level }}<br>
                                            @endforeach
                                        @else
                                            No Products
                                        @endif
                                    </td>
                                    <td class="text-bold-500">{{ $st->status }}</td>
                                    <td class="text-bold-500">
                                        @if ($st->products->isNotEmpty())
                                            @foreach ($st->products as $product)
                                                {{ $product->tipe }}<br>
                                            @endforeach
                                        @else
                                            No Products
                                        @endif
                                    </td>
                                    <td class="text-bold-500">
                                        <a href="{{ route('students.edit', $st->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('students.destroy', $st->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus student ini?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
