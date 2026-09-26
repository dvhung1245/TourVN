<x-admin-layout>
    <x-slot name="header">
        <div class="flex items-center gap-2">
            <a href="{{ route('admin.tours.index') }}" class="text-slate-400 hover:text-brand-primary transition-colors">
                Quản lý Tour
            </a>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg>
            <span class="text-slate-800 font-bold">Thêm Tour mới chi tiết</span>
        </div>
    </x-slot>

    <!-- Header Section -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-6">
        <div>
            <h1 class="text-2xl font-bold text-slate-900">Khởi tạo Sản phẩm Tour</h1>
            <p class="text-slate-500 text-sm mt-1">Hệ thống nhập liệu nâng cao đầy đủ chi tiết cho khách hàng tham khảo.</p>
        </div>
        
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.tours.index') }}" class="px-5 py-2.5 bg-white border border-slate-200 text-slate-600 rounded-xl text-sm font-semibold hover:bg-slate-50 transition-colors">
                Hủy bỏ
            </a>
            <button type="submit" form="create-tour-form" class="flex items-center gap-2 px-6 py-2.5 bg-brand-primary text-white rounded-xl text-sm font-bold shadow-md shadow-brand-primary/20 hover:bg-brand-secondary transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                Lưu & Xuất bản ngay
            </button>
        </div>
    </div>

    <!-- Error Messages -->
    @if ($errors->any())
        <div class="bg-red-50 border-l-4 border-red-500 p-4 rounded-r-xl mb-6 shadow-sm">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" /></svg>
                </div>
                <div class="ml-3">
                    <h3 class="text-sm font-bold text-red-800">Vui lòng kiểm tra lại các lỗi sau:</h3>
                    <ul class="mt-2 text-sm text-red-700 list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endif

    <form id="create-tour-form" action="{{ route('admin.tours.store') }}" method="POST">
        @csrf
        
        <div class="grid grid-cols-1 xl:grid-cols-3 gap-8">
            <!-- Left Column: Main Content -->
            <div class="xl:col-span-2 space-y-6">
                <!-- Thông tin chung -->
                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
                    <div class="px-6 py-4 border-b border-slate-100 bg-slate-50/50 flex items-center justify-between">
                        <h3 class="font-bold text-slate-800 flex items-center gap-2">
                            <span class="w-8 h-8 rounded-lg bg-brand-primary/10 text-brand-primary flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                            </span>
                            1. Thông tin chung
                        </h3>
                    </div>
                    
                    <div class="p-6 space-y-5">
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-2">Tên Tour / Hải trình <span class="text-red-500">*</span></label>
                            <input type="text" name="name" value="{{ old('name') }}" placeholder="VD: Du thuyền Grand Pioneers Hạ Long & Vịnh Bái Tử Long..." 
                                class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-brand-primary/20 focus:border-brand-primary transition-colors font-medium text-lg">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-2">Điểm nổi bật của Tour (Highlights)</label>
                            <textarea name="highlights" rows="3" placeholder="Nhập các điểm đặc sắc nhất của tour này (mỗi ý 1 dòng)..."
                                class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-brand-primary/20 focus:border-brand-primary transition-colors resize-y">{{ old('highlights') }}</textarea>
                            <p class="text-xs text-slate-500 mt-1">Phần này sẽ hiển thị thành các gạch đầu dòng nổi bật ở đầu trang chi tiết tour.</p>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-2">Mô tả tổng quan</label>
                            <textarea name="description" rows="5" placeholder="Viết mô tả hấp dẫn giới thiệu tổng quan về sản phẩm này..."
                                class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-brand-primary/20 focus:border-brand-primary transition-colors resize-y">{{ old('description') }}</textarea>
                        </div>
                    </div>
                </div>

                <!-- Logistics & Thời gian -->
                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
                    <div class="px-6 py-4 border-b border-slate-100 bg-slate-50/50">
                        <h3 class="font-bold text-slate-800 flex items-center gap-2">
                            <span class="w-8 h-8 rounded-lg bg-sky-50 text-sky-500 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                            </span>
                            2. Hành trình & Phương tiện
                        </h3>
                    </div>
                    
                    <div class="p-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-2">Nơi khởi hành <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                                    </div>
                                    <input type="text" name="departure_location" value="{{ old('departure_location') }}" placeholder="VD: Hà Nội, TP.HCM..."
                                        class="w-full pl-10 pr-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-brand-primary/20 focus:border-brand-primary transition-colors font-medium">
                                </div>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-2">Phương tiện di chuyển</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" /></svg>
                                    </div>
                                    <input type="text" name="transport" value="{{ old('transport') }}" placeholder="VD: Máy bay khứ hồi, Ô tô cao cấp..."
                                        class="w-full pl-10 pr-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-brand-primary/20 focus:border-brand-primary transition-colors font-medium">
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-2">Thời lượng: Số Ngày <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <input type="number" name="duration_days" value="{{ old('duration_days', 1) }}" min="1"
                                        class="w-full pl-4 pr-12 py-2.5 bg-slate-50 border border-slate-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-brand-primary/20 focus:border-brand-primary transition-colors font-semibold text-lg text-brand-primary">
                                    <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                                        <span class="text-slate-400 text-sm font-bold">Ngày</span>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-2">Thời lượng: Số Đêm <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <input type="number" name="duration_nights" value="{{ old('duration_nights', 0) }}" min="0"
                                        class="w-full pl-4 pr-12 py-2.5 bg-slate-50 border border-slate-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-brand-primary/20 focus:border-brand-primary transition-colors font-semibold text-lg text-slate-700">
                                    <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                                        <span class="text-slate-400 text-sm font-bold">Đêm</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Bao gồm & Không bao gồm -->
                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
                    <div class="px-6 py-4 border-b border-slate-100 bg-slate-50/50">
                        <h3 class="font-bold text-slate-800 flex items-center gap-2">
                            <span class="w-8 h-8 rounded-lg bg-emerald-50 text-emerald-500 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                            </span>
                            3. Chi tiết Dịch vụ
                        </h3>
                    </div>
                    
                    <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-semibold text-emerald-700 mb-2 flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                                Dịch vụ Bao gồm
                            </label>
                            <textarea name="included" rows="6" placeholder="- Vé máy bay khứ hồi&#10;- Khách sạn 4 sao (2 khách/phòng)&#10;- Các bữa ăn theo chương trình..."
                                class="w-full px-4 py-3 bg-emerald-50/30 border border-emerald-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 transition-colors resize-y">{{ old('included') }}</textarea>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-semibold text-rose-700 mb-2 flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                                Không bao gồm
                            </label>
                            <textarea name="excluded" rows="6" placeholder="- Thuế VAT 10%&#10;- Tiền Tip cho Hướng dẫn viên&#10;- Chi phí phát sinh cá nhân..."
                                class="w-full px-4 py-3 bg-rose-50/30 border border-rose-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-rose-500/20 focus:border-rose-500 transition-colors resize-y">{{ old('excluded') }}</textarea>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Right Column: Settings & Pricing -->
            <div class="space-y-6">
                
                <!-- Thiết lập Giá -->
                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
                    <div class="px-6 py-4 border-b border-slate-100 bg-slate-50/50">
                        <h3 class="font-bold text-slate-800 flex items-center gap-2">
                            <span class="w-8 h-8 rounded-lg bg-orange-50 text-orange-500 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                            </span>
                            Cấu hình Bảng giá
                        </h3>
                    </div>
                    
                    <div class="p-6 space-y-5">
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-2">Giá Người lớn <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <span class="text-slate-500 font-bold">₫</span>
                                </div>
                                <input type="number" name="price_adult" value="{{ old('price_adult') }}" placeholder="0" min="0" step="1000"
                                    class="w-full pl-9 pr-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-orange-500/20 focus:border-orange-500 transition-colors font-bold text-slate-800 text-lg">
                            </div>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-2">Giá Trẻ em <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <span class="text-slate-500 font-bold">₫</span>
                                </div>
                                <input type="number" name="price_child" value="{{ old('price_child') }}" placeholder="0" min="0" step="1000"
                                    class="w-full pl-9 pr-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-orange-500/20 focus:border-orange-500 transition-colors font-bold text-slate-800">
                            </div>
                            <p class="text-xs text-slate-500 mt-1">Dành cho trẻ em dưới 12 tuổi</p>
                        </div>
                    </div>
                </div>

                <!-- Phân loại -->
                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
                    <div class="px-6 py-4 border-b border-slate-100 bg-slate-50/50">
                        <h3 class="font-bold text-slate-800 flex items-center gap-2">
                            <span class="w-8 h-8 rounded-lg bg-indigo-50 text-indigo-500 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" /></svg>
                            </span>
                            Phân loại & Hiển thị
                        </h3>
                    </div>
                    
                    <div class="p-6 space-y-5">
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-2">Danh mục Tour <span class="text-red-500">*</span></label>
                            <select name="category_id" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-brand-primary/20 focus:border-brand-primary transition-colors font-medium cursor-pointer">
                                <option value="">-- Chọn danh mục --</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Checkbox: Is Featured -->
                        <div class="pt-2 border-t border-slate-100">
                            <label class="flex items-center gap-3 cursor-pointer group">
                                <div class="relative flex items-center justify-center">
                                    <input type="checkbox" name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }} class="peer sr-only">
                                    <div class="w-10 h-6 bg-slate-200 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-brand-primary/20 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-brand-primary transition-colors"></div>
                                </div>
                                <div>
                                    <span class="text-sm font-bold text-slate-800 group-hover:text-brand-primary transition-colors">Đánh dấu Tour Nổi Bật</span>
                                    <p class="text-[11px] text-slate-500">Ưu tiên hiển thị ở trang chủ & có huy hiệu đặc biệt</p>
                                </div>
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Trạng thái -->
                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
                    <div class="px-6 py-4 border-b border-slate-100 bg-slate-50/50">
                        <h3 class="font-bold text-slate-800 flex items-center gap-2">
                            <span class="w-8 h-8 rounded-lg bg-purple-50 text-purple-500 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                            </span>
                            Trạng thái Hệ thống
                        </h3>
                    </div>
                    
                    <div class="p-6">
                        <div class="space-y-3">
                            <label class="flex items-center gap-3 p-3 border border-slate-200 rounded-xl cursor-pointer hover:bg-slate-50 transition-colors {{ old('status') == 'Published' || old('status') === null ? 'bg-blue-50/50 border-blue-200 ring-1 ring-brand-primary/30' : '' }}">
                                <input type="radio" name="status" value="Published" {{ old('status') == 'Published' || old('status') === null ? 'checked' : '' }}
                                    class="w-5 h-5 text-brand-primary border-slate-300 focus:ring-brand-primary">
                                <div>
                                    <div class="font-bold text-slate-800 text-sm">Đang mở bán (Published)</div>
                                    <div class="text-xs text-slate-500 mt-0.5">Hiển thị công khai trên website & cho phép đặt chỗ</div>
                                </div>
                            </label>

                            <label class="flex items-center gap-3 p-3 border border-slate-200 rounded-xl cursor-pointer hover:bg-slate-50 transition-colors {{ old('status') == 'Draft' ? 'bg-slate-100 border-slate-300' : '' }}">
                                <input type="radio" name="status" value="Draft" {{ old('status') == 'Draft' ? 'checked' : '' }}
                                    class="w-5 h-5 text-slate-600 border-slate-300 focus:ring-slate-500">
                                <div>
                                    <div class="font-bold text-slate-700 text-sm">Lưu bản nháp (Draft)</div>
                                    <div class="text-xs text-slate-500 mt-0.5">Chỉ quản trị viên mới có thể xem được nội bộ</div>
                                </div>
                            </label>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </form>
</x-admin-layout>
