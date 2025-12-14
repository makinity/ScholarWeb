<x-admin>
    <div class="max-w-4xl mx-auto p-6 bg-white shadow-lg rounded-lg">
    <div class="flex justify-between items-center border-b pb-4 mb-6">
        <h1 class="text-3xl font-bold text-gray-800">
            {{ $scholarship->title }}
        </h1>
        
        <a href="{{ route('admin.scholarships.edit', $scholarship->id) }}" 
           class="px-4 py-2 bg-blue-600 text-white font-medium rounded-md hover:bg-blue-700">
            Edit Scholarship
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-10 gap-y-6">
        
        <div>
            <p class="text-sm font-medium text-gray-500">Category</p>
            <p class="text-lg font-semibold text-gray-900">{{ $scholarship->category }}</p>
        </div>
        <div>
            <p class="text-sm font-medium text-gray-500">Status</p>
            @php
                $statusColor = [
                    'active' => 'bg-green-100 text-green-800',
                    'ending_soon' => 'bg-yellow-100 text-yellow-800',
                    'closed' => 'bg-red-100 text-red-800',
                ][$scholarship->status] ?? 'bg-gray-100 text-gray-800';
            @endphp
            <span class="inline-flex items-center px-3 py-1 text-sm font-medium rounded-full {{ $statusColor }}">
                {{ ucfirst(str_replace('_', ' ', $scholarship->status)) }}
            </span>
        </div>
        
        <div>
            <p class="text-sm font-medium text-gray-500">Award Amount</p>
            <p class="text-lg font-semibold text-gray-900">¥{{ number_format($scholarship->award_amount, 2) }}</p>
        </div>
        <div>
            <p class="text-sm font-medium text-gray-500">Award Description</p>
            <p class="text-lg font-semibold text-gray-900">{{ $scholarship->award_description }}</p>
        </div>

        <div>
            <p class="text-sm font-medium text-gray-500">Application Deadline</p>
            <p class="text-lg font-semibold text-gray-900">
                {{ $scholarship->deadline->format('F d, Y') }} 
                ({{ $scholarship->deadline->diffForHumans() }})
            </p>
        </div>
        <div>
            <p class="text-sm font-medium text-gray-500">Applicants Count</p>
            <p class="text-lg font-semibold text-gray-900">{{ number_format($scholarship->applicants_count) }}</p>
        </div>
    </div>
    
    <div class="mt-8 pt-6 border-t border-gray-200">
        <h2 class="text-xl font-semibold text-gray-800 mb-3">Description</h2>
        <div class="text-gray-700 leading-relaxed whitespace-pre-wrap">
            {{ $scholarship->description }}
        </div>
    </div>

    <div class="mt-8 text-right">
        <a href="{{ route('admin.scholarship') }}" 
           class="px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50">
            Back to List
        </a>
    </div>
</div>
</x-admin>