@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'bg-white/20 border-white/30 text-white placeholder-white/50 focus:border-white focus:ring-white rounded-xl shadow-inner backdrop-blur-sm transition-all']) }}>
