<?php

namespace App\Http\Controllers;
use App\Models\Scholarship;
use App\Models\Applications;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function create(Scholarship $scholarship)
    {
        // Optional: Perform a quick check to prevent deep-linking to closed applications
        if ($scholarship->status == 'closed' || $scholarship->deadline < now()) {
            return redirect()->route('scholarships.browse')
                ->with('error', 'This scholarship is no longer accepting applications.');
        }

        // Pass the scholarship data to the form view so you can display the 
        // scholarship's title and ID within the form.
        return view('scholarships.application_form', compact('scholarship'));
    }

    public function store(Request $request)
    {
        // 1. Check Login Status
        if (!auth()->check()) {
             return redirect()->route('login')->with('error', 'Please log in to submit your application.');
        }
        
        // 2. Validate Application Data
        // These fields must match the 'name' attributes in your Blade application form.
        $validated = $request->validate([
            // Hidden field containing the scholarship ID
            'scholarship_id' => 'required|exists:scholarships,id', 
            
            // Student-entered data
            'full_name' => 'required|string|max:255',
            'birthday' => 'required|date|before:today', 
            'address' => 'required|string|max:500',
            'contact_number' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'school_name' => 'required|string|max:255',
            'grade_level' => 'required|string|max:50',
            'gpa' => 'required|numeric|min:0.0|max:4.0',

            'grade_file' => 'required|mimes:pdf,jpg,jpeg,png',
        ]);

        $grade = $request->grade_file->store('grades');

        $scholarshipId = $validated['scholarship_id'];

        // 3. Final Duplicate Check (A last-minute check before creation)
        $existingApplication = Applications::where('user_id', auth()->id())
            ->where('scholarship_id', $scholarshipId)
            ->first();
            
        if ($existingApplication) {
            // Redirect the user to their application list/dashboard
            return redirect()->route('student.applications.dashboard') 
                ->with('error', 'You have already submitted an application for this scholarship.');
        }
        
        // 4. Create the Application Record
        Applications::create(array_merge($validated, [
            'user_id' => auth()->id(),         // Get current logged-in user ID
            'date_applied' => now(),           // Record the time of application
            'status' => 'pending',             // Set initial status for admin review
        ]));
        
        // 5. Success Response
        return redirect()->route('scholarships.browse') 
            ->with('success', 'Your application has been successfully submitted and is now pending review.');
    }

    public function list(){
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Please log in to view your applications.');
        }

        $applications = Applications::with('scholarship')
            ->where('user_id', auth()->id()) // Filter by the current user's ID
            ->latest() // Order by most recent application first
            ->get();

        return view('applications.index', compact('applications'));
    }

    public function index()
    {
        // Paginate real data
        $applications = Applications::latest()->paginate(10);
        $pending = Applications::where('status', 'pending')->count();
        $approved = Applications::where('status', 'approved')->count();
        $rejected = Applications::where('status', 'rejected')->count();

        return view('admin.applications', compact('applications', 'pending', 'approved', 'rejected'));
    }

    public function approve($id)
    {
        $application = Applications::findOrFail($id);

        $application->update([
            'status' => 'approved'
        ]);

        return back()->with('success', 'Application approved successfully!');
    }

    public function reject($id)
    {
        $application = Applications::findOrFail($id);

        $application->update([
            'status' => 'rejected'
        ]);

        return back()->with('error', 'Application rejected.');
    }



}
