<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UsersController;
use App\Http\Controllers\SubscriptionsController;
use Illuminate\Http\Request;

use App\Http\Controllers\TeachersController;
use App\Http\Controllers\CurriculumsController;
use App\Http\Controllers\LearnsController;
use App\Http\Controllers\SectionsController;

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

Route::post('/user/subscribe', [SubscriptionsController::class, 'update'])
    ->middleware(['auth'])->name('subscribe.post');

require __DIR__.'/auth.php';

Route::group(['middleware' => ['auth']], function () {
    Route::post('teachers/store', [TeachersController::class, 'store'])->name('teachers.store'); //保存アクション
    Route::get('teachers/top', [TeachersController::class, 'index'])->name('teacher.index'); //一覧
    Route::get('teachers/instructor', [TeachersController::class, 'InstructorPage'])->name('teacher.instructor'); //新規作成用
    
    Route::get('curriculums/create', [CurriculumsController::class, 'create'])->name('curriculums.create'); //カリキュラム作成ページ
    Route::post('curriculums/store', [CurriculumsController::class, 'store'])->name('curriculums.store'); //保存アクション
    Route::get('curriculums/assumption', [CurriculumsController::class, 'AssumedLearner'])->name('curriculums.assumption'); //想定する学習者ページ
    Route::get('curriculums/detail', [CurriculumsController::class, 'detail'])->name('curriculums.detail'); //契約完了ページ
    
    Route::post('learns/store', [LearnsController::class, 'store'])->name('learns.store'); //何を学ぶかの保存アクション
    
    Route::get('sections/create', [SectionsController::class, 'create'])->name('sections.create'); //セクション作成ページ
    Route::post('sections/store', [SectionsController::class, 'store'])->name('sections.store'); //セクション保存アクション
    
    Route::get('sections/introduction', [SectionsController::class, 'introduction'])->name('sections.introduction'); //コース紹介作成ページ
    Route::post('sections/referral_save', [SectionsController::class, 'referral_save'])->name('sections.referral_save'); //コース紹介保存アクション
});