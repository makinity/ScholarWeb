<x-admin>
    <!-- Edit Scholarship Form -->
<div class="bg-white rounded-lg shadow p-6">
    <form method="POST" action="{{ route('admin.scholarships.update', $scholarship->id) }}" class="space-y-4">
        @csrf
        @method('PUT')
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <!-- Title -->
            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-1">Scholarship Title</label>
                <input type="text" name="title" value="{{ $scholarship->title }}" required 
                       class="w-full px-3 py-2 border border-gray-300 rounded-md">
            </div>
            
            <!-- Category -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Category</label>
                <select name="category" required class="w-full px-3 py-2 border border-gray-300 rounded-md">
                    <option value="Academic" {{ $scholarship->category == 'Academic' ? 'selected' : '' }}>Academic</option>
                    <option value="Sports" {{ $scholarship->category == 'Sports' ? 'selected' : '' }}>Sports</option>
                    <option value="Financial" {{ $scholarship->category == 'Financial' ? 'selected' : '' }}>Financial Assistance</option>
                    <option value="STEM" {{ $scholarship->category == 'STEM' ? 'selected' : '' }}>STEM</option>
                </select>
            </div>
            
            <!-- Status -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                <select name="status" required class="w-full px-3 py-2 border border-gray-300 rounded-md">
                    <option value="active" {{ $scholarship->status == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="ending_soon" {{ $scholarship->status == 'ending_soon' ? 'selected' : '' }}>Ending Soon</option>
                    <option value="closed" {{ $scholarship->status == 'closed' ? 'selected' : '' }}>Closed</option>
                </select>
            </div>
            
            <!-- Award Amount -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Award Amount</label>
                <div class="flex">
                    <span class="px-3 py-2 bg-gray-100 border border-r-0">¥</span>
                    <input type="number" name="award_amount" value="{{ $scholarship->award_amount }}" required 
                           class="flex-1 px-3 py-2 border border-gray-300 rounded-r-md">
                </div>
            </div>
            
            <!-- Award Description -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Award Description</label>
                <input type="text" name="award_description" value="{{ $scholarship->award_description }}" required 
                       class="w-full px-3 py-2 border border-gray-300 rounded-md">
            </div>
            
            <!-- Deadline -->
            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-1">Deadline</label>
                <input type="date" name="deadline" value="{{ $scholarship->deadline->format('Y-m-d') }}" required 
                       class="w-full px-3 py-2 border border-gray-300 rounded-md">
            </div>
            
            <!-- Description -->
            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                <textarea name="description" rows="4" required 
                          class="w-full px-3 py-2 border border-gray-300 rounded-md">{{ $scholarship->description }}</textarea>
            </div>
        </div>
        
        <div class="flex justify-between pt-4 border-t">
            <a href="{{ route('admin.scholarship') }}" 
               class="px-4 py-2 border rounded-md text-gray-700 hover:bg-gray-50">
                Cancel
            </a>
            <div class="flex space-x-2">
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                    Update
                </button>
            </div>
        </div>
    </form>
</div>
</x-admin>