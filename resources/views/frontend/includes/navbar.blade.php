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
            <div class="relative">
                <button class="flex items-center space-x-3 text-white hover:text-gray-300 transition-colors duration-300 focus:outline-none" 
                        onclick="toggleDropdown()" 
                        id="profileButton">
                    <span class="text-gray-300 hover:text-white font-medium">{{ $authUser->name }}</span>
                    @if(!empty($authUser->profile) && file_exists(public_path($authUser->profile)))
                        <img src="{{ asset($authUser->profile) }}" alt="profile" class="rounded-full border-2 border-gray-600 hover:border-white transition-colors duration-300" style="height: 50px; width: auto;" />
                    @else
                        <img src="{{ asset('backend/images/faces/face28.jpg') }}" alt="profile" class="rounded-full border-2 border-gray-600 hover:border-white transition-colors duration-300" style="height: 50px; width: auto;" />
                    @endif
                </button>
                
                <!-- Dropdown Menu -->
                <div id="profileDropdown" class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg border border-gray-200 hidden z-50">
                    <div class="py-1">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full text-left px-4 py-2 text-sm text-black hover:bg-gray-100 transition-colors duration-200">
                                <i class="fas fa-sign-out-alt mr-2"></i>Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @endauth
        </div>
    </div>
</header>

<script>
    function toggleDropdown() {
        const dropdown = document.getElementById('profileDropdown');
        dropdown.classList.toggle('hidden');
    }

    // Close dropdown when clicking outside
    document.addEventListener('click', function(event) {
        const profileButton = document.getElementById('profileButton');
        const dropdown = document.getElementById('profileDropdown');
        
        if (profileButton && dropdown && !profileButton.contains(event.target) && !dropdown.contains(event.target)) {
            dropdown.classList.add('hidden');
        }
    });

    // Close dropdown when pressing Escape key
    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape') {
            const dropdown = document.getElementById('profileDropdown');
            if (dropdown) {
                dropdown.classList.add('hidden');
            }
        }
    });
</script>
