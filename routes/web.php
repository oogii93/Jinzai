<?php

use App\Models\Tag;
use App\Models\JobPost;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TagController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\JobPostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\VideoProfileController;



use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CompanyDashboardController;
use App\Http\Controllers\UserController;

Route::get('/language/{locale}', [LanguageController::class, 'switchLang'])
    ->name('language.switch');

Route::get('/', function () {
    return view('home');
});

//new
Route::middleware('guest')->group(function () {
    Route::get('register/jobseeker', [RegisteredUserController::class, 'createJobseeker'])
        ->name('register.jobseeker');

    Route::get('register/company', [RegisteredUserController::class, 'createCompany'])
        ->name('register.company');

    Route::post('register', [RegisteredUserController::class, 'store'])->name('register');
});




//vndesn zar haruulah

Route::get('/main', [MainController::class, 'index']

)->middleware(['auth', 'verified'])
->name('main');



Route::get('/jobpost/{id}/show', [JobPostController::class, 'show'])
->name('jobpost.show');

Route::get('/categories/{category}/jobPosts', [JobPostController::class, 'showByCategory'])

->name('categories.jobPosts');






Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/cv', [ProfileController::class, 'cv'])->name('cv');

    Route::middleware(['auth'])->group(function () {
        Route::post('/video-profile', [VideoProfileController::class, 'store'])->name('video-profile.store');
        Route::delete('/video-profile', [VideoProfileController::class, 'destroy'])->name('video-profile.destroy');
    });




    Route::middleware(['auth'])->group(function () {
        Route::prefix('jobpost')->group(function () {
            // Routes for admin and company only
            Route::middleware(['check.role:admin,company'])->group(function () {
                Route::get('/', [JobPostController::class, 'index'])->name('jobpost.index');
                Route::get('/create', [JobPostController::class, 'create'])->name('jobpost.create');
                Route::post('/', [JobPostController::class, 'store'])->name('jobpost.store');
                Route::get('/{id}/edit', [JobPostController::class, 'edit'])->name('jobpost.edit');
                Route::put('/{id}', [JobPostController::class, 'update'])->name('jobpost.update');
                Route::delete('/{id}', [JobPostController::class, 'destroy'])->name('jobpost.destroy');
                // ... other routes
            });

            // Routes accessible by all authenticated users
            Route::get('/{id}/show', [JobPostController::class, 'show'])->name('jobpost.show');
        });
    });







});

require __DIR__.'/auth.php';


// Default redirect after login
Route::get('/dashboard', function () {
    if (auth()->user()->role === 'jobseeker')
     {
        return redirect()->route('jobseeker.dashboard');
    }
     elseif (auth()->user()->role === 'company')
     {
        return redirect()->route('company.dashboard');

    }
    elseif(auth()->user()->role === 'admin')
    {
        return redirect()->route('admin.dashboard');
    }

})->middleware(['auth'])->name('dashboard');



// Jobseeker Routes
Route::middleware(['auth', 'role:jobseeker'])->group(function () {
    Route::get('/jobseeker/dashboard', function () {
        return view('jobseeker.dashboard');
    })->name('jobseeker.dashboard');

    // Add other jobseeker routes here
});





// Company Routes
Route::middleware(['auth', 'role:company'])->group(function () {


    Route::get('/company/dashboard', [CompanyDashboardController::class, 'index'] )

            ->name('company.dashboard');






    // Add other company routes here
});








                // Routes for Admins
                Route::middleware(['auth', 'role:admin'])->group(function () {
                    Route::get('/admin/dashboard', function () {
                        return view('admin.dashboard');

                    })->name('admin.dashboard');

                    // Add more admin routes here

                    //Category CRUD route

                    Route::get('/categories', [CategoryController::class, 'index'])
                    ->name('categories.index');

                Route::get('/categories/create', [CategoryController::class, 'create'])
                    ->name('categories.create');

                Route::post('/categories', [CategoryController::class, 'store'])
                    ->name('categories.store');

                Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])
                    ->name('categories.edit');

                Route::put('/categories/{category}', [CategoryController::class, 'update'])
                    ->name('categories.update');

                Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])
                    ->name('categories.destroy');



                    //Tag CRUD route

                    Route::get('/tags', [TagController::class, 'index'])
                    ->name('tags.index');

                Route::get('/tags/create', [TagController::class, 'create'])
                    ->name('tags.create');

                Route::post('/tags', [TagController::class, 'store'])
                    ->name('tags.store');

                Route::get('/tags/{tags}/edit', [TagController::class, 'edit'])
                    ->name('tags.edit');

                Route::put('/tags/{tags}', [TagController::class, 'update'])
                    ->name('tags.update');

                Route::delete('/tags/{tags}', [TagController::class, 'destroy'])
                    ->name('tags.destroy');



                //User route
                Route::get('/admin/user', [UserController::class, 'index'])
                ->name('admin.user.index');

                Route::get('/admin/user/{user}/show', [UserController::class, 'show'])
                ->name('admin.user.show');

            Route::get('/admin/company', [UserController::class, 'company'])
                ->name('admin.company.index');

            Route::get('/admin/company/{user}/show', [UserController::class, 'companyShow'])
                ->name('admin.company.show');









                });



