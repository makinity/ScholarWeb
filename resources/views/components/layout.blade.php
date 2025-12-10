<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PhilScholar | Scholar Screening Platform</title>
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
        }
        
        .hero-section {
            background: linear-gradient(135deg, #2563eb 0%, #1e40af 100%);
            color: white;
            padding: 6rem 1rem;
        }
        
        .stat-card {
            transition: transform 0.3s ease;
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
        }
        
        .feature-icon {
            background-color: rgba(37, 99, 235, 0.1);
            width: 64px;
            height: 64px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1rem;
        }
        
        .testimonial-card {
            background-color: #f9fafb;
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        }
        
        .footer-section {
            background-color: #111827;
            color: white;
        }
        
        .modal-content {
            border-radius: 12px;
            overflow: hidden;
        }
        
        .btn-primary {
            background-color: var(--primary-color);
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            font-weight: 600;
            transition: background-color 0.3s ease;
        }
        
        .btn-primary:hover {
            background-color: var(--secondary-color);
        }
        
        .logo-text {
            font-weight: 700;
            font-size: 1.75rem;
            background: linear-gradient(to right, #2563eb, #3b82f6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        @media (max-width: 768px) {
            .hero-section {
                padding: 4rem 1rem;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="bg-white border-b border-gray-200 px-4 lg:px-6 py-4">
        <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">
            <a href="#" class="flex items-center space-x-2">
                <div class="w-10 h-10 rounded-lg bg-blue-600 flex items-center justify-center">
                    <i class="fas fa-graduation-cap text-white text-xl"></i>
                </div>
                <span class="logo-text">PhilScholar</span>
            </a>
            <div class="flex items-center lg:order-2 space-x-2">
                <button data-modal-target="login-modal" data-modal-toggle="login-modal" 
                    class="text-gray-800 hover:bg-gray-100 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 focus:outline-none">
                    Login
                </button>
                <button data-modal-target="register-modal" data-modal-toggle="register-modal" 
                    class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 focus:outline-none">
                    Register
                </button>
            </div>
            <div class="hidden justify-between items-center w-full lg:flex lg:w-auto lg:order-1" id="mobile-menu-2">
                <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
                    <li>
                        <a href="#" class="block py-2 pr-4 pl-3 text-blue-600 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-blue-600 lg:p-0">Home</a>
                    </li>
                    <li>
                        <a href="#features" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-blue-600 lg:p-0">Features</a>
                    </li>
                    <li>
                        <a href="#how-it-works" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-blue-600 lg:p-0">How It Works</a>
                    </li>
                    <li>
                        <a href="#testimonials" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-blue-600 lg:p-0">Testimonials</a>
                    </li>
                    <li>
                        <a href="#contact" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-blue-600 lg:p-0">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="max-w-screen-xl mx-auto px-4 text-center">
            <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl lg:text-6xl">
                Streamlining Scholar Screening
            </h1>
            <p class="mb-8 text-lg font-normal text-blue-100 lg:text-xl max-w-3xl mx-auto">
                PhilScholar is a comprehensive platform for efficiently screening and managing scholarship applicants. 
                Save time, reduce bias, and select the most deserving candidates.
            </p>
            <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0 sm:space-x-4">
                <a href="#" class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-blue-700 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:ring-gray-100">
                    Get Started
                    <i class="fas fa-arrow-right ml-2"></i>
                </a>
                <a href="#features" class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg border border-white hover:bg-blue-800 focus:ring-4 focus:ring-blue-300">
                    Learn More
                </a>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-12 bg-gray-50">
        <div class="max-w-screen-xl mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="stat-card bg-white p-6 rounded-xl shadow text-center">
                    <div class="text-3xl font-bold text-blue-600 mb-2">5,000+</div>
                    <div class="text-gray-600">Scholars Screened</div>
                </div>
                <div class="stat-card bg-white p-6 rounded-xl shadow text-center">
                    <div class="text-3xl font-bold text-blue-600 mb-2">95%</div>
                    <div class="text-gray-600">Time Saved on Screening</div>
                </div>
                <div class="stat-card bg-white p-6 rounded-xl shadow text-center">
                    <div class="text-3xl font-bold text-blue-600 mb-2">200+</div>
                    <div class="text-gray-600">Institutions Using PhilScholar</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-16 bg-white">
        <div class="max-w-screen-xl mx-auto px-4">
            <h2 class="mb-12 text-3xl font-extrabold text-gray-900 text-center">Powerful Features</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="p-6 rounded-xl border border-gray-200 hover:shadow-lg transition-shadow">
                    <div class="feature-icon mx-auto">
                        <i class="fas fa-filter text-blue-600 text-2xl"></i>
                    </div>
                    <h3 class="mb-3 text-xl font-bold text-center">Advanced Filtering</h3>
                    <p class="text-gray-600 text-center">
                        Filter applicants by academic performance, financial need, location, and other custom criteria.
                    </p>
                </div>
                
                <!-- Feature 2 -->
                <div class="p-6 rounded-xl border border-gray-200 hover:shadow-lg transition-shadow">
                    <div class="feature-icon mx-auto">
                        <i class="fas fa-brain text-blue-600 text-2xl"></i>
                    </div>
                    <h3 class="mb-3 text-xl font-bold text-center">AI-Powered Scoring</h3>
                    <p class="text-gray-600 text-center">
                        Our AI algorithm scores applicants based on multiple factors to identify top candidates.
                    </p>
                </div>
                
                <!-- Feature 3 -->
                <div class="p-6 rounded-xl border border-gray-200 hover:shadow-lg transition-shadow">
                    <div class="feature-icon mx-auto">
                        <i class="fas fa-chart-bar text-blue-600 text-2xl"></i>
                    </div>
                    <h3 class="mb-3 text-xl font-bold text-center">Comprehensive Analytics</h3>
                    <p class="text-gray-600 text-center">
                        Get detailed reports and insights on applicant demographics and selection trends.
                    </p>
                </div>
                
                <!-- Feature 4 -->
                <div class="p-6 rounded-xl border border-gray-200 hover:shadow-lg transition-shadow">
                    <div class="feature-icon mx-auto">
                        <i class="fas fa-users text-blue-600 text-2xl"></i>
                    </div>
                    <h3 class="mb-3 text-xl font-bold text-center">Committee Collaboration</h3>
                    <p class="text-gray-600 text-center">
                        Enable screening committee members to review, rate, and comment on applications.
                    </p>
                </div>
                
                <!-- Feature 5 -->
                <div class="p-6 rounded-xl border border-gray-200 hover:shadow-lg transition-shadow">
                    <div class="feature-icon mx-auto">
                        <i class="fas fa-shield-alt text-blue-600 text-2xl"></i>
                    </div>
                    <h3 class="mb-3 text-xl font-bold text-center">Bias Reduction</h3>
                    <p class="text-gray-600 text-center">
                        Blind screening features help reduce unconscious bias in the selection process.
                    </p>
                </div>
                
                <!-- Feature 6 -->
                <div class="p-6 rounded-xl border border-gray-200 hover:shadow-lg transition-shadow">
                    <div class="feature-icon mx-auto">
                        <i class="fas fa-mobile-alt text-blue-600 text-2xl"></i>
                    </div>
                    <h3 class="mb-3 text-xl font-bold text-center">Mobile-Friendly</h3>
                    <p class="text-gray-600 text-center">
                        Access the platform from any device. Review applications on-the-go with our mobile interface.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works -->
    <section id="how-it-works" class="py-16 bg-gray-50">
        <div class="max-w-screen-xl mx-auto px-4">
            <h2 class="mb-12 text-3xl font-extrabold text-gray-900 text-center">How It Works</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="text-center">
                    <div class="w-16 h-16 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center text-2xl font-bold mx-auto mb-4">1</div>
                    <h3 class="text-xl font-bold mb-3">Upload Applications</h3>
                    <p class="text-gray-600">
                        Applicants submit their materials through our secure portal or you can import existing applications.
                    </p>
                </div>
                
                <div class="text-center">
                    <div class="w-16 h-16 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center text-2xl font-bold mx-auto mb-4">2</div>
                    <h3 class="text-xl font-bold mb-3">Screen & Evaluate</h3>
                    <p class="text-gray-600">
                        Use our tools to filter, score, and evaluate applicants based on your scholarship criteria.
                    </p>
                </div>
                
                <div class="text-center">
                    <div class="w-16 h-16 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center text-2xl font-bold mx-auto mb-4">3</div>
                    <h3 class="text-xl font-bold mb-3">Select & Notify</h3>
                    <p class="text-gray-600">
                        Finalize your selections and automatically notify successful applicants through the platform.
                    </p>
                </div>
            </div>
            
        </div>
    </section>

    <!-- Testimonials -->
    <section id="testimonials" class="py-16 bg-white">
        <div class="max-w-screen-xl mx-auto px-4">
            <h2 class="mb-12 text-3xl font-extrabold text-gray-900 text-center">What Our Users Say</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Testimonial 1 -->
                <div class="testimonial-card">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 font-bold text-xl">
                            SJ
                        </div>
                        <div class="ml-4">
                            <div class="font-bold">Sarah Johnson</div>
                            <div class="text-gray-500 text-sm">Scholarship Director, University of Manila</div>
                        </div>
                    </div>
                    <p class="text-gray-700 italic">
                        "PhilScholar cut our screening time by 70%. The AI scoring feature helps us identify promising candidates we might have missed."
                    </p>
                </div>
                
                <!-- Testimonial 2 -->
                <div class="testimonial-card">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 font-bold text-xl">
                            MR
                        </div>
                        <div class="ml-4">
                            <div class="font-bold">Miguel Rodriguez</div>
                            <div class="text-gray-500 text-sm">Foundation Program Manager</div>
                        </div>
                    </div>
                    <p class="text-gray-700 italic">
                        "The collaboration features allowed our committee to work seamlessly despite being in different locations. Highly recommended!"
                    </p>
                </div>
                
                <!-- Testimonial 3 -->
                <div class="testimonial-card">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 font-bold text-xl">
                            AL
                        </div>
                        <div class="ml-4">
                            <div class="font-bold">Aisha Lee</div>
                            <div class="text-gray-500 text-sm">Educational Nonprofit Director</div>
                        </div>
                    </div>
                    <p class="text-gray-700 italic">
                        "The analytics tools gave us incredible insights into our applicant pool. We've made our scholarship program more equitable thanks to PhilScholar."
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 bg-gradient-to-r from-blue-600 to-blue-800 text-white">
        <div class="max-w-screen-xl mx-auto px-4 text-center">
            <h2 class="mb-6 text-3xl font-bold">Ready to Transform Your Scholar Screening?</h2>
            <p class="mb-8 text-xl text-blue-100 max-w-2xl mx-auto">
                Join hundreds of institutions making smarter, faster, and fairer scholarship decisions.
            </p>
            <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-4">
                <button data-modal-target="register-modal" data-modal-toggle="register-modal" 
                    class="inline-flex justify-center items-center py-3 px-6 text-base font-medium text-center text-blue-700 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:ring-gray-100">
                    Start Free Trial
                    <i class="fas fa-rocket ml-2"></i>
                </button>
                <a href="#contact" class="inline-flex justify-center items-center py-3 px-6 text-base font-medium text-center text-white rounded-lg border border-white hover:bg-blue-700 focus:ring-4 focus:ring-blue-300">
                    Schedule a Demo
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer id="contact" class="footer-section">
        <div class="max-w-screen-xl mx-auto px-4 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="md:col-span-1">
                    <a href="#" class="flex items-center space-x-2 mb-6">
                        <div class="w-10 h-10 rounded-lg bg-blue-600 flex items-center justify-center">
                            <i class="fas fa-graduation-cap text-white text-xl"></i>
                        </div>
                        <span class="logo-text">PhilScholar</span>
                    </a>
                    <p class="text-gray-400">
                        Streamlining scholar screening for educational institutions and foundations.
                    </p>
                </div>
                
                <div>
                    <h3 class="text-white font-bold mb-4">Platform</h3>
                    <ul class="text-gray-400 space-y-2">
                        <li><a href="#" class="hover:text-white">Features</a></li>
                        <li><a href="#" class="hover:text-white">Pricing</a></li>
                        <li><a href="#" class="hover:text-white">Case Studies</a></li>
                        <li><a href="#" class="hover:text-white">API Documentation</a></li>
                    </ul>
                </div>
                
                <div>
                    <h3 class="text-white font-bold mb-4">Resources</h3>
                    <ul class="text-gray-400 space-y-2">
                        <li><a href="#" class="hover:text-white">Blog</a></li>
                        <li><a href="#" class="hover:text-white">Help Center</a></li>
                        <li><a href="#" class="hover:text-white">Community</a></li>
                        <li><a href="#" class="hover:text-white">Webinars</a></li>
                    </ul>
                </div>
                
                <div>
                    <h3 class="text-white font-bold mb-4">Contact</h3>
                    <ul class="text-gray-400 space-y-2">
                        <li class="flex items-center">
                            <i class="fas fa-envelope mr-2 text-blue-400"></i>
                            support@philscholar.com
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-phone mr-2 text-blue-400"></i>
                            +1 (555) 123-4567
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-map-marker-alt mr-2 text-blue-400"></i>
                            Manila, Philippines
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; 2023 PhilScholar. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Login Modal -->
    <div id="login-modal" tabindex="-1" aria-hidden="true" class="hidden fixed top-0 left-0 right-0 z-50 w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-md max-h-full mx-auto">
            <div class="modal-content relative bg-white rounded-lg shadow">
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                    <h3 class="text-xl font-semibold text-gray-900">Login to PhilScholar</h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="login-modal">
                        <i class="fas fa-times"></i>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                
                <div class="p-4 md:p-5">
                    <form class="space-y-4" action="{{ route('auth.login') }}" method="POST">
                        @csrf
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                            <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="name@company.com" required>
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                            <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                        </div>
                        <div class="flex justify-between">
                            <div class="flex items-start">
                                <input id="remember" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300">
                                <label for="remember" class="ms-2 text-sm font-medium text-gray-900">Remember me</label>
                            </div>
                            <a href="#" class="text-sm text-blue-600 hover:underline">Forgot password?</a>
                        </div>
                        <button type="submit" class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Login</button>
                        <div class="text-sm font-medium text-gray-500">
                            Not registered? <a href="#" class="text-blue-600 hover:underline" data-modal-target="register-modal" data-modal-toggle="register-modal" data-modal-hide="login-modal">Create account</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Register Modal -->
    <div id="register-modal" tabindex="-1" aria-hidden="true" class="hidden fixed top-0 left-0 right-0 z-50 w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-md max-h-full mx-auto">
            <div class="modal-content relative bg-white rounded-lg shadow">
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                    <h3 class="text-xl font-semibold text-gray-900">Create Account</h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="register-modal">
                        <i class="fas fa-times"></i>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                
                <div class="p-4 md:p-5">
                    <form class="space-y-4" action="{{ route('auth.register') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900" for="profile">Profile Image (Optional)</label>
                            <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50" id="profile" type="file" name="profile">
                        </div>
                        
                        <div>
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Full Name</label>
                            <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="John Doe" required>
                        </div>
                        
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                            <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="name@company.com" required>
                        </div>
                        
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                            <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                        </div>
                        
                        <div>
                            <label for="confirm-password" class="block mb-2 text-sm font-medium text-gray-900">Confirm Password</label>
                            <input type="password" name="password_confirmation" id="confirm-password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                        </div>
                        
                        <div class="flex items-start">
                            <input id="terms" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300" required>
                            <label for="terms" class="ms-2 text-sm font-medium text-gray-900">I agree to the <a href="#" class="text-blue-600 hover:underline">Terms & Conditions</a></label>
                        </div>
                        
                        <button type="submit" class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Create Account</button>
                        
                        <div class="text-sm font-medium text-gray-500">
                            Already have an account? <a href="#" class="text-blue-600 hover:underline" data-modal-target="login-modal" data-modal-toggle="login-modal" data-modal-hide="register-modal">Login here</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Flowbite JS -->
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    
    <script>
        // Simple script to handle modal switching
        document.addEventListener('DOMContentLoaded', function() {
            // Handle switching between login and register modals
            const loginModalToggle = document.querySelector('[data-modal-target="login-modal"]');
            const registerModalToggle = document.querySelector('[data-modal-target="register-modal"]');
            
            // Add click events for "Create account" link in login modal
            document.querySelectorAll('[data-modal-hide="login-modal"]').forEach(link => {
                link.addEventListener('click', function(e) {
                    if (this.getAttribute('data-modal-target') === 'register-modal') {
                        e.preventDefault();
                        const loginModal = document.getElementById('login-modal');
                        const registerModal = document.getElementById('register-modal');
                        
                        // Hide login modal, show register modal
                        loginModal.classList.add('hidden');
                        registerModal.classList.remove('hidden');
                    }
                });
            });
            
            // Add click events for "Login here" link in register modal
            document.querySelectorAll('[data-modal-hide="register-modal"]').forEach(link => {
                link.addEventListener('click', function(e) {
                    if (this.getAttribute('data-modal-target') === 'login-modal') {
                        e.preventDefault();
                        const loginModal = document.getElementById('login-modal');
                        const registerModal = document.getElementById('register-modal');
                        
                        // Hide register modal, show login modal
                        registerModal.classList.add('hidden');
                        loginModal.classList.remove('hidden');
                    }
                });
            });
        });
    </script>
</body>
</html>