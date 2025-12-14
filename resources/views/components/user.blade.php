<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@isset($title){{ $title }} | @endisset PhilScholar</title>
    <!-- Flowbite CSS -->
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #2563eb;
            --secondary-color: #1e40af;
            --accent-color: #3b82f6;
        }
        
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            color: #333;
            background-color: #f9fafb;
        }
        
        .sidebar {
            min-height: calc(100vh - 64px);
        }
        
        .active-nav-link {
            background-color: #eff6ff;
            color: #2563eb;
            border-left: 4px solid #2563eb;
        }
    </style>
</head>
<body>

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
    <nav class="bg-white border-b border-gray-200 px-4 py-3">
        <div class="flex flex-wrap justify-between items-center mx-auto">
            <!-- Left side: Logo -->
            <div class="flex items-center">
                <a href="/" class="flex items-center space-x-2">
                    <div class="w-8 h-8 rounded-lg bg-blue-600 flex items-center justify-center">
                        <i class="fas fa-graduation-cap text-white text-lg"></i>
                    </div>
                    <span class="text-xl font-bold text-gray-800">PhilScholar</span>
                </a>
            </div>

            <!-- Right side: User menu -->
            <div class="flex items-center space-x-4">
                <!-- Notifications -->
                <button type="button" class="relative p-2 text-gray-600 hover:text-gray-900 hover:bg-gray-100 rounded-full">
                    <i class="fas fa-bell text-lg"></i>
                    <span class="absolute top-1 right-1 w-2 h-2 bg-red-500 rounded-full"></span>
                </button>

                <!-- User dropdown -->
                <div class="relative">
                    <button type="button" class="flex items-center space-x-2" id="user-menu-button">
                        <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center overflow-hidden">
                            @auth
                                @if(Auth::user()->profile)
                                    <img src="{{ Storage::url(Auth::user()->profile) }}" 
                                        alt="Profile"
                                        class="w-full h-full object-cover">
                                @else
                                    <i class="fas fa-user text-blue-600"></i>
                                @endif
                            @else
                                <i class="fas fa-user text-blue-600"></i>
                            @endauth
                        </div>
                        <span class="text-gray-700 font-medium">
                            {{ Auth::user()->name ?? 'User' }}
                        </span>
                        <i class="fas fa-chevron-down text-gray-500 text-sm"></i>
                    </button>

                    <!-- Dropdown menu -->
                    <div id="user-dropdown" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg border border-gray-200 py-2 z-10">
                        <a href="{{ route('profile.edit') }}" class="flex items-center px-4 py-2 text-gray-700 hover:bg-gray-100">
                            <i class="fas fa-user-circle mr-3 text-gray-500"></i>
                            Profile Settings
                        </a>
                        <a href="#" class="flex items-center px-4 py-2 text-gray-700 hover:bg-gray-100">
                            <i class="fas fa-cog mr-3 text-gray-500"></i>
                            Account Settings
                        </a>
                        <div class="border-t border-gray-200 my-1"></div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="flex items-center w-full px-4 py-2 text-red-600 hover:bg-gray-100 text-left">
                                <i class="fas fa-sign-out-alt mr-3"></i>
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="flex">
        <aside class="sidebar w-64 bg-white border-r border-gray-200 hidden md:block">
            <div class="px-4 py-6">
                <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wider mb-4">MAIN</h3>
                <ul class="space-y-2">
                    <li>
                        <a href="/dashboard" class="flex items-center px-3 py-2 text-gray-700 rounded-lg hover:bg-gray-100 {{ request()->is('dashboard') ? 'active-nav-link' : '' }}">
                            <i class="fas fa-home mr-3 text-gray-500"></i>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('applications') }}" class="flex items-center px-3 py-2 text-gray-700 rounded-lg hover:bg-gray-100 {{ request()->is('applications*') ? 'active-nav-link' : '' }}">
                            <i class="fas fa-file-alt mr-3 text-gray-500"></i>
                            My Applications
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('scholarships.browse') }}" class="flex items-center px-3 py-2 text-gray-700 rounded-lg hover:bg-gray-100 {{ request()->is('scholarships*') ? 'active-nav-link' : '' }}">
                            <i class="fas fa-users mr-3 text-gray-500"></i>
                            Browse Scholarships
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('quick') }}" class="flex items-center px-3 py-2.5 text-blue-600 rounded-lg hover:bg-blue-50">
                            <i class="fas fa-bolt mr-3 text-blue-500"></i>
                            Quick Apply
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('user.score') }}" class="flex items-center px-3 py-2.5 text-blue-600 rounded-lg hover:bg-blue-50">
                            <i class="fas fa-bolt mr-3 text-blue-500"></i>
                            Score
                        </a>
                    </li>
                </ul>
            </div>
        </aside>

        <!-- Mobile sidebar toggle button -->
        <button id="sidebar-toggle" class="md:hidden fixed bottom-4 right-4 z-50 p-3 bg-blue-600 text-white rounded-full shadow-lg">
            <i class="fas fa-bars text-lg"></i>
        </button>

        <div class="flex-1 p-6">
            {{ $slot }}
        </div>
    </div>

    <!-- Mobile sidebar (hidden by default) -->
    <div id="mobile-sidebar" class="fixed inset-0 z-40 md:hidden hidden">
        <div class="fixed inset-0 bg-black bg-opacity-50" id="sidebar-backdrop"></div>
        <div class="fixed inset-y-0 left-0 w-64 bg-white shadow-lg">
            <div class="px-4 py-6">
                <div class="flex items-center justify-between mb-6">
                    <span class="text-lg font-bold text-gray-800">Menu</span>
                    <button id="close-sidebar" class="p-2 text-gray-500 hover:text-gray-700">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>
                <!-- Same sidebar content as desktop -->
                <ul class="space-y-2">
                    <li>
                        <a href="/dashboard" class="flex items-center px-3 py-2 text-gray-700 rounded-lg hover:bg-gray-100">
                            <i class="fas fa-home mr-3 text-gray-500"></i>
                            Dashboard
                        </a>
                    </li>
                    <!-- Add other menu items here -->
                </ul>
            </div>
        </div>
    </div>

    <!-- Flowbite JS -->
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    
    <script>
        // Toggle user dropdown
        document.getElementById('user-menu-button').addEventListener('click', function() {
            document.getElementById('user-dropdown').classList.toggle('hidden');
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', function(event) {
            const dropdown = document.getElementById('user-dropdown');
            const button = document.getElementById('user-menu-button');
            if (!button.contains(event.target) && !dropdown.contains(event.target)) {
                dropdown.classList.add('hidden');
            }
        });

        // Mobile sidebar toggle
        const sidebarToggle = document.getElementById('sidebar-toggle');
        const mobileSidebar = document.getElementById('mobile-sidebar');
        const closeSidebar = document.getElementById('close-sidebar');
        const sidebarBackdrop = document.getElementById('sidebar-backdrop');

        if (sidebarToggle) {
            sidebarToggle.addEventListener('click', () => {
                mobileSidebar.classList.remove('hidden');
            });
        }

        if (closeSidebar) {
            closeSidebar.addEventListener('click', () => {
                mobileSidebar.classList.add('hidden');
            });
        }

        if (sidebarBackdrop) {
            sidebarBackdrop.addEventListener('click', () => {
                mobileSidebar.classList.add('hidden');
            });
        }
    </script>
    
    @stack('scripts')
</body>
</html>
