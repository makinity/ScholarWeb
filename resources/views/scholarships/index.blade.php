<x-user>
    <!-- SCHOLARSHIPS LIST - resources/views/student/scholarships/index.blade.php -->
<div class="p-6">
    <!-- Page Header -->
    <div class="mb-8">
        <h1 class="text-2xl font-bold text-gray-800">Available Scholarships</h1>
        <p class="text-gray-600">Browse and apply for scholarships</p>
    </div>

    <!-- Search and Filters -->
    <div class="bg-white rounded-lg shadow border border-gray-200 p-4 mb-6">
        <div class="flex flex-col md:flex-row gap-4">
            <div class="flex-1">
                <div class="relative">
                    <input type="text" 
                           placeholder="Search scholarships..." 
                           class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg">
                    <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                </div>
            </div>
            <div class="flex gap-4">
                <select class="border border-gray-300 rounded-lg px-4 py-2">
                    <option>All Categories</option>
                </select>
                <select class="border border-gray-300 rounded-lg px-4 py-2">
                    <option>Sort by</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Scholarships Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

        @foreach($scholarships as $scholarship)
            <div class="bg-white rounded-lg shadow border border-gray-200 overflow-hidden hover:shadow-md transition-shadow">
                <div class="p-5">
                    <!-- Category & Status -->
                    <div class="flex justify-between items-start mb-3">
                        <span class="px-2.5 py-1 bg-blue-50 text-blue-700 text-xs font-medium rounded">
                            {{ $scholarship->category }}
                        </span>
                        <span class="text-xs font-medium px-2 py-1 rounded 
                            @if($scholarship->status == 'active') bg-green-100 text-green-800
                            @elseif($scholarship->status == 'ending_soon') bg-yellow-100 text-yellow-800
                            @else bg-gray-100 text-gray-800 @endif">
                            {{ ucfirst(str_replace('_', ' ', $scholarship->status)) }}
                        </span>
                    </div>
                    
                    <!-- Title -->
                    <h3 class="font-bold text-gray-900 mb-2 line-clamp-1">{{ $scholarship->title }}</h3>
                    
                    <!-- Description -->
                    <p class="text-gray-600 text-sm mb-4 line-clamp-2">{{ $scholarship->description }}</p>
                    
                    <!-- Key Info -->
                    <div class="grid grid-cols-2 gap-3 mb-4">
                        <div>
                            <p class="text-xs text-gray-500">Award</p>
                            <p class="font-semibold text-green-600">¥{{ number_format($scholarship->award_amount, 0) }}</p>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500">Deadline</p>
                            <p class="font-semibold">{{ \Carbon\Carbon::parse($scholarship->deadline)->format('M d') }}</p>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500">Type</p>
                            <p class="font-semibold text-sm">{{ $scholarship->award_description }}</p>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500">Applicants</p>
                            <p class="font-semibold">{{ $scholarship->applications()->count() }}</p>
                        </div>
                    </div>
                    
                    <!-- Actions -->
                    <div class="flex space-x-2">
                        <a href="{{ route('view.details', $scholarship) }}" 
                        class="flex-1 px-3 py-2 border border-gray-300 text-gray-700 rounded text-sm text-center hover:bg-gray-50">
                            Details
                        </a>
                        @if($scholarship->status !== 'closed' && $scholarship->deadline > now())
                            <a href="{{ route('applications.create', $scholarship) }}" 
                            class="flex-1 px-3 py-2 bg-blue-600 text-white rounded text-sm text-center hover:bg-blue-700">
                                Apply
                            </a>
                        @else
                            <button class="flex-1 px-3 py-2 bg-gray-200 text-gray-500 rounded text-sm cursor-not-allowed" disabled>
                                Closed
                            </button>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
        <!-- End Scholarship Card -->
    </div>

    <!-- Empty State -->
    <div class="bg-white rounded-lg shadow border border-gray-200 p-12 text-center mt-8 hidden">
        <i class="fas fa-graduation-cap text-gray-300 text-5xl mb-4"></i>
        <h3 class="text-xl font-bold text-gray-700 mb-2">No Scholarships Available</h3>
        <p class="text-gray-600">Check back later for opportunities.</p>
    </div>
</div>
</x-user>