<x-admin>
    <!-- ANALYTICS DASHBOARD - resources/views/admin/analytics/index.blade.php -->
<div class="p-6">
    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-2xl font-bold text-gray-800">Analytics & Reports</h1>
        <p class="text-gray-600">Track application trends and insights</p>
    </div>

    <!-- Date Range Filter -->
    <div class="bg-white rounded-lg shadow border border-gray-200 p-4 mb-6">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div class="flex items-center space-x-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Date Range</label>
                    <select class="border border-gray-300 rounded-lg px-3 py-2">
                        <option>Last 7 days</option>
                        <option>Last 30 days</option>
                        <option>Last 90 days</option>
                        <option>This Year</option>
                        <option>Custom Range</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Scholarship</label>
                    <select class="border border-gray-300 rounded-lg px-3 py-2">
                        <option>All Scholarships</option>
                        <option>Academic Excellence</option>
                        <option>STEM Scholarship</option>
                        <option>Financial Need</option>
                    </select>
                </div>
            </div>
            <div class="flex space-x-3">
                <button class="px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50">
                    <i class="fas fa-download mr-2"></i>Export
                </button>
                <button class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                    <i class="fas fa-filter mr-2"></i>Apply Filters
                </button>
            </div>
        </div>
    </div>

    <!-- Quick Stats -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <div class="bg-white rounded-lg shadow border border-gray-200 p-6">
            <div class="flex items-center">
                <div class="p-3 bg-blue-100 rounded-lg mr-4">
                    <i class="fas fa-users text-blue-600 text-xl"></i>
                </div>
                <div>
                    <p class="text-sm text-gray-600">Total Applicants</p>
                    <p class="text-2xl font-bold">156</p>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-lg shadow border border-gray-200 p-6">
            <div class="flex items-center">
                <div class="p-3 bg-green-100 rounded-lg mr-4">
                    <i class="fas fa-graduation-cap text-green-600 text-xl"></i>
                </div>
                <div>
                    <p class="text-sm text-gray-600">Unique Schools</p>
                    <p class="text-2xl font-bold">24</p>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-lg shadow border border-gray-200 p-6">
            <div class="flex items-center">
                <div class="p-3 bg-purple-100 rounded-lg mr-4">
                    <i class="fas fa-chart-line text-purple-600 text-xl"></i>
                </div>
                <div>
                    <p class="text-sm text-gray-600">Approval Rate</p>
                    <p class="text-2xl font-bold">57%</p>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-lg shadow border border-gray-200 p-6">
            <div class="flex items-center">
                <div class="p-3 bg-yellow-100 rounded-lg mr-4">
                    <i class="fas fa-clock text-yellow-600 text-xl"></i>
                </div>
                <div>
                    <p class="text-sm text-gray-600">Avg. GPA</p>
                    <p class="text-2xl font-bold">3.42</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
        <!-- Applications by School (Bar Chart) -->
        <div class="bg-white rounded-lg shadow border border-gray-200 p-6">
            <div class="flex justify-between items-center mb-6">
                <h3 class="font-bold text-gray-800 text-lg">Applications by School</h3>
                <select class="border border-gray-300 rounded-lg px-3 py-1 text-sm">
                    <option>Top 10 Schools</option>
                    <option>All Schools</option>
                </select>
            </div>
            <div class="h-72">
                <canvas id="schoolChart"></canvas>
            </div>
        </div>

        <!-- Applications by Grade Level (Doughnut Chart) -->
        <div class="bg-white rounded-lg shadow border border-gray-200 p-6">
            <div class="flex justify-between items-center mb-6">
                <h3 class="font-bold text-gray-800 text-lg">Applications by Grade Level</h3>
                <select class="border border-gray-300 rounded-lg px-3 py-1 text-sm">
                    <option>All Scholarships</option>
                    <option>By Scholarship</option>
                </select>
            </div>
            <div class="h-72">
                <canvas id="gradeChart"></canvas>
            </div>
        </div>

        <!-- Applications Trend (Line Chart) -->
        <div class="bg-white rounded-lg shadow border border-gray-200 p-6 lg:col-span-2">
            <div class="flex justify-between items-center mb-6">
                <h3 class="font-bold text-gray-800 text-lg">Application Trends (Last 30 Days)</h3>
                <div class="flex space-x-2">
                    <button class="px-3 py-1 border rounded-lg text-sm hover:bg-gray-50">Daily</button>
                    <button class="px-3 py-1 bg-blue-600 text-white rounded-lg text-sm">Weekly</button>
                    <button class="px-3 py-1 border rounded-lg text-sm hover:bg-gray-50">Monthly</button>
                </div>
            </div>
            <div class="h-80">
                <canvas id="trendChart"></canvas>
            </div>
        </div>

        <!-- Status Distribution (Pie Chart) -->
        <div class="bg-white rounded-lg shadow border border-gray-200 p-6">
            <div class="flex justify-between items-center mb-6">
                <h3 class="font-bold text-gray-800 text-lg">Application Status</h3>
                <span class="text-sm text-gray-600">Overall Distribution</span>
            </div>
            <div class="h-72">
                <canvas id="statusChart"></canvas>
            </div>
        </div>

        <!-- GPA Distribution (Histogram) -->
        <div class="bg-white rounded-lg shadow border border-gray-200 p-6">
            <div class="flex justify-between items-center mb-6">
                <h3 class="font-bold text-gray-800 text-lg">GPA Distribution</h3>
                <span class="text-sm text-gray-600">Applicant Academic Performance</span>
            </div>
            <div class="h-72">
                <canvas id="gpaChart"></canvas>
            </div>
        </div>
    </div>

    <!-- Detailed Reports Table -->
    <div class="bg-white rounded-lg shadow border border-gray-200 p-6">
        <div class="flex justify-between items-center mb-6">
            <h3 class="font-bold text-gray-800 text-lg">School Performance Report</h3>
            <button class="px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50">
                <i class="fas fa-print mr-2"></i>Print Report
            </button>
        </div>
        
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-700">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th class="px-4 py-3">School Name</th>
                        <th class="px-4 py-3">Total Applicants</th>
                        <th class="px-4 py-3">Approved</th>
                        <th class="px-4 py-3">Rejected</th>
                        <th class="px-4 py-3">Pending</th>
                        <th class="px-4 py-3">Approval Rate</th>
                        <th class="px-4 py-3">Avg. GPA</th>
                        <th class="px-4 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <td class="px-4 py-3 font-medium">University of Manila</td>
                        <td class="px-4 py-3">45</td>
                        <td class="px-4 py-3">
                            <span class="px-2 py-1 bg-green-100 text-green-800 rounded text-xs">25</span>
                        </td>
                        <td class="px-4 py-3">
                            <span class="px-2 py-1 bg-red-100 text-red-800 rounded text-xs">12</span>
                        </td>
                        <td class="px-4 py-3">
                            <span class="px-2 py-1 bg-yellow-100 text-yellow-800 rounded text-xs">8</span>
                        </td>
                        <td class="px-4 py-3 font-medium">55.6%</td>
                        <td class="px-4 py-3">3.65</td>
                        <td class="px-4 py-3">
                            <button class="text-blue-600 hover:text-blue-800 text-sm">View Details</button>
                        </td>
                    </tr>
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <td class="px-4 py-3 font-medium">Polytechnic University</td>
                        <td class="px-4 py-3">38</td>
                        <td class="px-4 py-3">
                            <span class="px-2 py-1 bg-green-100 text-green-800 rounded text-xs">22</span>
                        </td>
                        <td class="px-4 py-3">
                            <span class="px-2 py-1 bg-red-100 text-red-800 rounded text-xs">10</span>
                        </td>
                        <td class="px-4 py-3">
                            <span class="px-2 py-1 bg-yellow-100 text-yellow-800 rounded text-xs">6</span>
                        </td>
                        <td class="px-4 py-3 font-medium">57.9%</td>
                        <td class="px-4 py-3">3.52</td>
                        <td class="px-4 py-3">
                            <button class="text-blue-600 hover:text-blue-800 text-sm">View Details</button>
                        </td>
                    </tr>
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <td class="px-4 py-3 font-medium">State College</td>
                        <td class="px-4 py-3">32</td>
                        <td class="px-4 py-3">
                            <span class="px-2 py-1 bg-green-100 text-green-800 rounded text-xs">18</span>
                        </td>
                        <td class="px-4 py-3">
                            <span class="px-2 py-1 bg-red-100 text-red-800 rounded text-xs">9</span>
                        </td>
                        <td class="px-4 py-3">
                            <span class="px-2 py-1 bg-yellow-100 text-yellow-800 rounded text-xs">5</span>
                        </td>
                        <td class="px-4 py-3 font-medium">56.3%</td>
                        <td class="px-4 py-3">3.48</td>
                        <td class="px-4 py-3">
                            <button class="text-blue-600 hover:text-blue-800 text-sm">View Details</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Chart.js Script -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // ====== APPLICATIONS BY SCHOOL (Bar Chart) ======
    const schoolCtx = document.getElementById('schoolChart').getContext('2d');
    const schoolChart = new Chart(schoolCtx, {
        type: 'bar',
        data: {
            labels: ['University of Manila', 'Polytechnic University', 'State College', 'City College', 'Tech Institute', 'Science High', 'Arts University'],
            datasets: [{
                label: 'Number of Applications',
                data: [45, 38, 32, 28, 24, 18, 15],
                backgroundColor: 'rgba(59, 130, 246, 0.7)',
                borderColor: 'rgba(59, 130, 246, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Number of Applications'
                    }
                },
                x: {
                    ticks: {
                        maxRotation: 45
                    }
                }
            }
        }
    });

    // ====== APPLICATIONS BY GRADE (Doughnut Chart) ======
    const gradeCtx = document.getElementById('gradeChart').getContext('2d');
    const gradeChart = new Chart(gradeCtx, {
        type: 'doughnut',
        data: {
            labels: ['1st Year', '2nd Year', '3rd Year', '4th Year', '5th Year'],
            datasets: [{
                data: [25, 45, 52, 28, 6],
                backgroundColor: [
                    'rgba(59, 130, 246, 0.8)',
                    'rgba(16, 185, 129, 0.8)',
                    'rgba(245, 158, 11, 0.8)',
                    'rgba(139, 92, 246, 0.8)',
                    'rgba(239, 68, 68, 0.8)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'right'
                }
            }
        }
    });

    // ====== APPLICATION TRENDS (Line Chart) ======
    const trendCtx = document.getElementById('trendChart').getContext('2d');
    const trendChart = new Chart(trendCtx, {
        type: 'line',
        data: {
            labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
            datasets: [
                {
                    label: 'Applications Submitted',
                    data: [12, 19, 15, 25],
                    borderColor: 'rgba(59, 130, 246, 1)',
                    backgroundColor: 'rgba(59, 130, 246, 0.1)',
                    tension: 0.3,
                    fill: true
                },
                {
                    label: 'Applications Approved',
                    data: [8, 12, 9, 18],
                    borderColor: 'rgba(16, 185, 129, 1)',
                    backgroundColor: 'rgba(16, 185, 129, 0.1)',
                    tension: 0.3,
                    fill: true
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'top'
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Number of Applications'
                    }
                }
            }
        }
    });

    // ====== APPLICATION STATUS (Pie Chart) ======
    const statusCtx = document.getElementById('statusChart').getContext('2d');
    const statusChart = new Chart(statusCtx, {
        type: 'pie',
        data: {
            labels: ['Approved', 'Pending', 'Under Review', 'Rejected'],
            datasets: [{
                data: [89, 24, 32, 43],
                backgroundColor: [
                    'rgba(16, 185, 129, 0.8)',
                    'rgba(245, 158, 11, 0.8)',
                    'rgba(59, 130, 246, 0.8)',
                    'rgba(239, 68, 68, 0.8)'
                ]
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'right'
                }
            }
        }
    });

    // ====== GPA DISTRIBUTION (Histogram) ======
    const gpaCtx = document.getElementById('gpaChart').getContext('2d');
    const gpaChart = new Chart(gpaCtx, {
        type: 'bar',
        data: {
            labels: ['1.0-2.0', '2.0-2.5', '2.5-3.0', '3.0-3.5', '3.5-4.0'],
            datasets: [{
                label: 'Number of Applicants',
                data: [3, 12, 45, 68, 28],
                backgroundColor: 'rgba(139, 92, 246, 0.7)',
                borderColor: 'rgba(139, 92, 246, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Number of Applicants'
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'GPA Range'
                    }
                }
            }
        }
    });
});
</script>
</x-admin>