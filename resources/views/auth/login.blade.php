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
            Cổng dịch vụ 2025
        </div>
    </div>

    <!-- Titles -->
    <h1 class="text-3xl font-bold text-slate-900 mb-2" x-text="role === 'customer' ? 'Chào mừng bạn trở lại' : 'Cổng đối tác TourVN'">Chào mừng bạn trở lại</h1>
    <p class="text-sm text-slate-500 mb-8" x-text="role === 'customer' ? 'Đăng nhập để quản lý lịch trình, dặm tích lũy và mở khoá ưu đãi độc quyền.' : 'Đăng nhập để quản lý booking, theo dõi hoa hồng và bảng giá đại lý.'">Đăng nhập để quản lý lịch trình, dặm tích lũy và mở khoá ưu đãi độc quyền.</p>

    <!-- Tabs -->
    <div class="flex p-1 bg-slate-100 rounded-xl mb-6">
        <button type="button" @click="role = 'customer'" :class="role === 'customer' ? 'bg-white text-brand-primary font-bold shadow-sm' : 'text-slate-500 hover:text-slate-700 font-semibold'" class="flex-1 py-2.5 text-sm rounded-lg transition-colors">Khách hàng cá nhân</button>
        <button type="button" @click="role = 'agent'" :class="role === 'agent' ? 'bg-white text-brand-primary font-bold shadow-sm' : 'text-slate-500 hover:text-slate-700 font-semibold'" class="flex-1 py-2.5 text-sm rounded-lg transition-colors">Đại lý / Đối tác</button>
    </div>

    <!-- Dynamic Swap Area -->
    <div class="grid relative mb-6">
        <!-- Customer Social Login & Divider -->
        <div style="grid-area: 1 / 1" class="transition-opacity duration-300" :class="role === 'customer' ? 'opacity-100 z-10' : 'opacity-0 pointer-events-none -z-10'">
            <div class="grid grid-cols-2 gap-4 mb-6">
                <button class="flex items-center justify-center gap-2 py-2.5 border border-slate-200 rounded-xl hover:bg-slate-50 transition-colors text-sm font-semibold text-slate-700">
                    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/><path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/><path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/><path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/></svg>
                    Tiếp tục với Google
                </button>
                <button class="flex items-center justify-center gap-2 py-2.5 border border-slate-200 rounded-xl hover:bg-slate-50 transition-colors text-sm font-semibold text-slate-700">
                    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M17.05 20.28c-.98.95-2.05.8-3.08.35-1.09-.46-2.09-.48-3.24 0-1.44.62-2.2.44-3.06-.35C2.79 15.25 3.51 7.59 9.05 7.31c1.35.05 2.26.73 2.94.73.74 0 1.83-.82 3.4-.69 1.48.05 2.65.65 3.42 1.67-2.9 1.62-2.39 5.56.55 6.64-.7 1.86-1.57 3.65-2.31 4.62zm-1.87-14.8c.67-1.35.85-2.82.52-4.14-1.3.17-2.8.96-3.55 2.24-.62 1.05-.9 2.45-.63 3.75 1.45.1 2.82-.7 3.66-1.85z"/></svg>
                    Apple ID
                </button>
            </div>
            <div class="relative flex items-center justify-center">
                <div class="absolute inset-0 flex items-center"><div class="w-full border-t border-slate-200"></div></div>
                <div class="relative bg-white px-3 text-xs text-slate-400">Hoặc đăng nhập bằng email / số điện thoại</div>
            </div>
        </div>

        <!-- Partner Info Box -->
        <div style="grid-area: 1 / 1" class="transition-opacity duration-300 h-full flex flex-col justify-center" :class="role === 'agent' ? 'opacity-100 z-10' : 'opacity-0 pointer-events-none -z-10'">
            <div class="flex items-start gap-3 p-4 bg-brand-primary/5 border border-brand-primary/20 rounded-xl">
                <div class="mt-0.5">
                    <svg class="w-5 h-5 text-brand-primary" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div>
                    <h4 class="text-xs font-bold text-brand-primary mb-1">Dành riêng cho B2B</h4>
                    <p class="text-xs text-slate-600 leading-relaxed">Vui lòng sử dụng tài khoản doanh nghiệp do hệ thống TourVN cấp để truy cập vào Cổng quản trị đối tác.</p>
                </div>
            </div>
        </div>
    </div>

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf
        <input type="hidden" name="login_role" x-bind:value="role">

        <!-- Email Address -->
        <div>
            <label for="login" class="block text-xs font-bold text-slate-700 mb-2" x-text="role === 'customer' ? 'Email hoặc Số điện thoại' : 'Email doanh nghiệp / Mã đại lý'">Email hoặc Số điện thoại</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-brand-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" /></svg>
                </div>
                <input id="login" type="text" name="login" :value="old('login')" required autofocus autocomplete="off" class="block w-full pl-11 pr-4 py-3 bg-slate-50 border-transparent rounded-xl focus:bg-white focus:border-brand-primary focus:ring-2 focus:ring-brand-primary/20 transition-all text-sm" x-bind:placeholder="role === 'customer' ? 'vidu@gmail.com hoặc 0912 345 678' : 'admin@doanhnghiep.com hoặc DL-123'" placeholder="vidu@gmail.com hoặc 0912 345 678" />
            </div>
            <x-input-error :messages="$errors->get('login')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <div class="flex items-center justify-between mb-2">
                <label for="password" class="block text-xs font-bold text-slate-700">Mật khẩu</label>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-xs font-semibold text-brand-primary hover:text-brand-primary/80">Quên mật khẩu?</a>
                @endif
            </div>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-brand-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" /></svg>
                </div>
                <input id="password" type="password" name="password" required autocomplete="new-password" class="block w-full pl-11 pr-10 py-3 bg-slate-50 border-transparent rounded-xl focus:bg-white focus:border-brand-primary focus:ring-2 focus:ring-brand-primary/20 transition-all text-sm font-mono tracking-widest" placeholder="••••••••••••" />
                <button type="button" class="absolute inset-y-0 right-0 pr-4 flex items-center text-slate-400 hover:text-slate-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
                </button>
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="flex items-center">
            <label for="remember_me" class="inline-flex items-center cursor-pointer group">
                <div class="relative flex items-center justify-center w-5 h-5 rounded border-2 border-slate-300 group-hover:border-brand-primary bg-white transition-colors">
                    <input id="remember_me" type="checkbox" name="remember" class="peer absolute w-full h-full opacity-0 cursor-pointer" />
                    <svg class="w-3.5 h-3.5 text-white peer-checked:text-brand-primary opacity-0 peer-checked:opacity-100 transition-opacity" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" /></svg>
                </div>
                <span class="ml-2 text-sm text-slate-600 font-medium select-none">Ghi nhớ đăng nhập trên thiết bị này</span>
            </label>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="w-full py-3.5 bg-brand-secondary hover:bg-orange-600 text-white font-bold rounded-xl shadow-lg shadow-brand-secondary/30 transition-all hover:shadow-brand-secondary/50 flex items-center justify-center gap-2 group">
            <span x-text="role === 'customer' ? 'Đăng nhập ngay' : 'Truy cập Cổng đối tác'">Đăng nhập ngay</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3" /></svg>
        </button>

        <!-- OTP Link -->
        <div class="text-center mt-4 transition-opacity duration-300" :class="role === 'agent' ? 'opacity-0 pointer-events-none' : 'opacity-100'">
            <a href="#" class="inline-flex items-center gap-2 text-sm font-semibold text-brand-primary hover:text-brand-primary/80">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" /></svg>
                Hoặc đăng nhập nhanh qua mã OTP SMS
            </a>
        </div>
    </form>

    <!-- Sign Up / Contact Banner -->
    <div class="mt-8 p-4 bg-slate-50 border border-slate-100 rounded-2xl flex items-center justify-between">
        <div>
            <p class="text-sm font-bold text-slate-900" x-text="role === 'customer' ? 'Chưa có tài khoản thành viên?' : 'Muốn trở thành đối tác?'">Chưa có tài khoản thành viên?</p>
            <p class="text-xs font-semibold mt-1 flex items-center gap-1" :class="role === 'agent' ? 'text-slate-600' : 'text-brand-secondary'">
                <svg x-show="role === 'customer'" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5 5a3 3 0 015-2.236A3 3 0 0114.83 6H16a2 2 0 110 4h-5V9a1 1 0 10-2 0v1H4a2 2 0 110-4h1.17C5.06 5.687 5 5.35 5 5zm4 1V5a1 1 0 10-1 1h1zm3 0a1 1 0 10-1-1v1h1z" clip-rule="evenodd" /><path d="M9 11H3v5a2 2 0 002 2h4v-7zM11 18h4a2 2 0 002-2v-5h-6v7z" /></svg>
                <svg x-show="role === 'agent'" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor"><path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" /></svg>
                <span x-text="role === 'customer' ? 'Tặng ngay voucher 500.000đ khi đăng ký mới' : 'Liên hệ với chúng tôi để mở tài khoản B2B'">Tặng ngay voucher 500.000đ khi đăng ký mới</span>
            </p>
        </div>
        @if (Route::has('register'))
            <a x-bind:href="role === 'customer' ? '{{ route('register') }}' : '#'" class="px-5 py-2.5 bg-white border border-slate-200 text-brand-primary font-bold text-sm rounded-xl shadow-sm hover:bg-slate-50 transition-colors whitespace-nowrap">
                <span x-text="role === 'customer' ? 'Đăng ký ngay' : 'Liên hệ ngay'">Đăng ký ngay</span>
            </a>
        @endif
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
