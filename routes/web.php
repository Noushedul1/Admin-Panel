<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Post\PostController;
use App\Http\Controllers\Frontend\FrontController;
use App\Http\Controllers\Frontend\CommentController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\FrontenduserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

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
/*
|--------------------------------------------------------------------------
| Frontend Routes
|--------------------------------------------------------------------------
*/

// frontend start
Route::controller(FrontendController::class)->group(function(){
    Route::get('/','index');
    Route::get('/show/{id}','show')->name('show');
});
Route::controller(FrontController::class)->group(function(){
    Route::get('/registerShow','registerShow')->name('registerShow');
    Route::post('/register_store','store')->name('register.store');

    Route::get('/user_login','index')->name('user.login');
    Route::post('/user_login_store','login')->name('loginCheck');
});
Route::controller(CommentController::class)->group(function(){
    Route::post('/comment/{post_id}','store')->name('post.comment');
});
// frontend end

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


// start post
Route::prefix('post')->controller(PostController::class)->name('post.')->group(function(){
    Route::get('/','index')->name('index');
    Route::get('/create','create')->name('create');
    Route::post('/store','store')->name('store');
    // Route::get('/edit/{id}','edit')->middleware('can:view,post')->name('edit'); not working right now
    Route::get('/edit/{id}','edit')->name('edit');
    Route::get('/show/{id}','show')->name('show');
    Route::put('/update/{id}','update')->name('update');
    Route::delete('/destroy/{id}','destroy')->name('destroy');
});
// end post
// start category
Route::resource('category', CategoryController::class);

// end category

// start dummy image
// Route::get('/test',function(){
//     $posts = Post::all();
//     $id = 4;
//     foreach($posts as $post) {
//         $post->image = "https://picsum.photos/id/".$id."/200/300";
//         $post->save();
//         $id++;
//     }
//     return $posts;
// });
// end dummy image
