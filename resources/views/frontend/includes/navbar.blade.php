<header class="fixed top-0 left-0 right-0 z-50 bg-slate-900/60 backdrop-blur-md">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <a href="#" class="text-2xl font-bold text-white">
                Self<span class="gradient-text">Resume</span>
            </a>
            <nav class="hidden md:flex space-x-8 items-center">
                <a href="#features" class="text-gray-300 hover:text-white transition-colors duration-300">Features</a>
                <a href="#how-it-works" class="text-gray-300 hover:text-white transition-colors duration-300">How It Works</a>
                <a href="#testimonials" class="text-gray-300 hover:text-white transition-colors duration-300">Testimonials</a>
            </nav>
            <div class="flex items-center space-x-4">
                @auth
                <li class="nav-item nav-profile dropdown">
                    <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="me-2">{{ auth()->user()->name }}</span>
                        @if(!empty(auth()->user()->profile) && file_exists(public_path(auth()->user()->profile)))
                            <img src="{{ asset(auth()->user()->profile) }}" alt="profile" style="height: 40px; width: 40px; border-radius: 50%; border: 2px solid #000;" />
                        @else
                            <img src="{{ asset('backend/images/faces/face28.jpg') }}" alt="profile" style="height: 40px; width: 40px; border-radius: 50%; border: 2px solid #000;" />
                        @endif
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item">Logout</button>
                            </form>
                        </li>
                    </ul>
                </li>
                @else
                <form method="POST" action="{{ route('logout') }}" class="hidden sm:block">
                    @csrf
                    <button type="submit" class="text-gray-300 hover:text-white transition-colors duration-300 bg-transparent border-none cursor-pointer p-0 font-sans">
                        Log Out
                    </button>
                </form>
                @endauth
            </div>
        </div>
    </header>