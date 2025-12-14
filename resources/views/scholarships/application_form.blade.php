<x-user>
    <form method="POST" action="{{ route('applications.store') }}" enctype="multipart/form-data" class="space-y-6">
    @csrf
    
    <input type="hidden" name="scholarship_id" value="{{ $scholarship->id }}">

    <h2 class="text-xl font-bold border-b pb-2 text-gray-700">Personal Information</h2>
    
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        
        <div>
            <label for="full_name" class="block text-sm font-medium text-gray-700">Full Name</label>
            <input type="text" id="fullname" name="full_name" value="{{ old('full_name') }}" required
                   class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm">
            @error('fullname') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>
        
        <div>
            <label for="birthday" class="block text-sm font-medium text-gray-700">Birthday</label>
            <input type="date" id="birthday" name="birthday" value="{{ old('birthday') }}" required
                   class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm">
            @error('birthday') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="contact_number" class="block text-sm font-medium text-gray-700">Contact Number</label>
            <input type="text" id="contact_number" name="contact_number" value="{{ old('contact_number') }}" required
                   class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" placeholder="e.g., 09123456789">
            @error('contact_number') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required
                   class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" placeholder="user@example.com">
            @error('email') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>
        
        <div class="md:col-span-2">
            <label for="address" class="block text-sm font-medium text-gray-700">Residential Address</label>
            <textarea id="address" name="address" rows="3" required
                      class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm">{{ old('address') }}</textarea>
            @error('address') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

    </div>
    
    <h2 class="text-xl font-bold pt-6 border-b pb-2 text-gray-700">Academic Information</h2>
    
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

        <div class="md:col-span-2">
            <label for="school_name" class="block text-sm font-medium text-gray-700">School Name</label>
            <input type="text" id="school_name" name="school_name" value="{{ old('school_name') }}" required
                   class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm">
            @error('school_name') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>
        
        <div>
            <label for="grade_level" class="block text-sm font-medium text-gray-700">Current Grade Level / Year</label>
            <input type="text" id="grade_level" name="grade_level" value="{{ old('grade_level') }}" required
                   class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" placeholder="e.g., 12th Grade, Freshman, 3rd Year College">
            @error('grade_level') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="gpa" class="block text-sm font-medium text-gray-700">GPA (Max 4.0)</label>
            <input type="number" step="0.01" min="0" max="4.0" id="gpa" name="gpa" value="{{ old('gpa') }}" required
                   class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm">
            @error('gpa') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>
        

    </div>

    <h2 class="text-xl font-bold pt-6 border-b pb-2 text-gray-700">Required Document</h2>
    <div>
        <label for="grade_file" class="block text-sm font-medium text-gray-700">Grade Report / Card</label>
        <input type="file" id="grade_file" name="grade_file" required
            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm">
        @error('grade_file') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    
    <div class="flex justify-end pt-4">
        <button type="submit" class="bg-green-600 text-white px-6 py-3 rounded-md font-medium hover:bg-green-700">
            Submit Final Application
        </button>
    </div>
</form>
</x-user>