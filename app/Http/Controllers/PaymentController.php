<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Payment;

class PaymentController extends Controller
{
    // Menampilkan semua data pembayaran
    public function index()
    {
        $payments = Payment::all(); // Mengambil semua data dari tabel payments
        return view('payment', compact('payments')); // Mengarahkan ke view dengan data
    }

    // Menampilkan form untuk menambahkan pembayaran baru
    public function create()
    {
        return view('create_payment'); // Menampilkan form create
    }

    // Menyimpan data pembayaran baru ke database
    use App\Models\Payment; // Import model Payment

    public function store(Request $request)
    {
    // Validasi input data
    $request->validate([
        'tgl-column' => 'required|date',
        'dbank-column' => 'required|string',
        'jtf-column' => 'required|numeric',
        'month' => 'required|string',
        'name-column' => 'required|string',
        'level-column' => 'required|string',
        'kelas' => 'required|string',
        'status-column' => 'required|string',
        'harga' => 'required|numeric',
        'minplus-column' => 'nullable|string',
    ]);

    // Simpan data ke tabel payment
    Payment::create([
        'tgl' => $request->input('tgl-column'),
        'data_bank' => $request->input('dbank-column'),
        'jumlah_transfer' => $request->input('jtf-column'),
        'month' => $request->input('month'),
        'nama_anak' => $request->input('name-column'),
        'level' => $request->input('level-column'),
        'kelas' => $request->input('kelas'),
        'status' => $request->input('status-column'),
        'harga' => $request->input('harga'),
        'lebih_kurang' => $request->input('minplus-column'),
    ]);

    return redirect()->route('payment.index')->with('success', 'Data pembayaran berhasil disimpan');
}


    // // Menampilkan form untuk mengedit data pembayaran
    // public function edit($id)
    // {
    //     $payment = Payment::findOrFail($id); // Mengambil data berdasarkan ID
    //     return view('payments.edit', compact('payment'));
    // }

    // // Memperbarui data pembayaran di database
    // public function update(Request $request, $id)
    // {
    //     $request->validate([
    //         'tanggal' => 'required|date',
    //         'data_bank' => 'required|string|max:255',
    //         'jumlah_transfer' => 'required|numeric',
    //         'month' => 'required|string|max:255',
    //         'nama_anak' => 'required|string|max:255',
    //         'level' => 'required|string|max:255',
    //         'kelas' => 'required|string|max:255',
    //         'status' => 'required|string|max:255',
    //         'lebih_kurang' => 'nullable|string|max:255',
    //         'note' => 'nullable|string|max:255',
    //     ]);

    //     $payment = Payment::findOrFail($id);
    //     $payment->update($request->all()); // Memperbarui data di database
    //     return redirect()->route('payments.index')->with('success', 'Payment updated successfully!');
    // }

    // // Menghapus data pembayaran dari database
    // public function destroy($id)
    // {
    //     $payment = Payment::findOrFail($id);
    //     $payment->delete(); // Menghapus data
    //     return redirect()->route('payments.index')->with('success', 'Payment deleted successfully!');
    // }
}
