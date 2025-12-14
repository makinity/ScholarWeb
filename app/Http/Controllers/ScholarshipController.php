<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Scholarship;
use App\Models\Applications;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ScholarshipController extends Controller
{
    /**
     * Show the form for creating a new scholarship
     */
    public function create()
    {
        return view('admin.scholarsip-form');
    }

    public function store(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'category' => 'required|string|in:Academic,Sports,Financial,STEM',
            'description' => 'required|string|min:10',
            'award_amount' => 'required|numeric|min:0',
            'award_description' => 'required|string|max:255',
            'deadline' => 'required|date|after:today',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Create the scholarship
        $scholarship = Scholarship::create([
            'title' => $request->title,
            'category' => $request->category,
            'description' => $request->description,
            'award_amount' => $request->award_amount,
            'award_description' => $request->award_description,
            'deadline' => $request->deadline,
            'status' => 'active', 
            'applicants_count' => 0,
        ]);

        $scholarship->updateStatus();

        

        return redirect()->route('admin.scholarship')
            ->with('success', 'Scholarship created successfully!');
    }

    public function adminShow(Scholarship $scholarship)
    {
        // The $scholarship variable already contains the correct model instance, 
        // so we just pass it to the view.
        return view('admin.scholarships-show', compact('scholarship'));
    }

    public function details(Scholarship $scholarship)
    {
        // The $scholarship variable already contains the correct model instance, 
        // so we just pass it to the view.
        return view('scholarships.details', compact('scholarship'));
    }

    /**
     * Display a listing of scholarships
     */
    public function index()
    {
        $scholarships = Scholarship::latest()->get();

        $total = $scholarships->count();
        
        // Update status for all scholarships (optional - can be done via cron job)
        foreach ($scholarships as $scholarship) {
            $scholarship->updateStatus();
        }
        
        return view('admin.scholarships', compact('scholarships', 'total'));
    }

    /**
     * Show the form for editing the specified scholarship
     */
    public function edit(Scholarship $scholarship)
    {
        return view('admin.scholarships-edit', compact('scholarship'));
    }

    public function update(Request $request, Scholarship $scholarship)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'string|max:255',
            'category' => 'string|in:Academic,Sports,Financial,STEM',
            'description' => 'string|min:10',
            'award_amount' => 'numeric|min:0',
            'award_description' => 'string|max:255',
            'deadline' => 'date',
            'status' => 'in:active,ending_soon,closed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $scholarship->update([
            'title' => $request->title,
            'category' => $request->category,
            'description' => $request->description,
            'award_amount' => $request->award_amount,
            'award_description' => $request->award_description,
            'deadline' => $request->deadline,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.scholarship')
            ->with('success', 'Scholarship updated successfully!');
    }

    /**
     * Remove the specified scholarship from storage
     */
    public function destroy(Scholarship $scholarship)
    {
        $scholarship->delete();

        return redirect()->route('admin.scholarship')
            ->with('success', 'Scholarship deleted successfully!');
    }

    public function browse(Request $request)
    {
       $query = Scholarship::query()->withCount('applications');
        
        // Filter by category if selected
        if ($request->has('category') && $request->category != 'all') {
            $query->where('category', $request->category);
        }
        
        // Filter by status - only show active or ending soon scholarships to students
        $query->whereIn('status', ['active', 'ending_soon']);
        
        // Ensure deadline hasn't passed
        $query->where('deadline', '>=', now()->format('Y-m-d'));
        
        // Search by title
        if ($request->has('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }
        
        $scholarships = $query->latest()->paginate(12);
        
        // Get all categories for filter
        $categories = Scholarship::distinct()->pluck('category');
        
        return view('scholarships.index', compact('scholarships', 'categories'));
    }
    
    /**
     * Show single scholarship details for students
     */
    public function view(Scholarship $scholarship)
    {
        // Check if scholarship is available for viewing
        if ($scholarship->status == 'closed' || $scholarship->deadline < now()) {
            abort(404, 'This scholarship is no longer available.');
        }
        
        // Check if user has already applied
        $hasApplied = false;
        if (auth()->check()) {
            $hasApplied = Application::where('user_id', auth()->id())
                ->where('scholarship_id', $scholarship->id)
                ->exists();
        }
        
        return view('scholarships.show', compact('scholarship', 'hasApplied'));
    }
    
    /**
     * Handle scholarship application
     */
    // app/Http/Controllers/ScholarshipController.php

    public function apply(Request $request, Scholarship $scholarship)
    {
        // 1. Pre-Application Checks (Your existing logic - which is great!)
        
        // Check if scholarship is still open
        if ($scholarship->status == 'closed' || $scholarship->deadline < now()) {
            return back()->with('error', 'This scholarship is no longer accepting applications.');
        }
        
        // Check if user has already applied
        // NOTE: This assumes the user is logged in (auth()->id())
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Please log in to apply for a scholarship.');
        }
        
        $existingApplication = Applications::where('user_id', auth()->id())
            ->where('scholarship_id', $scholarship->id)
            ->first();
            
        if ($existingApplication) {
            return back()->with('error', 'You have already applied for this scholarship.');
        }
        
        // 2. Validate Application Data
        // We validate the fields listed in your Application model's $fillable array.
        $validated = $request->validate([
            'fullname' => 'required|string|max:255',
            'birthday' => 'required|date|before:today', // Birthday must be in the past
            'address' => 'required|string|max:500',
            'contact_number' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'school_name' => 'required|string|max:255',
            'grade_level' => 'required|string|max:50',
            'gpa' => 'required|numeric|min:0.0|max:4.0', // Assuming a 4.0 scale for example
            // You would add fields for documents/essays here if required.
        ]);
        
        // 3. Create the Application Record
        try {
            Applications::create(array_merge($validated, [
                'user_id' => auth()->id(), // Current logged-in user
                'scholarship_id' => $scholarship->id,
                'date_applied' => now(),
                'status' => 'pending', // Set initial status
            ]));

            $scholarship->increment('applicants_count');
            
            // 4. Success Response
            return redirect()->route('student.applications.dashboard') // Redirect to the student's dashboard/application list
                ->with('success', 'Your application for the ' . $scholarship->title . ' has been successfully submitted!');
                
        } catch (\Exception $e) {
            // Log the error
            \Log::error('Scholarship application failed: ' . $e->getMessage());
            return back()->with('error', 'An unexpected error occurred during application submission. Please try again.');
        }
    }
}