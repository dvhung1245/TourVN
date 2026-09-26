<x-guest-layout>
    <!-- Header: Logo & Badge -->
    <div class="flex items-center justify-between mb-8">
        <div class="flex items-center gap-2 text-brand-primary">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="currentColor">
                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 17.93c-3.95-.49-7-3.85-7-7.93 0-.62.08-1.21.21-1.79L9 15v1c0 1.1.9 2 2 2v1.93zm6.9-2.54c-.26-.81-1-1.39-1.9-1.39h-1v-3c0-.55-.45-1-1-1H8v-2h2c.55 0 1-.45 1-1V7h2c1.1 0 2-.9 2-2v-.41c2.93 1.19 5 4.06 5 7.41 0 2.08-.8 3.97-2.1 5.39z"/>
            </svg>
            <span class="font-bold text-lg tracking-tight">TourVN<span class="font-light text-slate-400 ml-1 text-sm">Quản Trị</span></span>
        </div>
        <div class="px-3 py-1 bg-red-100 text-red-600 rounded-full text-xs font-semibold flex items-center gap-1.5">
            <div class="w-1.5 h-1.5 rounded-full bg-red-500"></div>
            Admin Portal
        </div>
    </div>

    <!-- Titles -->
    <h1 class="text-3xl font-bold text-slate-900 mb-2">Đăng nhập Quản Trị Viên</h1>
    <p class="text-sm text-slate-500 mb-8">Trang đăng nhập dành riêng cho Quản trị viên hệ thống TourVN.</p>

    <form method="POST" action="{{ route('admin.login') }}" class="space-y-5">
        @csrf

        <!-- Email Address -->
        <div>
            <label for="email" class="block text-xs font-bold text-slate-700 mb-2">Email Quản Trị</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" /></svg>
                </div>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="off" class="block w-full pl-11 pr-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:bg-white focus:border-slate-500 focus:ring-2 focus:ring-slate-500/20 transition-all text-sm text-slate-900 font-semibold" />
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <div class="flex items-center justify-between mb-2">
                <label for="password" class="block text-xs font-bold text-slate-700">Mật khẩu</label>
            </div>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" /></svg>
                </div>
                <input id="password" type="password" name="password" required autocomplete="new-password" class="block w-full pl-11 pr-10 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:bg-white focus:border-slate-500 focus:ring-2 focus:ring-slate-500/20 transition-all text-sm font-mono tracking-widest text-slate-900 font-semibold" />
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="flex items-center">
            <label for="remember_me" class="inline-flex items-center cursor-pointer group">
                <div class="relative flex items-center justify-center w-5 h-5 rounded border-2 border-slate-300 group-hover:border-slate-600 bg-white transition-colors">
                    <input id="remember_me" type="checkbox" name="remember" class="peer absolute w-full h-full opacity-0 cursor-pointer" />
                    <svg class="w-3.5 h-3.5 text-white peer-checked:text-slate-900 opacity-0 peer-checked:opacity-100 transition-opacity" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" /></svg>
                </div>
                <span class="ml-2 text-sm text-slate-600 font-medium select-none">Ghi nhớ đăng nhập</span>
            </label>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="w-full py-3.5 bg-slate-900 hover:bg-slate-800 text-white font-bold rounded-xl shadow-lg shadow-slate-900/30 transition-all hover:shadow-slate-900/50 flex items-center justify-center gap-2 group">
            Đăng nhập hệ thống
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3" /></svg>
        </button>
    </form>

    <!-- Return to Main Site -->
    <div class="mt-8 text-center">
        <a href="{{ route('login') }}" class="text-xs font-semibold text-slate-500 hover:text-slate-700 transition-colors">
            &larr; Quay lại trang đăng nhập khách hàng
        </a>
    </div>
</x-guest-layout>
