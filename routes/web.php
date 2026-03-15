<?php
use App\Http\Controllers\CarritoController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\ZapatoController;
use Illuminate\Http\Request;


Route::get('/', function () {
    return view('welcome');
});


Route::resource('zapatos',ZapatoController::class);

Route::get('/carritos/ver',[CarritoController::class, 'ver'])->name('carritos.ver');


Route::middleware('auth')->group(function () {
    
    Route::get('/carrito/cambiar/{opcion}/{id}',[CarritoController::class, 'cambiar'])->name('carritos.cambiar');

    Route::post('/carrito/vaciar',[CarritoController::class, 'vaciar'])->name('carritos.vaciar');

    Route::get('/carritos/meter/{id}',[CarritoController::class, 'meter'])->name('carritos.meter');
    Route::post('/logout', function (Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    })->name('logout');
});


Route::get('/login', function () {
    return view('user.login');
})->name('login');

Route::post('/login', function (Request $request) {
    Route::resource('carritos',ZapatoController::class);
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->intended(route('zapatos.index'));

    }

    return back()->withErrors([
        'email' => 'Las credenciales no coinciden con nuestros registros.',
    ])->onlyInput('email');
})->name('login.perform');


Route::resource('zapatos',ZapatoController::class);
Route::resource('facturas',ZapatoController::class);
Route::resource('lineas',ZapatoController::class);