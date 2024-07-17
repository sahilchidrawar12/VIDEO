<?php

use App\Http\Controllers\admin\AdminHomeController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\SubscriptionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
|
*/

Route::get('/loading', function () {
    return view('loaders.loading');
});

Route::get('/loginpage', function () {
    return view('loaders.login');
});

Route::get('/specialcourse', function () {
    return view('pages.specialcourse');
});

Route::get('/', function () {
    return view('pages.home');
});

Route::get('/competition', function () {
    return view('pages.competition');
});

Route::get('/profile', function () {
    return view('pages.profile');
});

Route::get('/classe-play', function () {
    return view('pages.classe-play');
});

Route::get('/classes', function () {
    return view('pages.classes');
});

Route::get('/edit-profile', function () {
    return view('pages.edit-profile');
});

Auth::routes();

// Route for subscribing to a plan
Route::post('/subscribe', [SubscriptionController::class, 'subscribe'])->name('subscribe');

// Route for verifying payment after subscription
Route::post('/verify-payment', [SubscriptionController::class, 'verifyPayment'])->name('verify-payment');





/* Admin routes */
Route::get('admin', [AdminLoginController::class, 'login_from'])->name('admin.login_form');
Route::post('admin/login', [AdminLoginController::class, 'login'])->name('admin.login_submit');
Route::get('/admin/users', [App\Http\Controllers\admin\UserController::class, 'index'])->name('admin.users.index');

Route::group(['prefix' => 'admin', 'namespace' => 'admin', 'middleware' => 'admin.guest'], function () {
    Route::post('logout', [AdminLoginController::class, 'logout'])->name('admin.logout');
    Route::get('/dashboard', [AdminHomeController::class, 'dashboard'])->name('admin.dashboard');

    // Courses routes
    Route::get('/courses', [App\Http\Controllers\CoursesController::class, 'index'])->name('course.index');
    Route::get('/course/create', [App\Http\Controllers\CoursesController::class, 'create'])->name('course.create');
    Route::post('/course/store', [App\Http\Controllers\CoursesController::class, 'store'])->name('course.store');
    Route::get('course/edit/{id}', [App\Http\Controllers\CoursesController::class, 'edit'])->name('course.edit');
    Route::post('/course/update', [App\Http\Controllers\CoursesController::class, 'update'])->name('course.update');
    Route::get('/course/delete/{id}', [App\Http\Controllers\CoursesController::class, 'destroy'])->name('course.delete');

    // Course videos routes
    Route::get('/course_videos', [App\Http\Controllers\CourseVideosController::class, 'index'])->name('course_videos.index');
    Route::get('/course_video/create', [App\Http\Controllers\CourseVideosController::class, 'create'])->name('course_videos.create');
    Route::post('/course_video/store', [App\Http\Controllers\CourseVideosController::class, 'store'])->name('course_videos.store');
    Route::get('course_video/edit/{id}', [App\Http\Controllers\CourseVideosController::class, 'edit'])->name('course_videos.edit');
    Route::post('/course_video/update', [App\Http\Controllers\CourseVideosController::class, 'update'])->name('course_videos.update');
    Route::get('/course_video/delete/{id}', [App\Http\Controllers\CourseVideosController::class, 'destroy'])->name('course_videos.delete');
});

// Public routes accessible to all users
Route::get('/', function () {
    return view('pages.home');
})->name('home');

// Authenticated routes
Route::group(['middleware' => 'auth'], function () {
    // Dashboard route after login
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

    // Competition route
    Route::get('/competition', function () {
        if (Auth::user()->isSubscribed()) {
            return view('pages.competition');
        }
        return view('pages.classes');

    })->name('competition');

    // Profile route
    Route::get('/profile', function () {
        return view('pages.profile');
    })->name('profile');

    // Classes route
    Route::get('/classes', function () {
        if (Auth::user()->isSubscribed()) {
            return view('pages.classes');
        }
        // If not subscribed, continue to show the page without redirection or message
        return view('pages.classes');
    })->name('classes')->middleware('auth');

    // Class Play route
    Route::get('/classe-play', function () {
        return view('pages.classe-play');
    })->name('classe-play');

    // Edit Profile route
    Route::get('/edit-profile', function () {
        // Fetch the authenticated user
        $user = Auth::user();
    
        // Return the view with the user data
        return view('pages.edit-profile', compact('user'));
    })->name('edit-profile');

    // Route for editing profile
    Route::get('/edit-profile', [UserProfileController::class, 'edit'])->name('edit-profile');
    Route::post('/update-profile', [UserProfileController::class, 'update'])->name('update-profile');
});

