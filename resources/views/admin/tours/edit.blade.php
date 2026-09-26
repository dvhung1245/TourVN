<x-admin-layout>
    <x-slot name="header">
        <div class="flex items-center gap-2">
            <a href="{{ route('admin.tours.index') }}" class="text-slate-400 hover:text-brand-primary transition-colors">
                Quản lý Tour
            </a>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg>
            <span class="text-slate-800 font-bold">Chỉnh sửa Tour</span>
        </div>
    </x-slot>

    <!-- Header Section -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-6">
        <div>
            <div class="flex items-center gap-3 mb-1">
                <h1 class="text-2xl font-bold text-slate-900">Chỉnh sửa Tour</h1>
                <span class="px-2 py-0.5 rounded text-xs font-bold font-mono bg-slate-100 text-slate-600 border border-slate-200">T-{{ str_pad($tour->id, 4, '0', STR_PAD_LEFT) }}</span>
            </div>
            <p class="text-slate-500 text-sm">Cập nhật thông tin chi tiết cho sản phẩm này.</p>
        </div>
        
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.tours.index') }}" class="px-5 py-2.5 bg-white border border-slate-200 text-slate-600 rounded-xl text-sm font-semibold hover:bg-slate-50 transition-colors">
                Hủy bỏ
            </a>
            <button type="submit" form="edit-tour-form" class="flex items-center gap-2 px-5 py-2.5 bg-brand-primary text-white rounded-xl text-sm font-bold shadow-md shadow-brand-primary/20 hover:bg-brand-secondary transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" /></svg>
                Cập nhật
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

    <form id="edit-tour-form" action="{{ route('admin.tours.update', $tour) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="grid grid-cols-1 xl:grid-cols-3 gap-8">
            <!-- Left Column: Main Content -->
            <div class="xl:col-span-2 space-y-6">
                <!-- Thông tin cơ bản -->
                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
                    <div class="px-6 py-4 border-b border-slate-100 bg-slate-50/50">
                        <h3 class="font-bold text-slate-800 flex items-center gap-2">
                            <span class="w-8 h-8 rounded-lg bg-brand-primary/10 text-brand-primary flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                            </span>
                            Thông tin cơ bản
                        </h3>
                    </div>
                    
                    <div class="p-6 space-y-5">
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-2">Tên Tour / Hải trình <span class="text-red-500">*</span></label>
                            <input type="text" name="name" value="{{ old('name', $tour->name) }}" placeholder="VD: Du thuyền Grand Pioneers Hạ Long..." 
                                class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-brand-primary/20 focus:border-brand-primary transition-colors font-medium">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-2">Mô tả tóm tắt</label>
                            <textarea name="description" rows="4" placeholder="Nhập mô tả hấp dẫn về tour này..."
                                class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-brand-primary/20 focus:border-brand-primary transition-colors resize-y">{{ old('description', $tour->description) }}</textarea>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-2">Số ngày <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <input type="number" name="duration_days" value="{{ old('duration_days', $tour->duration_days) }}" min="1"
                                        class="w-full pl-4 pr-12 py-2.5 bg-slate-50 border border-slate-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-brand-primary/20 focus:border-brand-primary transition-colors font-semibold">
                                    <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                                        <span class="text-slate-400 text-sm font-medium">Ngày</span>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-2">Số đêm <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <input type="number" name="duration_nights" value="{{ old('duration_nights', $tour->duration_nights) }}" min="0"
                                        class="w-full pl-4 pr-12 py-2.5 bg-slate-50 border border-slate-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-brand-primary/20 focus:border-brand-primary transition-colors font-semibold">
                                    <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                                        <span class="text-slate-400 text-sm font-medium">Đêm</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Thiết lập giá -->
                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
                    <div class="px-6 py-4 border-b border-slate-100 bg-slate-50/50">
                        <h3 class="font-bold text-slate-800 flex items-center gap-2">
                            <span class="w-8 h-8 rounded-lg bg-emerald-50 text-emerald-500 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                            </span>
                            Thiết lập Giá cơ bản
                        </h3>
                    </div>
                    
                    <div class="p-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-2">Giá Người lớn <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                        <span class="text-slate-500 font-medium">₫</span>
                                    </div>
                                    <input type="number" name="price_adult" value="{{ old('price_adult', (int)$tour->price_adult) }}" placeholder="0" min="0" step="1000"
                                        class="w-full pl-8 pr-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 transition-colors font-bold text-slate-800">
                                </div>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-2">Giá Trẻ em <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                        <span class="text-slate-500 font-medium">₫</span>
                                    </div>
                                    <input type="number" name="price_child" value="{{ old('price_child', (int)$tour->price_child) }}" placeholder="0" min="0" step="1000"
                                        class="w-full pl-8 pr-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 transition-colors font-bold text-slate-800">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column: Settings -->
            <div class="space-y-6">
                
                <!-- Phân loại -->
                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
                    <div class="px-6 py-4 border-b border-slate-100 bg-slate-50/50">
                        <h3 class="font-bold text-slate-800 flex items-center gap-2">
                            <span class="w-8 h-8 rounded-lg bg-orange-50 text-orange-500 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" /></svg>
                            </span>
                            Phân loại & Điểm đến
                        </h3>
                    </div>
                    
                    <div class="p-6">
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Danh mục Tour <span class="text-red-500">*</span></label>
                        <select name="category_id" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-brand-primary/20 focus:border-brand-primary transition-colors font-medium cursor-pointer">
                            <option value="">-- Chọn danh mục --</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id', $tour->category_id) == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Trạng thái -->
                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
                    <div class="px-6 py-4 border-b border-slate-100 bg-slate-50/50">
                        <h3 class="font-bold text-slate-800 flex items-center gap-2">
                            <span class="w-8 h-8 rounded-lg bg-purple-50 text-purple-500 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                            </span>
                            Trạng thái Hiển thị
                        </h3>
                    </div>
                    
                    <div class="p-6">
                        <div class="space-y-3">
                            <label class="flex items-center gap-3 p-3 border border-slate-200 rounded-xl cursor-pointer hover:bg-slate-50 transition-colors {{ old('status', $tour->status) == 'Published' ? 'bg-blue-50/50 border-blue-200 ring-1 ring-brand-primary/30' : '' }}">
                                <input type="radio" name="status" value="Published" {{ old('status', $tour->status) == 'Published' ? 'checked' : '' }}
                                    class="w-5 h-5 text-brand-primary border-slate-300 focus:ring-brand-primary">
                                <div>
                                    <div class="font-bold text-slate-800 text-sm">Đang mở bán (Published)</div>
                                    <div class="text-xs text-slate-500 mt-0.5">Hiển thị công khai trên website cho khách hàng</div>
                                </div>
                            </label>

                            <label class="flex items-center gap-3 p-3 border border-slate-200 rounded-xl cursor-pointer hover:bg-slate-50 transition-colors {{ old('status', $tour->status) == 'Draft' ? 'bg-slate-100 border-slate-300' : '' }}">
                                <input type="radio" name="status" value="Draft" {{ old('status', $tour->status) == 'Draft' ? 'checked' : '' }}
                                    class="w-5 h-5 text-slate-600 border-slate-300 focus:ring-slate-500">
                                <div>
                                    <div class="font-bold text-slate-700 text-sm">Lưu bản nháp (Draft)</div>
                                    <div class="text-xs text-slate-500 mt-0.5">Chỉ quản trị viên mới có thể xem được</div>
                                </div>
                            </label>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </form>
</x-admin-layout>
