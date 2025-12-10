<!-- resources/views/components/admin-layout.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel - PhilScholar')</title>
    <!-- Flowbite CSS -->
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <!-- Add this in the <head> section -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        :root {
            --primary-color: #2563eb;
            --secondary-color: #1e40af;
        }
        
        .admin-sidebar {
            background-color: #1f2937;
            color: white;
        }
        
        .admin-nav-item:hover {
            background-color: #374151;
        }
        
        .admin-nav-item.active {
            background-color: #2563eb;
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Top Navigation -->
    <nav class="bg-white border-b border-gray-200 px-6 py-4">
        <div class="flex justify-between items-center">
            <div class="flex items-center space-x-3">
                <div class="w-8 h-8 rounded-lg bg-blue-600 flex items-center justify-center">
                    <i class="fas fa-graduation-cap text-white"></i>
                </div>
                <span class="text-xl font-bold text-gray-800">PhilScholar Admin</span>
            </div>
            
            <div class="flex items-center space-x-4">
                <button class="text-gray-600 hover:text-gray-800">
                    <i class="fas fa-bell"></i>
                </button>
                <div class="flex items-center space-x-2">
                    <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center">
                        <i class="fas fa-user-shield text-blue-600"></i>
                    </div>
                    <span class="text-gray-700">Admin User</span>
                    <i class="fas fa-chevron-down text-gray-500"></i>
                </div>
            </div>
        </div>
    </nav>

    <div class="flex">
        <!-- Sidebar -->
        <aside class="admin-sidebar w-64 min-h-screen">
            <div class="p-6">
                <!-- Admin Profile -->
                <div class="flex items-center mb-8 p-3 bg-gray-800 rounded-lg">
                    <div class="w-10 h-10 rounded-full bg-blue-500 flex items-center justify-center mr-3">
                        <i class="fas fa-user-shield text-white"></i>
                    </div>
                    <div>
                        <p class="font-medium">Administrator</p>
                        <p class="text-sm text-gray-300">Admin Panel</p>
                    </div>
                </div>

                <!-- Navigation -->
                <h3 class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-3">MAIN</h3>
                <ul class="space-y-1 mb-6">
                    <li>
                        <a href="" class="flex items-center px-3 py-2.5 admin-nav-item rounded-lg">
                            <i class="fas fa-tachometer-alt mr-3"></i>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="" class="flex items-center px-3 py-2.5 admin-nav-item rounded-lg">
                            <i class="fas fa-file-alt mr-3"></i>
                            Applications
                            <span class="ml-auto bg-red-500 text-white text-xs px-2 py-0.5 rounded-full">12</span>
                        </a>
                    </li>
                    <li>
                        <a href="" class="flex items-center px-3 py-2.5 admin-nav-item rounded-lg">
                            <i class="fas fa-award mr-3"></i>
                            Scholarships
                        </a>
                    </li>
                </ul>

                <h3 class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-3">REVIEW</h3>
                <ul class="space-y-1 mb-6">
                    <li>
                        <a href="" class="flex items-center px-3 py-2.5 admin-nav-item rounded-lg">
                            <i class="fas fa-clipboard-check mr-3"></i>
                            Review Applications
                        </a>
                    </li>
                    <li>
                        <a href="" class="flex items-center px-3 py-2.5 admin-nav-item rounded-lg">
                            <i class="fas fa-chart-bar mr-3"></i>
                            Scoring & Criteria
                        </a>
                    </li>
                </ul>

                <h3 class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-3">ANALYTICS</h3>
                <ul class="space-y-1 mb-6">
                    <li>
                        <a href="" class="flex items-center px-3 py-2.5 admin-nav-item rounded-lg">
                            <i class="fas fa-chart-pie mr-3"></i>
                            Reports
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.analytics') }}" class="flex items-center px-3 py-2.5 admin-nav-item rounded-lg">
                            <i class="fas fa-school mr-3"></i>
                            Schools Analytics
                        </a>
                    </li>
                    <li>
                        <a href="" class="flex items-center px-3 py-2.5 admin-nav-item rounded-lg">
                            <i class="fas fa-users mr-3"></i>
                            User Management
                        </a>
                    </li>
                </ul>

                <div class="border-t border-gray-700 pt-6 mt-6">
                    <form method="POST" action="{{ route('auth.logout') }}">
                        @csrf
                        <button type="submit" class="flex items-center w-full px-4 py-2 text-red-600 hover:bg-gray-100 text-left">
                            <i class="fas fa-sign-out-alt mr-3"></i>
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6">
            {{ $slot }}
        </main>
    </div>

    <!-- Flowbite JS -->
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>
</html>