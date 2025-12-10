<x-user>
<!-- STUDENT DASHBOARD - resources/views/student/dashboard.blade.php -->
<div class="p-6">
    <!-- Page Header -->
    <div class="mb-8">
        <h1 class="text-2xl font-bold text-gray-800">Student Dashboard</h1>
        <p class="text-gray-600">Welcome message here</p>
    </div>

    <!-- Quick Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-white rounded-lg shadow border border-gray-200 p-6">
            <div class="flex items-center">
                <div class="p-3 bg-blue-100 rounded-lg mr-4">
                    <i class="fas fa-file-alt text-blue-600 text-xl"></i>
                </div>
                <div>
                    <p class="text-sm text-gray-600">Active Applications</p>
                    <p class="text-2xl font-bold">0</p>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-lg shadow border border-gray-200 p-6">
            <div class="flex items-center">
                <div class="p-3 bg-green-100 rounded-lg mr-4">
                    <i class="fas fa-check-circle text-green-600 text-xl"></i>
                </div>
                <div>
                    <p class="text-sm text-gray-600">Approved</p>
                    <p class="text-2xl font-bold">0</p>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-lg shadow border border-gray-200 p-6">
            <div class="flex items-center">
                <div class="p-3 bg-yellow-100 rounded-lg mr-4">
                    <i class="fas fa-clock text-yellow-600 text-xl"></i>
                </div>
                <div>
                    <p class="text-sm text-gray-600">Pending Review</p>
                    <p class="text-2xl font-bold">0</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Applications Table -->
    <div class="bg-white rounded-lg shadow border border-gray-200 p-6">
        <h2 class="text-xl font-bold text-gray-800 mb-6">Recent Applications</h2>
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-700">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th class="px-4 py-3">Scholarship Name</th>
                        <th class="px-4 py-3">Date Applied</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Application rows will go here -->
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <td class="px-4 py-3">Sample Scholarship</td>
                        <td class="px-4 py-3">Jan 15, 2024</td>
                        <td class="px-4 py-3">
                            <span class="px-3 py-1 bg-yellow-100 text-yellow-800 rounded-full text-xs">Pending</span>
                        </td>
                        <td class="px-4 py-3">
                            <button class="text-blue-600 hover:text-blue-800">View Details</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Available Scholarships -->
    <div class="bg-white rounded-lg shadow border border-gray-200 p-6 mt-6">
        <h2 class="text-xl font-bold text-gray-800 mb-6">Available Scholarships</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Scholarship cards will go here -->
            <div class="border border-gray-200 rounded-lg p-5 hover:shadow-md">
                <h3 class="font-bold text-lg mb-2">Academic Excellence Scholarship</h3>
                <p class="text-gray-600 text-sm mb-4">Description will go here...</p>
                <div class="flex justify-between items-center">
                    <span class="text-sm text-gray-500">Deadline: Feb 28</span>
                    <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                        Apply Now
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
</x-user>