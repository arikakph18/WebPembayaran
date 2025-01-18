@extends('layouts.master')
@section('content')

<!-- Form untuk input pembayaran -->
<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Input Payment</h4> <!-- Judul form -->
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <!-- Form untuk mengirim data pembayaran ke route 'payment.store' -->
                        <form class="form" method="POST" action="{{ route('payment.store') }}">
                            @csrf <!-- Token untuk mencegah serangan CSRF -->
                            <div class="row">
                                <!-- Input untuk tanggal pembayaran -->
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="tanggal-column">Tanggal</label>
                                        <input type="date" id="tanggal-column" class="form-control"
                                            placeholder="YYYY-MM-DD" name="tgl-column" required>
                                        @error('tgl-column')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Input untuk data bank -->
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="data-bank-column">Data Bank</label>
                                        <input type="text" id="data-bank-column" class="form-control"
                                            placeholder="Data bank" name="dbank-column" required>
                                        @error('dbank-column')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Input jumlah transfer -->
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="jumlah-transfer-column">Jumlah Transfer</label>
                                        <input type="number" id="jumlah-transfer-column" class="form-control"
                                            name="jtf-column" placeholder="Jumlah Transfer" min="0" required>
                                        @error('jtf-column')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Dropdown untuk memilih bulan pembayaran -->
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="month">Month</label>
                                        <select id="month" class="form-control" name="month" required>
                                            <option value="">Select Month</option>
                                            <option value="January">January</option>
                                            <option value="February">February</option>
                                            <option value="March">March</option>
                                            <option value="April">April</option>
                                            <option value="May">May</option>
                                            <option value="June">June</option>
                                            <option value="July">July</option>
                                            <option value="August">August</option>
                                            <option value="September">September</option>
                                            <option value="October">October</option>
                                            <option value="November">November</option>
                                            <option value="December">December</option>
                                        </select>
                                        @error('month')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Input nama anak yang melakukan pembayaran -->
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="name-column">Nama Anak</label>
                                        <input type="text" id="name-column" class="form-control"
                                            name="name-column" placeholder="Nama Anak" required>
                                        @error('name-column')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Input level kelas anak -->
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="level-column">Level</label>
                                        <input type="text" id="level-column" class="form-control"
                                            name="level-column" placeholder="Level" required>
                                        @error('level-column')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Dropdown untuk memilih jenis kelas -->
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="kelas-column">Kelas</label>
                                        <select id="kelas-column" class="form-control" name="kelas" required>
                                            <option value="Online">Online</option>
                                            <option value="Offline">Offline</option>
                                        </select>
                                        @error('kelas')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Dropdown untuk memilih status pembayaran -->
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="status-column">Status</label>
                                        <select id="status-column" class="form-control" name="status-column" required>
                                            <option value="Active">Active</option>
                                            <option value="Cuti">Cuti</option>
                                            <option value="Stop">Stop</option>
                                            <option value="Reactive">Reactive</option>
                                        </select>
                                        @error('status-column')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Dropdown untuk memilih harga -->
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="harga-column">Harga</label>
                                        <select id="harga-column" class="form-control" name="harga" required>
                                            <option value="450000.00">450,000.00</option>
                                            <option value="425000.00">425,000.00</option>
                                            <option value="600000.00">600,000.00</option>
                                            <option value="650000.00">650,000.00</option>
                                            <option value="625000.00">625,000.00</option>
                                        </select>
                                        @error('harga')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Input untuk mencatat kelebihan atau kekurangan pembayaran -->
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="minus-column">Lebih/Kurang</label>
                                        <input type="text" id="minus-column" class="form-control"
                                            name="minplus-column" placeholder="Lebih/Kurang">
                                        @error('minplus-column')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <!-- Input untuk mencatat catatan tambahan -->
                                  <div class="col-md-6 col-12">
                                      <div class="form-group">
                                          <label for="note-column">Note</label>
                                          <input type="text" id="note-column" class="form-control" name="note" placeholder="Catatan">
                                          @error('note')
                                              <div class="text-danger">{{ $message }}</div>
                                          @enderror
                                      </div>
                                  </div>


                                <!-- Tombol submit dan reset -->
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                </div>
                            </div>
                        </form>
                        <!-- Akhir form -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Akhir bagian form -->

@endsection
