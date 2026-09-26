<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'TourVN Admin') }} - Quản Trị</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased text-slate-800">
        <div class="flex h-screen bg-slate-50">
            <!-- Sidebar (White & Blue) -->
            <aside class="w-64 bg-white text-slate-600 flex flex-col shadow-[4px_0_24px_rgba(0,0,0,0.02)] z-20 border-r border-slate-100">
                <div class="h-16 flex items-center px-6 border-b border-slate-100">
                    <span class="text-xl font-extrabold tracking-wider text-slate-800">TourVN <span class="text-brand-primary">Admin</span></span>
                </div>
                
                <nav class="flex-1 px-3 py-6 space-y-1.5 overflow-y-auto">
                    <!-- Dashboard -->
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-xl transition-all font-medium {{ request()->routeIs('admin.dashboard') ? 'bg-brand-primary/10 text-brand-primary' : 'hover:bg-slate-50 hover:text-slate-900' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 {{ request()->routeIs('admin.dashboard') ? 'text-brand-primary' : 'text-slate-400' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" /></svg>
                        Dashboard
                    </a>
                    
                    <div class="pt-5 pb-2 px-4">
                        <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Sản phẩm</p>
                    </div>
                    
                    <!-- Danh mục Tour -->
                    <a href="{{ route('admin.tour_categories.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-xl transition-all font-medium {{ request()->routeIs('admin.tour_categories.*') ? 'bg-brand-primary/10 text-brand-primary' : 'hover:bg-slate-50 hover:text-slate-900' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 {{ request()->routeIs('admin.tour_categories.*') ? 'text-brand-primary' : 'text-slate-400' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 002-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" /></svg>
                        Danh mục Tour
                    </a>
                    
                    <!-- Quản lý Tour -->
                    <a href="{{ route('admin.tours.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-xl transition-all font-medium {{ request()->routeIs('admin.tours.*') ? 'bg-brand-primary/10 text-brand-primary' : 'hover:bg-slate-50 hover:text-slate-900' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 {{ request()->routeIs('admin.tours.*') ? 'text-brand-primary' : 'text-slate-400' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        Quản lý Tour
                    </a>
                    
                    <!-- Lịch khởi hành -->
                    <a href="{{ route('admin.departures.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-xl transition-all font-medium {{ request()->routeIs('admin.departures.*') ? 'bg-brand-primary/10 text-brand-primary' : 'hover:bg-slate-50 hover:text-slate-900' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 {{ request()->routeIs('admin.departures.*') ? 'text-brand-primary' : 'text-slate-400' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                        Lịch khởi hành
                    </a>
                    
                    <div class="pt-5 pb-2 px-4">
                        <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Kinh doanh</p>
                    </div>
                    
                    <!-- Quản lý Booking -->
                    <a href="{{ route('admin.bookings.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-xl transition-all font-medium {{ request()->routeIs('admin.bookings.*') ? 'bg-brand-primary/10 text-brand-primary' : 'hover:bg-slate-50 hover:text-slate-900' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 {{ request()->routeIs('admin.bookings.*') ? 'text-brand-primary' : 'text-slate-400' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" /></svg>
                        Quản lý Booking
                    </a>
                </nav>
                
                <div class="p-4 border-t border-slate-100">
                    <form method="POST" action="{{ route('admin.logout') }}">
                        @csrf
                        <button type="submit" class="w-full flex items-center justify-center gap-2 px-4 py-2.5 bg-slate-50 text-slate-600 rounded-xl hover:bg-red-50 hover:text-red-600 transition-colors font-medium">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" /></svg>
                            Đăng xuất
                        </button>
                    </form>
                </div>
            </aside>

            <!-- Main Content Area -->
            <div class="flex-1 flex flex-col overflow-hidden">
                <!-- Top Navbar -->
                <header class="h-16 bg-white shadow-sm flex items-center justify-between px-8 z-10">
                    <div class="font-bold text-xl text-brand-primary">
                        @isset($header)
                            {{ $header }}
                        @endisset
                    </div>
                    
                    <div class="flex items-center gap-4">
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 bg-brand-secondary rounded-full flex items-center justify-center text-white font-bold shadow-md shadow-brand-secondary/30">
                                {{ substr(Auth::user()->name, 0, 1) }}
                            </div>
                            <span class="text-sm font-semibold text-brand-neutral">{{ Auth::user()->name }}</span>
                        </div>
                    </div>
                </header>

                <!-- Page Content -->
                <main class="flex-1 overflow-x-hidden overflow-y-auto bg-slate-50 p-8">
                    {{ $slot }}
                </main>
            </div>
        </div>
    </body>
</html>
