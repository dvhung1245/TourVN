<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>TourVN - Khám phá vẻ đẹp Việt Nam</title>
        <meta name="description" content="Đặt tour du lịch chất lượng cao tại Việt Nam cùng TourVN. Khám phá Vịnh Hạ Long, Hội An, Sapa và nhiều điểm đến hấp dẫn khác.">
        
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:300,400,500,600,700|outfit:400,500,600,700,800&display=swap" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <!-- Fallback Tailwind CDN if Vite isn't built yet -->
            <script src="https://cdn.tailwindcss.com"></script>
            <script>
                tailwind.config = {
                    theme: {
                        extend: {
                            fontFamily: {
                                sans: ['Inter', 'sans-serif'],
                                heading: ['Outfit', 'sans-serif'],
                            },
                            colors: {
                                primary: {
                                    50: '#f0fdfa',
                                    100: '#ccfbf1',
                                    200: '#99f6e4',
                                    300: '#5eead4',
                                    400: '#2dd4bf',
                                    500: '#14b8a6',
                                    600: '#0d9488',
                                    700: '#0f766e',
                                    800: '#115e59',
                                    900: '#134e4a',
                                }
                            }
                        }
                    }
                }
            </script>
        @endif
        
        <!-- Alpine JS Fallback just in case -->
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
        
        <style>
            .font-heading { font-family: 'Outfit', sans-serif; }
            .font-sans { font-family: 'Inter', sans-serif; }
            
            /* Custom Scrollbar */
            ::-webkit-scrollbar { width: 8px; }
            ::-webkit-scrollbar-track { background: #f1f1f1; }
            ::-webkit-scrollbar-thumb { background: #0d9488; border-radius: 4px; }
            ::-webkit-scrollbar-thumb:hover { background: #0f766e; }
        </style>
    </head>
    <body class="font-sans text-gray-800 antialiased bg-gray-50 selection:bg-teal-500 selection:text-white" x-data="{ scrolled: false }" @scroll.window="scrolled = (window.pageYOffset > 20)">
        
        <!-- Navbar -->
        <nav :class="{'bg-white/90 backdrop-blur-md shadow-md py-4': scrolled, 'bg-transparent py-6': !scrolled}" class="fixed w-full z-50 transition-all duration-300">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center">
                    <div class="flex items-center">
                        <a href="/" class="text-2xl font-heading font-bold" :class="{'text-gray-900': scrolled, 'text-white': !scrolled}">
                            Tour<span class="text-teal-500">VN</span>
                        </a>
                    </div>
                    <div class="hidden md:flex space-x-8 items-center">
                        <a href="#" class="font-medium hover:text-teal-500 transition-colors" :class="{'text-gray-600': scrolled, 'text-gray-200 hover:text-white': !scrolled}">Trang chủ</a>
                        <a href="#destinations" class="font-medium hover:text-teal-500 transition-colors" :class="{'text-gray-600': scrolled, 'text-gray-200 hover:text-white': !scrolled}">Điểm đến</a>
                        <a href="#tours" class="font-medium hover:text-teal-500 transition-colors" :class="{'text-gray-600': scrolled, 'text-gray-200 hover:text-white': !scrolled}">Tour phổ biến</a>
                        <a href="#" class="font-medium hover:text-teal-500 transition-colors" :class="{'text-gray-600': scrolled, 'text-gray-200 hover:text-white': !scrolled}">Liên hệ</a>
                    </div>
                    <div class="hidden md:flex items-center space-x-4">
                        @if (Route::has('login'))
                            @auth
                                <a href="{{ url('/dashboard') }}" class="px-5 py-2.5 rounded-full bg-teal-500 text-white font-medium hover:bg-teal-600 transition-all shadow-lg shadow-teal-500/30 hover:shadow-teal-500/50 transform hover:-translate-y-0.5">Bảng điều khiển</a>
                            @else
                                <a href="{{ route('login') }}" class="font-medium hover:text-teal-500 transition-colors" :class="{'text-gray-900': scrolled, 'text-white': !scrolled}">Đăng nhập</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="px-5 py-2.5 rounded-full bg-teal-500 text-white font-medium hover:bg-teal-600 transition-all shadow-lg shadow-teal-500/30 hover:shadow-teal-500/50 transform hover:-translate-y-0.5">Đăng ký</a>
                                @endif
                            @endauth
                        @endif
                    </div>
                </div>
            </div>
        </nav>

        <!-- Hero Section -->
        <div class="relative h-screen flex items-center justify-center overflow-hidden">
            <!-- Background Image -->
            <div class="absolute inset-0 z-0">
                <img src="/images/hero.png" alt="Ha Long Bay" class="w-full h-full object-cover transform scale-105" onerror="this.src='https://images.unsplash.com/photo-1528127269322-539801943592?q=80&w=1920&auto=format&fit=crop'">
                <div class="absolute inset-0 bg-gradient-to-b from-gray-900/70 via-gray-900/50 to-gray-900/90"></div>
            </div>

            <!-- Content -->
            <div class="relative z-10 text-center px-4 max-w-5xl mx-auto mt-20">
                <span class="inline-block py-1.5 px-4 rounded-full bg-white/20 backdrop-blur-md border border-white/30 text-white text-sm font-medium mb-6">
                    ✨ Khám phá dải đất hình chữ S
                </span>
                <h1 class="text-5xl md:text-7xl lg:text-8xl font-heading font-extrabold text-white mb-6 leading-tight drop-shadow-lg tracking-tight">
                    Hành trình của bạn <br/><span class="text-transparent bg-clip-text bg-gradient-to-r from-teal-400 to-emerald-200">Bắt đầu từ đây</span>
                </h1>
                <p class="text-lg md:text-xl text-gray-200 mb-10 max-w-2xl mx-auto font-light drop-shadow-md">
                    Trải nghiệm những kỳ quan thiên nhiên, văn hóa độc đáo và ẩm thực tuyệt vời của Việt Nam cùng TourVN.
                </p>

                <!-- Search Box -->
                <div class="bg-white p-3 rounded-[2rem] shadow-2xl max-w-4xl mx-auto flex flex-col md:flex-row gap-3 items-center backdrop-blur-xl bg-white/95">
                    <div class="flex-1 w-full relative">
                        <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        </div>
                        <input type="text" placeholder="Bạn muốn đi đâu?" class="w-full pl-12 pr-4 py-4 bg-gray-50 hover:bg-gray-100 border-transparent focus:border-teal-500 focus:bg-white focus:ring-2 focus:ring-teal-200 rounded-[1.5rem] transition-all outline-none font-medium">
                    </div>
                    <div class="flex-1 w-full relative">
                        <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        </div>
                        <input type="text" placeholder="Ngày khởi hành" onfocus="(this.type='date')" onblur="(this.type='text')" class="w-full pl-12 pr-4 py-4 bg-gray-50 hover:bg-gray-100 border-transparent focus:border-teal-500 focus:bg-white focus:ring-2 focus:ring-teal-200 rounded-[1.5rem] transition-all outline-none font-medium text-gray-600">
                    </div>
                    <button class="w-full md:w-auto px-8 py-4 bg-teal-600 hover:bg-teal-700 text-white font-bold rounded-[1.5rem] transition-all shadow-lg shadow-teal-600/30 flex items-center justify-center gap-2 transform hover:scale-105 active:scale-95">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        Khám phá
                    </button>
                </div>
            </div>
            
            <!-- Scroll Indicator -->
            <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2 animate-bounce">
                <a href="#destinations" class="flex flex-col items-center text-white/70 hover:text-white transition-colors">
                    <span class="text-xs tracking-widest uppercase font-semibold mb-2">Cuộn xuống</span>
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path></svg>
                </a>
            </div>
        </div>

        <!-- Destinations Section -->
        <section id="destinations" class="py-24 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <span class="text-teal-600 font-semibold tracking-wider uppercase text-sm mb-2 block">Lựa chọn hàng đầu</span>
                    <h2 class="text-3xl md:text-5xl font-heading font-bold text-gray-900 mb-6">Điểm đến <span class="text-transparent bg-clip-text bg-gradient-to-r from-teal-600 to-emerald-500">Nổi bật</span></h2>
                    <p class="text-gray-500 max-w-2xl mx-auto text-lg">Khám phá những vùng đất tươi đẹp nhất từ Bắc chí Nam, được lựa chọn hàng đầu bởi hàng ngàn du khách.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Card 1 -->
                    <div class="group relative rounded-3xl overflow-hidden shadow-md hover:shadow-2xl transition-all duration-500 aspect-[4/5] bg-gray-200 cursor-pointer">
                        <img src="/images/hero.png" alt="Ha Long" class="absolute inset-0 w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-1000 ease-out" onerror="this.src='https://images.unsplash.com/photo-1528127269322-539801943592?q=80&w=800&auto=format&fit=crop'">
                        <div class="absolute inset-0 bg-gradient-to-t from-gray-900/95 via-gray-900/40 to-transparent opacity-90 group-hover:opacity-100 transition-opacity duration-500"></div>
                        <div class="absolute bottom-0 left-0 p-8 w-full transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                            <h3 class="text-3xl font-heading font-bold text-white mb-3">Vịnh Hạ Long</h3>
                            <p class="text-gray-300 text-sm mb-6 line-clamp-2 opacity-0 group-hover:opacity-100 transition-opacity duration-500 delay-100">Kỳ quan thiên nhiên thế giới với hàng ngàn hòn đảo đá vôi kỳ vĩ và những hang động tuyệt đẹp.</p>
                            <div class="flex justify-between items-center">
                                <span class="text-white font-medium bg-white/20 backdrop-blur-md px-4 py-2 rounded-xl text-sm border border-white/30">45 Tours</span>
                                <span class="w-12 h-12 rounded-full bg-teal-500 flex items-center justify-center text-white transform translate-x-4 opacity-0 group-hover:translate-x-0 group-hover:opacity-100 transition-all duration-500 shadow-lg shadow-teal-500/50">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="group relative rounded-3xl overflow-hidden shadow-md hover:shadow-2xl transition-all duration-500 aspect-[4/5] bg-gray-200 cursor-pointer lg:-translate-y-8">
                        <img src="/images/hoian.png" alt="Hoi An" onerror="this.src='https://images.unsplash.com/photo-1559592413-7cec4d0cae2b?q=80&w=800&auto=format&fit=crop'" class="absolute inset-0 w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-1000 ease-out">
                        <div class="absolute inset-0 bg-gradient-to-t from-gray-900/95 via-gray-900/40 to-transparent opacity-90 group-hover:opacity-100 transition-opacity duration-500"></div>
                        <div class="absolute bottom-0 left-0 p-8 w-full transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                            <h3 class="text-3xl font-heading font-bold text-white mb-3">Phố cổ Hội An</h3>
                            <p class="text-gray-300 text-sm mb-6 line-clamp-2 opacity-0 group-hover:opacity-100 transition-opacity duration-500 delay-100">Nét đẹp cổ kính yên bình với những chiếc đèn lồng rực rỡ bên dòng sông Hoài thơ mộng.</p>
                            <div class="flex justify-between items-center">
                                <span class="text-white font-medium bg-white/20 backdrop-blur-md px-4 py-2 rounded-xl text-sm border border-white/30">32 Tours</span>
                                <span class="w-12 h-12 rounded-full bg-teal-500 flex items-center justify-center text-white transform translate-x-4 opacity-0 group-hover:translate-x-0 group-hover:opacity-100 transition-all duration-500 shadow-lg shadow-teal-500/50">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div class="group relative rounded-3xl overflow-hidden shadow-md hover:shadow-2xl transition-all duration-500 aspect-[4/5] bg-gray-200 cursor-pointer">
                        <img src="https://images.unsplash.com/photo-1526681845183-5161042733f1?q=80&w=800&auto=format&fit=crop" alt="Da Nang" class="absolute inset-0 w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-1000 ease-out">
                        <div class="absolute inset-0 bg-gradient-to-t from-gray-900/95 via-gray-900/40 to-transparent opacity-90 group-hover:opacity-100 transition-opacity duration-500"></div>
                        <div class="absolute bottom-0 left-0 p-8 w-full transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                            <h3 class="text-3xl font-heading font-bold text-white mb-3">Đà Nẵng</h3>
                            <p class="text-gray-300 text-sm mb-6 line-clamp-2 opacity-0 group-hover:opacity-100 transition-opacity duration-500 delay-100">Thành phố đáng sống nhất Việt Nam với những bãi biển tuyệt đẹp và kiệt tác Bà Nà Hills.</p>
                            <div class="flex justify-between items-center">
                                <span class="text-white font-medium bg-white/20 backdrop-blur-md px-4 py-2 rounded-xl text-sm border border-white/30">58 Tours</span>
                                <span class="w-12 h-12 rounded-full bg-teal-500 flex items-center justify-center text-white transform translate-x-4 opacity-0 group-hover:translate-x-0 group-hover:opacity-100 transition-all duration-500 shadow-lg shadow-teal-500/50">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Popular Tours -->
        <section id="tours" class="py-24 bg-white relative">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <div class="flex flex-col md:flex-row justify-between items-end mb-16 gap-6">
                    <div>
                        <span class="text-teal-600 font-semibold tracking-wider uppercase text-sm mb-2 block">Dành cho bạn</span>
                        <h2 class="text-3xl md:text-5xl font-heading font-bold text-gray-900 mb-4">Tour được <span class="text-transparent bg-clip-text bg-gradient-to-r from-teal-600 to-emerald-500">Yêu thích nhất</span></h2>
                        <p class="text-gray-500 max-w-2xl text-lg">Lựa chọn những hành trình trọn vẹn nhất cho kỳ nghỉ của bạn với mức giá ưu đãi.</p>
                    </div>
                    <a href="#" class="inline-flex items-center text-teal-600 font-semibold hover:text-teal-700 bg-teal-50 hover:bg-teal-100 px-6 py-3 rounded-full transition-colors">
                        Xem tất cả Tours
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                    </a>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Tour 1 -->
                    <div class="bg-white rounded-3xl border border-gray-100 overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 group flex flex-col">
                        <div class="relative h-64 overflow-hidden">
                            <img src="/images/hero.png" alt="Tour Hạ Long" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700" onerror="this.src='https://images.unsplash.com/photo-1528127269322-539801943592?q=80&w=800&auto=format&fit=crop'">
                            <div class="absolute inset-0 bg-gradient-to-t from-gray-900/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            <div class="absolute top-4 right-4 bg-white/95 backdrop-blur-md text-gray-900 px-4 py-1.5 rounded-full text-sm font-bold flex items-center shadow-md">
                                <svg class="w-4 h-4 text-yellow-500 mr-1.5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                4.9 <span class="text-gray-400 font-normal text-xs ml-1">(128)</span>
                            </div>
                        </div>
                        <div class="p-8 flex-1 flex flex-col">
                            <div class="flex items-center text-teal-600 font-semibold text-sm mb-4 bg-teal-50 inline-flex px-3 py-1 rounded-full w-fit">
                                <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                2 Ngày 1 Đêm
                                <span class="mx-2 text-teal-300">•</span>
                                <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                Vịnh Hạ Long
                            </div>
                            <h3 class="text-xl font-heading font-bold text-gray-900 mb-3 group-hover:text-teal-600 transition-colors leading-snug">Khám phá Di sản Vịnh Hạ Long trên Du thuyền 5 sao</h3>
                            <p class="text-gray-500 text-sm mb-8 line-clamp-2 leading-relaxed">Tận hưởng dịch vụ đẳng cấp, tham quan hang Sửng Sốt, đảo Ti Tốp và trải nghiệm chèo thuyền kayak trên vịnh xanh biếc.</p>
                            
                            <div class="mt-auto pt-6 border-t border-gray-100 flex justify-between items-center">
                                <div>
                                    <span class="text-gray-400 text-sm line-through block mb-0.5">3.500.000đ</span>
                                    <div class="text-2xl font-bold text-gray-900">2.850.000đ<span class="text-sm font-normal text-gray-500">/khách</span></div>
                                </div>
                                <a href="#" class="w-12 h-12 rounded-full bg-gray-900 text-white flex items-center justify-center hover:bg-teal-600 transition-colors shadow-md">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Tour 2 -->
                    <div class="bg-white rounded-3xl border border-gray-100 overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 group flex flex-col relative">
                        <!-- Badge -->
                        <div class="absolute -right-12 top-6 bg-rose-500 text-white px-12 py-1 transform rotate-45 z-10 font-bold text-sm shadow-md">
                            GIẢM 15%
                        </div>
                        <div class="relative h-64 overflow-hidden">
                            <img src="/images/hoian.png" alt="Tour Hội An" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700" onerror="this.src='https://images.unsplash.com/photo-1559592413-7cec4d0cae2b?q=80&w=800&auto=format&fit=crop'">
                            <div class="absolute inset-0 bg-gradient-to-t from-gray-900/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            <div class="absolute top-4 left-4 bg-white/95 backdrop-blur-md text-gray-900 px-4 py-1.5 rounded-full text-sm font-bold flex items-center shadow-md">
                                <svg class="w-4 h-4 text-yellow-500 mr-1.5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                4.8 <span class="text-gray-400 font-normal text-xs ml-1">(96)</span>
                            </div>
                        </div>
                        <div class="p-8 flex-1 flex flex-col">
                            <div class="flex items-center text-teal-600 font-semibold text-sm mb-4 bg-teal-50 inline-flex px-3 py-1 rounded-full w-fit">
                                <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                3 Ngày 2 Đêm
                                <span class="mx-2 text-teal-300">•</span>
                                <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                Đà Nẵng - Hội An
                            </div>
                            <h3 class="text-xl font-heading font-bold text-gray-900 mb-3 group-hover:text-teal-600 transition-colors leading-snug">Di sản Miền Trung: Đà Nẵng - Sơn Trà - Phố cổ Hội An</h3>
                            <p class="text-gray-500 text-sm mb-8 line-clamp-2 leading-relaxed">Tham quan Chùa Linh Ứng thiêng liêng, Ngũ Hành Sơn hùng vĩ và thả hoa đăng lãng mạn trên sông Hoài thơ mộng.</p>
                            
                            <div class="mt-auto pt-6 border-t border-gray-100 flex justify-between items-center">
                                <div>
                                    <span class="text-gray-400 text-sm line-through block mb-0.5">4.200.000đ</span>
                                    <div class="text-2xl font-bold text-gray-900">3.570.000đ<span class="text-sm font-normal text-gray-500">/khách</span></div>
                                </div>
                                <a href="#" class="w-12 h-12 rounded-full bg-gray-900 text-white flex items-center justify-center hover:bg-teal-600 transition-colors shadow-md">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Tour 3 -->
                    <div class="bg-white rounded-3xl border border-gray-100 overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 group flex flex-col">
                        <div class="relative h-64 overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1542640244-7e672d6cb466?q=80&w=800&auto=format&fit=crop" alt="Tour Sapa" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">
                            <div class="absolute inset-0 bg-gradient-to-t from-gray-900/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            <div class="absolute top-4 right-4 bg-white/95 backdrop-blur-md text-gray-900 px-4 py-1.5 rounded-full text-sm font-bold flex items-center shadow-md">
                                <svg class="w-4 h-4 text-yellow-500 mr-1.5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                4.7 <span class="text-gray-400 font-normal text-xs ml-1">(84)</span>
                            </div>
                        </div>
                        <div class="p-8 flex-1 flex flex-col">
                            <div class="flex items-center text-teal-600 font-semibold text-sm mb-4 bg-teal-50 inline-flex px-3 py-1 rounded-full w-fit">
                                <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                3 Ngày 2 Đêm
                                <span class="mx-2 text-teal-300">•</span>
                                <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                Sapa - Lào Cai
                            </div>
                            <h3 class="text-xl font-heading font-bold text-gray-900 mb-3 group-hover:text-teal-600 transition-colors leading-snug">Săn mây Fansipan - Khám phá vẻ đẹp bản Cát Cát</h3>
                            <p class="text-gray-500 text-sm mb-8 line-clamp-2 leading-relaxed">Trải nghiệm cáp treo lên đỉnh Fansipan - Nóc nhà Đông Dương và ngắm nhìn thung lũng Mường Hoa tuyệt đẹp.</p>
                            
                            <div class="mt-auto pt-6 border-t border-gray-100 flex justify-between items-center">
                                <div>
                                    <span class="text-transparent text-sm line-through block mb-0.5">&nbsp;</span>
                                    <div class="text-2xl font-bold text-gray-900">3.200.000đ<span class="text-sm font-normal text-gray-500">/khách</span></div>
                                </div>
                                <a href="#" class="w-12 h-12 rounded-full bg-gray-900 text-white flex items-center justify-center hover:bg-teal-600 transition-colors shadow-md">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="py-24 relative overflow-hidden">
            <div class="absolute inset-0 bg-teal-900"></div>
            <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10"></div>
            
            <!-- Decorative Elements -->
            <div class="absolute top-0 right-0 -mr-20 -mt-20 w-72 h-72 rounded-full bg-teal-500 opacity-20 blur-3xl"></div>
            <div class="absolute bottom-0 left-0 -ml-20 -mb-20 w-72 h-72 rounded-full bg-emerald-500 opacity-20 blur-3xl"></div>
            
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
                <span class="inline-block py-1.5 px-4 rounded-full bg-white/10 backdrop-blur-md border border-white/20 text-teal-200 text-sm font-medium mb-6">
                    Đừng bỏ lỡ
                </span>
                <h2 class="text-4xl md:text-6xl font-heading font-bold text-white mb-6 leading-tight">Sẵn sàng cho chuyến đi tiếp theo?</h2>
                <p class="text-teal-100 text-lg md:text-xl mb-12 max-w-2xl mx-auto font-light">Đăng ký nhận bản tin để cập nhật những ưu đãi hấp dẫn nhất và gợi ý điểm đến tuyệt vời từ chuyên gia của TourVN.</p>
                <form class="flex flex-col sm:flex-row gap-3 justify-center max-w-2xl mx-auto">
                    <input type="email" required placeholder="Nhập địa chỉ email của bạn..." class="px-6 py-4 rounded-full bg-white/10 border border-white/20 text-white placeholder-white/60 focus:outline-none focus:ring-2 focus:ring-teal-400 focus:bg-white/20 w-full sm:w-auto flex-1 backdrop-blur-sm transition-all font-medium">
                    <button type="submit" class="px-10 py-4 rounded-full bg-white text-teal-900 font-bold hover:bg-teal-50 hover:scale-105 active:scale-95 transition-all shadow-[0_0_20px_rgba(255,255,255,0.3)]">
                        Đăng ký ngay
                    </button>
                </form>
            </div>
        </section>

        <!-- Footer -->
        <footer class="bg-gray-900 text-gray-300 py-16 border-t border-gray-800">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-12 gap-12 lg:gap-8">
                    <div class="col-span-1 md:col-span-12 lg:col-span-4">
                        <a href="/" class="text-3xl font-heading font-bold text-white mb-6 inline-block tracking-tight">
                            Tour<span class="text-teal-500">VN</span>
                        </a>
                        <p class="text-gray-400 text-sm mb-8 leading-relaxed max-w-sm">Nền tảng đặt tour du lịch hàng đầu Việt Nam. Chúng tôi cam kết mang đến những trải nghiệm đáng nhớ nhất cho mọi hành trình của bạn với chi phí hợp lý nhất.</p>
                        <div class="flex space-x-4">
                            <a href="#" class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center hover:bg-teal-500 hover:text-white transition-all transform hover:-translate-y-1">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/></svg>
                            </a>
                            <a href="#" class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center hover:bg-teal-500 hover:text-white transition-all transform hover:-translate-y-1">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                            </a>
                            <a href="#" class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center hover:bg-teal-500 hover:text-white transition-all transform hover:-translate-y-1">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"/></svg>
                            </a>
                        </div>
                    </div>
                    <div class="col-span-1 md:col-span-4 lg:col-span-2">
                        <h4 class="text-white font-bold mb-6 uppercase text-sm tracking-wider">Về chúng tôi</h4>
                        <ul class="space-y-4 text-sm font-medium">
                            <li><a href="#" class="text-gray-400 hover:text-teal-400 transition-colors inline-block">Câu chuyện TourVN</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-teal-400 transition-colors inline-block">Tuyển dụng</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-teal-400 transition-colors inline-block">Blog Du lịch</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-teal-400 transition-colors inline-block">Báo chí</a></li>
                        </ul>
                    </div>
                    <div class="col-span-1 md:col-span-4 lg:col-span-3">
                        <h4 class="text-white font-bold mb-6 uppercase text-sm tracking-wider">Hỗ trợ khách hàng</h4>
                        <ul class="space-y-4 text-sm font-medium">
                            <li><a href="#" class="text-gray-400 hover:text-teal-400 transition-colors inline-block">Trung tâm trợ giúp</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-teal-400 transition-colors inline-block">Hướng dẫn đặt tour</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-teal-400 transition-colors inline-block">Chính sách hủy đổi</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-teal-400 transition-colors inline-block">Câu hỏi thường gặp</a></li>
                        </ul>
                    </div>
                    <div class="col-span-1 md:col-span-4 lg:col-span-3">
                        <h4 class="text-white font-bold mb-6 uppercase text-sm tracking-wider">Thông tin liên hệ</h4>
                        <ul class="space-y-5 text-sm text-gray-400 font-medium">
                            <li class="flex items-start">
                                <svg class="w-5 h-5 mr-4 text-teal-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                <span class="leading-relaxed">Tầng 12, Tòa nhà TourVN<br>Quận 1, TP. Hồ Chí Minh</span>
                            </li>
                            <li class="flex items-center group">
                                <svg class="w-5 h-5 mr-4 text-teal-500 shrink-0 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                                <a href="tel:19001234" class="hover:text-teal-400 transition-colors">1900 1234</a>
                            </li>
                            <li class="flex items-center group">
                                <svg class="w-5 h-5 mr-4 text-teal-500 shrink-0 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                <a href="mailto:support@tourvn.com" class="hover:text-teal-400 transition-colors">support@tourvn.com</a>
                            </li>
                        </ul>
                    </div>
                </div>
                
                <div class="border-t border-gray-800 mt-16 pt-8 flex flex-col md:flex-row justify-between items-center text-sm text-gray-500 font-medium">
                    <p>&copy; 2026 TourVN. Đã đăng ký bản quyền.</p>
                    <div class="flex space-x-6 mt-4 md:mt-0">
                        <a href="#" class="hover:text-white transition-colors">Điều khoản dịch vụ</a>
                        <a href="#" class="hover:text-white transition-colors">Chính sách bảo mật</a>
                        <a href="#" class="hover:text-white transition-colors">Sơ đồ trang</a>
                    </div>
                </div>
            </div>
        </footer>
    </body>
</html>
