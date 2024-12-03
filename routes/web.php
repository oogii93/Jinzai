<?php

use App\Models\Tag;
use App\Models\JobPost;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TagController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Chat2Controller;
use App\Http\Controllers\JobPostController;
use App\Http\Controllers\ProfileController;



use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\Category2Controller;
use App\Http\Controllers\JobFavoriteController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\VideoProfileController;
use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\CompanyDashboardController;
use App\Http\Controllers\JobSeekerDashboardController;
use App\Http\Controllers\AdminJobApplicationController;
use App\Http\Controllers\Auth\RegisteredUserController;




Route::get('/language/{locale}', [LanguageController::class, 'switchLang'])
    ->name('language.switch');

Route::get('/', [HomeController::class, 'index'])
->name('home');


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

)->middleware(['auth', 'verified','jobseeker.approved'])
->name('main');



Route::get('/jobpost/{id}/show', [JobPostController::class, 'show'])
->name('jobpost.show');

Route::get('/categories/{category}/jobPosts', [JobPostController::class, 'showByCategory'])

->name('categories.jobPosts');


// Favorited
Route::post('/jobs/{jobId}/favorite', [JobFavoriteController::class, 'toggleFavorite'])
    ->middleware('auth')
    ->name('jobs.favorite');

Route::get('/jobFavorite', [JobFavoriteController::class, 'show'])
    ->middleware('auth')
    ->name('jobFavorite');

 Route::get('/jobs/{jobId}/check-favorite', [JobFavoriteController::class, 'checkFavoriteStatus'])
    ->middleware('auth');

 Route::delete('/favorites/{favoriteId}', [JobFavoriteController::class, 'destroy'])->name('favorites.destroy')
    ->middleware('auth','web');


    //Notification Route


    Route::middleware(['auth'])->group(function () {
        Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
        Route::patch('/notifications/{id}/mark-as-read', [NotificationController::class, 'markAsRead'])->name('notifications.mark-as-read');
    });

    Route::get('/favorite/check/{jobId}', [JobFavoriteController::class, 'checkFavoriteStatus'])
    ->middleware(['auth', 'web'])
    ->name('favorite.check');






