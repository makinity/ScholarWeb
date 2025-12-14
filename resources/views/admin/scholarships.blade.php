<x-admin>
    <!-- Scholarships Main Content -->
<div class="flex-1 p-6">
    <!-- Header -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Scholarships Management</h1>
            <p class="text-gray-600">Create and manage scholarship programs</p>
        </div>
        <div class="flex space-x-3 mt-4 md:mt-0">
            <a href="{{ route('admin.scholarships.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 flex items-center">
                <i class="fas fa-plus mr-2"></i>Create New Scholarship
            </a>
        </div>
    </div>

    <!-- Active Scholarships Section -->
    <div class="mb-8">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-lg font-semibold text-gray-800">Active Scholarships</h2>
            <span class="text-sm text-gray-500">{{ $total }} scholarships</span>
        </div>

        @foreach($scholarships as $scholarship)
            <div class="bg-white rounded-lg border shadow-sm overflow-hidden hover:shadow-md transition-shadow">
                <div class="p-6">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <span class="inline-block px-3 py-1 text-xs font-semibold rounded-full 
                                        @if($scholarship->category == 'Academic') bg-blue-100 text-blue-800
                                        @elseif($scholarship->category == 'Sports') bg-green-100 text-green-800
                                        @elseif($scholarship->category == 'Financial') bg-purple-100 text-purple-800
                                        @elseif($scholarship->category == 'STEM') bg-red-100 text-red-800
                                        @else bg-gray-100 text-gray-800 @endif">
                                {{ $scholarship->category }}
                            </span>
                            <h3 class="text-lg font-semibold text-gray-800 mt-2">{{ $scholarship->title }}</h3>
                        </div>
                        
                        <!-- Status Badge -->
                        <span class="px-3 py-1 rounded-full text-xs font-medium
                                    @if($scholarship->status == 'active') bg-green-100 text-green-800
                                    @elseif($scholarship->status == 'ending_soon') bg-yellow-100 text-yellow-800
                                    @else bg-red-100 text-red-800 @endif">
                            {{ ucfirst(str_replace('_', ' ', $scholarship->status)) }}
                        </span>
                    </div>
                    
                    <p class="text-gray-600 text-sm mb-6">{{ $scholarship->description }}</p>
                    
                    <div class="grid grid-cols-2 gap-4 mb-6">
                        <div>
                            <p class="text-xs text-gray-500">Applicants</p>
                            <p class="font-semibold">{{ $scholarship->applicants_count }}</p>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500">Award</p>
                            <p class="font-semibold text-green-600">
                                ¥{{ number_format($scholarship->award_amount, 0) }}
                            </p>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500">Deadline</p>
                            <p class="font-semibold">{{ \Carbon\Carbon::parse($scholarship->deadline)->format('M d, Y') }}</p>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500">Type</p>
                            <p class="font-semibold">{{ $scholarship->award_description }}</p>
                        </div>
                    </div>
                    
                    <div class="flex space-x-2">
                        <a href="{{ route('admin.scholarships.show', $scholarship->id) }}" class="flex-1 px-3 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 text-sm text-center">
                            <i class="fas fa-eye mr-1"></i>View Details
                        </a>
                        <a href="{{ route('admin.scholarships.edit', $scholarship->id) }}" 
                        class="flex-1 px-3 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 text-sm text-center">
                            <i class="fas fa-edit mr-1"></i>Edit
                        </a>
                        <form method="POST" action="{{ route('admin.scholarships.destroy', $scholarship->id) }}" 
                            onsubmit="return confirm('Delete this scholarship?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
            

    <!-- Upcoming & Past Scholarships -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Upcoming Scholarships -->
        <div class="bg-white rounded-lg border shadow-sm">
            <div class="p-6 border-b">
                <h2 class="text-lg font-semibold text-gray-800 flex items-center">
                    <i class="fas fa-calendar-alt text-blue-600 mr-2"></i>
                    Upcoming Scholarships
                    <span class="ml-2 text-sm font-normal text-gray-500">(Starts soon)</span>
                </h2>
            </div>
            <div class="p-6">
                <div class="space-y-4">
                    <!-- Upcoming Item 1 -->
                    <div class="flex items-center justify-between p-3 bg-blue-50 rounded-lg">
                        <div>
                            <h4 class="font-medium text-gray-800">Arts & Culture Scholarship</h4>
                            <p class="text-sm text-gray-600">Starts: Mar 1, 2024</p>
                        </div>
                        <button class="px-3 py-1 bg-blue-100 text-blue-700 rounded-lg text-sm hover:bg-blue-200">
                            Preview
                        </button>
                    </div>
                    
                    <!-- Upcoming Item 2 -->
                    <div class="flex items-center justify-between p-3 bg-blue-50 rounded-lg">
                        <div>
                            <h4 class="font-medium text-gray-800">Community Service Grant</h4>
                            <p class="text-sm text-gray-600">Starts: Apr 15, 2024</p>
                        </div>
                        <button class="px-3 py-1 bg-blue-100 text-blue-700 rounded-lg text-sm hover:bg-blue-200">
                            Preview
                        </button>
                    </div>
                    
                    <!-- Upcoming Item 3 -->
                    <div class="flex items-center justify-between p-3 bg-blue-50 rounded-lg">
                        <div>
                            <h4 class="font-medium text-gray-800">Research Fellowship</h4>
                            <p class="text-sm text-gray-600">Starts: Jun 1, 2024</p>
                        </div>
                        <button class="px-3 py-1 bg-blue-100 text-blue-700 rounded-lg text-sm hover:bg-blue-200">
                            Preview
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Past Scholarships -->
        <div class="bg-white rounded-lg border shadow-sm">
            <div class="p-6 border-b">
                <h2 class="text-lg font-semibold text-gray-800 flex items-center">
                    <i class="fas fa-history text-gray-600 mr-2"></i>
                    Past Scholarships
                    <span class="ml-2 text-sm font-normal text-gray-500">(Completed)</span>
                </h2>
            </div>
            <div class="p-6">
                <div class="space-y-4">
                    <!-- Past Item 1 -->
                    <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                        <div>
                            <h4 class="font-medium text-gray-800">Leadership Development Grant 2023</h4>
                            <p class="text-sm text-gray-600">Ended: Dec 15, 2023 • 56 applicants</p>
                        </div>
                        <button class="px-3 py-1 bg-gray-200 text-gray-700 rounded-lg text-sm hover:bg-gray-300">
                            View Report
                        </button>
                    </div>
                    
                    <!-- Past Item 2 -->
                    <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                        <div>
                            <h4 class="font-medium text-gray-800">Innovation Challenge 2023</h4>
                            <p class="text-sm text-gray-600">Ended: Nov 30, 2023 • 42 applicants</p>
                        </div>
                        <button class="px-3 py-1 bg-gray-200 text-gray-700 rounded-lg text-sm hover:bg-gray-300">
                            View Report
                        </button>
                    </div>
                    
                    <!-- Past Item 3 -->
                    <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                        <div>
                            <h4 class="font-medium text-gray-800">Merit-based Scholarship 2023</h4>
                            <p class="text-sm text-gray-600">Ended: Oct 15, 2023 • 89 applicants</p>
                        </div>
                        <button class="px-3 py-1 bg-gray-200 text-gray-700 rounded-lg text-sm hover:bg-gray-300">
                            View Report
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scholarship Statistics -->
    <div class="mt-8 bg-white rounded-lg border shadow-sm">
        <div class="p-6 border-b">
            <h2 class="text-lg font-semibold text-gray-800">Scholarship Statistics</h2>
        </div>
        <div class="p-6">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <div class="text-center p-4 border rounded-lg">
                    <div class="text-3xl font-bold text-blue-600 mb-2">4</div>
                    <p class="text-sm text-gray-600">Active Scholarships</p>
                </div>
                <div class="text-center p-4 border rounded-lg">
                    <div class="text-3xl font-bold text-green-600 mb-2">298</div>
                    <p class="text-sm text-gray-600">Total Applicants</p>
                </div>
                <div class="text-center p-4 border rounded-lg">
                    <div class="text-3xl font-bold text-purple-600 mb-2">₱2.1M</div>
                    <p class="text-sm text-gray-600">Total Award Value</p>
                </div>
                <div class="text-center p-4 border rounded-lg">
                    <div class="text-3xl font-bold text-yellow-600 mb-2">57%</div>
                    <p class="text-sm text-gray-600">Average Approval Rate</p>
                </div>
            </div>
            
            <!-- Scholarship Categories Distribution -->
            <div class="mt-8">
                <h3 class="text-md font-semibold text-gray-800 mb-4">Applications by Scholarship Type</h3>
                <div class="space-y-3">
                    <div>
                        <div class="flex justify-between mb-1">
                            <span class="text-sm">Academic Excellence</span>
                            <span class="text-sm font-medium">78 apps</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="bg-blue-600 h-2 rounded-full" style="width: 42%"></div>
                        </div>
                    </div>
                    <div>
                        <div class="flex justify-between mb-1">
                            <span class="text-sm">Sports Scholarship</span>
                            <span class="text-sm font-medium">42 apps</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="bg-green-600 h-2 rounded-full" style="width: 23%"></div>
                        </div>
                    </div>
                    <div>
                        <div class="flex justify-between mb-1">
                            <span class="text-sm">Financial Assistance</span>
                            <span class="text-sm font-medium">115 apps</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="bg-red-600 h-2 rounded-full" style="width: 62%"></div>
                        </div>
                    </div>
                    <div>
                        <div class="flex justify-between mb-1">
                            <span class="text-sm">STEM Scholars</span>
                            <span class="text-sm font-medium">63 apps</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="bg-purple-600 h-2 rounded-full" style="width: 34%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</x-admin>