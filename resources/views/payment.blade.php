@extends('layouts.master')


@section('content')
<!-- Basic Tables start -->
 <section class="section">
        <div class="row" id="basic-table">
            <div class="col-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Data Payment</h4>
                        <a  class="btn btn-primary" href="{{route('create')}}" > Add Payment</a>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <!-- Table with outer spacing -->
                            <div class="table-responsive">
                                <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>TANGGAL</th>
                                        <th>DATA BANK</th>
                                        <th>JUMLAH TRANSFER</th>
                                        <th>MONTH</th>
                                        <th>NAMA ANAK</th>
                                        <th>LEVEL</th>
                                        <th>KELAS</th>
                                        <th>STATUS</th>
                                        <th>HARGA</th>
                                        <th>LEBIH/KURANG</th>
                                        <th>Note</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <!-- Looping data dari database -->
                                    @foreach($payments as $key => $payment)
                                    <tr>
                                        <td  class="text-bold-500">{{ $key + 1 }}</td>
                                        <td class="text-bold-500">{{ $payment->tanggal }}</td>
                                        <td class="text-bold-500">{{ $payment->data_bank }}</td>
                                        <td class="text-bold-500">{{ number_format($payment->jumlah_transfer, 0, ',', '.') }}</td>
                                        <td class="text-bold-500">{{ $payment->month }}</td>
                                        <td class="text-bold-500">{{ $payment->nama_anak }}</td>
                                        <td class="text-bold-500">{{ $payment->level }}</td>
                                        <td class="text-bold-500">{{ $payment->kelas }}</td>
                                        <td class="text-bold-500">{{ $payment->status }}</td>
                                        <td class="text-bold-500">{{ number_format($payment->harga, 0, ',', '.') }}</td>
                                        <td class="text-bold-500">{{ $payment->lebih_kurang }}</td>
                                        <td class="text-bold-500">{{ $payment->note }}</td>
                                    </tr>
                                    @endforeach
                                    </tr>
                                    
                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Basic Tables end -->
@endsection
