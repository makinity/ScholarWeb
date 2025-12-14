<x-admin>
<div class="space-y-6">
    <!-- Page Header -->
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Analytics Dashboard</h1>
            <p class="text-gray-600">Applicants per school and grade analysis</p>
        </div>
        <div class="flex space-x-3">
            <button onclick="exportData()" class="px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50">
                <i class="fas fa-download mr-2"></i>Export Data
            </button>
            <button onclick="refreshCharts()" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                <i class="fas fa-sync-alt mr-2"></i>Refresh
            </button>
        </div>
    </div>

    <!-- Filters -->
    <div class="bg-white p-4 rounded-lg shadow">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <!-- Date Range -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Date Range</label>
                <input type="text" id="dateRange" class="w-full px-3 py-2 border border-gray-300 rounded-lg" 
                       placeholder="Select date range">
            </div>
            
            <!-- Status Filter -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Application Status</label>
                <select id="statusFilter" class="w-full px-3 py-2 border border-gray-300 rounded-lg">
                    <option value="all">All Status</option>
                    <option value="pending">Pending</option>
                    <option value="approved">Approved</option>
                    <option value="rejected">Rejected</option>
                </select>
            </div>
            
            <!-- Grade Level Filter -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Grade Level</label>
                <select id="gradeFilter" class="w-full px-3 py-2 border border-gray-300 rounded-lg">
                    <option value="all">All Grades</option>
                    <option value="11">Grade 11</option>
                    <option value="12">Grade 12</option>
                    <!-- Add more grade levels as needed -->
                </select>
            </div>
            
            <!-- Apply Filters Button -->
            <div class="flex items-end">
                <button onclick="applyFilters()" class="w-full px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                    Apply Filters
                </button>
            </div>
        </div>
    </div>

   <!-- Statistics Cards -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-6">
    <!-- Total Applications -->
    <div class="bg-white p-6 rounded-lg shadow">
        <div class="flex items-center">
            <div class="p-3 bg-blue-100 rounded-lg mr-4">
                <i class="fas fa-file-alt text-blue-600 text-xl"></i>
            </div>
            <div>
                <p class="text-sm text-gray-600">Total Applications</p>
                <p class="text-2xl font-bold text-gray-900">
                    {{ $stats['total_applications'] }}
                </p>
            </div>
        </div>
    </div>
    
    <!-- Approval Rate -->
    <div class="bg-white p-6 rounded-lg shadow">
        <div class="flex items-center">
            <div class="p-3 bg-green-100 rounded-lg mr-4">
                <i class="fas fa-check-circle text-green-600 text-xl"></i>
            </div>
            <div>
                <p class="text-sm text-gray-600">Approval Rate</p>
                <p class="text-2xl font-bold text-gray-900">
                    {{ $stats['approval_rate'] }}%
                </p>
            </div>
        </div>
    </div>
    
    <!-- Average GPA -->
    <div class="bg-white p-6 rounded-lg shadow">
        <div class="flex items-center">
            <div class="p-3 bg-purple-100 rounded-lg mr-4">
                <i class="fas fa-graduation-cap text-purple-600 text-xl"></i>
            </div>
            <div>
                <p class="text-sm text-gray-600">Average GPA</p>
                <p class="text-2xl font-bold text-gray-900">
                    {{ number_format($stats['average_gpa'], 2) }}
                </p>
            </div>
        </div>
    </div>
    
    <!-- Unique Schools -->
    <div class="bg-white p-6 rounded-lg shadow">
        <div class="flex items-center">
            <div class="p-3 bg-yellow-100 rounded-lg mr-4">
                <i class="fas fa-school text-yellow-600 text-xl"></i>
            </div>
            <div>
                <p class="text-sm text-gray-600">Unique Schools</p>
                <p class="text-2xl font-bold text-gray-900">
                    {{ $stats['unique_schools'] }}
                </p>
            </div>
        </div>
    </div>
</div>  

    <!-- Charts Section -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Applicants Per School Chart -->
        <div class="bg-white p-6 rounded-lg shadow">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Top Schools by Applicants</h3>
            <div class="h-80">
                <canvas id="schoolChart"></canvas>
            </div>
        </div>
        
        <!-- Applicants Per Grade Chart -->
        <div class="bg-white p-6 rounded-lg shadow">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Applicants by Grade Level</h3>
            <div class="h-80">
                <canvas id="gradeChart"></canvas>
            </div>
        </div>
        
        <!-- School Performance Chart -->
        <div class="bg-white p-6 rounded-lg shadow lg:col-span-2">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">School Performance Ranking</h3>
            <div class="h-96">
                <canvas id="performanceChart"></canvas>
            </div>
        </div>
    </div>
