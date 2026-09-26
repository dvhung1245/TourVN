<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-brand-primary leading-tight">
            {{ __('Tổng quan Hệ thống (Dashboard)') }}
        </h2>
    </x-slot>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Dashboard Card 1 -->
        <div class="bg-white rounded-xl shadow-sm p-6 border border-slate-100 flex items-center">
            <div class="w-12 h-12 rounded-lg bg-brand-primary/10 flex items-center justify-center text-brand-primary mr-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-13.5V9" /></svg>
            </div>
            <div>
                <p class="text-sm font-semibold text-slate-500">Tổng số Tour</p>
                <p class="text-2xl font-bold text-slate-900">{{ \App\Models\Tour::count() ?? 0 }}</p>
            </div>
        </div>

        <!-- Dashboard Card 2 -->
        <div class="bg-white rounded-xl shadow-sm p-6 border border-slate-100 flex items-center">
            <div class="w-12 h-12 rounded-lg bg-brand-secondary/10 flex items-center justify-center text-brand-secondary mr-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
            </div>
            <div>
                <p class="text-sm font-semibold text-slate-500">Lịch khởi hành</p>
                <p class="text-2xl font-bold text-slate-900">{{ \App\Models\Departure::count() ?? 0 }}</p>
            </div>
        </div>

        <!-- Dashboard Card 3 -->
        <div class="bg-white rounded-xl shadow-sm p-6 border border-slate-100 flex items-center">
            <div class="w-12 h-12 rounded-lg bg-brand-tertiary/10 flex items-center justify-center text-brand-tertiary mr-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" /></svg>
            </div>
            <div>
                <p class="text-sm font-semibold text-slate-500">Booking Mới</p>
                <p class="text-2xl font-bold text-slate-900">{{ \App\Models\Booking::where('booking_status', 'Pending')->count() ?? 0 }}</p>
            </div>
        </div>

        <!-- Dashboard Card 4 -->
        <div class="bg-white rounded-xl shadow-sm p-6 border border-slate-100 flex items-center">
            <div class="w-12 h-12 rounded-lg bg-slate-100 flex items-center justify-center text-slate-600 mr-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
            </div>
            <div>
                <p class="text-sm font-semibold text-slate-500">Khách hàng</p>
                <p class="text-2xl font-bold text-slate-900">{{ \App\Models\User::whereHas('role', function($q) { $q->where('slug', 'customer'); })->count() ?? 0 }}</p>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="bg-white rounded-xl shadow-sm p-6 border border-slate-100">
        <h3 class="text-lg font-bold text-slate-800 mb-4">Chào mừng Quản trị viên</h3>
        <p class="text-slate-600 mb-4">Bạn đang truy cập vào hệ thống Admin của TourVN. Hãy sử dụng thanh công cụ bên trái để quản lý danh mục, tour và các đơn đặt chỗ.</p>
        
        <div class="mt-6">
            <a href="{{ route('admin.tours.create') }}" class="inline-flex items-center justify-center px-4 py-2 bg-brand-primary text-white rounded-lg hover:bg-brand-secondary transition-colors font-semibold shadow-md shadow-brand-primary/30">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" /></svg>
                Thêm Tour mới ngay
            </a>
        </div>
    </div>
</x-admin-layout>
