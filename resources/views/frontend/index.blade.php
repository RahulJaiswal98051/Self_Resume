@extends('frontend.layouts.master')
@section('content')
    <main>
        <!-- Hero Section -->
     @include('frontend.includes.hero')
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

@endsection