</div>

<!-- Include Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/luxon@3.4.4/build/global/luxon.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-luxon@1.3.1/dist/chartjs-adapter-luxon.min.js"></script>

<script>
// Chart instances
let schoolChart = null;
let gradeChart = null;
let performanceChart = null;

// Initialize date range picker
document.addEventListener('DOMContentLoaded', function() {
    // Set default date range (last 30 days)
    const endDate = new Date().toISOString().split('T')[0];
    const startDate = new Date(Date.now() - 30 * 24 * 60 * 60 * 1000).toISOString().split('T')[0];
    document.getElementById('dateRange').value = `${startDate} to ${endDate}`;
    
    // Load initial data
    loadOverallStats();
    loadSchoolData();
    loadGradeData();
    loadSchoolPerformance();
});

async function loadOverallStats() {
    try {
        const response = await fetch('{{ route("admin.analytics.stats") }}');
        const data = await response.json();
        
        document.getElementById('totalApplications').textContent = data.total_applications.toLocaleString();
        document.getElementById('approvalRate').textContent = data.approval_rate + '%';
        document.getElementById('averageGPA').textContent = data.average_gpa.toFixed(2);
        document.getElementById('uniqueSchools').textContent = data.unique_schools;
    } catch (error) {
        console.error('Error loading stats:', error);
    }
}

async function loadSchoolData() {
    const dateRange = document.getElementById('dateRange').value;
    const status = document.getElementById('statusFilter').value;
    const grade = document.getElementById('gradeFilter').value;
    
    try {
        const response = await fetch(`{{ route("admin.analytics.schools") }}?date_range=${encodeURIComponent(dateRange)}&status=${status}&grade_level=${grade}`);
        const data = await response.json();
        
        updateSchoolChart(data);
        updateSchoolTable(data);
    } catch (error) {
        console.error('Error loading school data:', error);
    }
}

async function loadGradeData() {
    const dateRange = document.getElementById('dateRange').value;
    const status = document.getElementById('statusFilter').value;
    
    try {
        const response = await fetch(`{{ route("admin.analytics.grades") }}?date_range=${encodeURIComponent(dateRange)}&status=${status}`);
        const data = await response.json();
        
        updateGradeChart(data);
    } catch (error) {
        console.error('Error loading grade data:', error);
    }
}

async function loadSchoolPerformance() {
    try {
        const response = await fetch('{{ route("admin.analytics.performance") }}');
        const data = await response.json();
        
        updatePerformanceChart(data);
    } catch (error) {
        console.error('Error loading performance data:', error);
    }
}

function updateSchoolChart(data) {
    const ctx = document.getElementById('schoolChart').getContext('2d');
    
    if (schoolChart) {
        schoolChart.destroy();
    }
    
    schoolChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: data.schools,
            datasets: [
                {
                    label: 'Total Applicants',
                    data: data.total_applicants,
                    backgroundColor: 'rgba(59, 130, 246, 0.7)',
                    borderColor: 'rgb(59, 130, 246)',
                    borderWidth: 1
                },
                {
                    label: 'Approved',
                    data: data.approved_count,
                    backgroundColor: 'rgba(34, 197, 94, 0.7)',
                    borderColor: 'rgb(34, 197, 94)',
                    borderWidth: 1
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'top',
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            let label = context.dataset.label || '';
                            if (label) {
                                label += ': ';
                            }
                            label += context.parsed.y;
                            return label;
                        }
                    }
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
                    ticks: {
                        maxRotation: 45,
                        minRotation: 45
                    }
                }
            }
        }
    });
}

