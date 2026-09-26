<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-brand-neutral antialiased bg-white">
        <div class="w-full min-h-screen flex flex-col lg:flex-row bg-white">
            
            <!-- Left Side: Full Screen Image & Benefits -->
            <div class="hidden lg:flex lg:w-5/12 xl:w-1/2 relative flex-col justify-between p-12 xl:p-20 text-white">
                <!-- Background Image -->
                <div class="absolute inset-0 z-0 bg-brand-neutral">
                    <img src="https://images.unsplash.com/photo-1555921015-5532091f6026?q=80&w=1920&auto=format&fit=crop" class="w-full h-full object-cover opacity-60 mix-blend-luminosity" alt="Background">
                    <div class="absolute inset-0 bg-gradient-to-br from-brand-primary/95 via-brand-primary/80 to-brand-neutral/95"></div>
                </div>

                <!-- Content Top -->
                <div class="relative z-10">
                    <a href="/" class="inline-flex items-center gap-3 group mb-12">
                        <div class="w-12 h-12 bg-white/20 backdrop-blur-md rounded-xl flex items-center justify-center border border-white/30 shadow-lg group-hover:scale-105 transition-all duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <span class="text-2xl font-bold text-white tracking-widest uppercase">TourVN</span>
                    </a>

                    <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-white/20 backdrop-blur-md border border-white/30 text-xs font-bold tracking-wider uppercase mb-6">
                        <span class="w-2 h-2 rounded-full bg-brand-secondary shadow-[0_0_8px_#F97316]"></span>
                        Thành viên Ocean Club
                    </div>
                    
                    <h2 class="text-4xl xl:text-5xl font-bold leading-tight mb-6 drop-shadow-md">
                        Đặc quyền nghỉ dưỡng<br>thượng lưu
                    </h2>
                    <p class="text-white/80 mb-12 text-base leading-relaxed max-w-md">
                        Khám phá hành trình viễn du sang trọng, chạm tới những miền biển nguyên sơ cùng dịch vụ cá nhân hóa chuẩn quốc tế.
                    </p>

                    <div class="space-y-6 max-w-md">
                        <!-- Benefit 1 -->
                        <div class="flex items-start gap-4 p-5 rounded-2xl bg-white/10 backdrop-blur-md border border-white/10 hover:bg-white/20 transition-all duration-300 cursor-pointer transform hover:-translate-y-1">
                            <div class="w-12 h-12 rounded-full bg-brand-tertiary flex items-center justify-center shrink-0 shadow-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor"><path d="M4 3a2 2 0 100 4h12a2 2 0 100-4H4z" /><path fill-rule="evenodd" d="M3 8h14v7a2 2 0 01-2 2H5a2 2 0 01-2-2V8zm5 3a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1z" clip-rule="evenodd" /></svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-base">Tích lũy dặm thưởng đa tầng</h4>
                                <p class="text-sm text-white/70 mt-1">Đổi tour miễn phí & nhận quà tặng cao cấp.</p>
                            </div>
                        </div>

                        <!-- Benefit 2 -->
                        <div class="flex items-start gap-4 p-5 rounded-2xl bg-white/10 backdrop-blur-md border border-white/10 hover:bg-white/20 transition-all duration-300 cursor-pointer transform hover:-translate-y-1">
                            <div class="w-12 h-12 rounded-full bg-brand-secondary flex items-center justify-center shrink-0 shadow-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5 2a1 1 0 011 1v1h1a1 1 0 010 2H6v1a1 1 0 01-2 0V6H3a1 1 0 010-2h1V3a1 1 0 011-1zm0 10a1 1 0 011 1v1h1a1 1 0 110 2H6v1a1 1 0 11-2 0v-1H3a1 1 0 110-2h1v-1a1 1 0 011-1zM12 2a1 1 0 01.967.744L14.146 7.2 17.5 9.134a1 1 0 010 1.732l-3.354 1.935-1.18 4.455a1 1 0 01-1.933 0L9.854 12.8 6.5 10.866a1 1 0 010-1.732l3.354-1.935 1.18-4.455A1 1 0 0112 2z" clip-rule="evenodd" /></svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-base">Ưu đãi độc quyền đến 15%</h4>
                                <p class="text-sm text-white/70 mt-1">Dành riêng cho hội viên đặt phòng suite.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Testimonial -->
                <div class="relative z-10 mt-12 max-w-md">
                    <div class="flex items-center gap-1 text-yellow-400 mb-3">
                        <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" /></svg>
                        <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" /></svg>
                        <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" /></svg>
                        <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" /></svg>
                        <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" /></svg>
                    </div>
                    <p class="text-base text-white/90 italic">"TourVN giúp gia đình tôi có chuyến đi Phú Quốc hoàn hảo ngoài mong đợi. Một trải nghiệm 5 sao thực sự."</p>
                    <div class="mt-4 flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-white/20"></div>
                        <div>
                            <p class="text-sm font-bold text-white">Minh Trí</p>
                            <p class="text-xs text-white/70">Hội viên Vàng</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Side: Login Form Container -->
            <div class="w-full lg:w-7/12 xl:w-1/2 flex items-center justify-center p-8 sm:p-12 lg:p-20 relative bg-white min-h-screen overflow-y-auto">
                <!-- Background Pattern -->
                <div class="absolute inset-0 opacity-[0.03] pointer-events-none" style="background-image: radial-gradient(#0F172A 1px, transparent 1px); background-size: 20px 20px;"></div>
                
                <div class="w-full max-w-[480px] relative z-10">
                    {{ $slot }}
                </div>
            </div>
            
        </div>
    </body>
</html>
