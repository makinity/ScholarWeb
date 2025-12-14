<x-admin>
    <x-slot name="pageTitle">
        <div class="flex items-center">
            <i class="fas fa-clipboard-check text-blue-600 mr-3 text-xl"></i>
            <span>Scholarship Evaluation Dashboard</span>
        </div>
    </x-slot>

    <x-slot name="pageActions">
        <div class="flex space-x-3">
            <button type="button" 
                    onclick="printScoreSheet()"
                    class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-lg shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:hover:bg-gray-600">
                <i class="fas fa-print mr-2"></i>
                Print
            </button>
            <button type="button" 
                    onclick="saveEvaluation()"
                    class="inline-flex items-center px-4 py-2 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                <i class="fas fa-save mr-2"></i>
                Save
            </button>
        </div>
    </x-slot>

    <div class="space-y-6">
        {{-- QUICK STATS BAR --}}
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="p-3 bg-blue-100 rounded-lg dark:bg-blue-900">
                            <i class="fas fa-file-alt text-blue-600 dark:text-blue-300"></i>
                        </div>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Application ID</p>
                        <p class="text-lg font-semibold text-gray-900 dark:text-white">#SAP-2023-0876</p>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="p-3 bg-green-100 rounded-lg dark:bg-green-900">
                            <i class="fas fa-user-graduate text-green-600 dark:text-green-300"></i>
                        </div>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-600 dark:text-gray-400">GPA</p>
                        <p class="text-lg font-semibold text-gray-900 dark:text-white">3.92 / 4.0</p>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="p-3 bg-purple-100 rounded-lg dark:bg-purple-900">
                            <i class="fas fa-chart-line text-purple-600 dark:text-purple-300"></i>
                        </div>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Current Score</p>
                        <p class="text-lg font-semibold text-gray-900 dark:text-white" id="current-score-display">0</p>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="p-3 bg-yellow-100 rounded-lg dark:bg-yellow-900">
                            <i class="fas fa-clock text-yellow-600 dark:text-yellow-300"></i>
                        </div>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Status</p>
                        <p class="text-lg font-semibold text-yellow-600 dark:text-yellow-400">In Review</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            {{-- LEFT COLUMN: APPLICANT INFO --}}
            <div class="lg:col-span-1 space-y-6">
                {{-- Applicant Profile Card --}}
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow">
                    <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                            <i class="fas fa-user-circle mr-2 text-blue-500"></i>
                            Applicant Profile
                        </h3>
                    </div>
                    <div class="p-6">
                        <div class="text-center mb-4">
                            <div class="inline-flex items-center justify-center w-20 h-20 bg-blue-100 rounded-full dark:bg-blue-900">
                                <i class="fas fa-user text-3xl text-blue-600 dark:text-blue-300"></i>
                            </div>
                            <h2 class="mt-3 text-xl font-bold text-gray-900 dark:text-white">Sheryl N. Aleviado</h2>
                            <p class="text-gray-600 dark:text-gray-400">Bachelor in Information Technoloty</p>
                            <div class="mt-2">
                                <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">
                                    3rd Year
                                </span>
                            </div>
                        </div>

                        <div class="space-y-3">
                            <div class="flex items-center text-sm">
                                <i class="fas fa-university text-gray-400 mr-3 w-5"></i>
                                <span class="text-gray-600 dark:text-gray-400">University of Excellence</span>
                            </div>
                            <div class="flex items-center text-sm">
                                <i class="fas fa-envelope text-gray-400 mr-3 w-5"></i>
                                <span class="text-gray-600 dark:text-gray-400">alex.chen@university.edu</span>
                            </div>
                            <div class="flex items-center text-sm">
                                <i class="fas fa-phone text-gray-400 mr-3 w-5"></i>
                                <span class="text-gray-600 dark:text-gray-400">(555) 123-4567</span>
                            </div>
                            <div class="flex items-center text-sm">
                                <i class="fas fa-calendar text-gray-400 mr-3 w-5"></i>
                                <span class="text-gray-600 dark:text-gray-400">Submitted: Nov 15, 2023</span>
                            </div>
                        </div>

                        <div class="mt-6 pt-6 border-t border-gray-200 dark:border-gray-700">
                            <h4 class="text-sm font-semibold text-gray-900 dark:text-white mb-2">Scholarship Applied For</h4>
                            <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-3">
                                <div class="font-medium text-gray-900 dark:text-white">Excellence in STEM Scholarship</div>
                                <div class="text-sm text-gray-600 dark:text-gray-400 mt-1">Full tuition + $5,000 stipend</div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Quick Evaluation Card --}}
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow">
                    <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                            <i class="fas fa-bolt mr-2 text-yellow-500"></i>
                            Quick Evaluation
                        </h3>
                    </div>
                    <div class="p-6">
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    Initial Impression
                                </label>
                                <div class="flex space-x-2">
                                    <button type="button" onclick="setQuickScore('excellent')" class="quick-score-btn flex-1 py-2 px-3 text-sm font-medium rounded-lg border border-green-300 bg-green-50 text-green-700 hover:bg-green-100 dark:bg-green-900/20 dark:border-green-800 dark:text-green-400 dark:hover:bg-green-900/30">
                                        Excellent
                                    </button>
                                    <button type="button" onclick="setQuickScore('good')" class="quick-score-btn flex-1 py-2 px-3 text-sm font-medium rounded-lg border border-blue-300 bg-blue-50 text-blue-700 hover:bg-blue-100 dark:bg-blue-900/20 dark:border-blue-800 dark:text-blue-400 dark:hover:bg-blue-900/30">
                                        Good
                                    </button>
                                    <button type="button" onclick="setQuickScore('average')" class="quick-score-btn flex-1 py-2 px-3 text-sm font-medium rounded-lg border border-gray-300 bg-gray-50 text-gray-700 hover:bg-gray-100 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:hover:bg-gray-600">
                                        Average
                                    </button>
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    Recommendation
                                </label>
                                <select id="recommendation-select" class="block w-full text-sm border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
                                    <option value="">Select recommendation</option>
                                    <option value="highly-recommend">Highly Recommend</option>
                                    <option value="recommend">Recommend</option>
                                    <option value="recommend-with-reservations">Recommend with Reservations</option>
                                    <option value="not-recommend">Not Recommend</option>
                                </select>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    Priority Level
                                </label>
                                <div class="flex space-x-2">
                                    <button type="button" onclick="setPriority('high')" class="priority-btn flex-1 py-2 px-3 text-sm font-medium rounded-lg border border-red-300 bg-red-50 text-red-700 hover:bg-red-100 dark:bg-red-900/20 dark:border-red-800 dark:text-red-400 dark:hover:bg-red-900/30">
                                        High
                                    </button>
                                    <button type="button" onclick="setPriority('medium')" class="priority-btn flex-1 py-2 px-3 text-sm font-medium rounded-lg border border-yellow-300 bg-yellow-50 text-yellow-700 hover:bg-yellow-100 dark:bg-yellow-900/20 dark:border-yellow-800 dark:text-yellow-400 dark:hover:bg-yellow-900/30">
                                        Medium
                                    </button>
                                    <button type="button" onclick="setPriority('low')" class="priority-btn flex-1 py-2 px-3 text-sm font-medium rounded-lg border border-gray-300 bg-gray-50 text-gray-700 hover:bg-gray-100 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:hover:bg-gray-600">
                                        Low
                                    </button>
                                </div>
                            </div>

                            <button type="button" onclick="submitEvaluation()" class="w-full bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-medium py-2.5 px-4 rounded-lg shadow-md transition duration-300">
                                <i class="fas fa-paper-plane mr-2"></i>
                                Submit Final Evaluation
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            {{-- MIDDLE COLUMN: SCORING CRITERIA --}}
            <div class="lg:col-span-2 space-y-6">
                {{-- Scoring Header --}}
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow">
                    <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                        <div class="flex justify-between items-center">
                            <h2 class="text-xl font-bold text-gray-900 dark:text-white">
                                <i class="fas fa-chart-bar mr-2 text-blue-500"></i>
                                Evaluation Criteria
                            </h2>
                            <div class="text-right">
                                <div class="text-3xl font-bold text-blue-600 dark:text-blue-400" id="total-score">0</div>
                                <div class="text-sm text-gray-600 dark:text-gray-400">Total Score / 100</div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Academic Excellence Card --}}
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow">
                    <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                        <div class="flex justify-between items-center">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                <i class="fas fa-graduation-cap mr-2 text-blue-500"></i>
                                Academic Excellence (30 points)
                            </h3>
                            <div class="text-right">
                                <div class="text-xl font-bold text-blue-600 dark:text-blue-400" id="academic-score">0</div>
                                <div class="text-sm text-gray-600 dark:text-gray-400">/ 30</div>
                            </div>
                        </div>
                    </div>
                    <div class="p-6 space-y-4">
                        <div>
                            <div class="flex justify-between mb-1">
                                <label class="text-sm font-medium text-gray-700 dark:text-gray-300">GPA Score (15 points)</label>
                                <span class="text-sm font-semibold text-blue-600" id="gpa-value">0</span>
                            </div>
                            <input type="range" id="gpa-slider" min="0" max="15" value="0" 
                                   class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700"
                                   oninput="updateAcademicScore()">
                            <div class="flex justify-between text-xs text-gray-500 mt-1">
                                <span>3.0 (0 pts)</span>
                                <span>3.5 (7 pts)</span>
                                <span>4.0 (15 pts)</span>
                            </div>
                        </div>

                        <div>
                            <div class="flex justify-between mb-1">
                                <label class="text-sm font-medium text-gray-700 dark:text-gray-300">Academic Rigor (9 points)</label>
                                <span class="text-sm font-semibold text-blue-600" id="rigor-value">0</span>
                            </div>
                            <input type="range" id="rigor-slider" min="0" max="9" value="0" 
                                   class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700"
                                   oninput="updateAcademicScore()">
                        </div>

                        <div>
                            <div class="flex justify-between mb-1">
                                <label class="text-sm font-medium text-gray-700 dark:text-gray-300">Achievements (6 points)</label>
                                <span class="text-sm font-semibold text-blue-600" id="achievements-value">0</span>
                            </div>
                            <input type="range" id="achievements-slider" min="0" max="6" value="0" 
                                   class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700"
                                   oninput="updateAcademicScore()">
                        </div>
                    </div>
                </div>

                {{-- Leadership & Extracurricular Card --}}
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow">
                    <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                        <div class="flex justify-between items-center">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                <i class="fas fa-users mr-2 text-green-500"></i>
                                Leadership & Activities (25 points)
                            </h3>
                            <div class="text-right">
                                <div class="text-xl font-bold text-green-600 dark:text-green-400" id="leadership-score">0</div>
                                <div class="text-sm text-gray-600 dark:text-gray-400">/ 25</div>
                            </div>
                        </div>
                    </div>
                    <div class="p-6 space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Leadership Roles (9 points)
                            </label>
                            <select id="leadership-select" class="block w-full text-sm border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300"
                                    onchange="updateLeadershipScore()">
                                <option value="0">No significant roles</option>
                                <option value="3">1-2 minor roles</option>
                                <option value="6">2-3 significant roles</option>
                                <option value="9">3+ leadership positions</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Impact & Initiative (10 points)
                            </label>
                            <select id="impact-select" class="block w-full text-sm border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300"
                                    onchange="updateLeadershipScore()">
                                <option value="0">Minimal impact</option>
                                <option value="3">Moderate impact</option>
                                <option value="6">Significant impact</option>
                                <option value="10">Transformative impact</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Duration & Consistency (6 points)
                            </label>
                            <select id="duration-select" class="block w-full text-sm border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300"
                                    onchange="updateLeadershipScore()">
                                <option value="0">Short-term involvement</option>
                                <option value="2">6-12 months</option>
                                <option value="4">1-2 years</option>
                                <option value="6">2+ years consistently</option>
                            </select>
                        </div>
                    </div>
                </div>

                {{-- Essay & Personal Statement Card --}}
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow">
                    <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                        <div class="flex justify-between items-center">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                <i class="fas fa-edit mr-2 text-purple-500"></i>
                                Essay & Personal Statement (25 points)
                            </h3>
                            <div class="text-right">
                                <div class="text-xl font-bold text-purple-600 dark:text-purple-400" id="essay-score">0</div>
                                <div class="text-sm text-gray-600 dark:text-gray-400">/ 25</div>
                            </div>
                        </div>
                    </div>
                    <div class="p-6 space-y-4">
                        <div>
                            <div class="flex justify-between mb-1">
                                <label class="text-sm font-medium text-gray-700 dark:text-gray-300">Writing Quality (10 points)</label>
                                <span class="text-sm font-semibold text-purple-600" id="writing-value">0</span>
                            </div>
                            <input type="range" id="writing-slider" min="0" max="10" value="0" 
                                   class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700"
                                   oninput="updateEssayScore()">
                        </div>

                        <div>
                            <div class="flex justify-between mb-1">
                                <label class="text-sm font-medium text-gray-700 dark:text-gray-300">Goal Clarity (10 points)</label>
                                <span class="text-sm font-semibold text-purple-600" id="goals-value">0</span>
                            </div>
                            <input type="range" id="goals-slider" min="0" max="10" value="0" 
                                   class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700"
                                   oninput="updateEssayScore()">
                        </div>

                        <div>
                            <div class="flex justify-between mb-1">
                                <label class="text-sm font-medium text-gray-700 dark:text-gray-300">Authenticity (5 points)</label>
                                <span class="text-sm font-semibold text-purple-600" id="authenticity-value">0</span>
                            </div>
                            <input type="range" id="authenticity-slider" min="0" max="5" value="0" 
                                   class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700"
                                   oninput="updateEssayScore()">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Essay Notes
                            </label>
                            <textarea id="essay-notes" class="block w-full text-sm border-gray-300 rounded-lg shadow-sm focus:ring-purple-500 focus:border-purple-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300" 
                                      rows="3" placeholder="Add notes about the essay..."></textarea>
                        </div>
                    </div>
                </div>

                {{-- Financial Need Card --}}
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow">
                    <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                        <div class="flex justify-between items-center">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                <i class="fas fa-hand-holding-usd mr-2 text-yellow-500"></i>
                                Financial Need (20 points)
                            </h3>
                            <div class="text-right">
                                <div class="text-xl font-bold text-yellow-600 dark:text-yellow-400" id="financial-score">0</div>
                                <div class="text-sm text-gray-600 dark:text-gray-400">/ 20</div>
                            </div>
                        </div>
                    </div>
                    <div class="p-6 space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Demonstrated Need (12 points)
                            </label>
                            <select id="need-select" class="block w-full text-sm border-gray-300 rounded-lg shadow-sm focus:ring-yellow-500 focus:border-yellow-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300"
                                    onchange="updateFinancialScore()">
                                <option value="0">Low need</option>
                                <option value="4">Moderate need</option>
                                <option value="8">High need</option>
                                <option value="12">Critical need</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Scholarship Impact (8 points)
                            </label>
                            <select id="impact-financial-select" class="block w-full text-sm border-gray-300 rounded-lg shadow-sm focus:ring-yellow-500 focus:border-yellow-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300"
                                    onchange="updateFinancialScore()">
                                <option value="0">Minimal impact</option>
                                <option value="2">Moderate impact</option>
                                <option value="5">Significant impact</option>
                                <option value="8">Life-changing impact</option>
                            </select>
                        </div>
                    </div>
                </div>

                {{-- Final Evaluation Card --}}
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow">
                    <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                            <i class="fas fa-flag-checkered mr-2 text-red-500"></i>
                            Final Evaluation & Comments
                        </h3>
                    </div>
                    <div class="p-6 space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Overall Comments
                            </label>
                            <textarea id="final-comments" class="block w-full text-sm border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300" 
                                      rows="4" placeholder="Provide final assessment, key strengths, areas for improvement, and justification for recommendation..."></textarea>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    Final Score Classification
                                </label>
                                <div id="score-classification" class="text-lg font-semibold text-blue-600 dark:text-blue-400">
                                    Not Scored
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    Auto-Save Status
                                </label>
                                <div class="flex items-center text-green-600 dark:text-green-400">
                                    <i class="fas fa-check-circle mr-2"></i>
                                    <span id="save-status">Saved just now</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        // Initialize scores
        let scores = {
            academic: { gpa: 0, rigor: 0, achievements: 0, total: 0 },
            leadership: { roles: 0, impact: 0, duration: 0, total: 0 },
            essay: { writing: 0, goals: 0, authenticity: 0, total: 0 },
            financial: { need: 0, impact: 0, total: 0 }
        };

        // Initialize with demo values
        document.addEventListener('DOMContentLoaded', function() {
            // Set demo values
            document.getElementById('gpa-slider').value = 13;
            document.getElementById('rigor-slider').value = 7;
            document.getElementById('achievements-slider').value = 5;
            document.getElementById('leadership-select').value = 6;
            document.getElementById('impact-select').value = 8;
            document.getElementById('duration-select').value = 4;
            document.getElementById('writing-slider').value = 8;
            document.getElementById('goals-slider').value = 9;
            document.getElementById('authenticity-slider').value = 4;
            document.getElementById('need-select').value = 8;
            document.getElementById('impact-financial-select').value = 5;
            document.getElementById('recommendation-select').value = 'recommend';

            // Initial updates
            updateAcademicScore();
            updateLeadershipScore();
            updateEssayScore();
            updateFinancialScore();
            updateTotalScore();
        });

        function updateAcademicScore() {
            scores.academic.gpa = parseInt(document.getElementById('gpa-slider').value);
            scores.academic.rigor = parseInt(document.getElementById('rigor-slider').value);
            scores.academic.achievements = parseInt(document.getElementById('achievements-slider').value);
            
            scores.academic.total = scores.academic.gpa + scores.academic.rigor + scores.academic.achievements;
            
            // Update displays
            document.getElementById('gpa-value').textContent = scores.academic.gpa;
            document.getElementById('rigor-value').textContent = scores.academic.rigor;
            document.getElementById('achievements-value').textContent = scores.academic.achievements;
            document.getElementById('academic-score').textContent = scores.academic.total;
            
            updateTotalScore();
            autoSave();
        }

        function updateLeadershipScore() {
            scores.leadership.roles = parseInt(document.getElementById('leadership-select').value);
            scores.leadership.impact = parseInt(document.getElementById('impact-select').value);
            scores.leadership.duration = parseInt(document.getElementById('duration-select').value);
            
            scores.leadership.total = scores.leadership.roles + scores.leadership.impact + scores.leadership.duration;
            
            document.getElementById('leadership-score').textContent = scores.leadership.total;
            
            updateTotalScore();
            autoSave();
        }

        function updateEssayScore() {
            scores.essay.writing = parseInt(document.getElementById('writing-slider').value);
            scores.essay.goals = parseInt(document.getElementById('goals-slider').value);
            scores.essay.authenticity = parseInt(document.getElementById('authenticity-slider').value);
            
            scores.essay.total = scores.essay.writing + scores.essay.goals + scores.essay.authenticity;
            
            // Update displays
            document.getElementById('writing-value').textContent = scores.essay.writing;
            document.getElementById('goals-value').textContent = scores.essay.goals;
            document.getElementById('authenticity-value').textContent = scores.essay.authenticity;
            document.getElementById('essay-score').textContent = scores.essay.total;
            
            updateTotalScore();
            autoSave();
        }

        function updateFinancialScore() {
            scores.financial.need = parseInt(document.getElementById('need-select').value);
            scores.financial.impact = parseInt(document.getElementById('impact-financial-select').value);
            
            scores.financial.total = scores.financial.need + scores.financial.impact;
            
            document.getElementById('financial-score').textContent = scores.financial.total;
            
            updateTotalScore();
            autoSave();
        }

        function updateTotalScore() {
            const total = scores.academic.total + scores.leadership.total + scores.essay.total + scores.financial.total;
            
            // Update total displays
            document.getElementById('total-score').textContent = total;
            document.getElementById('current-score-display').textContent = total;
            
            // Update classification
            const classification = document.getElementById('score-classification');
            if (total >= 85) {
                classification.textContent = 'Excellent (85-100)';
                classification.className = 'text-lg font-semibold text-green-600 dark:text-green-400';
            } else if (total >= 70) {
                classification.textContent = 'Good (70-84)';
                classification.className = 'text-lg font-semibold text-blue-600 dark:text-blue-400';
            } else if (total >= 60) {
                classification.textContent = 'Average (60-69)';
                classification.className = 'text-lg font-semibold text-yellow-600 dark:text-yellow-400';
            } else {
                classification.textContent = 'Below Average (< 60)';
                classification.className = 'text-lg font-semibold text-red-600 dark:text-red-400';
            }
        }

        function setQuickScore(level) {
            // Remove active classes
            document.querySelectorAll('.quick-score-btn').forEach(btn => {
                btn.classList.remove('ring-2', 'ring-offset-1');
            });
            
            // Add active class to clicked button
            event.target.classList.add('ring-2', 'ring-offset-1');
            
            // Set scores based on quick evaluation
            let presetScores = {};
            switch(level) {
                case 'excellent':
                    presetScores = { gpa: 14, rigor: 8, achievements: 5, roles: 8, impact: 9, duration: 5, writing: 9, goals: 9, authenticity: 4, need: 10, impactFinancial: 6 };
                    break;
                case 'good':
                    presetScores = { gpa: 12, rigor: 6, achievements: 4, roles: 6, impact: 7, duration: 4, writing: 7, goals: 7, authenticity: 3, need: 8, impactFinancial: 4 };
                    break;
                case 'average':
                    presetScores = { gpa: 8, rigor: 4, achievements: 2, roles: 3, impact: 4, duration: 2, writing: 5, goals: 5, authenticity: 2, need: 6, impactFinancial: 2 };
                    break;
            }
            
            // Apply preset scores
            document.getElementById('gpa-slider').value = presetScores.gpa;
            document.getElementById('rigor-slider').value = presetScores.rigor;
            document.getElementById('achievements-slider').value = presetScores.achievements;
            document.getElementById('leadership-select').value = presetScores.roles;
            document.getElementById('impact-select').value = presetScores.impact;
            document.getElementById('duration-select').value = presetScores.duration;
            document.getElementById('writing-slider').value = presetScores.writing;
            document.getElementById('goals-slider').value = presetScores.goals;
            document.getElementById('authenticity-slider').value = presetScores.authenticity;
            document.getElementById('need-select').value = presetScores.need;
            document.getElementById('impact-financial-select').value = presetScores.impactFinancial;
            
            // Update all scores
            updateAcademicScore();
            updateLeadershipScore();
            updateEssayScore();
            updateFinancialScore();
        }

        function setPriority(level) {
            // Remove active classes
            document.querySelectorAll('.priority-btn').forEach(btn => {
                btn.classList.remove('ring-2', 'ring-offset-1');
            });
            
            // Add active class to clicked button
            event.target.classList.add('ring-2', 'ring-offset-1');
            
            // Set recommendation based on priority
            const select = document.getElementById('recommendation-select');
            if (level === 'high') {
                select.value = 'highly-recommend';
            } else if (level === 'medium') {
                select.value = 'recommend';
            } else {
                select.value = 'recommend-with-reservations';
            }
        }

        function autoSave() {
            const status = document.getElementById('save-status');
            const now = new Date();
            const timeString = now.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
            
            status.textContent = `Saved at ${timeString}`;
            status.className = 'flex items-center text-green-600 dark:text-green-400';
            
            // Simulate API call
            console.log('Auto-saving evaluation data...');
        }

        function saveEvaluation() {
            const status = document.getElementById('save-status');
            status.textContent = 'Saving...';
            status.className = 'flex items-center text-yellow-600 dark:text-yellow-400';
            
            // Simulate API call
            setTimeout(() => {
                status.textContent = 'Saved successfully';
                status.className = 'flex items-center text-green-600 dark:text-green-400';
                
                // Show toast notification
                showToast('Evaluation saved successfully', 'success');
            }, 1000);
        }

        function submitEvaluation() {
            const totalScore = parseInt(document.getElementById('total-score').textContent);
            const recommendation = document.getElementById('recommendation-select').value;
            const comments = document.getElementById('final-comments').value;
            
            if (!recommendation) {
                showToast('Please select a recommendation', 'error');
                return;
            }
            
            if (confirm(`Submit final evaluation with score ${totalScore}/100?`)) {
                // Here you would typically submit to Laravel backend
                const evaluationData = {
                    totalScore,
                    recommendation,
                    comments,
                    scores: scores,
                    timestamp: new Date().toISOString()
                };
                
                console.log('Submitting evaluation:', evaluationData);
                
                // Show success message
                showToast('Evaluation submitted successfully!', 'success');
                
                // Redirect or update UI
                setTimeout(() => {
                    window.location.href = '/admin/scholarships';
                }, 1500);
            }
        }

        function printScoreSheet() {
            window.print();
        }

        function showToast(message, type) {
            // Create toast element
            const toast = document.createElement('div');
            toast.className = `fixed top-4 right-4 z-50 flex items-center p-4 mb-4 text-sm rounded-lg shadow-lg ${
                type === 'success' ? 'text-green-800 bg-green-100 dark:bg-green-800 dark:text-green-300' :
                type === 'error' ? 'text-red-800 bg-red-100 dark:bg-red-800 dark:text-red-300' :
                'text-blue-800 bg-blue-100 dark:bg-blue-800 dark:text-blue-300'
            }`;
            
            toast.innerHTML = `
                <i class="fas fa-${type === 'success' ? 'check-circle' : type === 'error' ? 'exclamation-circle' : 'info-circle'} mr-3"></i>
                <span class="font-medium">${message}</span>
                <button type="button" class="ml-auto -mx-1.5 -my-1.5 rounded-lg p-1.5 inline-flex h-8 w-8 hover:bg-gray-200 dark:hover:bg-gray-600" onclick="this.parentElement.remove()">
                    <i class="fas fa-times"></i>
                </button>
            `;
            
            document.body.appendChild(toast);
            
            // Auto remove after 5 seconds
            setTimeout(() => {
                if (toast.parentElement) {
                    toast.remove();
                }
            }, 5000);
        }
    </script>
    @endpush

    @push('styles')
    <style>
        @media print {
            .no-print {
                display: none !important;
            }
            
            body {
                font-size: 12px;
            }
            
            .bg-white {
                background-color: white !important;
                border: 1px solid #e5e7eb !important;
            }
        }
        
        input[type="range"]::-webkit-slider-thumb {
            appearance: none;
            height: 20px;
            width: 20px;
            border-radius: 50%;
            background: #3b82f6;
            cursor: pointer;
            border: 2px solid white;
            box-shadow: 0 0 2px rgba(0,0,0,0.2);
        }
        
        input[type="range"]::-moz-range-thumb {
            height: 20px;
            width: 20px;
            border-radius: 50%;
            background: #3b82f6;
            cursor: pointer;
            border: 2px solid white;
            box-shadow: 0 0 2px rgba(0,0,0,0.2);
        }
        
        .quick-score-btn.active, .priority-btn.active {
            ring-width: 2px;
            ring-offset-width: 1px;
        }
    </style>
    @endpush
</x-admin>