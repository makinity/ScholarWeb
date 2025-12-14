<x-user>
    <!-- APPLICATION STATUS - student/applications/index.blade.php -->
<div class="p-6">
    <h1 class="text-2xl font-bold mb-6">My Applications</h1>

    <!-- Applications List -->
    <div class="space-y-4">
        @forelse($applications as $application)
            @php
                $status = $application->status;
                $color = match($status) {
                    'approved' => 'bg-green-100 text-green-800',
                    'rejected' => 'bg-red-100 text-red-800',
                    'pending' => 'bg-yellow-100 text-yellow-800',
                    default => 'bg-gray-100 text-gray-800',
                };
                $statusText = ucfirst($status);
            @endphp
            
            <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm hover:shadow-md transition duration-150">
                <div class="flex justify-between items-start border-b pb-3 mb-3">
                    <div>
                        <h3 class="font-bold text-xl text-gray-800">
                            {{ $application->scholarship->title ?? 'Scholarship Deleted' }}
                        </h3>
                        <p class="text-gray-600 text-sm mt-1">
                            Applied: {{ $application->created_at->format('M d, Y') }}
                        </p>
                    </div>
                    <span class="px-3 py-1 {{ $color }} rounded-full font-semibold text-sm">
                        {{ $statusText }}
                    </span>
                </div>
                
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    
                    <div>
                        <p class="text-sm text-gray-500">Application ID</p>
                        <p class="font-medium">APP-{{ $application->id }}</p>
                    </div>
                    
                    <div>
                        <p class="text-sm text-gray-500">Scholarship Deadline</p>
                        <p class="font-medium">
                            {{ $application->scholarship->deadline->format('M d, Y') ?? 'N/A' }}
                        </p>
                    </div>
                    
                    <div>
                        <p class="text-sm text-gray-500">Award Amount</p>
                        <p class="font-medium text-green-600">
                            ¥{{ number_format($application->scholarship->award_amount ?? 0, 0) }}
                        </p>
                    </div>
                    
                    <div>
                        <p class="text-sm text-gray-500">Last Status Update</p>
                        <p class="font-medium">{{ $application->updated_at->diffForHumans() }}</p>
                    </div>
                </div>
                
                <div class="flex justify-end mt-4 space-x-2 border-t pt-3">
                    
                    @if ($application->status == 'pending')
                        <button class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 text-sm font-medium">
                            Edit/Upload Files
                        </button>
                    @endif
                </div>
            </div>
        @empty
            <div class="bg-white p-6 border rounded-lg text-center text-gray-500 shadow-sm">
                <p class="text-lg">You have not submitted any scholarship applications yet.</p>
                <a href="{{ route('scholarships.browse') }}" class="mt-2 inline-block text-blue-600 hover:text-blue-700">
                    Start Browsing Scholarships
                </a>
            </div>
        @endforelse
        
    </div>
</div>
</x-user>