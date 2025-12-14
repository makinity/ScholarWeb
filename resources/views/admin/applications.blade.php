<x-admin>
    <!-- Applications Main Content -->
<div class="flex-1 p-6">
    <!-- Header -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Applications</h1>
            <p class="text-gray-600">Manage and review all scholarship applications</p>
        </div>
        <div class="flex space-x-3 mt-4 md:mt-0">
            <a href="{{ route('admin.scholarships.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 flex items-center">
                <i class="fas fa-plus mr-2"></i>New Scholarship
            </a>
            <button class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 flex items-center">
                <i class="fas fa-download mr-2"></i>Export All
            </button>
        </div>
    </div>

    <!-- Filter & Search Bar -->
    <div class="bg-white p-4 rounded-lg shadow-sm border mb-6">
        <div class="flex flex-wrap gap-4 items-end">
            <!-- Quick Status Filter -->
            <div class="flex space-x-2">
                <button class="px-4 py-2 bg-blue-100 text-blue-700 rounded-lg font-medium">All {{ $applications->count() }}</button>
                <button class="px-4 py-2 bg-yellow-100 text-yellow-700 rounded-lg">
                    Pending ({{ $pending }})
                </button>

                <button class="px-4 py-2 bg-green-100 text-green-700 rounded-lg">
                    Approved ({{ $approved }})
                </button>

                <button class="px-4 py-2 bg-red-100 text-red-700 rounded-lg">
                    Rejected ({{ $rejected }})
                </button>
            </div>
            
            
            <button class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 flex items-center">
                <i class="fas fa-filter mr-2"></i>More Filters
            </button>
        </div>

    <!-- Applications Table -->
    <div class="bg-white rounded-lg shadow-sm border overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-4 text-left">
                            <input type="checkbox" class="h-4 w-4 text-blue-600 rounded">
                        </th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Applicant
                        </th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            School
                        </th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Scholarship
                        </th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Grade
                        </th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Date Applied
                        </th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Status
                        </th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Score
                        </th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($applications as $app)
                        <tr class="hover:bg-gray-50">
                            <!-- Applicant Name + ID -->
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center mr-3">
                                        @if ($app->user && $app->user->profile)
                                            <img src="{{ Storage::url(Auth::user()->profile) }}" 
                                                class="w-10 h-10 rounded-full object-cover">
                                        @else
                                            <i class="fas fa-user text-blue-600"></i>
                                        @endif
                                    </div>
                                    <div>
                                        <p class="font-medium">{{ $app->full_name }}</p>
                                        <p class="text-sm text-gray-500">ID: APP-{{ $app->id }}</p>
                                    </div>
                                </div>
                            </td>

                            <!-- School -->
                            <td class="px-6 py-4">
                                {{ $app->school_name }}
                            </td>

                            <!-- Scholarship -->
                            <td class="px-6 py-4">
                                <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded">
                                    {{ $app->scholarship_id ? 'Scholarship #' . $app->scholarship_id : 'N/A' }}
                                </span>
                            </td>

                            <!-- Grade Level -->
                            <td class="px-6 py-4">
                                {{ $app->grade_level }}
                            </td>

                            <!-- Date Applied -->
                            <td class="px-6 py-4">
                                {{ $app->date_applied ? \Carbon\Carbon::parse($app->date_applied)->format('M d, Y') : 'N/A' }}
                            </td>

                            <!-- Status -->
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 
                                    @if($app->status == 'approved') bg-green-100 text-green-800
                                    @elseif($app->status == 'rejected') bg-red-100 text-red-800
                                    @else bg-yellow-100 text-yellow-800 @endif
                                    rounded-full text-xs font-medium">
                                    {{ ucfirst($app->status ?? 'pending') }}
                                </span>
                            </td>

                            <!-- GPA -->
                            <td class="px-6 py-4">
                                {{ $app->gpa }}
                            </td>

                            <!-- Actions -->
                            <td class="px-6 py-4">
                                <div class="flex space-x-2">
                                    <!-- View -->
                                    <a href="" class="text-blue-600 hover:text-blue-800 p-1">
                                        <i class="fas fa-eye"></i>
                                    </a>

                                    <!-- Approve -->
                                    <a href="{{ route('admin.applications.approve', $app->id) }}" class="text-green-600 hover:text-green-800 p-1">
                                        <i class="fas fa-check"></i>
                                    </a>

                                    <!-- Reject -->
                                    <a href="{{ route('admin.applications.reject', $app->id) }}"  class="text-red-600 hover:text-red-800 p-1">
                                        <i class="fas fa-times"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>

            </table>
        </div>

        <!-- Pagination -->
        <div class="px-6 py-4 border-t flex items-center justify-between">
            <div class="text-sm text-gray-700">
                Showing <span class="font-medium">1</span> to <span class="font-medium">4</span> of <span class="font-medium">156</span> applications
            </div>
            <div class="flex space-x-2">
                <button class="px-3 py-1 border rounded-lg hover:bg-gray-50">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <button class="px-3 py-1 bg-blue-600 text-white rounded-lg">1</button>
                <button class="px-3 py-1 border rounded-lg hover:bg-gray-50">2</button>
                <button class="px-3 py-1 border rounded-lg hover:bg-gray-50">3</button>
                <span class="px-3 py-1">...</span>
                <button class="px-3 py-1 border rounded-lg hover:bg-gray-50">10</button>
                <button class="px-3 py-1 border rounded-lg hover:bg-gray-50">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Quick Stats Footer -->
    <div class="mt-6 grid grid-cols-2 md:grid-cols-4 gap-4">
        <div class="bg-white p-4 rounded-lg border text-center">
            <p class="text-sm text-gray-500">Total Applications</p>
            <p class="text-2xl font-bold text-gray-800">{{ $applications->count() }}</p>
        </div>
        <div class="bg-white p-4 rounded-lg border text-center">
            <p class="text-sm text-gray-500">Pending Review</p>
            <p class="text-2xl font-bold text-yellow-600">{{ $pending }}</p>
        </div>
        <div class="bg-white p-4 rounded-lg border text-center">
            <p class="text-sm text-gray-500">Approved</p>
            <p class="text-2xl font-bold text-green-600">{{ $approved }}</p>
        </div>
        <div class="bg-white p-4 rounded-lg border text-center">
            <p class="text-sm text-gray-500">Rejected</p>
            <p class="text-2xl font-bold text-red-600">{{ $rejected }}</p>
        </div>
    </div>
</div>
</x-admin>