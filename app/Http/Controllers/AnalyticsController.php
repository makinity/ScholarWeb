<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Applications;
use App\Models\Scholarship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnalyticsController extends Controller
{
    /**
     * Show analytics dashboard
     */
    public function index()
    {
        // Get statistics data
        $stats = $this->getStatistics();
        
        return view('admin.analytics', compact('stats'));
    }
    
    /**
     * Get overall statistics for the cards
     */
    private function getStatistics()
    {
        $totalApplications = Applications::count();
        $pendingApplications = Applications::where('status', 'pending')->count();
        $approvedApplications = Applications::where('status', 'approved')->count();
        $rejectedApplications = Applications::where('status', 'rejected')->count();
        
        // Calculate approval rate
        $approvalRate = 0;
        if ($totalApplications > 0) {
            $approvalRate = ($approvedApplications / $totalApplications) * 100;
        }
        
        // Get average GPA
        $averageGPA = Applications::whereNotNull('gpa')->avg('gpa');
        
        // Get unique schools count
        $uniqueSchools = Applications::distinct('school_name')->count('school_name');
        
        return [
            'total_applications' => $totalApplications,
            'pending_applications' => $pendingApplications,
            'approved_applications' => $approvedApplications,
            'rejected_applications' => $rejectedApplications,
            'approval_rate' => round($approvalRate, 1), // One decimal place
            'average_gpa' => $averageGPA ? round($averageGPA, 2) : 0.00, // Two decimal places
            'unique_schools' => $uniqueSchools,
        ];
    }
    
    /**
     * Get applicants per school data
     */
    public function getApplicantsPerSchool(Request $request)
    {
        $query = Applications::query();
        
        // Apply filters if provided
        if ($request->has('date_range')) {
            $dates = explode(' to ', $request->date_range);
            if (count($dates) == 2) {
                $query->whereBetween('date_applied', [trim($dates[0]), trim($dates[1])]);
            }
        }
        
        if ($request->has('status') && $request->status != 'all') {
            $query->where('status', $request->status);
        }
        
        if ($request->has('grade_level') && $request->grade_level != 'all') {
            $query->where('grade_level', $request->grade_level);
        }
        
        // Get applicants per school
        $schoolData = $query->select([
                'school_name',
                DB::raw('COUNT(*) as total_applicants'),
                DB::raw('SUM(CASE WHEN status = "approved" THEN 1 ELSE 0 END) as approved_count'),
                DB::raw('SUM(CASE WHEN status = "rejected" THEN 1 ELSE 0 END) as rejected_count'),
                DB::raw('SUM(CASE WHEN status = "pending" THEN 1 ELSE 0 END) as pending_count'),
                DB::raw('AVG(gpa) as average_gpa')
            ])
            ->groupBy('school_name')
            ->orderBy('total_applicants', 'desc')
            ->limit(10) // Top 10 schools
            ->get();
        
        return response()->json([
            'schools' => $schoolData->pluck('school_name'),
            'total_applicants' => $schoolData->pluck('total_applicants'),
            'approved_count' => $schoolData->pluck('approved_count'),
            'rejected_count' => $schoolData->pluck('rejected_count'),
            'pending_count' => $schoolData->pluck('pending_count'),
            'average_gpa' => $schoolData->pluck('average_gpa'),
        ]);
    }
    
    /**
     * Get applicants per grade level data
     */
    public function getApplicantsPerGrade(Request $request)
    {
        $query = Applications::query();
        
        // Apply filters
        if ($request->has('date_range')) {
            $dates = explode(' to ', $request->date_range);
            if (count($dates) == 2) {
                $query->whereBetween('date_applied', [trim($dates[0]), trim($dates[1])]);
            }
        }
        
        if ($request->has('status') && $request->status != 'all') {
            $query->where('status', $request->status);
        }
        
        // Get applicants per grade
        $gradeData = $query->select([
                'grade_level',
                DB::raw('COUNT(*) as total_applicants'),
                DB::raw('SUM(CASE WHEN status = "approved" THEN 1 ELSE 0 END) as approved_count'),
                DB::raw('AVG(gpa) as average_gpa')
            ])
            ->groupBy('grade_level')
            ->orderBy('grade_level')
            ->get();
        
        return response()->json([
            'grades' => $gradeData->pluck('grade_level'),
            'total_applicants' => $gradeData->pluck('total_applicants'),
            'approved_count' => $gradeData->pluck('approved_count'),
            'average_gpa' => $gradeData->pluck('average_gpa'),
        ]);
    }
    
    /**
     * Get overall statistics
     */
    public function getOverallStats()
    {
        $totalApplications = Applications::count();
        $pendingApplications = Applications::where('status', 'pending')->count();
        $approvedApplications = Applications::where('status', 'approved')->count();
        $rejectedApplications = Applications::where('status', 'rejected')->count();
        
        $approvalRate = $totalApplications > 0 ? ($approvedApplications / $totalApplications) * 100 : 0;
        $averageGPA = Applications::whereNotNull('gpa')->avg('gpa');
        
        // Get unique schools count
        $uniqueSchools = Applications::distinct('school_name')->count('school_name');
        
        // Get applications per month (last 6 months)
        $monthlyData = Applicatios::select(
                DB::raw('DATE_FORMAT(date_applied, "%Y-%m") as month'),
                DB::raw('COUNT(*) as count')
            )
            ->where('date_applied', '>=', now()->subMonths(6))
            ->groupBy('month')
            ->orderBy('month')
            ->get();
        
        return response()->json([
            'total_applications' => $totalApplications,
            'pending_applications' => $pendingApplications,
            'approved_applications' => $approvedApplications,
            'rejected_applications' => $rejectedApplications,
            'approval_rate' => round($approvalRate, 2),
            'average_gpa' => round($averageGPA, 2),
            'unique_schools' => $uniqueSchools,
            'monthly_data' => $monthlyData,
        ]);
    }
    
    /**
     * Get school performance rankings
     */
    public function getSchoolPerformance(Request $request)
    {
        $query = Applications::whereNotNull('gpa');
        
        if ($request->has('min_applicants')) {
            $query->havingRaw('COUNT(*) >= ?', [$request->min_applicants]);
        }
        
        $schoolPerformance = $query->select([
                'school_name',
                DB::raw('COUNT(*) as total_applicants'),
                DB::raw('AVG(gpa) as average_gpa'),
                DB::raw('SUM(CASE WHEN status = "approved" THEN 1 ELSE 0 END) as approved_count'),
                DB::raw('ROUND((SUM(CASE WHEN status = "approved" THEN 1 ELSE 0 END) / COUNT(*)) * 100, 2) as approval_rate')
            ])
            ->groupBy('school_name')
            ->orderBy('average_gpa', 'desc')
            ->limit(10)
            ->get();
        
        return response()->json($schoolPerformance);
    }
}