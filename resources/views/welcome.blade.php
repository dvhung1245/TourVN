<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'TourVN') }} - Đặt Tour Du Lịch Cao Cấp</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.bunny.net/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-slate-50 text-slate-800 antialiased selection:bg-brand-primary selection:text-white">

    <!-- Navbar -->
    <nav x-data="{ scrolled: false, mobileMenu: false }" 
         @scroll.window="scrolled = (window.pageYOffset > 20) ? true : false"
         :class="{ 'bg-white/90 backdrop-blur-md shadow-sm': scrolled, 'bg-transparent': !scrolled }"
         class="fixed w-full z-50 transition-all duration-300 py-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center">
                <!-- Logo -->
                <div class="flex items-center gap-2">
                    <a href="{{ route('home') }}" class="flex items-center gap-2 group">
                        <svg xmlns="http://www.w3.org/2000/svg" :class="scrolled ? 'text-brand-primary' : 'text-white'" class="h-8 w-8 transition-colors" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 17.93c-3.95-.49-7-3.85-7-7.93 0-.62.08-1.21.21-1.79L9 15v1c0 1.1.9 2 2 2v1.93zm6.9-2.54c-.26-.81-1-1.39-1.9-1.39h-1v-3c0-.55-.45-1-1-1H8v-2h2c.55 0 1-.45 1-1V7h2c1.1 0 2-.9 2-2v-.41c2.93 1.19 5 4.06 5 7.41 0 2.08-.8 3.97-2.1 5.39z"/>
                        </svg>
                        <span :class="scrolled ? 'text-slate-900' : 'text-white'" class="text-2xl font-bold tracking-tight transition-colors">
                            TourVN
                        </span>
                    </a>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="#" :class="scrolled ? 'text-slate-600 hover:text-brand-primary' : 'text-white/90 hover:text-white'" class="font-medium transition-colors text-sm">Trang chủ</a>
                    <a href="#" :class="scrolled ? 'text-slate-600 hover:text-brand-primary' : 'text-white/90 hover:text-white'" class="font-medium transition-colors text-sm">Điểm đến</a>
                    <a href="#" :class="scrolled ? 'text-slate-600 hover:text-brand-primary' : 'text-white/90 hover:text-white'" class="font-medium transition-colors text-sm">Du thuyền</a>
                    <a href="#" :class="scrolled ? 'text-slate-600 hover:text-brand-primary' : 'text-white/90 hover:text-white'" class="font-medium transition-colors text-sm">Khuyến mãi</a>
                </div>

                <!-- Auth Buttons -->
                <div class="hidden md:flex items-center space-x-4">
                    @auth
                        <div class="relative" x-data="{ open: false }">
                            <button @click="open = !open" :class="scrolled ? 'text-slate-700 bg-slate-100 hover:bg-slate-200' : 'text-white bg-white/20 hover:bg-white/30 backdrop-blur-sm'" class="flex items-center gap-2 px-4 py-2 rounded-full transition-all font-semibold text-sm">
                                <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&color=fb923c&background=fff7ed" class="w-6 h-6 rounded-full" alt="Avatar">
                                {{ Auth::user()->name }}
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                            </button>
                            <div x-show="open" @click.away="open = false" style="display: none;" class="absolute right-0 mt-2 w-48 bg-white rounded-xl shadow-lg border border-slate-100 py-1 overflow-hidden origin-top-right">
                                <a href="{{ route('dashboard') }}" class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-50 hover:text-brand-primary">Lịch sử đặt tour</a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50">Đăng xuất</button>
                                </form>
                            </div>
                        </div>
                    @else
                        <a href="{{ route('login') }}" :class="scrolled ? 'text-slate-700 hover:bg-slate-50' : 'text-white hover:bg-white/10'" class="px-5 py-2.5 rounded-full font-semibold transition-all text-sm">Đăng nhập</a>
                        <a href="{{ route('register') }}" class="px-5 py-2.5 bg-brand-primary hover:bg-brand-secondary text-white rounded-full font-bold shadow-lg shadow-brand-primary/30 transition-all hover:-translate-y-0.5 text-sm">Đăng ký</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="relative min-h-screen flex items-center justify-center pt-20 overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1528181304800-259b08848526?q=80&w=2000&auto=format&fit=crop" class="w-full h-full object-cover" alt="Vietnam Landscape">
            <div class="absolute inset-0 bg-gradient-to-b from-slate-900/60 via-slate-900/40 to-slate-900/80"></div>
        </div>

        <div class="relative z-10 text-center px-4 max-w-4xl mx-auto mt-16">
            <span class="inline-block py-1.5 px-4 bg-white/20 backdrop-blur-md border border-white/30 text-white rounded-full text-sm font-semibold mb-6 animate-fade-in-up">🌟 Hành trình tuyệt vời đang chờ đón</span>
            <h1 class="text-5xl md:text-7xl font-extrabold text-white mb-6 leading-tight tracking-tight drop-shadow-lg">
                Khám phá vẻ đẹp <br><span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-300 to-brand-primary">bất tận</span> của Việt Nam
            </h1>
            <p class="text-lg md:text-xl text-white/90 mb-12 max-w-2xl mx-auto font-medium">
                TourVN mang đến những trải nghiệm du lịch cao cấp, độc bản và trọn vẹn nhất. Từ núi non hùng vĩ đến biển xanh vẫy gọi.
            </p>

            <!-- Search Bar -->
            <div class="bg-white/10 backdrop-blur-md border border-white/20 p-2 md:p-3 rounded-2xl flex flex-col md:flex-row gap-2 max-w-3xl mx-auto shadow-2xl">
                <div class="flex-1 relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white/70" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                    </div>
                    <input type="text" placeholder="Bạn muốn đi đâu?" class="w-full bg-white/20 border-transparent text-white placeholder-white/70 focus:bg-white focus:text-slate-900 focus:placeholder-slate-400 rounded-xl pl-11 pr-4 py-3.5 outline-none transition-all font-medium">
                </div>
                <div class="w-full md:w-48 relative">
                    <input type="date" class="w-full bg-white/20 border-transparent text-white focus:bg-white focus:text-slate-900 rounded-xl px-4 py-3.5 outline-none transition-all font-medium">
                </div>
                <button class="bg-brand-primary hover:bg-brand-secondary text-white font-bold px-8 py-3.5 rounded-xl transition-all shadow-lg shadow-brand-primary/40 flex items-center justify-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
                    Tìm tour
                </button>
            </div>
        </div>
        
        <!-- Scroll indicator -->
        <div class="absolute bottom-10 left-1/2 -translate-x-1/2 animate-bounce">
            <div class="w-8 h-12 border-2 border-white/50 rounded-full flex justify-center p-1">
                <div class="w-1.5 h-3 bg-white rounded-full opacity-75"></div>
            </div>
        </div>
    </div>

    <!-- Featured Tours Section -->
    <div class="py-24 bg-slate-50 relative z-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-end mb-12">
                <div>
                    <h2 class="text-3xl font-bold text-slate-900 mb-3">Tour Nổi Bật</h2>
                    <p class="text-slate-500 font-medium text-lg">Khám phá những điểm đến được yêu thích nhất</p>
                </div>
                <a href="#" class="hidden md:flex items-center gap-2 text-brand-primary font-bold hover:text-brand-secondary transition-colors">
                    Xem tất cả tour
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" /></svg>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($tours ?? [] as $tour)
                    <div class="bg-white rounded-3xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 group border border-slate-100 flex flex-col">
                        <div class="relative overflow-hidden aspect-[4/3]">
                            <!-- Temporary Image -->
                            <img src="https://images.unsplash.com/photo-1555921015-5532091f6026?q=80&w=600&auto=format&fit=crop" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" alt="{{ $tour->name }}">
                            <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm px-3 py-1.5 rounded-full text-xs font-bold text-slate-800 shadow-sm flex items-center gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-amber-400" viewBox="0 0 20 20" fill="currentColor"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" /></svg>
                                5.0
                            </div>
                        </div>
                        <div class="p-6 flex-1 flex flex-col">
                            <div class="flex items-center gap-2 text-xs font-bold text-brand-primary tracking-wider uppercase mb-3">
                                <span>{{ $tour->duration_days }} Ngày {{ $tour->duration_nights }} Đêm</span>
                            </div>
                            <h3 class="text-xl font-bold text-slate-900 mb-2 line-clamp-2 leading-snug group-hover:text-brand-primary transition-colors">
                                <a href="#">{{ $tour->name }}</a>
                            </h3>
                            <p class="text-slate-500 text-sm mb-6 line-clamp-2">{{ Str::limit($tour->description, 100) }}</p>
                            
                            <div class="mt-auto pt-4 border-t border-slate-100 flex items-center justify-between">
                                <div>
                                    <p class="text-xs text-slate-400 font-medium mb-0.5">Giá từ</p>
                                    <p class="text-lg font-extrabold text-brand-secondary">{{ number_format($tour->price_adult, 0, ',', '.') }} ₫</p>
                                </div>
                                <a href="#" class="p-3 bg-brand-primary/10 text-brand-primary hover:bg-brand-primary hover:text-white rounded-xl transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" /></svg>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 text-center py-12">
                        <p class="text-slate-500">Hiện chưa có tour nào được mở bán.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-slate-900 text-white py-12 border-t border-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="flex items-center justify-center gap-2 mb-6">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-brand-primary" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 17.93c-3.95-.49-7-3.85-7-7.93 0-.62.08-1.21.21-1.79L9 15v1c0 1.1.9 2 2 2v1.93zm6.9-2.54c-.26-.81-1-1.39-1.9-1.39h-1v-3c0-.55-.45-1-1-1H8v-2h2c.55 0 1-.45 1-1V7h2c1.1 0 2-.9 2-2v-.41c2.93 1.19 5 4.06 5 7.41 0 2.08-.8 3.97-2.1 5.39z"/>
                </svg>
                <span class="text-2xl font-bold tracking-tight">TourVN</span>
            </div>
            <p class="text-slate-400 mb-8 max-w-md mx-auto">Trải nghiệm du lịch đẳng cấp và khác biệt cùng hệ sinh thái dịch vụ hoàn hảo của chúng tôi.</p>
            <p class="text-sm text-slate-500">© 2025 TourVN. Mọi quyền được bảo lưu.</p>
        </div>
    </footer>

</body>
</html>
