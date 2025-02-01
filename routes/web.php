<?php

use App\Http\Controllers\dashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\RegistController;
use App\Http\Controllers\registerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StudentController;
use App\Models\Student;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect()->route('login');
});

// Route::get('/dashboard' ,[dashboardController::class, 'admin.dashboard']);
// Route::get('/login' ,[LoginController::class, 'index'])->name('login');
// Route::get('/register', [RegistController::class, 'index'])->name('register');
// Route::post('/regist', [RegistController::class, 'store'])->name('register.store');




Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

// Route::get('/payment',[PaymentController::class, 'index'])->name('payment');
Route::resource('products', ProductController::class)->except('show');
Route::resource('students', StudentController::class);
Route::resource('payments', PaymentController::class);
Route::get('/product-price/{id}', [PaymentController::class, 'getProductPrice'])->name('product.price');

// Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');

// Route::get('/create_payment', [PaymentController::class, 'create'])->name('create');
// // Definisikan route untuk menyimpan data pembayaran
// Route::post('/payment', [PaymentController::class, 'store'])->name('payment.store');

Route::get('/student-products/{studentId}', function ($studentId) {
    $student = Student::with('products')->find($studentId);
    
    if ($student && $student->products->isNotEmpty()) {
        return response()->json([
            'product_id' => $student->products->first()->id, // Ambil produk pertama
            'price' => $student->products->first()->harga
        ]);
    }

    return response()->json(null, 404);
});