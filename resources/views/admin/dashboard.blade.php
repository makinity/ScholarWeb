<!-- resources/views/admin/dashboard.blade.php -->
<x-admin>
<div class="p-6">
    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-2xl font-bold text-gray-800">Admin Dashboard</h1>
        <p class="text-gray-600">Welcome back, Administrator</p>
    </div>

    <!-- Quick Stats -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <!-- Total Applications -->
        <div class="bg-white rounded-lg shadow border border-gray-200 p-6">
            <div class="flex items-center">
                <div class="p-3 bg-blue-100 rounded-lg mr-4">
                    <i class="fas fa-file-alt text-blue-600 text-xl"></i>
                </div>
                <div>
                    <p class="text-sm text-gray-600">Total Applications</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $totalApplications }}</p>
                </div>
            </div>
        </div>
        
        <!-- Pending Review -->
        <div class="bg-white rounded-lg shadow border border-gray-200 p-6">
            <div class="flex items-center">
                <div class="p-3 bg-yellow-100 rounded-lg mr-4">
                    <i class="fas fa-clock text-yellow-600 text-xl"></i>
                </div>
                <div>
                    <p class="text-sm text-gray-600">Pending Review</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $pendingApplications }}</p>
                </div>
            </div>
        </div>
        
        <!-- Approved -->
        <div class="bg-white rounded-lg shadow border border-gray-200 p-6">
            <div class="flex items-center">
                <div class="p-3 bg-green-100 rounded-lg mr-4">
                    <i class="fas fa-check-circle text-green-600 text-xl"></i>
                </div>
                <div>
                    <p class="text-sm text-gray-600">Approved</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $approvedApplications }}</p>
                </div>
            </div>
        </div>
        
        <!-- Rejected -->
        <div class="bg-white rounded-lg shadow border border-gray-200 p-6">
            <div class="flex items-center">
                <div class="p-3 bg-red-100 rounded-lg mr-4">
                    <i class="fas fa-times-circle text-red-600 text-xl"></i>
                </div>
                <div>
                    <p class="text-sm text-gray-600">Rejected</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $rejectedApplications }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts Row -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
        <!-- Applications by Status Chart -->
        <div class="bg-white rounded-lg shadow border border-gray-200 p-6">
            <h3 class="font-bold text-gray-800 mb-4">Applications by Status</h3>
            <div class="h-64">
                <canvas id="statusChart"></canvas>
            </div>
        </div>
        
        <!-- Applications by School Chart -->
        <div class="bg-white rounded-lg shadow border border-gray-200 p-6">
            <h3 class="font-bold text-gray-800 mb-4">Top Schools by Applications</h3>
            <div class="h-64">
                <canvas id="schoolChart"></canvas>
            </div>
        </div>
    </div>

    <!-- Recent Applications -->
    <div class="bg-white rounded-lg shadow border border-gray-200 p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-bold text-gray-800">Recent Applications</h2>
            <a href="{{ route('admin.applications') }}" class="text-blue-600 hover:text-blue-800 font-medium">
                View All →
            </a>
        </div>
        
        @if($recentApplications->count() > 0)
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-700">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th class="px-4 py-3">Student Name</th>
                        <th class="px-4 py-3">School</th>
                        <th class="px-4 py-3">Grade Level</th>
                        <th class="px-4 py-3">Date Applied</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3">GPA</th>
                        <th class="px-4 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($recentApplications as $application)
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <td class="px-4 py-3 font-medium">{{ $application->full_name }}</td>
                        <td class="px-4 py-3">{{ Str::limit($application->school_name, 20) }}</td>
                        <td class="px-4 py-3">{{ $application->grade_level }}</td>
                        <td class="px-4 py-3">
                            @if($application->date_applied)
                                {{ \Carbon\Carbon::parse($application->date_applied)->format('M d, Y') }}
                            @else
                                {{ \Carbon\Carbon::parse($application->created_at)->format('M d, Y') }}
                            @endif
                        </td>
                        <td class="px-4 py-3">
                            @php
                                $statusColors = [
                                    'pending' => 'bg-yellow-100 text-yellow-800',
                                    'approved' => 'bg-green-100 text-green-800',
                                    'rejected' => 'bg-red-100 text-red-800'
                                ];
                            @endphp
                            <span class="px-3 py-1 {{ $statusColors[$application->status] ?? 'bg-gray-100 text-gray-800' }} rounded-full text-xs">
                                {{ ucfirst($application->status) }}
                            </span>
                        </td>
                        <td class="px-4 py-3">
                            @if($application->gpa)
                                <span class="font-medium">{{ number_format($application->gpa, 2) }}</span>
                            @else
                                <span class="text-gray-400">--</span>
                            @endif
                        </td>
                        <td class="px-4 py-3">
                            <a href="{{ route('admin.application-reviews') }}" class="text-blue-600 hover:text-blue-800 mr-3">Review</a>
                            <a href="#" class="text-gray-600 hover:text-gray-800">View</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <div class="text-center py-8 text-gray-500">
            <i class="fas fa-file-alt text-4xl mb-3"></i>
            <p>No applications found</p>
        </div>
        @endif
    </div>
</div>

<!-- Add Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
// Initialize charts when the page loads
document.addEventListener('DOMContentLoaded', function() {
    // Applications by Status Chart
    const statusCtx = document.getElementById('statusChart').getContext('2d');
    const statusChart = new Chart(statusCtx, {
        type: 'doughnut',
        data: {
            labels: ['Pending', 'Approved', 'Rejected'],
            datasets: [{
                data: [
                    {{ $applicationsByStatus['pending'] }},
                    {{ $applicationsByStatus['approved'] }},
                    {{ $applicationsByStatus['rejected'] }}
                ],
                backgroundColor: [
                    'rgba(245, 158, 11, 0.7)',  // Yellow for pending
                    'rgba(34, 197, 94, 0.7)',   // Green for approved
                    'rgba(239, 68, 68, 0.7)'    // Red for rejected
                ],
                borderColor: [
                    'rgb(245, 158, 11)',
                    'rgb(34, 197, 94)',
                    'rgb(239, 68, 68)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom',
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            const label = context.label || '';
                            const value = context.raw || 0;
                            const total = {{ $totalApplications }};
                            const percentage = total > 0 ? ((value / total) * 100).toFixed(1) : 0;
                            return `${label}: ${value} (${percentage}%)`;
                        }
                    }
                }
            }
        }
    });

    // Applications by School Chart
    const schoolCtx = document.getElementById('schoolChart').getContext('2d');
    const schoolChart = new Chart(schoolCtx, {
        type: 'bar',
        data: {
            labels: [
                @foreach($applicationsBySchool as $schoolData)
                    '{{ Str::limit($schoolData->school_name, 15) }}',
                @endforeach
            ],
            datasets: [{
                label: 'Applications',
                data: [
                    @foreach($applicationsBySchool as $schoolData)
                        {{ $schoolData->count }},
                    @endforeach
                ],
                backgroundColor: 'rgba(59, 130, 246, 0.7)',
                borderColor: 'rgb(59, 130, 246)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Number of Applications'
                    }
                },
                x: {
                    ticks: {
                        maxRotation: 45,
                        minRotation: 45
                    }
                }
            }
        }
    });
});
</script>

</x-admin>