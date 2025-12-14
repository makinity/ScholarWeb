<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ScholarshipController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\AnalyticsController;
use App\Models\Applications;

Route::get('/', function () {
    return view('components.layout');
});

// Public Routes
Route::post('/register', [AuthController::class, 'register'])->name('auth.register');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');

// =================== STUDENT ROUTES ===================
Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/dashboard', function () {

    $applications = Applications::get();

    $active = Applications::where('status', 'approved')->count();
    $pending = Applications::where('status', 'pending')->count();
    $rejected = Applications::where('status', 'rejected')->count();
    $total = Applications::count();

    return view('partials.dashboard', compact('applications', 'active', 'pending', 'rejected', 'total'));
})->name('dashboard');
    
    // Profile
    Route::get('/profile/edit', [AuthController::class, 'edit'])->name('profile.edit');
    Route::put('/update-profile', [AuthController::class, 'update'])->name('auth.update');
    
    // Scholarship Browsing (Student Side)
    Route::get('/scholarships/quick-apply', function () {
        return view('scholarships.quick-apply');
    })->name('quick');
    Route::get('/scholarships', [ScholarshipController::class, 'browse'])->name('scholarships.browse');
    Route::get('/scholarships/details/{scholarship}', [ScholarshipController::class, 'details'])->name('view.details');


    Route::post('/scholarships/{scholarship}/apply', [ScholarshipController::class, 'apply'])->name('scholarships.apply');
    

    
    // Applications
    Route::get('/applications/page', [ApplicationController::class, 'list'])->name('applications');

    Route::get('/applications/create/{scholarship}', [ApplicationController::class, 'create'])->name('applications.create');
    Route::post('/applications', [ApplicationController::class, 'store'])->name('applications.store');

    // Evaluation score sheet
    Route::get('/score', function () {
        return view('partials.score');
    })->name('user.score');
    
    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

// =================== ADMIN ROUTES ===================
Route::prefix('admin')->middleware(['auth'])->group(function () {
    // Admin Dashboard
    Route::get('/dashboard', function () {
        $totalApplications = Applications::count();
        $pendingApplications = Applications::where('status', 'pending')->count();
        $approvedApplications = Applications::where('status', 'approved')->count();
        $rejectedApplications = Applications::where('status', 'rejected')->count();
        
        // Get recent applications (last 10)
        $recentApplications = Applications::with('scholarship')
            ->latest()
            ->limit(10)
            ->get();
        
        // Get applications by school (for chart)
        $applicationsBySchool = Applications::select('school_name', \DB::raw('COUNT(*) as count'))
            ->groupBy('school_name')
            ->orderBy('count', 'desc')
            ->limit(5)
            ->get();
        
        // Get applications by status (for chart)
        $applicationsByStatus = [
            'pending' => $pendingApplications,
            'approved' => $approvedApplications,
            'rejected' => $rejectedApplications
        ];
        
        return view('admin.dashboard', compact(
            'totalApplications',
            'pendingApplications',
            'approvedApplications',
            'rejectedApplications',
            'recentApplications',
            'applicationsBySchool',
            'applicationsByStatus'
        ));
    })->name('admin.dashboard');
    
    Route::get('/analytics', [AnalyticsController::class, 'index'])->name('admin.analytics');
    Route::get('/analytics/schools', [AnalyticsController::class, 'getApplicantsPerSchool'])->name('admin.analytics.schools');
    Route::get('/analytics/grades', [AnalyticsController::class, 'getApplicantsPerGrade'])->name('admin.analytics.grades');
    Route::get('/analytics/stats', [AnalyticsController::class, 'getOverallStats'])->name('admin.analytics.stats');
    Route::get('/analytics/performance', [AnalyticsController::class, 'getSchoolPerformance'])->name('admin.analytics.performance');
    
    // Admin Applications
    Route::get('/admin-applications', [ApplicationController::class, 'index'])->name('admin.applications');
    Route::get('/applications/{id}/approve', [ApplicationController::class, 'approve'])->name('admin.applications.approve');
    Route::get('/applications/{id}/reject', [ApplicationController::class, 'reject'])->name('admin.applications.reject');

    Route::get('/score', function(){
        return view('admin.score');
    })->name('admin.score');

    
    // Admin Application Review
    Route::get('/application-review', function () {
        return view('admin.application-reviews');
    })->name('admin.application-reviews');
    
    // Scholarship Management (Admin Side)
    Route::get('/scholarships', [ScholarshipController::class, 'index'])->name('admin.scholarship');
    Route::get('/scholarships/create', [ScholarshipController::class, 'create'])->name('admin.scholarships.create');
    Route::post('/scholarships', [ScholarshipController::class, 'store'])->name('admin.scholarships.store');
    Route::get('/scholarships/{scholarship}', [ScholarshipController::class, 'adminShow'])->name('admin.scholarships.show');
    Route::get('/scholarships/{scholarship}/edit', [ScholarshipController::class, 'edit'])->name('admin.scholarships.edit');
    Route::put('/scholarships/{scholarship}', [ScholarshipController::class, 'update'])->name('admin.scholarships.update');
    Route::delete('/scholarships/{scholarship}', [ScholarshipController::class, 'destroy'])->name('admin.scholarships.destroy');
});
