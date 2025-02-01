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
                    <form action="{{ route('payments.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <!-- Kiri -->
                            <div class="col-md-6">
                                <!-- Nama Siswa -->
                                <div class="mb-3">
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
                                <div class="mb-3">
                                    <label for="tanggal" class="form-label">Tanggal Pembayaran</label>
                                    <input type="date" name="tanggal" id="tanggal" class="form-control" required>
                                    @error('tanggal')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                               <!-- Produk -->
                              <div class="mb-3">
                                  <label for="product_id" class="form-label">Pilih Produk</label>
                                  <select name="product_id" id="product_id" class="form-control" required>
                                      <option value="" disabled selected>Pilih Produk</option>
                                      @foreach($products as $product)
                                      <option value="{{ $product->id }}">{{ $product->nama_produk }}</option>
                                  @endforeach
                                  </select>
                                  @error('product_id')
                                  <small class="text-danger">{{ $message }}</small>
                                  @enderror
                              </div>

                          <!-- Harga -->
                              <div class="mb-3">
                                  <label for="harga" class="form-label">Harga</label>
                                  <input type="number" name="harga" id="harga" class="form-control" readonly>
                                  @error('harga')
                                  <small class="text-danger">{{ $message }}</small>
                                  @enderror
                              </div>
                              

                            <!-- Kanan -->
                            <div class="col-md-6">
                                <!-- Pengirim -->
                                <div class="mb-3">
                                    <label for="pengirim" class="form-label">Pengirim</label>
                                    <input type="text" name="pengirim" id="pengirim" class="form-control" required>
                                    @error('pengirim')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <!-- Jumlah Transfer -->
                                <div class="mb-3">
                                    <label for="jumlah_transfer" class="form-label">Jumlah Transfer</label>
                                    <input type="number" name="jumlah_transfer" id="jumlah_transfer" class="form-control" required>
                                    @error('jumlah_transfer')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <!-- Bulan Bayar -->
                                <div class="mb-3">
                                    <label for="bulan_bayar" class="form-label">Bulan Bayar</label>
                                    <select name="bulan_bayar" id="bulan_bayar" class="form-control select2" required>
                                        <option value="" disabled selected>Pilih Bulan Bayar</option>
                                        @foreach(range(date('Y'), date('Y') + 5) as $year)
                                            @foreach(['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'] as $month)
                                            <option value="{{ $month . '-' . $year }}">{{ $month . ' ' . $year }}</option>
                                            @endforeach
                                        @endforeach
                                    </select>
                                    @error('bulan_bayar')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <!-- Catatan -->
                                <div class="mb-3">
                                    <label for="catatan" class="form-label">Catatan</label>
                                    <textarea name="catatan" id="catatan" class="form-control" rows="3"></textarea>
                                    @error('catatan')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <!-- Selisih -->
                                <div class="mb-3">
                                    <label for="selisih" class="form-label">Selisih</label>
                                    <input type="number" name="selisih" id="selisih" class="form-control">
                                    @error('selisih')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <!-- Tombol Submit -->
                            <div class="col-md-12 text-end">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-save"></i> Simpan
                                </button>
                                <a href="{{ route('payments.index') }}" class="btn btn-secondary">
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

<!-- <script>
    document.getElementById('product_id').addEventListener('change', function () {
        const productId = this.value;
        const hargaField = document.getElementById('harga');

        if (productId) {
            fetch(`/product-price/${productId}`)
                .then(response => response.json())
                .then(data => {
                    if (data) {
                        hargaField.value = data.price; // Isi harga dari produk
                    }
                })
                .catch(error => console.error('Error:', error));
        } else {
            hargaField.value = ''; // Kosongkan jika tidak ada produk
        }
    });
</script> -->

@endsection

@section('js')
<!-- <script>
    document.getElementById('student_id').addEventListener('change', function () {
        const studentId = this.value;  // Mendapatkan ID siswa yang dipilih

        // Tampilkan ID siswa di console log
        console.log('ID Siswa yang dipilih:', studentId);
    });
</script> -->

<script>
    document.getElementById('student_id').addEventListener('change', function () {
        const studentId = this.value;
        const productSelect = document.getElementById('product_id');
        const hargaField = document.getElementById('harga');

        if (studentId) {
            fetch(`/student-products/${studentId}`)
                .then(response => response.json())
                .then(data => {
                    if (data) {
                        productSelect.value = data.product_id; // Set produk sesuai siswa
                        hargaField.value = data.price; // Set harga produk
                    } else {
                        productSelect.value = '';
                        hargaField.value = '';
                    }
                })
                .catch(error => console.error('Error:', error));
        } else {
            productSelect.value = '';
            hargaField.value = '';
        }
    });
</script>


@endsection
