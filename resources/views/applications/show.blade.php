<x-user>
    <!-- APPLICATION DETAILS - student/applications/show.blade.php -->
<div class="p-6">
    <!-- Header with Back Button -->
    <div class="flex items-center mb-6">
        <button class="mr-4 text-gray-600 hover:text-gray-800">
            <i class="fas fa-arrow-left"></i>
        </button>
        <div>
            <h1 class="text-2xl font-bold">Application Details</h1>
            <p class="text-gray-600">Application ID: APP-2024-001</p>
        </div>
    </div>

    <!-- Status Banner -->
    <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 mb-6">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="font-bold text-lg">Academic Excellence Scholarship</h2>
                <p class="text-gray-600">Applied on Jan 15, 2024</p>
            </div>
            <span class="px-4 py-2 bg-yellow-100 text-yellow-800 rounded-full font-medium">Under Review</span>
        </div>
    </div>

    <!-- Requirements Checklist -->
    <div class="bg-white border rounded-lg p-6 mb-6">
        <h3 class="font-bold text-lg mb-4">Requirements Status</h3>
        <div class="space-y-3">
            <div class="flex items-center justify-between p-3 bg-green-50 border border-green-200 rounded">
                <div class="flex items-center">
                    <i class="fas fa-check-circle text-green-600 mr-3"></i>
                    <span>Transcript of Records</span>
                </div>
                <span class="text-sm text-green-600">Verified</span>
            </div>
            <div class="flex items-center justify-between p-3 bg-yellow-50 border border-yellow-200 rounded">
                <div class="flex items-center">
                    <i class="fas fa-clock text-yellow-600 mr-3"></i>
                    <span>Valid ID</span>
                </div>
                <span class="text-sm text-yellow-600">Pending Review</span>
            </div>
            <div class="flex items-center justify-between p-3 bg-red-50 border border-red-200 rounded">
                <div class="flex items-center">
                    <i class="fas fa-times-circle text-red-600 mr-3"></i>
                    <span>Certificate of Good Moral</span>
                </div>
                <span class="text-sm text-red-600">Rejected - Needs clearer copy</span>
            </div>
        </div>
    </div>

    <!-- Upload More Files -->
    <div class="bg-white border rounded-lg p-6 mb-6">
        <h3 class="font-bold text-lg mb-4">Upload Missing Requirements</h3>
        <div class="border-2 border-dashed border-gray-300 rounded-lg p-8 text-center">
            <i class="fas fa-cloud-upload-alt text-gray-400 text-4xl mb-4"></i>
            <p class="text-gray-600 mb-2">Drag and drop files here</p>
            <p class="text-sm text-gray-500 mb-4">or click to browse</p>
            <button class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                Select Files
            </button>
        </div>
    </div>

    <!-- Score Preview (if available) -->
    <div class="bg-white border rounded-lg p-6">
        <h3 class="font-bold text-lg mb-4">Scoring Summary</h3>
        <div class="space-y-4">
            <div class="flex justify-between items-center">
                <span>Academic Performance</span>
                <span class="font-bold">35/40</span>
            </div>
            <div class="flex justify-between items-center">
                <span>Essay Quality</span>
                <span class="font-bold">25/30</span>
            </div>
            <div class="flex justify-between items-center">
                <span>Financial Need</span>
                <span class="font-bold">15/20</span>
            </div>
            <div class="border-t pt-4">
                <div class="flex justify-between items-center font-bold text-lg">
                    <span>Total Score</span>
                    <span>75/100</span>
                </div>
            </div>
        </div>
    </div>
</div>
</x-user>