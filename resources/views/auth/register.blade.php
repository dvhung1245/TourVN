<x-guest-layout>
    <div class="w-full h-full">
        <!-- Header: Logo & Badge -->
        <div class="flex items-center justify-between mb-8">
            <div class="flex items-center gap-2 text-brand-primary">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 17.93c-3.95-.49-7-3.85-7-7.93 0-.62.08-1.21.21-1.79L9 15v1c0 1.1.9 2 2 2v1.93zm6.9-2.54c-.26-.81-1-1.39-1.9-1.39h-1v-3c0-.55-.45-1-1-1H8v-2h2c.55 0 1-.45 1-1V7h2c1.1 0 2-.9 2-2v-.41c2.93 1.19 5 4.06 5 7.41 0 2.08-.8 3.97-2.1 5.39z"/>
                </svg>
                <span class="font-bold text-lg tracking-tight">TourVN<span class="font-light text-slate-400 ml-1 text-sm">Luxury Travel</span></span>
            </div>
            <div class="px-3 py-1 bg-slate-100 text-slate-500 rounded-full text-xs font-semibold flex items-center gap-1.5">
                <div class="w-1.5 h-1.5 rounded-full bg-brand-tertiary"></div>
                Đăng ký thành viên
            </div>
        </div>

        <!-- Titles -->
        <h1 class="text-3xl font-bold text-slate-900 mb-2">Tạo tài khoản mới</h1>
        <p class="text-sm text-slate-500 mb-8">Trở thành hội viên Ocean Club để nhận voucher 500.000đ và tận hưởng các đặc quyền du lịch thượng lưu.</p>

        <form method="POST" action="{{ route('register') }}" class="space-y-5">
            @csrf

            <!-- Name -->
            <div>
                <label for="name" class="block text-xs font-bold text-slate-700 mb-2">Họ và tên</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-brand-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
                    </div>
                    <input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" class="block w-full pl-11 pr-4 py-3 bg-slate-50 border-transparent rounded-xl focus:bg-white focus:border-brand-primary focus:ring-2 focus:ring-brand-primary/20 transition-all text-sm" placeholder="Nguyễn Văn A" />
                </div>
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Login Identifier (Email / Phone) -->
            <div>
                <label for="login" class="block text-xs font-bold text-slate-700 mb-2">Email hoặc Số điện thoại</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-brand-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
                    </div>
                    <input id="login" type="text" name="login" :value="old('login')" required autocomplete="off" class="block w-full pl-11 pr-4 py-3 bg-slate-50 border-transparent rounded-xl focus:bg-white focus:border-brand-primary focus:ring-2 focus:ring-brand-primary/20 transition-all text-sm" placeholder="vidu@gmail.com hoặc 0912 345 678" />
                </div>
                <x-input-error :messages="$errors->get('login')" class="mt-2" />
            </div>

            <!-- Password -->
            <div x-data="{ show: false }">
                <label for="password" class="block text-xs font-bold text-slate-700 mb-2">Mật khẩu</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-brand-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" /></svg>
                    </div>
                    <input id="password" :type="show ? 'text' : 'password'" name="password" required autocomplete="new-password" class="block w-full pl-11 pr-12 py-3 bg-slate-50 border-transparent rounded-xl focus:bg-white focus:border-brand-primary focus:ring-2 focus:ring-brand-primary/20 transition-all text-sm font-mono tracking-widest" placeholder="••••••••••••" />
                    <button type="button" @click="show = !show" class="absolute inset-y-0 right-0 pr-4 flex items-center text-slate-400 hover:text-brand-primary transition-colors">
                        <svg x-show="!show" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
                        <svg x-cloak x-show="show" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" /></svg>
                    </button>
                </div>
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div x-data="{ show: false }">
                <label for="password_confirmation" class="block text-xs font-bold text-slate-700 mb-2">Xác nhận mật khẩu</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-brand-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" /></svg>
                    </div>
                    <input id="password_confirmation" :type="show ? 'text' : 'password'" name="password_confirmation" required autocomplete="new-password" class="block w-full pl-11 pr-12 py-3 bg-slate-50 border-transparent rounded-xl focus:bg-white focus:border-brand-primary focus:ring-2 focus:ring-brand-primary/20 transition-all text-sm font-mono tracking-widest" placeholder="••••••••••••" />
                    <button type="button" @click="show = !show" class="absolute inset-y-0 right-0 pr-4 flex items-center text-slate-400 hover:text-brand-primary transition-colors">
                        <svg x-show="!show" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
                        <svg x-cloak x-show="show" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" /></svg>
                    </button>
                </div>
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <!-- Submit Button -->
            <button type="submit" class="w-full py-3.5 mt-2 bg-brand-secondary hover:bg-orange-600 text-white font-bold rounded-xl shadow-lg shadow-brand-secondary/30 transition-all hover:shadow-brand-secondary/50 flex items-center justify-center gap-2 group">
                <span>Hoàn tất đăng ký</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3" /></svg>
            </button>
        </form>

        <!-- Login Banner -->
        <div class="mt-8 p-4 bg-slate-50 border border-slate-100 rounded-2xl flex items-center justify-between">
            <div>
                <p class="text-sm font-bold text-slate-900">Đã có tài khoản?</p>
                <p class="text-xs font-semibold mt-1 text-slate-600">Đăng nhập để tiếp tục trải nghiệm</p>
            </div>
            <a href="{{ route('login') }}" class="px-5 py-2.5 bg-white border border-slate-200 text-brand-primary font-bold text-sm rounded-xl shadow-sm hover:bg-slate-50 transition-colors whitespace-nowrap">
                Đăng nhập
            </a>
        </div>
        
        <!-- Trust Badges -->
        <div class="mt-8 flex items-center justify-between text-[10px] font-semibold text-slate-400 uppercase tracking-wider">
            <div class="flex items-center gap-1.5">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-brand-tertiary" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" /></svg>
                Mã hóa SSL 256-bit chuẩn Quốc tế
            </div>
            <div class="flex items-center gap-1.5">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-brand-tertiary" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" /></svg>
                Chứng nhận bảo vệ dữ liệu
            </div>
        </div>
    </div>
</x-guest-layout>
