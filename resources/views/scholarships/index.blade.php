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
        <!-- Scholarship Card Template -->
        <div class="bg-white rounded-lg shadow border border-gray-200 overflow-hidden">
            <div class="p-6">
                <div class="flex justify-between items-start mb-3">
                    <h3 class="font-bold text-lg">Scholarship Title</h3>
                    <span class="bg-blue-100 text-blue-800 text-xs px-2.5 py-0.5 rounded">Open</span>
                </div>
                <p class="text-gray-600 text-sm mb-4">Scholarship description will appear here...</p>
                
                <div class="space-y-3 mb-6">
                    <div class="flex items-center text-sm text-gray-600">
                        <i class="far fa-calendar-alt mr-3"></i>
                        <span class="font-medium">Deadline:</span>
                        <span class="ml-auto">March 15, 2024</span>
                    </div>
                    <div class="flex items-center text-sm text-gray-600">
                        <i class="fas fa-users mr-3"></i>
                        <span class="font-medium">Available Slots:</span>
                        <span class="ml-auto">50</span>
                    </div>
                    <div class="flex items-center text-sm text-gray-600">
                        <i class="fas fa-graduation-cap mr-3"></i>
                        <span class="font-medium">Minimum GPA:</span>
                        <span class="ml-auto">3.0</span>
                    </div>
                </div>

                <div class="space-y-3">
                    <button class="w-full bg-blue-600 text-white py-2.5 rounded-lg font-medium hover:bg-blue-700">
                        Apply Now
                    </button>
                    <button class="w-full border border-gray-300 text-gray-700 py-2.5 rounded-lg hover:bg-gray-50">
                        View Details
                    </button>
                </div>
            </div>
        </div>
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