function updateGradeChart(data) {
    const ctx = document.getElementById('gradeChart').getContext('2d');
    
    if (gradeChart) {
        gradeChart.destroy();
    }
    
    // Calculate percentages for pie chart
    const total = data.total_applicants.reduce((a, b) => a + b, 0);
    const percentages = data.total_applicants.map(count => ((count / total) * 100).toFixed(1));
    
    gradeChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: data.grades.map((grade, index) => `${grade} (${percentages[index]}%)`),
            datasets: [{
                data: data.total_applicants,
                backgroundColor: [
                    'rgba(59, 130, 246, 0.7)',   // Blue
                    'rgba(34, 197, 94, 0.7)',    // Green
                    'rgba(245, 158, 11, 0.7)',   // Yellow
                    'rgba(239, 68, 68, 0.7)',    // Red
                    'rgba(139, 92, 246, 0.7)',   // Purple
                    'rgba(249, 115, 22, 0.7)'    // Orange
                ],
                borderColor: [
                    'rgb(59, 130, 246)',
                    'rgb(34, 197, 94)',
                    'rgb(245, 158, 11)',
                    'rgb(239, 68, 68)',
                    'rgb(139, 92, 246)',
                    'rgb(249, 115, 22)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'right',
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            const label = context.label || '';
                            const value = context.raw || 0;
                            const percentage = ((value / total) * 100).toFixed(1);
                            return `${label.split(' ')[0]}: ${value} applicants (${percentage}%)`;
                        }
                    }
                }
            }
        }
    });
}

function updatePerformanceChart(data) {
    const ctx = document.getElementById('performanceChart').getContext('2d');
    
    if (performanceChart) {
        performanceChart.destroy();
    }
    
    // Prepare data for grouped bar chart
    const schools = data.map(item => item.school_name);
    const gpaData = data.map(item => parseFloat(item.average_gpa));
    const approvalRates = data.map(item => parseFloat(item.approval_rate));
    
    performanceChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: schools,
            datasets: [
                {
                    label: 'Average GPA',
                    data: gpaData,
                    backgroundColor: 'rgba(139, 92, 246, 0.7)',
                    borderColor: 'rgb(139, 92, 246)',
                    borderWidth: 1,
                    yAxisID: 'y'
                },
                {
                    label: 'Approval Rate (%)',
                    data: approvalRates,
                    backgroundColor: 'rgba(34, 197, 94, 0.7)',
                    borderColor: 'rgb(34, 197, 94)',
                    borderWidth: 1,
                    yAxisID: 'y1'
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'top',
                }
            },
            scales: {
                y: {
                    type: 'linear',
                    display: true,
                    position: 'left',
                    title: {
                        display: true,
                        text: 'Average GPA'
                    },
                    min: 0,
                    max: 4
                },
                y1: {
                    type: 'linear',
                    display: true,
                    position: 'right',
                    title: {
                        display: true,
                        text: 'Approval Rate (%)'
                    },
                    min: 0,
                    max: 100,
                    grid: {
                        drawOnChartArea: false
                    }
                },
                x: {
                    ticks: {
                        maxRotation: 45,
                        minRotation: 45
                    }
                }
            }
        }
    });
}

function updateSchoolTable(data) {
    const tbody = document.getElementById('schoolTableBody');
    tbody.innerHTML = '';
    
    for (let i = 0; i < data.schools.length; i++) {
        const school = data.schools[i];
        const total = data.total_applicants[i];
        const approved = data.approved_count[i];
        const pending = data.pending_count[i];
        const rejected = data.rejected_count[i];
        const avgGpa = data.average_gpa[i] ? data.average_gpa[i].toFixed(2) : 'N/A';
        const approvalRate = total > 0 ? ((approved / total) * 100).toFixed(1) + '%' : '0%';
        
        const row = document.createElement('tr');
        row.innerHTML = `
            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">${school}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${total}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs">${approved}</span>
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                <span class="px-2 py-1 bg-yellow-100 text-yellow-800 rounded-full text-xs">${pending}</span>
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                <span class="px-2 py-1 bg-red-100 text-red-800 rounded-full text-xs">${rejected}</span>
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${avgGpa}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 font-semibold">${approvalRate}</td>
        `;
        tbody.appendChild(row);
    }
}

function applyFilters() {
    loadSchoolData();
    loadGradeData();
    loadOverallStats();
}

function refreshCharts() {
    loadOverallStats();
    loadSchoolData();
    loadGradeData();
    loadSchoolPerformance();
}

function exportData() {
    // This would be implemented based on your export requirements
    alert('Export functionality would be implemented here. Could export as CSV, PDF, or Excel.');
}

// Auto-refresh every 5 minutes
setInterval(refreshCharts, 300000);
</script>

<style>
/* Custom styles for better chart display */
.chart-container {
    position: relative;
    height: 400px;
    width: 100%;
}
</style>
</x-admin>