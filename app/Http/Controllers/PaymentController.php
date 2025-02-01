<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\Payment;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class PaymentController extends Controller
{
    /**
     * Menampilkan semua data pembayaran.
     */
     public function index()
    {
        
        $payments = Payment::with('student.products')->get();
        return view('payments.index', compact('payments'));
    }

    /**
     * Menampilkan form untuk menambahkan pembayaran baru.
     */
    public function create()
    {
        $students = Student::all();
        $products = Product::all();
        return view('payments.create', compact('students', 'products'));
    }

    /**
     * Mengambil harga produk berdasarkan ID.
     */
    public function getProductPrice($id)
    {
        $product = Product::findOrFail($id);
        return response()->json($product);
    }

    /**
     * Menyimpan data pembayaran baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|integer',
            'tanggal' => 'required|date',
            'pengirim' => 'required|string|max:255',
            'jumlah_transfer' => 'required|integer',
            'bulan_bayar' => 'required|string|max:255',
            'selisih' => 'nullable|string|max:255',
            'harga' => 'required|integer',
            'catatan' => 'nullable|string',
            'level' => 'nullable|string|max:255',
            'status' => 'nullable|string|max:255',
        ]);

        Payment::create($request->all());

        return redirect()->route('payments.index')->with('success', 'Pembayaran berhasil ditambahkan!');
    }

    /**
     * Menampilkan form untuk mengedit data pembayaran.
     */
    public function edit($id)
    {
        $payment = Payment::findOrFail($id);
        return view('payments.edit', compact('payment'));
    }

    /**
     * Memperbarui data pembayaran di database.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'student_id' => 'required|integer',
            'tanggal' => 'required|date',
            'pengirim' => 'required|string|max:255',
            'jumlah_transfer' => 'required|integer',
            'bulan_bayar' => 'required|string|max:255',
            'selisih' => 'nullable|string|max:255',
            'harga' => 'required|integer',
            'catatan' => 'nullable|string',
            'level' => 'nullable|string|max:255',
            'status' => 'nullable|string|max:255',
        ]);

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

    /**
     * Menambahkan kolom baru ke tabel payments jika belum ada.
     */
    public function updateTableSchema()
    {
        if (!Schema::hasColumns('payments', ['level', 'status'])) {
            Schema::table('payments', function (Blueprint $table) {
                $table->string('level')->nullable()->after('harga');
                $table->string('status')->nullable()->after('level');
            });
        }
    }
}
