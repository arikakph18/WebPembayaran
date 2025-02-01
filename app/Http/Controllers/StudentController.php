<?php

namespace App\Http\Controllers;

use App\Models\PivotStudentClass;
use App\Models\Product;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    public function getStudentDetails($id)
{
    $student = Student::with('products')->findOrFail($id);
    return response()->json($student);
}

    /**
     * Display a listing of the resource.
     */
    public function index()
{
    // Eager loading 'products' pada model Student
    $students = Student::with('products')->get();
     return view('students.index', compact('students'));

}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       // Mengambil data produk dari database
       $products = Product::all(); // Pastikan model Product ada dan benar
        
       // Mengirim data $products ke view
       return view('students.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data input dari form
        
        $validated = $request->validate([
            'nama' => 'required', // Pastikan siswa terdaftar
            'product_id' => 'required|exists:table_products,id', // Pastikan produk valid
            'status'     => 'required',            // Misalnya: Aktif, Pending, etc.
        ]);

        $student = new Student();
        $student->nama = $validated['nama'];
        $student->status = $validated['status'];
        $student->save();

        $pivot = new PivotStudentClass();
        $pivot->student_id = $student->id;
        $pivot->product_id= $validated['product_id'];
        $pivot->save();
    
        // Redirect ke halaman lain dengan pesan sukses
        return redirect()->route('students.index')->with('success', 'Data berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('students.show', compact('students'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
{
    // Ambil data student dengan relasi products
    $student = Student::with('products')->findOrFail($id);

    // return $student;

    // Ambil semua produk untuk pilihan (dropdown atau checkbox)
    $products = Product::all();

    return view('students.edit', compact('student', 'products'));
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $student = Student::findOrFail($id);

    $request->validate([
        'nama' => 'required|string|max:255',
        'status' => 'required|string|max:255',
        'product_id' => 'exists:table_products,id',
    ]);

    // return $request;

    $student->update([
        'nama' => $request->input('nama'),
        'status' => $request->input('status'),
    ]);

    $student->products()->sync($request->input('product_id'));
    
    return redirect()->route('students.index')->with('success', 'Student updated successfully!');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    // Temukan siswa berdasarkan ID
    $student = Student::findOrFail($id);

    // Hapus semua relasi many-to-many dengan produk (jika ada)
    $student->products()->detach();

    // Hapus data siswa
    $student->delete();

    // Redirect dengan pesan sukses
    return redirect()->route('students.index')->with('success', 'Data siswa berhasil dihapus.');
}

}
