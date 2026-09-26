<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-slate-800 leading-tight">
            {{ __('Quản lý Tour') }}
        </h2>
    </x-slot>

    <!-- Header & Intro -->
    <div class="flex flex-col lg:flex-row lg:items-start justify-between gap-6 mb-6">
        <div class="flex-1">
            <div class="flex items-center gap-3 mb-2">
                <h1 class="text-2xl font-bold text-slate-900">Quản lý Tour & Dịch vụ Nghỉ dưỡng</h1>
                <span class="px-2 py-0.5 rounded text-[11px] font-bold bg-blue-100 text-brand-primary uppercase tracking-wide">B2C/B2B</span>
                <span class="px-2 py-0.5 rounded text-[11px] font-bold bg-blue-100 text-brand-primary uppercase tracking-wide">Live</span>
            </div>
            <p class="text-slate-500 text-sm max-w-3xl leading-relaxed">
                Quản lý danh mục hải trình du thuyền 5 sao, resort cao cấp, lịch khởi hành theo mùa và cấu hình giá bán linh hoạt cho mạng lưới đại lý B2B.
            </p>
        </div>
        
        <div class="flex items-center gap-3 shrink-0">
            <button class="flex items-center gap-2 px-4 py-2 bg-white border border-slate-200 text-slate-600 rounded-lg text-sm font-semibold hover:bg-slate-50 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" /></svg>
                Nhập từ file
            </button>
            <button class="flex items-center gap-2 px-4 py-2 bg-white border border-slate-200 text-slate-600 rounded-lg text-sm font-semibold hover:bg-slate-50 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3M3 17V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" /></svg>
                Xuất Excel
            </button>
            <a href="{{ route('admin.tours.create') }}" class="flex items-center gap-2 px-5 py-2 bg-brand-primary text-white rounded-lg text-sm font-bold shadow-md shadow-brand-primary/20 hover:bg-brand-secondary transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" /></svg>
                Tạo tour mới
            </a>
        </div>
    </div>

    <!-- 4 Summary Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
        <!-- Card 1 -->
        <div class="bg-white rounded-xl border border-slate-200 p-5 shadow-sm relative overflow-hidden group hover:border-brand-primary/30 transition-colors">
            <div class="flex justify-between items-start mb-4">
                <div>
                    <h3 class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Tổng tour vận hành</h3>
                    <div class="flex items-end gap-2">
                        <span class="text-3xl font-black text-slate-800">48</span>
                        <span class="text-sm font-medium text-slate-500 mb-1">hải trình</span>
                    </div>
                </div>
                <div class="w-10 h-10 rounded-lg bg-blue-50 flex items-center justify-center text-brand-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" /></svg>
                </div>
            </div>
            <div class="flex items-center gap-2 pt-4 border-t border-slate-100">
                <span class="flex items-center text-xs font-bold text-brand-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" /></svg>
                    +3 tour mới
                </span>
                <span class="text-xs text-slate-400">tháng hiện tại</span>
            </div>
            <!-- Bottom Border Highlight -->
            <div class="absolute bottom-0 left-0 right-0 h-1 bg-brand-primary"></div>
        </div>

        <!-- Card 2 -->
        <div class="bg-white rounded-xl border border-slate-200 p-5 shadow-sm relative overflow-hidden group hover:border-emerald-500/30 transition-colors">
            <div class="flex justify-between items-start mb-4">
                <div>
                    <h3 class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Tour đang mở bán</h3>
                    <div class="flex items-end gap-2">
                        <span class="text-3xl font-black text-slate-800">36</span>
                        <span class="text-sm font-medium text-slate-500 mb-1">tour</span>
                    </div>
                </div>
                <div class="w-10 h-10 rounded-lg bg-emerald-50 flex items-center justify-center text-emerald-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" /></svg>
                </div>
            </div>
            <div class="flex items-center justify-between pt-4 border-t border-slate-100">
                <span class="text-xs text-slate-500">Tỷ lệ lấp đầy TB</span>
                <span class="text-xs font-bold text-emerald-600 bg-emerald-50 px-2 py-0.5 rounded">84.5%</span>
            </div>
            <!-- Bottom Border Highlight -->
            <div class="absolute bottom-0 left-0 right-0 h-1 bg-emerald-500"></div>
        </div>

        <!-- Card 3 -->
        <div class="bg-white rounded-xl border border-slate-200 p-5 shadow-sm relative overflow-hidden group hover:border-orange-500/30 transition-colors">
            <div class="flex justify-between items-start mb-4">
                <div>
                    <h3 class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Sắp khởi hành <span class="text-slate-400 normal-case font-normal">(7 ngày)</span></h3>
                    <div class="flex items-end gap-2">
                        <span class="text-3xl font-black text-slate-800">14</span>
                        <span class="text-sm font-medium text-slate-500 mb-1">đoàn</span>
                    </div>
                </div>
                <div class="w-10 h-10 rounded-lg bg-orange-50 flex items-center justify-center text-orange-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                </div>
            </div>
            <div class="flex items-center justify-between pt-4 border-t border-slate-100">
                <span class="text-xs text-slate-500">Tình trạng cabin</span>
                <span class="text-xs font-bold text-orange-600 bg-orange-50 px-2 py-0.5 rounded">128 cabin khóa sổ</span>
            </div>
            <!-- Bottom Border Highlight -->
            <div class="absolute bottom-0 left-0 right-0 h-1 bg-orange-400"></div>
        </div>

        <!-- Card 4 -->
        <div class="bg-white rounded-xl border border-slate-200 p-5 shadow-sm relative overflow-hidden group hover:border-slate-400/30 transition-colors">
            <div class="flex justify-between items-start mb-4">
                <div>
                    <h3 class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Tạm dừng / Đóng mùa</h3>
                    <div class="flex items-end gap-2">
                        <span class="text-3xl font-black text-slate-800">12</span>
                        <span class="text-sm font-medium text-slate-500 mb-1">tour</span>
                    </div>
                </div>
                <div class="w-10 h-10 rounded-lg bg-slate-100 flex items-center justify-center text-slate-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 9v6m4-6v6m7-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                </div>
            </div>
            <div class="flex items-center justify-between pt-4 border-t border-slate-100">
                <span class="text-xs text-slate-500">Trạng thái</span>
                <span class="text-xs font-bold text-slate-600 bg-slate-100 px-2 py-0.5 rounded">Bảo trì kỹ thuật / Hết mùa</span>
            </div>
            <!-- Bottom Border Highlight -->
            <div class="absolute bottom-0 left-0 right-0 h-1 bg-slate-300"></div>
        </div>
    </div>

    <!-- Filters & Main Table Container -->
    <div class="bg-white border border-slate-200 rounded-xl shadow-sm overflow-hidden mb-8">
        
        <!-- Filter Bar -->
        <div class="p-4 border-b border-slate-100 bg-slate-50/50 flex flex-col md:flex-row gap-3">
            <!-- Search -->
            <div class="relative flex-1">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-4 w-4 text-slate-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" /></svg>
                </div>
                <input type="text" class="block w-full pl-9 pr-3 py-2 border border-slate-200 rounded-lg text-sm bg-slate-50 focus:bg-white focus:border-brand-primary focus:ring-1 focus:ring-brand-primary placeholder-slate-400 transition-colors" placeholder="Tìm theo mã tour, tên hải trình, du thuyền...">
            </div>
            
            <!-- Dropdowns -->
            <div class="flex flex-col md:flex-row gap-2 shrink-0">
                <select class="border border-slate-200 bg-slate-50 text-slate-700 text-sm rounded-lg py-2 pl-3 pr-8 focus:outline-none focus:ring-1 focus:ring-brand-primary focus:border-brand-primary">
                    <option>Tất cả loại hình</option>
                    <option>Du thuyền 5 sao</option>
                    <option>Resort cao cấp</option>
                </select>
                
                <select class="border border-slate-200 bg-slate-50 text-slate-700 text-sm rounded-lg py-2 pl-3 pr-8 focus:outline-none focus:ring-1 focus:ring-brand-primary focus:border-brand-primary">
                    <option>Tất cả điểm đến</option>
                    <option>Hạ Long</option>
                    <option>Phú Quốc</option>
                    <option>Nha Trang</option>
                </select>
                
                <select class="border border-slate-200 bg-slate-50 text-slate-700 text-sm rounded-lg py-2 pl-3 pr-8 focus:outline-none focus:ring-1 focus:ring-brand-primary focus:border-brand-primary">
                    <option>Tất cả trạng thái</option>
                    <option>Đang mở bán</option>
                    <option>Bản nháp</option>
                </select>

                <button class="flex items-center gap-2 px-4 py-2 bg-brand-primary text-white rounded-lg text-sm font-bold shadow-md shadow-brand-primary/20 hover:bg-brand-secondary transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" /></svg>
                    Lọc
                </button>
                <button class="p-2 border border-slate-200 bg-white text-slate-500 rounded-lg hover:bg-slate-50 transition-colors" title="Làm mới">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" /></svg>
                </button>
            </div>
        </div>

        <!-- Status Tabs -->
        <div class="px-4 border-b border-slate-100 flex flex-wrap items-center justify-between gap-4">
            <div class="flex items-center gap-1">
                <button class="px-4 py-3 text-sm font-bold text-brand-primary border-b-2 border-brand-primary flex items-center gap-2">
                    Tất cả <span class="bg-brand-primary text-white text-[10px] px-1.5 py-0.5 rounded-full">48</span>
                </button>
                <button class="px-4 py-3 text-sm font-semibold text-slate-500 hover:text-slate-800 border-b-2 border-transparent hover:border-slate-300 transition-colors flex items-center gap-2">
                    Đang mở bán <span class="bg-slate-100 text-slate-500 text-[10px] px-1.5 py-0.5 rounded-full">36</span>
                </button>
                <button class="px-4 py-3 text-sm font-semibold text-slate-500 hover:text-slate-800 border-b-2 border-transparent hover:border-slate-300 transition-colors flex items-center gap-2">
                    Sắp hết chỗ <span class="bg-yellow-100 text-yellow-700 text-[10px] px-1.5 py-0.5 rounded-full">8</span>
                </button>
                <button class="px-4 py-3 text-sm font-semibold text-slate-500 hover:text-slate-800 border-b-2 border-transparent hover:border-slate-300 transition-colors flex items-center gap-2">
                    Bản nháp <span class="bg-slate-100 text-slate-500 text-[10px] px-1.5 py-0.5 rounded-full">4</span>
                </button>
            </div>
            <div class="text-xs font-medium text-slate-500 flex items-center gap-2 pb-2 md:pb-0">
                <span class="w-2 h-2 rounded-full bg-emerald-500 shadow-[0_0_5px_rgba(16,185,129,0.5)]"></span>
                Trực tuyến &bull; Cập nhật tự động: 3 phút trước
            </div>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50/80 border-b border-slate-100 text-[11px] uppercase tracking-wider text-slate-500 font-bold">
                        <th class="py-3 px-4 w-12 text-center">
                            <input type="checkbox" class="rounded border-slate-300 text-brand-primary focus:ring-brand-primary cursor-pointer">
                        </th>
                        <th class="py-3 px-4">Mã & Tên hải trình / Sản phẩm</th>
                        <th class="py-3 px-4">Phân loại & Lộ trình</th>
                        <th class="py-3 px-4">Du thuyền / Vận hành</th>
                        <th class="py-3 px-4">Lịch kế tiếp & Trống</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-sm">
                    @forelse($tours as $tour)
                    <tr class="hover:bg-blue-50/30 transition-colors group">
                        <td class="py-4 px-4 text-center align-top pt-5">
                            <input type="checkbox" class="rounded border-slate-300 text-brand-primary focus:ring-brand-primary cursor-pointer">
                        </td>
                        <td class="py-4 px-4">
                            <div class="flex gap-4">
                                <img src="https://images.unsplash.com/photo-1528181304800-259b08848526?q=80&w=200&auto=format&fit=crop" alt="Tour Thumbnail" class="w-20 h-14 rounded-lg object-cover shadow-sm border border-slate-200">
                                <div>
                                    <div class="flex items-center gap-2 mb-1">
                                        <span class="font-mono text-xs font-bold text-brand-primary bg-brand-primary/10 px-2 py-0.5 rounded">T-{{ str_pad($tour->id, 4, '0', STR_PAD_LEFT) }}</span>
                                        @if($tour->status == 'Published')
                                            <span class="text-[10px] font-bold uppercase tracking-wider text-emerald-600 bg-emerald-100 px-2 py-0.5 rounded">Đang mở bán</span>
                                        @else
                                            <span class="text-[10px] font-bold uppercase tracking-wider text-slate-600 bg-slate-100 px-2 py-0.5 rounded">Bản nháp</span>
                                        @endif
                                    </div>
                                    <a href="{{ route('admin.tours.edit', $tour) }}" class="font-bold text-slate-800 hover:text-brand-primary transition-colors block mb-1">{{ $tour->name }}</a>
                                    <div class="text-xs text-slate-500 flex items-center gap-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                        {{ number_format($tour->price_adult, 0, ',', '.') }} ₫
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="py-4 px-4 align-top">
                            <div class="font-semibold text-slate-800 mb-0.5">{{ optional($tour->category)->name ?? 'Chưa phân loại' }}</div>
                            <div class="text-xs text-slate-500 mb-1">Thời gian:</div>
                            <div class="text-xs font-bold text-brand-primary">{{ $tour->duration_days }} Ngày {{ $tour->duration_nights }} Đêm</div>
                        </td>
                        <td class="py-4 px-4 align-top">
                            <div class="font-semibold text-slate-800 mb-0.5 flex items-center gap-1">
                                Chưa cấu hình
                            </div>
                            <div class="flex text-slate-300 mb-1 text-xs">
                                <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                            </div>
                            <div class="text-xs text-slate-500">Đang cập nhật đối tác</div>
                        </td>
                        <td class="py-4 px-4 align-top w-40">
                            <div class="flex gap-2">
                                <a href="{{ route('admin.tours.edit', $tour) }}" class="flex-1 flex justify-center items-center py-2 bg-brand-primary/10 text-brand-primary rounded-lg hover:bg-brand-primary hover:text-white transition-colors text-xs font-bold">Sửa</a>
                                <form action="{{ route('admin.tours.destroy', $tour) }}" method="POST" class="inline-block" onsubmit="return confirm('Hành động này không thể hoàn tác. Xóa?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="w-8 h-8 flex items-center justify-center bg-red-50 text-red-600 rounded-lg hover:bg-red-500 hover:text-white transition-colors">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="py-12 px-6 text-center text-slate-500">
                            <div class="flex flex-col items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-slate-300 mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" /></svg>
                                <p class="text-base font-medium">Chưa có tour nào</p>
                                <p class="text-sm mt-1">Hãy bấm "Tạo tour mới" để thêm sản phẩm đầu tiên.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <!-- Pagination Footer -->
        <div class="p-4 border-t border-slate-100 bg-white flex flex-col md:flex-row items-center justify-between gap-4">
            <div class="text-sm text-slate-500 flex items-center gap-3">
                <span>Hiển thị <span class="font-bold text-slate-700">1 - 4</span> trên tổng số <span class="font-bold text-slate-700">48</span> tour</span>
                <span class="text-slate-300">|</span>
                <div class="flex items-center gap-2">
                    <span>Xem</span>
                    <select class="border border-slate-200 bg-slate-50 text-slate-700 text-sm rounded-lg py-1 pl-2 pr-6 focus:outline-none focus:ring-1 focus:ring-brand-primary">
                        <option>10 hàng / trang</option>
                        <option>20 hàng / trang</option>
                        <option>50 hàng / trang</option>
                    </select>
                </div>
            </div>
            
            <div class="flex items-center gap-1">
                <button class="p-2 text-slate-400 hover:text-slate-600 disabled:opacity-50" disabled>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 19l-7-7 7-7m8 14l-7-7 7-7" /></svg>
                </button>
                <button class="p-2 text-slate-400 hover:text-slate-600 disabled:opacity-50" disabled>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" /></svg>
                </button>
                
                <button class="w-8 h-8 flex items-center justify-center rounded-lg bg-brand-primary text-white font-bold text-sm">1</button>
                <button class="w-8 h-8 flex items-center justify-center rounded-lg text-slate-600 hover:bg-slate-100 font-medium text-sm transition-colors">2</button>
                <button class="w-8 h-8 flex items-center justify-center rounded-lg text-slate-600 hover:bg-slate-100 font-medium text-sm transition-colors">3</button>
                <span class="px-2 text-slate-400">...</span>
                <button class="w-8 h-8 flex items-center justify-center rounded-lg text-slate-600 hover:bg-slate-100 font-medium text-sm transition-colors">5</button>
                
                <button class="p-2 text-slate-600 hover:text-brand-primary transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg>
                </button>
                <button class="p-2 text-slate-600 hover:text-brand-primary transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7" /></svg>
                </button>
            </div>
        </div>
    </div>
</x-admin-layout>
