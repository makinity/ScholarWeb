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
            background-color: #ffffff;
            color: #1f2937;
            border-right: 1px solid #e5e7eb;
        }
        
        .admin-nav-item {
            color: #1f2937;
            transition: all 0.2s ease;
        }
        
        .admin-nav-item:hover {
            background-color: #f3f4f6;
            color: #111827;
        }
        
        .admin-nav-item.active {
            background-color: #2563eb;
            color: white;
        }
        
        .admin-nav-item.active:hover {
            background-color: #1d4ed8;
            color: white;
        }
        
        .sidebar-divider {
            border-color: #e5e7eb;
        }
        
        .sidebar-section-title {
            color: #6b7280;
        }
        
        .admin-profile {
            background-color: #f9fafb;
            border: 1px solid #e5e7eb;
        }
        
        .notification-badge {
            background-color: #ef4444;
            color: white;
        }
        
        .logout-btn {
            color: #dc2626;
            transition: all 0.2s ease;
        }
        
        .logout-btn:hover {
            background-color: #fef2f2;
            color: #b91c1c;
        }
    </style>
</head>
<body class="bg-gray-50">
        <div class="max-w-7xl mx-auto px-6 pt-4">

    @if (session('success'))
        <div id="success-alert" class="flash-alert bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4 flex justify-between items-center" role="alert">
            <div>
                <p class="font-bold">Success!</p>
                <p>{{ session('success') }}</p>
            </div>
            <button type="button" class="close-button text-green-700 hover:text-green-900 font-bold text-xl leading-none transition-all duration-150" onclick="this.closest('.flash-alert').style.display='none';">
                &times; </button>
        </div>
    @endif

    @if (session('error'))
        <div id="error-alert" class="flash-alert bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4 flex justify-between items-center" role="alert">
            <div>
                <p class="font-bold">Error!</p>
                <p>{{ session('error') }}</p>
            </div>
            <button type="button" class="close-button text-red-700 hover:text-red-900 font-bold text-xl leading-none transition-all duration-150" onclick="this.closest('.flash-alert').style.display='none';">
                &times;
            </button>
        </div>
    @endif

    @if ($errors->any())
        <div id="validation-errors" class="flash-alert bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4 flex justify-between items-center" role="alert">
            <div>
                <p class="font-bold">Whoops! There were some problems with your input.</p>
                <ul class="mt-2 list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            <button type="button" class="close-button text-red-700 hover:text-red-900 font-bold text-xl leading-none transition-all duration-150 self-start" onclick="this.closest('.flash-alert').style.display='none';">
                &times;
            </button>
        </div>
    @endif

</div>
    
    <!-- Top Navigation -->
    <nav class="bg-white border-b border-gray-200 px-6 py-4 shadow-sm">
        <div class="flex justify-between items-center">
            <div class="flex items-center space-x-3">
                <div class="w-8 h-8 rounded-lg bg-blue-600 flex items-center justify-center shadow">
                    <i class="fas fa-graduation-cap text-white"></i>
                </div>
                <span class="text-xl font-bold text-gray-800">PhilScholar Admin</span>
            </div>
            
            <div class="flex items-center space-x-4">
                <button class="text-gray-600 hover:text-gray-800 transition-colors">
                    <i class="fas fa-bell"></i>
                </button>
                <div class="flex items-center space-x-2">
                    <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center border border-blue-200">
                        <i class="fas fa-user-shield text-blue-600"></i>
                    </div>
                    <span class="text-gray-700 font-medium">Admin User</span>
                    <i class="fas fa-chevron-down text-gray-500"></i>
                </div>
            </div>
        </div>
    </nav>

    <div class="flex">
        <!-- Sidebar -->
        <aside class="admin-sidebar w-64 min-h-screen">
            <div class="p-6">

                <!-- Navigation -->
                <h3 class="text-xs font-semibold sidebar-section-title uppercase tracking-wider mb-3">MAIN</h3>
                <ul class="space-y-1 mb-6">
                    <li>
                        <a href="{{ route('admin.dashboard') }}" class="flex items-center px-3 py-2.5 admin-nav-item rounded-lg">
                            <i class="fas fa-tachometer-alt mr-3"></i>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.applications') }}" class="flex items-center px-3 py-2.5 admin-nav-item rounded-lg">
                            <i class="fas fa-file-alt mr-3"></i>
                            Applications
                            <span class="ml-auto notification-badge text-xs px-2 py-0.5 rounded-full">12</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.scholarship') }}" class="flex items-center px-3 py-2.5 admin-nav-item rounded-lg">
                            <i class="fas fa-award mr-3"></i>
                            Scholarships
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.application-reviews') }}" class="flex items-center px-3 py-2.5 admin-nav-item rounded-lg">
                            <i class="fas fa-clipboard-check mr-3"></i>
                            Review Applications
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.analytics') }}" class="flex items-center px-3 py-2.5 admin-nav-item rounded-lg">
                            <i class="fas fa-school mr-3"></i>
                            Schools Analytics
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.score') }}" class="flex items-center px-3 py-2.5 text-blue-600 rounded-lg hover:bg-blue-50">
                            <i class="fas fa-bolt mr-3 text-blue-500"></i>
                            Score Sheet
                        </a>
                    </li>

                <div class="border-t sidebar-divider pt-6 mt-6">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="flex items-center w-full px-4 py-2 logout-btn rounded-lg text-left">
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
