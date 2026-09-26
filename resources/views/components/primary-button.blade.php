<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-6 py-3 bg-brand-primary border border-transparent rounded-xl font-bold text-sm text-white uppercase tracking-widest hover:bg-brand-tertiary hover:scale-105 active:scale-95 focus:outline-none focus:ring-2 focus:ring-brand-primary focus:ring-offset-2 focus:ring-offset-brand-neutral shadow-lg shadow-brand-primary/40 transition-all duration-300']) }}>
    {{ $slot }}
</button>
