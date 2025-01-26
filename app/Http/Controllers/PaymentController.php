<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\Payment;

class PaymentController extends Controller
{
    /**
     * Menampilkan semua data pembayaran.
     */
    public function index()
    {
        $payments = Payment::all(); // Mengambil semua data dari tabel payments
        return view('payments.index', compact('payments')); // Menampilkan data ke view
    }

    /**
     * Menampilkan form untuk menambahkan pembayaran baru.
     */
    public function create()
    {
        $students = Student::all();
        return view('payments.create', compact('students')); // Menampilkan form create
    }

    /**
     * Menyimpan data pembayaran baru ke database.
     */
    public function store(Request $request)
    {
        // Validasi input data
        $request->validate([
            'student_id' => 'required|integer',
            'tanggal' => 'required|date',
            'pengirim' => 'required|string|max:255',
            'jumlah_transfer' => 'required|integer',
            'bulan_bayar' => 'required|string|max:255',
            'selisih' => 'nullable|string|max:255',
            'harga' => 'required|integer',
            'catatan' => 'nullable|string',
        ]);

        // Simpan data ke database
        Payment::create($request->all());

        return redirect()->route('payment.index')->with('success', 'Pembayaran berhasil ditambahkan!');
    }

    /**
     * Menampilkan form untuk mengedit data pembayaran.
     */
    public function edit($id)
    {
        $payment = Payment::findOrFail($id); // Mengambil data berdasarkan ID
        return view('payments.edit', compact('payment')); // Menampilkan form edit
    }

    /**
     * Memperbarui data pembayaran di database.
     */
    public function update(Request $request, $id)
    {
        // Validasi input data
        $request->validate([
            'student_id' => 'required|integer',
            'tanggal' => 'required|date',
            'pengirim' => 'required|string|max:255',
            'jumlah_transfer' => 'required|integer',
            'bulan_bayar' => 'required|string|max:255',
            'selisih' => 'nullable|string|max:255',
            'harga' => 'required|integer',
            'catatan' => 'nullable|string',
        ]);

        // Cari data berdasarkan ID dan perbarui
        $payment = Payment::findOrFail($id);
        $payment->update($request->all());

        return redirect()->route('payments.index')->with('success', 'Data pembayaran berhasil diperbarui!');
    }

    /**
     * Menghapus data pembayaran dari database.
     */
    public function destroy($id)
    {
        $payment = Payment::findOrFail($id);
        $payment->delete();

        return redirect()->route('payments.index')->with('success', 'Data pembayaran berhasil dihapus!');
    }
}
