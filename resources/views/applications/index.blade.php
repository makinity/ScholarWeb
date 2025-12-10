<x-user>
    <!-- APPLICATION STATUS - student/applications/index.blade.php -->
<div class="p-6">
    <h1 class="text-2xl font-bold mb-6">My Applications</h1>
    
    <!-- Filter Tabs -->
    <div class="flex border-b mb-6">
        <button class="px-4 py-2 border-b-2 border-blue-600 text-blue-600">All (0)</button>
        <button class="px-4 py-2">Pending (0)</button>
        <button class="px-4 py-2">Under Review (0)</button>
        <button class="px-4 py-2">Approved (0)</button>
        <button class="px-4 py-2">Rejected (0)</button>
    </div>

    <!-- Applications List -->
    <div class="space-y-4">
        <!-- Application Card -->
        <div class="bg-white border rounded-lg p-4">
            <div class="flex justify-between items-start">
                <div>
                    <h3 class="font-bold text-lg">Scholarship Name</h3>
                    <p class="text-gray-600 text-sm">Applied: Jan 15, 2024</p>
                </div>
                <span class="px-3 py-1 bg-yellow-100 text-yellow-800 rounded-full text-sm">Pending</span>
            </div>
            
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-4">
                <div>
                    <p class="text-sm text-gray-500">Application ID</p>
                    <p class="font-medium">APP-2024-001</p>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Deadline</p>
                    <p class="font-medium">Feb 28, 2024</p>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Score</p>
                    <p class="font-medium">--/100</p>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Last Updated</p>
                    <p class="font-medium">Jan 20, 2024</p>
                </div>
            </div>
            
            <div class="flex justify-end mt-4 space-x-2">
                <button class="px-4 py-2 border rounded-lg hover:bg-gray-50">View Details</button>
                <button class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Upload More Files</button>
            </div>
        </div>
    </div>
</div>
</x-user>