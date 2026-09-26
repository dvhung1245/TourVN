<x-admin-layout>
    <!-- Breadcrumb & Header -->
    <div class="mb-8">
        <nav class="flex text-sm text-slate-500 font-medium mb-2" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('admin.dashboard') }}" class="hover:text-brand-primary transition-colors">Dashboard</a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-4 h-4 mx-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        <a href="{{ route('admin.tour_categories.index') }}" class="hover:text-brand-primary transition-colors">Danh mục Tour</a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="w-4 h-4 mx-1 text-slate-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        <span class="text-slate-800 font-bold">Thêm mới</span>
                    </div>
                </li>
            </ol>
        </nav>
        <h1 class="text-2xl font-bold text-slate-800">Thêm Danh mục mới</h1>
    </div>

    <!-- Form Card -->
    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden max-w-3xl">
        <div class="p-6 border-b border-slate-100 bg-slate-50/50">
            <h3 class="font-bold text-slate-800">Thông tin danh mục</h3>
            <p class="text-sm text-slate-500 mt-1">Vui lòng điền đầy đủ các thông tin bắt buộc có dấu (*)</p>
        </div>
        
        <div class="p-6 md:p-8">
            <form action="{{ route('admin.tour_categories.store') }}" method="POST">
                @csrf
                
                <div class="space-y-6">
                    <!-- Tên danh mục -->
                    <div>
                        <label for="name" class="block text-sm font-bold text-slate-700 mb-2">
                            Tên danh mục <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}" 
                            class="block w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:bg-white focus:border-brand-primary focus:ring-2 focus:ring-brand-primary/20 transition-all text-sm @error('name') border-red-300 focus:border-red-500 focus:ring-red-500/20 @enderror" 
                            placeholder="Ví dụ: Tour Du lịch Biển Đảo" required autofocus>
                        @error('name') 
                            <p class="mt-2 text-sm text-red-500 flex items-center gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" /></svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Mô tả -->
                    <div>
                        <label for="description" class="block text-sm font-bold text-slate-700 mb-2">
                            Mô tả ngắn
                        </label>
                        <textarea name="description" id="description" rows="4" 
                            class="block w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:bg-white focus:border-brand-primary focus:ring-2 focus:ring-brand-primary/20 transition-all text-sm @error('description') border-red-300 focus:border-red-500 focus:ring-red-500/20 @enderror" 
                            placeholder="Mô tả về chuyên mục tour này...">{{ old('description') }}</textarea>
                        @error('description') 
                            <p class="mt-2 text-sm text-red-500 flex items-center gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" /></svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>

                <!-- Footer Buttons -->
                <div class="mt-8 pt-6 border-t border-slate-100 flex flex-col-reverse md:flex-row items-center justify-end gap-3">
                    <a href="{{ route('admin.tour_categories.index') }}" class="w-full md:w-auto px-6 py-2.5 text-sm font-bold text-slate-600 bg-white border border-slate-200 hover:bg-slate-50 rounded-xl transition-colors text-center">
                        Hủy bỏ
                    </a>
                    <button type="submit" class="w-full md:w-auto px-6 py-2.5 text-sm font-bold text-white bg-brand-primary hover:bg-brand-primary/90 rounded-xl shadow-lg shadow-brand-primary/30 transition-all hover:-translate-y-0.5 flex items-center justify-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" /></svg>
                        Lưu danh mục
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>
