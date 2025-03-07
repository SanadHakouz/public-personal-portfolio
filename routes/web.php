<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\ResumeController;
use App\Http\Controllers\Admin\TechnologyController;
use App\Models\Resume;

//home
Route::get('/', function () {
    return view('home');
})->name('home');

//about
Route::get('/about', function () {
    return view('about');
})->name('about');

//contact
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.submit');

// Public project routes
Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('projects.show');
Route::get('/projects/{project}/documentation', [ProjectController::class, 'downloadDocumentation'])
    ->name('projects.documentation.download');

    Route::get('/upcoming-projects/{upcomingProject}', [App\Http\Controllers\UpcomingProjectController::class, 'show'])->name('upcoming-projects.show');

// Technology routes
Route::prefix('admin/technologies')->name('admin.technologies.')->middleware(['auth'])->group(function () {
    Route::get('/', [TechnologyController::class, 'technologiesIndex'])->name('index');
    Route::get('/create', [TechnologyController::class, 'technologyCreate'])->name('create');
    Route::post('/', [TechnologyController::class, 'technologyStore'])->name('store');
    Route::get('/{technology}/edit', [TechnologyController::class, 'technologyEdit'])->name('edit');
    Route::put('/{technology}', [TechnologyController::class, 'technologyUpdate'])->name('update');
    Route::delete('/{technology}', [TechnologyController::class, 'technologyDestroy'])->name('destroy');
});

// Download CV route with enhanced error handling
Route::get('/download-cv', function () {
    $resume = Resume::getActive();

    if ($resume) {
        // Get the full path to the file
        $path = storage_path('app/public/' . $resume->file_path);

        // Check if file exists
        if (file_exists($path)) {
            // Return file as a download with proper headers
            return response()->file($path, [
                'Content-Disposition' => 'attachment; filename="sanad-hakooz-cv.pdf"',
                'Content-Type' => 'application/pdf',
            ]);
        }

        // Alternative approach - stream from storage
        if (Storage::disk('public')->exists($resume->file_path)) {
            $stream = Storage::disk('public')->readStream($resume->file_path);

            return response()->stream(
                function() use ($stream) {
                    fpassthru($stream);
                },
                200,
                [
                    'Content-Type' => 'application/pdf',
                    'Content-Disposition' => 'attachment; filename="sanad-hakooz-cv.pdf"',
                ]
            );
        }
    }

    return back()->with('error', 'CV not found. Please upload a CV from the admin panel.');
})->name('download.cv');

// Debug route to help troubleshoot - can be removed in production
Route::get('/debug-cv', function () {
    $resume = Resume::getActive();

    return response()->json([
        'active_resume' => $resume,
        'file_exists_in_storage' => $resume ? Storage::disk('public')->exists($resume->file_path) : false,
        'storage_path' => $resume ? storage_path('app/public/' . $resume->file_path) : null,
        'file_exists_direct' => $resume ? file_exists(storage_path('app/public/' . $resume->file_path)) : false,
    ]);
});

// Admin routes
Route::get('/admin-access', [AdminController::class, 'loginForm'])->name('admin.secret.login');
Route::post('/admin-access', [AdminController::class, 'login'])->name('admin.login.attempt');

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    // Admin project routes
    Route::get('/projects', [ProjectController::class, 'adminIndex'])->name('admin.projects.index');
    Route::get('/projects/create', [ProjectController::class, 'create'])->name('admin.projects.create');
    Route::post('/projects', [ProjectController::class, 'store'])->name('admin.projects.store');
    Route::get('/projects/{project}/edit', [ProjectController::class, 'edit'])->name('admin.projects.edit');
    Route::put('/projects/{project}', [ProjectController::class, 'update'])->name('admin.projects.update');
    Route::delete('/projects/{project}', [ProjectController::class, 'destroy'])->name('admin.projects.destroy');

    // Admin contact routes
    Route::get('/contacts', [ContactController::class, 'adminIndex'])->name('admin.contacts.index');
    Route::get('/contacts/{contactRequest}', [ContactController::class, 'adminShow'])->name('admin.contacts.show');
    Route::delete('/contacts/{contactRequest}', [ContactController::class, 'adminDestroy'])->name('admin.contacts.destroy');

    // Resume management routes
    Route::resource('resumes', ResumeController::class, ['as' => 'admin']);
    //upcoming projects
    Route::resource('upcoming-projects', App\Http\Controllers\Admin\UpcomingProjectController::class, ['as' => 'admin']);
});

// Technology Categories routes
Route::prefix('admin/technology-categories')->name('admin.technology.categories.')->middleware(['auth'])->group(function () {
    Route::get('/', [TechnologyController::class, 'categoriesIndex'])->name('index');
    Route::get('/create', [TechnologyController::class, 'categoryCreate'])->name('create');
    Route::post('/', [TechnologyController::class, 'categoryStore'])->name('store');
    Route::get('/{category}/edit', [TechnologyController::class, 'categoryEdit'])->name('edit');
    Route::put('/{category}', [TechnologyController::class, 'categoryUpdate'])->name('update');
    Route::delete('/{category}', [TechnologyController::class, 'categoryDestroy'])->name('destroy');
});

//admin logout
Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/');
})->name('logout');