// 6. Update routes in web.php
Route::middleware(['auth'])->group(function () {

    Route::get('/jobs/{id}', [JobPostController::class, 'show'])->name('jobpost.show');
    Route::post('/jobs/{id}/apply', [JobPostController::class, 'apply'])->name('job.apply');


    // Jobseeker routes
    Route::middleware(['check.role:jobseeker'])->group(function () {
        Route::post('/jobs/{jobPost}/apply', [JobApplicationController::class, 'store'])
            ->name('jobs.apply');
        Route::get('/my-applications', [JobApplicationController::class, 'index'])
            ->name('applications.index');
    });

    // Admin routes
    Route::middleware(['check.role:admin'])->group(function () {


            Route::get('/admin/applications', [AdminJobApplicationController::class, 'index'])

            ->name('admin.applications.index');

            Route::post('/admin/applications/{application}/review', [AdminJobApplicationController::class, 'review'])

            ->name('admin.applications.review');

            Route::get('/admin/applications/reviewed', [AdminJobApplicationController::class, 'showReviewed'])

            ->name('admin.applications.reviewed');


            //New Application Routes for actions

            //mensetsu udur

            Route::post('/job-applications/{application}/set-date', [AdminJobApplicationController::class, 'setDate'])

            ->name('job-applications.set-date');
            //mensetsu hariu

            Route::post('job-applications/{application}/set-result',[AdminJobApplicationController::class, 'setTaiseiInterviewResult'])

            ->name('job-applications.set-result');

            //document hariu
            Route::post('job-applications/{application}/document-result',[AdminJobApplicationController::class, 'setDocumentResult'])

            ->name('job-applications.document-result');

            Route::post('/job-applications/{application}/set-date2', [AdminJobApplicationController::class, 'setDate2'])

            ->name('job-applications.set-date2');


            //End Application Routes for actions



            Route::get('/company/dashboard', [CompanyDashboardController::class, 'index'])->name('company.dashboard');
            Route::patch('/company/applications/{application}/status', [CompanyDashboardController::class, 'updateApplicationStatus'])
                ->name('company.application.update-status');
            Route::get('/company/applications/{application}', [CompanyDashboardController::class, 'getApplicationDetails']);
    });




    // Company routes
    Route::middleware(['check.role:company'])->group(function () {

        Route::get('/company/applications', [JobApplicationController::class, 'employerApplications'])
            ->name('company.employer');

            Route::patch('/applications/{application}/company-result', [JobApplicationController::class, 'companyResult'])
            ->name('applications.company-result');
            Route::patch('/applications/{application}/company-start-date', [JobApplicationController::class, 'companyStartDate'])
            ->name('applications.company-start-date');
    });
});






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



        //Chat Routes


        Route::get('/chat', [ChatController::class, 'index'])->name('chat.index');
        Route::get('/chat/{otherUser}', [ChatController::class, 'show'])->name('chat.show');
        Route::post('/chat/{receiver}', [ChatController::class, 'store'])->name('chat.store');

        //END Chat Routes



        Route::prefix('jobpost')->group(function () {
            // Routes for admin and company only
            Route::middleware(['check.role:admin,company'])->group(function () {
                Route::get('/', [JobPostController::class, 'index'])->name('jobpost.index');
                Route::get('/create', [JobPostController::class, 'create'])->name('jobpost.create');
                Route::post('/', [JobPostController::class, 'store'])->name('jobpost.store');
                Route::get('/{id}/edit', [JobPostController::class, 'edit'])->name('jobpost.edit');
                Route::put('/{id}', [JobPostController::class, 'update'])->name('jobpost.update');
                Route::delete('/{id}', [JobPostController::class, 'destroy'])->name('jobpost.destroy');

                Route::get('get-subcategories/{category}', [JobPostController::class, 'getSubcategories'])

                ->name('get.subcategories');


                // ... other routes
            });

            // Routes accessible by all authenticated users
            Route::get('/{id}/show', [JobPostController::class, 'show'])->name('jobpost.show');

            Route::get('/jobs', [JobPostController::class, 'index'])->name('jobs.index');
            Route::get('/jobs/tag/{tag}', [MainController::class, 'getPostsByTag'])->name('posts.tag');

            Route::get('/categories/{category}/posts', [MainController::class, 'getJobPostsByCategory'])
                 ->name('categories.jobPosts');

            Route::get('/categories/{category}', [MainController::class, 'filterByCategory'])

            ->name('categories.jobPosts');

            Route::get('/tags/{tag}', [MainController::class, 'filterByTag'])

            ->name('tags.jobPosts');

            Route::get('/categories/{category}/subcategory/{subcategory}',[MainController::class, 'filterBySubcategory'])

            ->name('categories.subcategory');




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


    Route::get('/jobseeker/dashboard', [JobSeekerDashboardController::class, 'dashboard']

    )->name('jobseeker.dashboard');

    Route::get('/jobseeker/history', [JobSeekerDashboardController::class, 'history']

    )->name('jobseeker.history');

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
                   Route::get('/admin/dashboard', [AdminJobApplicationController::class, 'dashboard'])
                   ->name('admin.dashboard');



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


                    // SUB Category CRUD route

                    Route::get('/categories2', [Category2Controller::class, 'index'])
                    ->name('categories2.index');

                Route::get('/categories2/create', [Category2Controller::class, 'create'])
                    ->name('categories2.create');

                Route::post('/categories2', [Category2Controller::class, 'store'])
                    ->name('categories2.store');



                Route::get('/categories2/{category}/edit', [Category2Controller::class, 'edit'])
                    ->name('categories2.edit');

                Route::put('/categories2/{category}', [Category2Controller::class, 'update'])
                    ->name('categories2.update');

                Route::delete('/categories2/{category2}', [Category2Controller::class, 'destroy'])
                    ->name('categories2.destroy');







                    //Tag CRUD route

                    Route::get('/tags', [TagController::class, 'index'])
                    ->name('tags.index');

                Route::get('/tags/create', [TagController::class, 'create'])
                    ->name('tags.create');

                Route::post('/tags', [TagController::class, 'store'])
                    ->name('tags.store');

                Route::get('/tags/{tag}/edit', [TagController::class, 'edit'])
                    ->name('tags.edit');

                Route::put('/tags/{tag}', [TagController::class, 'update'])
                    ->name('tags.update');

                Route::delete('/tags/{tag}', [TagController::class, 'destroy'])
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

                //Admin route for approval


                Route::get('/admin/pending-posts', [JobPostController::class, 'pendingPosts'])->name('jobpost.pending');
                Route::post('/admin/posts/{id}/approve', [JobPostController::class, 'approve'])->name('jobpost.approve');
                Route::post('/admin/posts/{id}/reject', [JobPostController::class, 'reject'])->name('jobpost.reject');

                //Admin for Jobseeker Approval
                Route::patch('/admin/users/{user}/approve', [UserController::class, 'approve'])
                ->name('admin.users.approve');
           Route::delete('/admin/users/{user}/disapprove', [UserController::class, 'disapprove'])
                ->name('admin.users.disapprove');









                });


                Route::middleware(['auth'])->group(function () {
                    Route::post('/send-message', [Chat2Controller::class, 'sendMessage'])->name('send.message');
                    Route::get('/get-chat-history/{receiverId}', [Chat2Controller::class, 'getChatHistory'])->name('chat.history');
                });



