<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UsersController;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// カード情報に関する処理

Route::get('/subscription', function () {
    return view('subscription', [
            'intent' => auth()->user()->createSetupIntent()
        ]);
})->middleware(['auth'])->name('subscription');

Route::post('/user/subscribe', function (Request $request) {
    $request->user()->newSubscription(
        'default', 'price_1N5UtVBqtwf4uKqU3upnzwV7'
    )->create($request->paymentMethodId);
    
    return redirect('/dashboard');
    
})->middleware(['auth'])->name('subscribe.post');

require __DIR__.'/auth.php';

Route::group(['middleware' => ['auth']], function () {
    Route::resource('users', UsersController::class);
});

