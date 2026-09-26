<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-brand-primary leading-tight">
            {{ __('Danh mục Tour') }}
        </h2>
    </x-slot>

    <!-- Header Section -->
    <div class="flex flex-col md:flex-row md:items-center justify-between mb-8 gap-4">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Quản lý Danh mục</h1>
            <p class="text-slate-500 text-sm mt-1">Tạo và phân loại các chuyên mục tour nội địa, quốc tế...</p>
        </div>
        
        <a href="{{ route('admin.tour_categories.create') }}" class="inline-flex items-center justify-center bg-brand-primary hover:bg-brand-secondary text-white font-bold py-2.5 px-5 rounded-xl shadow-lg shadow-brand-primary/30 transition-all hover:-translate-y-0.5">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" /></svg>
            Thêm danh mục mới
        </a>
    </div>

    <!-- Alert Success -->
    @if(session('success'))
        <div class="bg-teal-50 border border-teal-200 text-teal-800 px-4 py-4 rounded-xl flex items-center gap-3 mb-6 shadow-sm">
            <div class="bg-teal-100 p-2 rounded-full text-teal-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" /></svg>
            </div>
            <span class="font-medium">{{ session('success') }}</span>
        </div>
    @endif

    <!-- Main Card -->
    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
        
        <!-- Toolbar -->
        <div class="p-5 border-b border-slate-100 flex items-center justify-between bg-slate-50/50">
            <div class="relative w-64">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-4 w-4 text-slate-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" /></svg>
                </div>
                <input type="text" class="block w-full pl-10 pr-3 py-2 border border-slate-200 rounded-lg leading-5 bg-white placeholder-slate-400 focus:outline-none focus:ring-1 focus:ring-brand-primary focus:border-brand-primary sm:text-sm transition-colors" placeholder="Tìm kiếm danh mục...">
            </div>
            
            <div class="text-sm text-slate-500">
                Hiển thị <span class="font-bold text-slate-700">{{ $categories->count() }}</span> danh mục
            </div>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-100">
                        <th class="py-4 px-6 font-bold text-xs uppercase text-slate-500 tracking-wider">ID</th>
                        <th class="py-4 px-6 font-bold text-xs uppercase text-slate-500 tracking-wider">Tên danh mục</th>
                        <th class="py-4 px-6 font-bold text-xs uppercase text-slate-500 tracking-wider">Mô tả</th>
                        <th class="py-4 px-6 font-bold text-xs uppercase text-slate-500 tracking-wider text-center">Hành động</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($categories as $category)
                        <tr class="hover:bg-slate-50 transition-colors group">
                            <td class="py-4 px-6 text-sm font-semibold text-slate-500">
                                #{{ str_pad($category->id, 3, '0', STR_PAD_LEFT) }}
                            </td>
                            <td class="py-4 px-6">
                                <div class="font-bold text-slate-800">{{ $category->name }}</div>
                                <div class="text-xs text-slate-400 mt-0.5">/{{ $category->slug }}</div>
                            </td>
                            <td class="py-4 px-6 text-sm text-slate-600">
                                {{ Str::limit($category->description, 60) ?: '—' }}
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex items-center justify-center space-x-3 opacity-0 group-hover:opacity-100 transition-opacity">
                                    <a href="{{ route('admin.tour_categories.edit', $category) }}" class="p-2 text-brand-secondary hover:bg-brand-secondary/10 rounded-lg transition-colors" title="Chỉnh sửa">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" /></svg>
                                    </a>
                                    <form action="{{ route('admin.tour_categories.destroy', $category) }}" method="POST" onsubmit="return confirm('Hành động này không thể hoàn tác. Bạn có chắc chắn muốn xóa?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2 text-red-500 hover:bg-red-50 rounded-lg transition-colors" title="Xóa">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="py-12 px-6 text-center text-slate-500">
                                <div class="flex flex-col items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-slate-300 mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" /></svg>
                                    <p class="text-base font-medium">Chưa có danh mục nào</p>
                                    <p class="text-sm mt-1">Hãy bấm "Thêm danh mục mới" để tạo dữ liệu đầu tiên.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        @if($categories->hasPages())
            <div class="p-4 border-t border-slate-100 bg-slate-50">
                {{ $categories->links() }}
            </div>
        @endif
    </div>
</x-admin-layout>
