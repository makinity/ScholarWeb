<x-admin>
    <!-- Review Applications Main Content -->
<div class="flex-1 p-6">
    <!-- Header -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Review Applications</h1>
            <p class="text-gray-600">Evaluate and score scholarship applications</p>
        </div>
        <div class="flex space-x-3 mt-4 md:mt-0">
            <button class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 flex items-center">
                <i class="fas fa-check-double mr-2"></i>Approve All Scored
            </button>
            <button class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 flex items-center">
                <i class="fas fa-random mr-2"></i>Randomize Next
            </button>
        </div>
    </div>

    <!-- Review Progress Bar -->
    <div class="bg-white p-4 rounded-lg border shadow-sm mb-6">
        <div class="flex flex-wrap items-center justify-between mb-4">
            <div>
                <h3 class="font-medium text-gray-800">Review Progress</h3>
                <p class="text-sm text-gray-600">23 applications pending review</p>
            </div>
            <div class="text-right">
                <p class="text-2xl font-bold text-blue-600">6/23</p>
                <p class="text-sm text-gray-600">Reviewed today</p>
            </div>
        </div>
        <div class="w-full bg-gray-200 rounded-full h-2">
            <div class="bg-blue-600 h-2 rounded-full" style="width: 26%"></div>
        </div>
        <div class="flex justify-between text-sm text-gray-600 mt-1">
            <span>0</span>
            <span>23 applications</span>
        </div>
    </div>

    <!-- Two-Column Layout: Application Details & Scoring -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Left Column: Application List -->
        <div class="lg:col-span-1">
            <div class="bg-white rounded-lg border shadow-sm">
                <div class="p-4 border-b">
                    <h3 class="font-semibold text-gray-800">Pending Review</h3>
                    <p class="text-sm text-gray-600">Select an application to review</p>
                </div>
                <div class="max-h-[600px] overflow-y-auto">
                    <!-- Application Item 1 - Selected -->
                    <div class="p-4 border-b bg-blue-50 border-l-4 border-blue-500">
                        <div class="flex justify-between items-start mb-2">
                            <div>
                                <h4 class="font-semibold text-gray-800">Juan Dela Cruz</h4>
                                <p class="text-sm text-gray-600">APP-2024-001</p>
                            </div>
                            <span class="px-2 py-1 bg-blue-100 text-blue-800 rounded-full text-xs">Current</span>
                        </div>
                        <div class="text-sm text-gray-600 mb-2">
                            <div class="flex items-center mb-1">
                                <i class="fas fa-school text-gray-400 mr-2 w-4"></i>
                                <span>Manila University</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-award text-gray-400 mr-2 w-4"></i>
                                <span>Academic Excellence Scholarship</span>
                            </div>
                        </div>
                        <div class="flex justify-between text-xs">
                            <span class="text-gray-500">Applied: Feb 15, 2024</span>
                            <span class="font-medium">Not Scored</span>
                        </div>
                    </div>

                    <!-- Application Item 2 -->
                    <div class="p-4 border-b hover:bg-gray-50 cursor-pointer">
                        <div class="flex justify-between items-start mb-2">
                            <div>
                                <h4 class="font-semibold text-gray-800">Maria Santos</h4>
                                <p class="text-sm text-gray-600">APP-2024-002</p>
                            </div>
                            <span class="px-2 py-1 bg-yellow-100 text-yellow-800 rounded-full text-xs">In Progress</span>
                        </div>
                        <div class="text-sm text-gray-600 mb-2">
                            <div class="flex items-center mb-1">
                                <i class="fas fa-school text-gray-400 mr-2 w-4"></i>
                                <span>Polytechnic University</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-award text-gray-400 mr-2 w-4"></i>
                                <span>Sports Scholarship</span>
                            </div>
                        </div>
                        <div class="flex justify-between text-xs">
                            <span class="text-gray-500">Applied: Feb 14, 2024</span>
                            <span class="font-medium text-green-600">Score: 45/100</span>
                        </div>
                    </div>

                    <!-- Application Item 3 -->
                    <div class="p-4 border-b hover:bg-gray-50 cursor-pointer">
                        <div class="flex justify-between items-start mb-2">
                            <div>
                                <h4 class="font-semibold text-gray-800">John Smith</h4>
                                <p class="text-sm text-gray-600">APP-2024-003</p>
                            </div>
                            <span class="px-2 py-1 bg-gray-100 text-gray-800 rounded-full text-xs">New</span>
                        </div>
                        <div class="text-sm text-gray-600 mb-2">
                            <div class="flex items-center mb-1">
                                <i class="fas fa-school text-gray-400 mr-2 w-4"></i>
                                <span>State College</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-award text-gray-400 mr-2 w-4"></i>
                                <span>Financial Aid</span>
                            </div>
                        </div>
                        <div class="flex justify-between text-xs">
                            <span class="text-gray-500">Applied: Feb 13, 2024</span>
                            <span class="font-medium">Not Scored</span>
                        </div>
                    </div>

                    <!-- Application Item 4 -->
                    <div class="p-4 border-b hover:bg-gray-50 cursor-pointer">
                        <div class="flex justify-between items-start mb-2">
                            <div>
                                <h4 class="font-semibold text-gray-800">Anna Reyes</h4>
                                <p class="text-sm text-gray-600">APP-2024-004</p>
                            </div>
                            <span class="px-2 py-1 bg-orange-100 text-orange-800 rounded-full text-xs">Needs Docs</span>
                        </div>
                        <div class="text-sm text-gray-600 mb-2">
                            <div class="flex items-center mb-1">
                                <i class="fas fa-school text-gray-400 mr-2 w-4"></i>
                                <span>City College</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-award text-gray-400 mr-2 w-4"></i>
                                <span>STEM Scholars</span>
                            </div>
                        </div>
                        <div class="flex justify-between text-xs">
                            <span class="text-gray-500">Applied: Feb 12, 2024</span>
                            <span class="font-medium text-red-600">Missing 2 files</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column: Application Details & Scoring -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-lg border shadow-sm">
                <!-- Application Header -->
                <div class="p-6 border-b">
                    <div class="flex justify-between items-start">
                        <div>
                            <h2 class="text-xl font-bold text-gray-800">Juan Dela Cruz</h2>
                            <p class="text-gray-600">Application ID: APP-2024-001</p>
                        </div>
                        <div class="text-right">
                            <p class="text-sm text-gray-600">Submitted: Feb 15, 2024, 2:30 PM</p>
                            <p class="text-sm text-gray-600">Days pending: 3</p>
                        </div>
                    </div>
                </div>

                <!-- Application Details Tabs -->
                <div class="border-b">
                    <div class="flex">
                        <button class="px-6 py-3 border-b-2 border-blue-500 text-blue-600 font-medium">Application</button>
                        <button class="px-6 py-3 text-gray-600 hover:text-gray-800">Documents</button>
                        <button class="px-6 py-3 text-gray-600 hover:text-gray-800">Academic Record</button>
                        <button class="px-6 py-3 text-gray-600 hover:text-gray-800">Recommendations</button>
                    </div>
                </div>

                <!-- Application Content -->
                <div class="p-6">
                    <!-- Personal Information -->
                    <div class="mb-8">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Personal Information</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <p class="text-sm text-gray-500">Full Name</p>
                                <p class="font-medium">Juan Dela Cruz</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Email</p>
                                <p class="font-medium">juan.delacruz@email.com</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Phone</p>
                                <p class="font-medium">+63 912 345 6789</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Date of Birth</p>
                                <p class="font-medium">May 15, 2005</p>
                            </div>
                            <div class="md:col-span-2">
                                <p class="text-sm text-gray-500">Address</p>
                                <p class="font-medium">123 Main Street, Manila, Philippines 1000</p>
                            </div>
                        </div>
                    </div>

                    <!-- Educational Background -->
                    <div class="mb-8">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Educational Background</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <p class="text-sm text-gray-500">School</p>
                                <p class="font-medium">Manila University</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Grade Level</p>
                                <p class="font-medium">Grade 12</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Course/Strand</p>
                                <p class="font-medium">STEM - Science, Technology, Engineering, Mathematics</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Current GPA</p>
                                <p class="font-medium">95.4% (With High Honors)</p>
                            </div>
                        </div>
                    </div>

                    <!-- Essay Response -->
                    <div class="mb-8">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Essay: Why do you deserve this scholarship?</h3>
                        <div class="bg-gray-50 p-4 rounded-lg border">
                            <p class="text-gray-700">
                                I believe I deserve this scholarship because of my consistent academic excellence, 
                                demonstrated leadership in school organizations, and commitment to community service. 
                                As the president of our school's Science Club, I have organized several outreach 
                                programs to promote STEM education in underprivileged communities. My goal is to 
                                become a software engineer and contribute to technological advancement in the Philippines.
                            </p>
                        </div>
                    </div>

                    <!-- SCORING SECTION -->
                    <div class="border-t pt-6">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Scoring & Evaluation</h3>
                        
                        <!-- Criteria 1 -->
                        <div class="mb-6 p-4 border rounded-lg">
                            <div class="flex justify-between items-center mb-3">
                                <div>
                                    <h4 class="font-medium text-gray-800">Academic Performance</h4>
                                    <p class="text-sm text-gray-600">Based on grades and academic awards</p>
                                </div>
                                <div class="text-right">
                                    <span class="text-2xl font-bold text-gray-800">0</span>
                                    <span class="text-gray-600">/ 30 points</span>
                                </div>
                            </div>
                            <div class="flex space-x-4 mb-3">
                                <button class="px-3 py-1 bg-gray-100 rounded-lg hover:bg-gray-200">Poor (0-10)</button>
                                <button class="px-3 py-1 bg-gray-100 rounded-lg hover:bg-gray-200">Fair (11-20)</button>
                                <button class="px-3 py-1 bg-gray-100 rounded-lg hover:bg-gray-200">Good (21-25)</button>
                                <button class="px-3 py-1 bg-gray-100 rounded-lg hover:bg-gray-200">Excellent (26-30)</button>
                            </div>
                            <textarea placeholder="Comments..." class="w-full p-3 border rounded-lg" rows="2"></textarea>
                        </div>

                        <!-- Criteria 2 -->
                        <div class="mb-6 p-4 border rounded-lg">
                            <div class="flex justify-between items-center mb-3">
                                <div>
                                    <h4 class="font-medium text-gray-800">Essay Quality</h4>
                                    <p class="text-sm text-gray-600">Clarity, content, and writing skills</p>
                                </div>
                                <div class="text-right">
                                    <span class="text-2xl font-bold text-gray-800">0</span>
                                    <span class="text-gray-600">/ 25 points</span>
                                </div>
                            </div>
                            <div class="flex space-x-4 mb-3">
                                <button class="px-3 py-1 bg-gray-100 rounded-lg hover:bg-gray-200">Poor (0-8)</button>
                                <button class="px-3 py-1 bg-gray-100 rounded-lg hover:bg-gray-200">Fair (9-15)</button>
                                <button class="px-3 py-1 bg-gray-100 rounded-lg hover:bg-gray-200">Good (16-20)</button>
                                <button class="px-3 py-1 bg-gray-100 rounded-lg hover:bg-gray-200">Excellent (21-25)</button>
                            </div>
                            <textarea placeholder="Comments..." class="w-full p-3 border rounded-lg" rows="2"></textarea>
                        </div>

                        <!-- Criteria 3 -->
                        <div class="mb-6 p-4 border rounded-lg">
                            <div class="flex justify-between items-center mb-3">
                                <div>
                                    <h4 class="font-medium text-gray-800">Extracurricular & Leadership</h4>
                                    <p class="text-sm text-gray-600">Involvement and leadership roles</p>
                                </div>
                                <div class="text-right">
                                    <span class="text-2xl font-bold text-gray-800">0</span>
                                    <span class="text-gray-600">/ 25 points</span>
                                </div>
                            </div>
                            <div class="flex space-x-4 mb-3">
                                <button class="px-3 py-1 bg-gray-100 rounded-lg hover:bg-gray-200">Poor (0-8)</button>
                                <button class="px-3 py-1 bg-gray-100 rounded-lg hover:bg-gray-200">Fair (9-15)</button>
                                <button class="px-3 py-1 bg-gray-100 rounded-lg hover:bg-gray-200">Good (16-20)</button>
                                <button class="px-3 py-1 bg-gray-100 rounded-lg hover:bg-gray-200">Excellent (21-25)</button>
                            </div>
                            <textarea placeholder="Comments..." class="w-full p-3 border rounded-lg" rows="2"></textarea>
                        </div>

                        <!-- Criteria 4 -->
                        <div class="mb-6 p-4 border rounded-lg">
                            <div class="flex justify-between items-center mb-3">
                                <div>
                                    <h4 class="font-medium text-gray-800">Financial Need</h4>
                                    <p class="text-sm text-gray-600">Based on submitted documents</p>
                                </div>
                                <div class="text-right">
                                    <span class="text-2xl font-bold text-gray-800">0</span>
                                    <span class="text-gray-600">/ 20 points</span>
                                </div>
                            </div>
                            <div class="flex space-x-4 mb-3">
                                <button class="px-3 py-1 bg-gray-100 rounded-lg hover:bg-gray-200">Low (0-7)</button>
                                <button class="px-3 py-1 bg-gray-100 rounded-lg hover:bg-gray-200">Moderate (8-14)</button>
                                <button class="px-3 py-1 bg-gray-100 rounded-lg hover:bg-gray-200">High (15-20)</button>
                            </div>
                            <textarea placeholder="Comments..." class="w-full p-3 border rounded-lg" rows="2"></textarea>
                        </div>

                        <!-- Total Score & Final Decision -->
                        <div class="bg-gray-50 p-6 rounded-lg border">
                            <div class="flex justify-between items-center mb-6">
                                <div>
                                    <h4 class="text-lg font-semibold text-gray-800">Total Score</h4>
                                    <p class="text-gray-600">Maximum possible score: 100 points</p>
                                </div>
                                <div class="text-right">
                                    <div class="text-4xl font-bold text-blue-600">0</div>
                                    <div class="text-gray-600">/ 100 points</div>
                                </div>
                            </div>

                            <div class="mb-6">
                                <h4 class="font-medium text-gray-800 mb-3">Overall Comments</h4>
                                <textarea placeholder="Enter overall feedback for the applicant..." class="w-full p-3 border rounded-lg" rows="3"></textarea>
                            </div>

                            <!-- Final Decision Buttons -->
                            <div class="flex space-x-4">
                                <button class="flex-1 px-6 py-3 bg-green-600 text-white rounded-lg hover:bg-green-700 font-medium">
                                    <i class="fas fa-check mr-2"></i>Approve Application
                                </button>
                                <button class="flex-1 px-6 py-3 bg-red-600 text-white rounded-lg hover:bg-red-700 font-medium">
                                    <i class="fas fa-times mr-2"></i>Reject Application
                                </button>
                                <button class="px-6 py-3 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 font-medium">
                                    <i class="fas fa-save mr-2"></i>Save Draft
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</x-admin>