<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AddressController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('top');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// お問い合わせ
Route::controller(ContactController::class)->group(function(){
    Route::get('contact/create', 'create')->name('contact.create');
    Route::post('contact/store','store')->name('contact.store');
});

// ログイン後の通常のユーザー画面
Route::middleware('verified')->group(function () {

    Route::post('post/comment/store', [CommentController::class,'store'])->name('comment.store');
    Route::get('post/mypost', [PostController::class, 'mypost'])->name('post.mypost');
    Route::get('post/mycomment', [PostController::class, 'mycomment'])->name('post.mycomment');
    Route::resource('post', PostController::class);

    // プロフィール編集用
    Route::get('address/{user}/edit', [AddressController::class, 'edit'])->name('address.edit');
    Route::patch('address/{user}', [AddressController::class, 'update'])->name('address.update');

    // 管理者用画面
    Route::middleware(['can:admin'])->group(function(){
        Route::get('address/index',[AddressController::class, 'index'])->name('address.index');
    });
    
});











require __DIR__.'/auth.php';
