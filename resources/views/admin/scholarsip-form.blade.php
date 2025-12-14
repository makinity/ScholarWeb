<x-admin>
    <!-- Simple Add Scholarship Form -->
<form method="POST" action="{{ route('admin.scholarships.store') }}" class="space-y-4">
    @csrf
    
    <!-- Title -->
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Scholarship Title *</label>
        <input type="text" name="title" required 
               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500" 
               placeholder="e.g., Academic Excellence Scholarship">
    </div>
    
    <!-- Category -->
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Category *</label>
        <select name="category" required 
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            <option value="">Select Category</option>
            <option value="Academic">Academic</option>
            <option value="Sports">Sports</option>
            <option value="Financial">Financial Assistance</option>
            <option value="STEM">STEM</option>
        </select>
    </div>
    
    <!-- Description -->
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Description *</label>
        <textarea name="description" rows="3" required 
                  class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                  placeholder="Brief description of the scholarship"></textarea>
    </div>
    
    <!-- Award Amount -->
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Award Amount *</label>
        <div class="flex">
            <span class="px-3 py-2 bg-gray-100 border border-r-0 border-gray-300 rounded-l-md">¥</span>
            <input type="number" name="award_amount" step="0.01" min="0" required 
                   class="flex-1 px-3 py-2 border border-gray-300 rounded-r-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                   placeholder="50000">
        </div>
    </div>
    
    <!-- Award Description -->
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Award Description *</label>
        <input type="text" name="award_description" required 
               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
               placeholder="e.g., ¥50,000/year, Full Tuition, ¥25,000/sem">
    </div>
    
    <!-- Deadline -->
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Application Deadline *</label>
        <input type="date" name="deadline" required 
               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
    </div>

    <!-- Form Actions -->
    <div class="flex justify-end space-x-3 pt-4 border-t border-gray-200">
        <button type="button" 
                onclick="window.history.back()" 
                class="px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
            Cancel
        </button>
        <button type="submit" 
                class="px-4 py-2 bg-blue-600 border border-transparent rounded-md text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
            Create Scholarship
        </button>
    </div>
</form>
</x-admin>