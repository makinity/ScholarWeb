<x-user title="Score Sheet">
    <div class="max-w-7xl mx-auto space-y-6">
        {{-- PAGE HEADER --}}
        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white">
                    <i class="fas fa-award mr-2 text-blue-600"></i>
                    Scholarship Evaluation Score Sheet
                </h1>
                <p class="text-gray-600 dark:text-gray-400">Evaluate and score scholarship applications</p>
            </div>
            <div class="flex space-x-3">
                <button type="button" class="text-gray-900 bg-white border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                    <i class="fas fa-download mr-2"></i> Export
                </button>
                <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                    <i class="fas fa-save mr-2"></i> Save Draft
                </button>
            </div>
        </div>

        {{-- APPLICANT INFO CARD --}}
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                {{-- Applicant Info --}}
                <div class="p-4 bg-blue-50 dark:bg-blue-900/20 rounded-lg">
                    <div class="flex items-center mb-3">
                        <div class="p-2 bg-blue-100 dark:bg-blue-800 rounded-lg mr-3">
                            <i class="fas fa-user text-blue-600 dark:text-blue-300"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900 dark:text-white">Applicant Information</h3>
                            <p class="text-sm text-gray-600 dark:text-gray-400">#SAP-2023-0876</p>
                        </div>
                    </div>
                    <h2 class="text-xl font-bold text-gray-900 dark:text-white mb-1">Sheryl Aleviado</h2>
                    <p class="text-gray-600 dark:text-gray-400">Bachelor of Information Technology | 3rd Year</p>
                    <div class="mt-3">
                        <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">Submitted: 2023-11-15</span>
                    </div>
                </div>

                {{-- Academic Info --}}
                <div class="p-4 bg-green-50 dark:bg-green-900/20 rounded-lg">
                    <div class="flex items-center mb-3">
                        <div class="p-2 bg-green-100 dark:bg-green-800 rounded-lg mr-3">
                            <i class="fas fa-graduation-cap text-green-600 dark:text-green-300"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900 dark:text-white">Academic Record</h3>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Current Status</p>
                        </div>
                    </div>
                    <div class="flex items-center justify-between">
                        <div>
                            <div class="text-2xl font-bold text-gray-900 dark:text-white">3.92 GPA</div>
                            <p class="text-gray-600 dark:text-gray-400">University of Excellence</p>
                        </div>
                        <div class="flex items-center">
                            <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">Top 5%</span>
                        </div>
                    </div>
                </div>

                {{-- Evaluation Status --}}
                <div class="p-4 bg-purple-50 dark:bg-purple-900/20 rounded-lg">
                    <div class="flex items-center mb-3">
                        <div class="p-2 bg-purple-100 dark:bg-purple-800 rounded-lg mr-3">
                            <i class="fas fa-clipboard-check text-purple-600 dark:text-purple-300"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900 dark:text-white">Evaluation Status</h3>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Current Progress</p>
                        </div>
                    </div>
                    <div class="flex items-center justify-between">
                        <div>
                            <div class="text-lg font-semibold text-purple-600 dark:text-purple-300">In Progress</div>
                            <p class="text-gray-600 dark:text-gray-400">Evaluator: Dr. Johnson</p>
                        </div>
                        <div class="w-24">
                            <div class="h-2 bg-gray-200 rounded-full dark:bg-gray-700">
                                <div class="h-2 bg-purple-600 rounded-full dark:bg-purple-500" style="width: 65%"></div>
                            </div>
                            <span class="text-xs text-gray-600 dark:text-gray-400 mt-1">65% complete</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- MAIN SCORING SECTION --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            {{-- LEFT COLUMN: SCORING CRITERIA --}}
            <div class="lg:col-span-2 space-y-6">
                {{-- Criteria 1: Academic Excellence --}}
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow">
                    <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                        <div class="flex justify-between items-center">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                    <i class="fas fa-graduation-cap text-blue-600 dark:text-blue-400 mr-2"></i>
                                    Academic Excellence
                                </h3>
                                <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Maximum: 30 points</p>
                            </div>
                            <div class="text-right">
                                <div class="text-2xl font-bold text-blue-600 dark:text-blue-400" id="academic-score">0</div>
                                <div class="text-sm text-gray-600 dark:text-gray-400">/ 30</div>
                            </div>
                        </div>
                    </div>
                    <div class="p-6 space-y-6">
                        {{-- GPA Score --}}
                        <div>
                            <div class="flex justify-between mb-2">
                                <label class="text-sm font-medium text-gray-900 dark:text-white">Cumulative GPA (15 points)</label>
                                <span class="text-sm font-semibold text-blue-600" id="gpa-value">0</span>
                            </div>
                            <input id="gpa-slider" type="range" min="0" max="15" value="0" 
                                   class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700"
                                   oninput="updateScore()">
                            <div class="flex justify-between text-xs text-gray-500 mt-1">
                                <span>3.0 GPA (0 pts)</span>
                                <span>3.5 GPA (8 pts)</span>
                                <span>4.0 GPA (15 pts)</span>
                            </div>
                        </div>

                        {{-- Consistency Score --}}
                        <div>
                            <div class="flex justify-between mb-2">
                                <label class="text-sm font-medium text-gray-900 dark:text-white">Academic Consistency (9 points)</label>
                                <span class="text-sm font-semibold text-blue-600" id="consistency-value">0</span>
                            </div>
                            <input id="consistency-slider" type="range" min="0" max="9" value="0" 
                                   class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700"
                                   oninput="updateScore()">
                        </div>

                        {{-- Course Rigor --}}
                        <div>
                            <div class="flex justify-between mb-2">
                                <label class="text-sm font-medium text-gray-900 dark:text-white">Course Rigor (6 points)</label>
                                <span class="text-sm font-semibold text-blue-600" id="rigor-value">0</span>
                            </div>
                            <input id="rigor-slider" type="range" min="0" max="6" value="0" 
                                   class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700"
                                   oninput="updateScore()">
                        </div>

                        {{-- Notes --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-900 dark:text-white mb-2">
                                <i class="fas fa-edit mr-2"></i>Evaluator Notes
                            </label>
                            <textarea class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                                      rows="3" placeholder="Add notes about academic performance..."></textarea>
                        </div>
                    </div>
                </div>

                {{-- Criteria 2: Leadership & Activities --}}
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow">
                    <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                        <div class="flex justify-between items-center">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                    <i class="fas fa-users text-green-600 dark:text-green-400 mr-2"></i>
                                    Leadership & Activities
                                </h3>
                                <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Maximum: 25 points</p>
                            </div>
                            <div class="text-right">
                                <div class="text-2xl font-bold text-green-600 dark:text-green-400" id="leadership-score">0</div>
                                <div class="text-sm text-gray-600 dark:text-gray-400">/ 25</div>
                            </div>
                        </div>
                    </div>
                    <div class="p-6 space-y-4">
                        {{-- Leadership Positions --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-900 dark:text-white mb-2">
                                Leadership Positions (9 points)
                            </label>
                            <select id="leadership-select" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    onchange="updateScore()">
                                <option value="0">No leadership positions</option>
                                <option value="3">1 position (Club member)</option>
                                <option value="6">2-3 positions (Officer level)</option>
                                <option value="9">4+ positions (President/Founder)</option>
                            </select>
                        </div>

                        {{-- Impact Level --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-900 dark:text-white mb-2">
                                Impact & Initiative (10 points)
                            </label>
                            <select id="impact-select" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    onchange="updateScore()">
                                <option value="0">Limited impact</option>
                                <option value="3">Moderate impact</option>
                                <option value="6">Significant impact</option>
                                <option value="10">Exceptional impact</option>
                            </select>
                        </div>

                        {{-- Commitment Duration --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-900 dark:text-white mb-2">
                                Commitment Duration (6 points)
                            </label>
                            <select id="commitment-select" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    onchange="updateScore()">
                                <option value="0">Less than 6 months</option>
                                <option value="2">6-12 months</option>
                                <option value="4">1-2 years</option>
                                <option value="6">2+ years</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            {{-- RIGHT COLUMN: SCORE SUMMARY --}}
            <div class="space-y-6">
                {{-- Total Score Card --}}
                <div class="bg-gradient-to-br from-blue-600 to-blue-800 rounded-lg shadow-lg text-white p-6">
                    <div class="text-center">
                        <div class="text-sm font-medium opacity-90">TOTAL SCORE</div>
                        <div class="text-5xl font-bold my-4" id="total-score">0</div>
                        <div class="text-lg opacity-90">out of 100 points</div>
                        <div id="score-classification" class="inline-flex items-center justify-center px-3 py-1 mt-3 rounded-full text-xs font-semibold bg-white/20 text-white">
                            Pending review
                        </div>
                        <p class="text-sm text-blue-100 mt-2" id="auto-recommendation">Adjust scores to generate a recommendation.</p>
                        
                        <div class="mt-6 space-y-3">
                            <div class="flex justify-between items-center">
                                <span class="text-sm">Academic Excellence</span>
                                <span class="font-semibold" id="summary-academic">0/30</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-sm">Leadership & Activities</span>
                                <span class="font-semibold" id="summary-leadership">0/25</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-sm">Essay Quality</span>
                                <span class="font-semibold" id="summary-essay">0/25</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-sm">Financial Need</span>
                                <span class="font-semibold" id="summary-financial">0/20</span>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Score Breakdown --}}
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
                    <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Score Breakdown</h4>
                    <div class="space-y-4">
                        {{-- Essay Score --}}
                        <div>
                            <div class="flex justify-between mb-1">
                                <span class="text-sm font-medium text-gray-900 dark:text-white">Essay Quality</span>
                                <span class="text-sm font-semibold text-purple-600" id="essay-value">0/25</span>
                            </div>
                            <input id="essay-slider" type="range" min="0" max="25" value="0" 
                                   class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700"
                                   oninput="updateScore()">
                        </div>

                        {{-- Financial Need --}}
                        <div>
                            <div class="flex justify-between mb-1">
                                <span class="text-sm font-medium text-gray-900 dark:text-white">Financial Need</span>
                                <span class="text-sm font-semibold text-yellow-600" id="financial-value">0/20</span>
                            </div>
                            <input id="financial-slider" type="range" min="0" max="20" value="0" 
                                   class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700"
                                   oninput="updateScore()">
                        </div>

                        {{-- Recommendation --}}
                        <div class="pt-4 border-t border-gray-200 dark:border-gray-700">
                            <label class="block text-sm font-medium text-gray-900 dark:text-white mb-2">
                                Final Recommendation
                            </label>
                            <select id="final-recommendation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="">Select recommendation</option>
                                <option value="accept">Highly Recommend</option>
                                <option value="consider">Recommend</option>
                                <option value="reject">Do Not Recommend</option>
                            </select>
                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-2">We pre-fill this from the total score—adjust if your judgment differs.</p>
                        </div>
                    </div>
                </div>

                {{-- Action Buttons --}}
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
                    <div class="space-y-3">
                        <button type="button" onclick="submitEvaluation()" class="w-full text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                            <i class="fas fa-check-circle mr-2"></i> Submit Final Evaluation
                        </button>
                        
                        <button type="button" onclick="resetScores()" class="w-full text-gray-900 bg-white border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                            <i class="fas fa-redo mr-2"></i> Reset All Scores
                        </button>
                        
                        <button type="button" onclick="window.print()" class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <i class="fas fa-print mr-2"></i> Print Score Sheet
                        </button>
                    </div>
                </div>
            </div>
        </div>

        {{-- EVALUATION NOTES --}}
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                <i class="fas fa-comment-alt mr-2"></i> Overall Evaluation Notes
            </h3>
            <textarea class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                      rows="4" placeholder="Enter overall comments, strengths, weaknesses, and final assessment..."></textarea>
            <div class="mt-4 flex justify-end">
                <div class="text-sm text-gray-500 dark:text-gray-400">
                    Last updated: <span id="last-updated">Just now</span>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        function updateScore() {
            // Academic scores
            const gpaScore = parseInt(document.getElementById('gpa-slider').value);
            const consistencyScore = parseInt(document.getElementById('consistency-slider').value);
            const rigorScore = parseInt(document.getElementById('rigor-slider').value);
            const academicTotal = gpaScore + consistencyScore + rigorScore;
            
            // Leadership scores
            const leadershipScore = parseInt(document.getElementById('leadership-select').value);
            const impactScore = parseInt(document.getElementById('impact-select').value);
            const commitmentScore = parseInt(document.getElementById('commitment-select').value);
            const leadershipTotal = leadershipScore + impactScore + commitmentScore;
            
            // Other scores
            const essayScore = parseInt(document.getElementById('essay-slider').value);
            const financialScore = parseInt(document.getElementById('financial-slider').value);
            
            // Update displays
            document.getElementById('gpa-value').textContent = gpaScore;
            document.getElementById('consistency-value').textContent = consistencyScore;
            document.getElementById('rigor-value').textContent = rigorScore;
            document.getElementById('academic-score').textContent = academicTotal;
            
            document.getElementById('leadership-score').textContent = leadershipTotal;
            document.getElementById('essay-value').textContent = `${essayScore}/25`;
            document.getElementById('financial-value').textContent = `${financialScore}/20`;
            
            // Update summary
            document.getElementById('summary-academic').textContent = `${academicTotal}/30`;
            document.getElementById('summary-leadership').textContent = `${leadershipTotal}/25`;
            document.getElementById('summary-essay').textContent = `${essayScore}/25`;
            document.getElementById('summary-financial').textContent = `${financialScore}/20`;
            
            // Calculate total
            const totalScore = academicTotal + leadershipTotal + essayScore + financialScore;
            document.getElementById('total-score').textContent = totalScore;

            // Classification and recommendation
            let classification = 'Pending review';
            let badgeClass = 'bg-white/20 text-white';
            let recommendation = { label: 'Select scores to evaluate', value: '' };

            if (totalScore >= 85) {
                classification = 'Outstanding';
                badgeClass = 'bg-green-500/20 text-white';
                recommendation = { label: 'Highly Recommend', value: 'accept' };
            } else if (totalScore >= 65) {
                classification = 'Competitive';
                badgeClass = 'bg-blue-500/20 text-white';
                recommendation = { label: 'Recommend', value: 'consider' };
            } else if (totalScore > 0) {
                classification = 'Below Threshold';
                badgeClass = 'bg-red-500/20 text-white';
                recommendation = { label: 'Do Not Recommend', value: 'reject' };
            }

            const classificationChip = document.getElementById('score-classification');
            if (classificationChip) {
                classificationChip.textContent = classification;
                classificationChip.className = `inline-flex items-center justify-center px-3 py-1 mt-3 rounded-full text-xs font-semibold ${badgeClass}`;
            }

            const recommendationSelect = document.getElementById('final-recommendation');
            const recommendationDisplay = document.getElementById('auto-recommendation');
            let recommendationLabel = recommendation.label;

            if (recommendationSelect) {
                if (!recommendationSelect.value && recommendation.value) {
                    recommendationSelect.value = recommendation.value;
                }

                if (recommendationSelect.value) {
                    recommendationLabel = recommendationSelect.options[recommendationSelect.selectedIndex].text;
                }
            }

            if (recommendationDisplay) {
                recommendationDisplay.textContent = recommendationLabel;
            }
            
            // Update timestamp
            const now = new Date();
            document.getElementById('last-updated').textContent = 
                `${now.getHours().toString().padStart(2, '0')}:${now.getMinutes().toString().padStart(2, '0')}`;
        }
        
        function resetScores() {
            // Reset all inputs to default
            document.getElementById('gpa-slider').value = 0;
            document.getElementById('consistency-slider').value = 0;
            document.getElementById('rigor-slider').value = 0;
            document.getElementById('leadership-select').value = 0;
            document.getElementById('impact-select').value = 0;
            document.getElementById('commitment-select').value = 0;
            document.getElementById('essay-slider').value = 0;
            document.getElementById('financial-slider').value = 0;
            const finalRecommendation = document.getElementById('final-recommendation');
            if (finalRecommendation) {
                finalRecommendation.value = '';
            }
            
            // Trigger update
            updateScore();
        }
        
        function submitEvaluation() {
            const totalScore = parseInt(document.getElementById('total-score').textContent);
            const recommendationSelect = document.getElementById('final-recommendation');
            
            // Determine recommendation based on score
            let recommendation = 'Do Not Recommend';
            let recommendationValue = 'reject';
            if (totalScore >= 85) {
                recommendation = 'Highly Recommend';
                recommendationValue = 'accept';
            } else if (totalScore >= 65) {
                recommendation = 'Recommend';
                recommendationValue = 'consider';
            }

            if (recommendationSelect && recommendationSelect.value) {
                recommendationValue = recommendationSelect.value;
                recommendation = recommendationSelect.options[recommendationSelect.selectedIndex].text;
            }

            const classification = document.getElementById('score-classification')?.textContent || 'Pending review';
            
            // Show confirmation modal or alert
            if (confirm(`Submit evaluation with total score of ${totalScore}/100?\nClassification: ${classification}\nRecommendation: ${recommendation}`)) {
                // Here you would typically submit to server
                console.log('Evaluation submitted:', {
                    totalScore,
                    recommendation,
                    recommendationValue,
                    classification,
                    timestamp: new Date().toISOString()
                });
                
                // Show success message
                alert('Evaluation submitted successfully!');
            }
        }
        
        // Initialize with demo values
        document.addEventListener('DOMContentLoaded', function() {
            // Set demo values
            document.getElementById('gpa-slider').value = 13;
            document.getElementById('consistency-slider').value = 7;
            document.getElementById('rigor-slider').value = 5;
            document.getElementById('leadership-select').value = 6;
            document.getElementById('impact-select').value = 8;
            document.getElementById('commitment-select').value = 4;
            document.getElementById('essay-slider').value = 19;
            document.getElementById('financial-slider').value = 15;

            const recommendationSelect = document.getElementById('final-recommendation');
            if (recommendationSelect) {
                recommendationSelect.value = '';
                recommendationSelect.addEventListener('change', updateScore);
            }
            
            // Initial update
            updateScore();
        });
    </script>
    @endpush
</x-user>
