<x-user>
    <!-- PROFILE SETTINGS - student/profile/index.blade.php -->
<div class="p-6">
    <h1 class="text-2xl font-bold mb-6">Profile & Settings</h1>
    
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Left Column: Profile Info -->
        <div class="lg:col-span-2">
            <!-- Basic Info Card -->
            <div class="bg-white border rounded-lg p-6 mb-6">
                <h3 class="font-bold text-lg mb-4">Personal Information</h3>
                <form class="space-y-4">
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm mb-1">Full Name</label>
                            <input type="text" class="w-full border rounded-lg p-2" value="John Doe">
                        </div>
                        <div>
                            <label class="block text-sm mb-1">Email</label>
                            <input type="email" class="w-full border rounded-lg p-2" value="john@email.com">
                        </div>
                        <div>
                            <label class="block text-sm mb-1">Phone</label>
                            <input type="tel" class="w-full border rounded-lg p-2" value="+1 234 567 8900">
                        </div>
                        <div>
                            <label class="block text-sm mb-1">Date of Birth</label>
                            <input type="date" class="w-full border rounded-lg p-2" value="2000-01-15">
                        </div>
                    </div>
                </form>
            </div>

            <!-- Education Card -->
            <div class="bg-white border rounded-lg p-6">
                <h3 class="font-bold text-lg mb-4">Education Information</h3>
                <form class="space-y-4">
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm mb-1">School/University</label>
                            <input type="text" class="w-full border rounded-lg p-2" placeholder="University Name">
                        </div>
                        <div>
                            <label class="block text-sm mb-1">Student ID</label>
                            <input type="text" class="w-full border rounded-lg p-2" placeholder="2023-00123">
                        </div>
                        <div>
                            <label class="block text-sm mb-1">Course/Program</label>
                            <input type="text" class="w-full border rounded-lg p-2" placeholder="Bachelor of Science">
                        </div>
                        <div>
                            <label class="block text-sm mb-1">Year Level</label>
                            <select class="w-full border rounded-lg p-2">
                                <option>1st Year</option>
                                <option>2nd Year</option>
                                <option>3rd Year</option>
                                <option>4th Year</option>
                                <option>5th Year</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm mb-1">Current GPA</label>
                            <input type="number" step="0.01" class="w-full border rounded-lg p-2" placeholder="3.5">
                        </div>
                        <div>
                            <label class="block text-sm mb-1">Expected Graduation</label>
                            <input type="date" class="w-full border rounded-lg p-2">
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Right Column: Profile Picture & Actions -->
        <div>
            <!-- Profile Picture -->
            <div class="bg-white border rounded-lg p-6 mb-6 text-center">
                <div class="w-32 h-32 mx-auto rounded-full bg-gray-200 mb-4 flex items-center justify-center overflow-hidden">
                    <!-- Profile image would go here -->
                    <i class="fas fa-user text-gray-400 text-4xl"></i>
                </div>
                <button class="px-4 py-2 border rounded-lg hover:bg-gray-50 w-full mb-2">
                    Change Photo
                </button>
                <p class="text-sm text-gray-500">JPG, PNG up to 2MB</p>
            </div>

            <!-- Save Changes -->
            <div class="bg-white border rounded-lg p-6">
                <h3 class="font-bold text-lg mb-4">Account Actions</h3>
                <div class="space-y-3">
                    <button class="w-full px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                        Save Changes
                    </button>
                    <button class="w-full px-4 py-2 border rounded-lg hover:bg-gray-50">
                        Change Password
                    </button>
                    <button class="w-full px-4 py-2 border border-red-200 text-red-600 rounded-lg hover:bg-red-50">
                        Download My Data
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
</x-user>