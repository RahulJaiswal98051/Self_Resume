<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Self Resume</title>
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Google Fonts: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Custom Styles & Tailwind Configuration -->
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #0a092d; /* A deep, modern navy blue */
            color: #e0e0e0;
        }

        /* Custom gradient for highlights and buttons */
        .gradient-text {
            background: linear-gradient(90deg, #818cf8, #a78bfa);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-fill-color: transparent;
        }
        
        .gradient-bg {
             background: linear-gradient(90deg, #4f46e5, #7c3aed);
        }

        .gradient-border-card {
            border: 1px solid transparent;
            background: linear-gradient(#0f172a, #0f172a) padding-box,
                        linear-gradient(120deg, #38bdf8, #a78bfa) border-box;
            border-radius: 1rem;
        }

        /* For scroll-triggered animations */
        .reveal-on-scroll {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.8s cubic-bezier(0.6, 0.2, 0.1, 1), transform 0.8s cubic-bezier(0.6, 0.2, 0.1, 1);
        }

        .is-visible {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
</head>
<body class="antialiased">

    <!-- Header / Navigation -->
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
                 <a href="#" class="text-gray-300 hover:text-white transition-colors duration-300 hidden sm:block">Log In</a>
                 <a href="#" class="gradient-bg text-white font-semibold px-5 py-2 rounded-lg hover:shadow-lg hover:shadow-purple-500/20 transition-all duration-300">
                    Get Started Free
                </a>
            </div>
        </div>
    </header>

    <main>
        <!-- Hero Section -->
        <section class="relative pt-32 pb-20 lg:pt-48 lg:pb-28">
             <!-- Background Glow Effect -->
            <div class="absolute top-0 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-purple-900/50 rounded-full blur-3xl filter opacity-40"></div>
            
            <div class="container mx-auto px-6 text-center">
                <h1 class="text-4xl md:text-6xl lg:text-7xl font-extrabold text-white leading-tight mb-6">
                    Craft Your Next Opportunity with an
                    <span class="gradient-text">AI-Powered Resume</span>
                </h1>
                <p class="text-lg md:text-xl text-gray-400 max-w-3xl mx-auto mb-10">
                    Stop guessing. Let our intelligent platform analyze your skills and generate a professional resume that gets noticed by recruiters.
                </p>
                <div class="flex justify-center items-center gap-4">
                    <a href="#" class="gradient-bg text-white font-bold text-lg px-8 py-4 rounded-xl hover:scale-105 hover:shadow-xl hover:shadow-purple-500/30 transition-all duration-300">
                        Build My Resume Now
                    </a>
                </div>
                <p class="mt-4 text-sm text-gray-500">No credit card required. Start for free.</p>
            </div>
            
            <!-- Animated Resume Preview -->
            <div class="relative mt-16 lg:mt-24 max-w-4xl mx-auto px-6 reveal-on-scroll">
                 <div class="absolute inset-0 bg-indigo-900/30 rounded-full blur-3xl -z-10"></div>
                 <img src="https://placehold.co/1200x800/1e1b4b/a78bfa?text=AI+Resume+Preview" alt="AI generating a resume" class="rounded-2xl shadow-2xl shadow-black/40 border-2 border-slate-700">
            </div>
        </section>

        <!-- Features Section -->
        <section id="features" class="py-20 lg:py-28">
            <div class="container mx-auto px-6">
                <div class="text-center mb-16">
                    <h2 class="text-4xl lg:text-5xl font-bold text-white">The <span class="gradient-text">Future</span> of Resume Building</h2>
                    <p class="text-lg text-gray-400 mt-4 max-w-2xl mx-auto">Everything you need to create a job-winning application.</p>
                </div>
                
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Feature Card 1 -->
                    <div class="gradient-border-card p-8 reveal-on-scroll">
                        <h3 class="text-2xl font-bold text-white mb-3">AI Content Writer</h3>
                        <p class="text-gray-400">Overcome writer's block. Our AI generates compelling bullet points and summaries based on your job title and experiences.</p>
                    </div>
                    <!-- Feature Card 2 -->
                    <div class="gradient-border-card p-8 reveal-on-scroll" style="transition-delay: 200ms;">
                        <h3 class="text-2xl font-bold text-white mb-3">Professional Templates</h3>
                        <p class="text-gray-400">Choose from a library of recruiter-approved templates that are modern, professional, and easily parsable by ATS systems.</p>
                    </div>
                    <!-- Feature Card 3 -->
                    <div class="gradient-border-card p-8 reveal-on-scroll" style="transition-delay: 400ms;">
                        <h3 class="text-2xl font-bold text-white mb-3">Keyword Optimization</h3>
                        <p class="text-gray-400">Our AI analyzes job descriptions and suggests relevant keywords to include, boosting your resume's visibility.</p>
                    </div>
                    <!-- Feature Card 4 -->
                    <div class="gradient-border-card p-8 reveal-on-scroll">
                        <h3 class="text-2xl font-bold text-white mb-3">Real-time Preview</h3>
                        <p class="text-gray-400">See your changes instantly. Edit and format your resume with a live preview that shows exactly how it will look.</p>
                    </div>
                     <!-- Feature Card 5 -->
                    <div class="gradient-border-card p-8 reveal-on-scroll" style="transition-delay: 200ms;">
                        <h3 class="text-2xl font-bold text-white mb-3">Easy Export</h3>
                        <p class="text-gray-400">Download your finished resume as a high-quality PDF, ready to be sent to employers, with a single click.</p>
                    </div>
                     <!-- Feature Card 6 -->
                    <div class="gradient-border-card p-8 reveal-on-scroll" style="transition-delay: 400ms;">
                        <h3 class="text-2xl font-bold text-white mb-3">AI Cover Letters</h3>
                        <p class="text-gray-400">Generate personalized cover letters in seconds. Our AI tailors each letter to the specific job you're applying for.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- How It Works Section -->
        <section id="how-it-works" class="py-20 lg:py-28 bg-slate-900/50">
            <div class="container mx-auto px-6">
                <div class="text-center mb-16">
                    <h2 class="text-4xl lg:text-5xl font-bold text-white">Get Your Dream Resume in <span class="gradient-text">3 Simple Steps</span></h2>
                </div>

                <div class="relative grid md:grid-cols-3 gap-8 text-center">
                    <!-- Dashed line for desktop -->
                    <div class="hidden md:block absolute top-1/2 left-0 w-full h-px -translate-y-1/2">
                        <svg width="100%" height="2"><line x1="0" y1="1" x2="100%" y2="1" stroke="#475569" stroke-width="2" stroke-dasharray="8 8"/></svg>
                    </div>

                    <!-- Step 1 -->
                    <div class="relative z-10 reveal-on-scroll">
                        <div class="flex items-center justify-center w-20 h-20 mx-auto mb-6 bg-slate-800 border-2 border-indigo-500 rounded-full text-3xl font-bold gradient-text">1</div>
                        <h3 class="text-2xl font-bold text-white mb-2">Choose a Template</h3>
                        <p class="text-gray-400">Select a design that matches your industry and personality.</p>
                    </div>

                    <!-- Step 2 -->
                    <div class="relative z-10 reveal-on-scroll" style="transition-delay: 200ms;">
                        <div class="flex items-center justify-center w-20 h-20 mx-auto mb-6 bg-slate-800 border-2 border-indigo-500 rounded-full text-3xl font-bold gradient-text">2</div>
                        <h3 class="text-2xl font-bold text-white mb-2">Add Your Details & Let AI Assist</h3>
                        <p class="text-gray-400">Input your info and let our AI enhance your content for maximum impact.</p>
                    </div>

                    <!-- Step 3 -->
                    <div class="relative z-10 reveal-on-scroll" style="transition-delay: 400ms;">
                        <div class="flex items-center justify-center w-20 h-20 mx-auto mb-6 bg-slate-800 border-2 border-indigo-500 rounded-full text-3xl font-bold gradient-text">3</div>
                        <h3 class="text-2xl font-bold text-white mb-2">Download & Apply</h3>
                        <p class="text-gray-400">Export your professional resume as a PDF and start applying for jobs.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Testimonials Section -->
        <section id="testimonials" class="py-20 lg:py-28">
            <div class="container mx-auto px-6">
                 <div class="text-center mb-16">
                    <h2 class="text-4xl lg:text-5xl font-bold text-white">Loved by <span class="gradient-text">Professionals</span> Worldwide</h2>
                 </div>
                 <div class="grid lg:grid-cols-3 gap-8">
                    <!-- Testimonial 1 -->
                    <div class="bg-slate-800 p-8 rounded-xl reveal-on-scroll">
                        <p class="text-gray-300 mb-6">"SelfResume is a game-changer. The AI writer helped me articulate my achievements in a way I never could have on my own. I got three interview requests within a week!"</p>
                        <div class="flex items-center">
                             <img class="w-12 h-12 rounded-full mr-4" src="https://i.pravatar.cc/48?u=1" alt="Avatar of Sarah L.">
                             <div>
                                <p class="font-bold text-white">Sarah L.</p>
                                <p class="text-sm text-indigo-400">Senior Product Manager</p>
                             </div>
                        </div>
                    </div>
                     <!-- Testimonial 2 -->
                    <div class="bg-slate-800 p-8 rounded-xl reveal-on-scroll" style="transition-delay: 200ms;">
                        <p class="text-gray-300 mb-6">"As a recent graduate, I was struggling to create a resume that stood out. The templates and keyword suggestions were incredibly helpful. Landed my first job at a tech startup!"</p>
                        <div class="flex items-center">
                             <img class="w-12 h-12 rounded-full mr-4" src="https://i.pravatar.cc/48?u=2" alt="Avatar of Mike R.">
                             <div>
                                <p class="font-bold text-white">Mike R.</p>
                                <p class="text-sm text-indigo-400">Junior Software Engineer</p>
                             </div>
                        </div>
                    </div>
                     <!-- Testimonial 3 -->
                    <div class="bg-slate-800 p-8 rounded-xl reveal-on-scroll" style="transition-delay: 400ms;">
                        <p class="text-gray-300 mb-6">"I've used many resume builders, but none have the AI capabilities of SelfResume. It's fast, intuitive, and the results are truly professional. Highly recommended."</p>
                        <div class="flex items-center">
                             <img class="w-12 h-12 rounded-full mr-4" src="https://i.pravatar.cc/48?u=3" alt="Avatar of Jessica Chen">
                             <div>
                                <p class="font-bold text-white">Jessica Chen</p>
                                <p class="text-sm text-indigo-400">Marketing Director</p>
                             </div>
                        </div>
                    </div>
                 </div>
            </div>
        </section>
        
        <!-- Final CTA Section -->
        <section class="py-20 lg:py-28">
            <div class="container mx-auto px-6 text-center">
                 <div class="relative max-w-3xl mx-auto">
                    <div class="absolute inset-0 bg-purple-900/40 rounded-full blur-3xl -z-10"></div>
                     <h2 class="text-4xl md:text-5xl font-bold text-white mb-6">Ready to Land Your Dream Job?</h2>
                     <p class="text-lg text-gray-400 mb-10">Start building your future today. Your perfect resume is just a few clicks away.</p>
                     <a href="#" class="gradient-bg text-white font-bold text-lg px-8 py-4 rounded-xl hover:scale-105 hover:shadow-xl hover:shadow-purple-500/30 transition-all duration-300">
                        Create My Resume for Free
                    </a>
                 </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="bg-slate-900 border-t border-slate-800">
        <div class="container mx-auto px-6 py-12">
            <div class="grid md:grid-cols-4 gap-8">
                <!-- Brand Info -->
                <div class="md:col-span-1">
                     <a href="#" class="text-2xl font-bold text-white">
                        Self<span class="gradient-text">Resume</span>
                    </a>
                    <p class="text-gray-400 mt-4">AI-powered tools to help you build a better future.</p>
                </div>
                <!-- Links -->
                <div>
                    <h4 class="font-semibold text-white text-lg mb-4">Product</h4>
                    <ul class="space-y-3">
                        <li><a href="#features" class="text-gray-400 hover:text-white">Features</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Templates</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Pricing</a></li>
                    </ul>
                </div>
                 <div>
                    <h4 class="font-semibold text-white text-lg mb-4">Company</h4>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-gray-400 hover:text-white">About Us</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Contact</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Blog</a></li>
                    </ul>
                </div>
                 <div>
                    <h4 class="font-semibold text-white text-lg mb-4">Legal</h4>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-gray-400 hover:text-white">Privacy Policy</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Terms of Service</a></li>
                    </ul>
                </div>
            </div>
            <div class="mt-12 pt-8 border-t border-slate-800 text-center text-gray-500">
                &copy; 2024 SelfResume. All rights reserved.
            </div>
        </div>
    </footer>


    <!-- JavaScript for Interactivity -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Intersection Observer for scroll animations
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-visible');
                    }
                });
            }, {
                threshold: 0.1 // Trigger when 10% of the element is visible
            });

            // Observe all elements with the 'reveal-on-scroll' class
            const elementsToReveal = document.querySelectorAll('.reveal-on-scroll');
            elementsToReveal.forEach(element => {
                observer.observe(element);
            });
        });
    </script>

</body>
</html>
