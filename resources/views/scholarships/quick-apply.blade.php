<x-user>
   <div class="p-6 max-w-2xl mx-auto">
    <!-- Page Header -->
    <div class="mb-8">
        <h1 class="text-2xl font-bold text-gray-800 mb-2">Quick Apply here in Online Form</h1>
        <p class="text-gray-600">Fill out this simple form to apply for scholarships quickly.</p>
    </div>

    <!-- Scholarship Selection -->
    <div class="bg-white border border-gray-200 rounded-lg p-6 mb-6">
        <h3 class="font-bold text-gray-800 mb-4">1. Select Scholarship</h3>
        <div class="relative">
            <select class="w-full border border-gray-300 rounded-lg p-3">
                <option value="">-- Select a Scholarship --</option>
                <option value="academic">Academic Excellence Scholarship</option>
                <option value="stem">STEM Scholarship</option>
                <option value="need">Financial Need Scholarship</option>
                <option value="athletic">Athletic Scholarship</option>
            </select>
            <i class="fas fa-chevron-down absolute right-3 top-4 text-gray-400"></i>
        </div>
    </div>

    <!-- Personal Information -->
    <div class="bg-white border border-gray-200 rounded-lg p-6 mb-6">
        <h3 class="font-bold text-gray-800 mb-4">2. Personal Information</h3>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                <input type="text" class="w-full border border-gray-300 rounded-lg p-3">
            </div>
            
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                <input type="email" class="w-full border border-gray-300 rounded-lg p-3">
            </div>
            
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Phone Number</label>
                <input type="tel" class="w-full border border-gray-300 rounded-lg p-3">
            </div>
            
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Date of Birth</label>
                <input type="date" class="w-full border border-gray-300 rounded-lg p-3">
            </div>
        </div>
    </div>

    <!-- Education Information -->
    <div class="bg-white border border-gray-200 rounded-lg p-6 mb-6">
        <h3 class="font-bold text-gray-800 mb-4">3. Education Details</h3>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">School/University</label>
                <input type="text" class="w-full border border-gray-300 rounded-lg p-3" placeholder="Enter school name">
            </div>
            
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Course/Program</label>
                <input type="text" class="w-full border border-gray-300 rounded-lg p-3" placeholder="e.g., Computer Science">
            </div>
            
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Year Level</label>
                <select class="w-full border border-gray-300 rounded-lg p-3">
                    <option value="">Select Year</option>
                    <option value="1">1st Year</option>
                    <option value="2">2nd Year</option>
                    <option value="3">3rd Year</option>
                    <option value="4">4th Year</option>
                    <option value="5">5th Year</option>
                </select>
            </div>
            
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Current GPA</label>
                <input type="number" step="0.01" class="w-full border border-gray-300 rounded-lg p-3" placeholder="e.g., 3.5">
            </div>
        </div>
    </div>

    <!-- Short Essay -->
    <div class="bg-white border border-gray-200 rounded-lg p-6 mb-6">
        <h3 class="font-bold text-gray-800 mb-4">4. Short Statement (Optional)</h3>
        <p class="text-sm text-gray-600 mb-3">Briefly explain why you deserve this scholarship (max 200 words)</p>
        <textarea rows="4" class="w-full border border-gray-300 rounded-lg p-3"></textarea>
        <p class="text-xs text-gray-500 mt-2">Words: <span id="wordCount">0</span>/200</p>
    </div>

    <!-- Document Upload -->
    <div class="bg-white border border-gray-200 rounded-lg p-6 mb-8">
        <h3 class="font-bold text-gray-800 mb-4">5. Upload Documents</h3>
        
        <!-- Transcript Upload -->
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-2">Transcript of Records (Required)</label>
            <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center">
                <i class="fas fa-file-pdf text-red-500 text-3xl mb-3"></i>
                <p class="text-gray-600 mb-2">Click to upload or drag and drop</p>
                <p class="text-sm text-gray-500 mb-3">PDF format only, max 5MB</p>
                <button type="button" class="px-4 py-2 bg-gray-100 rounded-lg hover:bg-gray-200">
                    Choose File
                </button>
            </div>
        </div>
        
        <!-- Optional Upload -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Other Supporting Documents (Optional)</label>
            <div class="border-2 border-dashed border-gray-300 rounded-lg p-4 text-center">
                <i class="fas fa-cloud-upload-alt text-gray-400 text-2xl mb-2"></i>
                <p class="text-sm text-gray-600">You can upload more files later</p>
            </div>
        </div>
    </div>

    <!-- Submit Button -->
    <div class="text-center">
        <button type="submit" class="px-8 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 font-medium text-lg">
            Submit Application
        </button>
        <p class="text-sm text-gray-500 mt-3">You will receive a confirmation email after submission.</p>
    </div>
</div>

<!-- Word Count Script -->
<script>
document.querySelector('textarea').addEventListener('input', function() {
    const wordCount = this.value.trim().split(/\s+/).filter(word => word.length > 0).length;
    document.getElementById('wordCount').textContent = wordCount;
});
</script>

</x-user>