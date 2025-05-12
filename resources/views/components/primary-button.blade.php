@props(['disabled' => false])
<button @disabled($disabled) {{ $attributes->merge(['type' => 'submit', 'class' => 'rounded bg-black px-3 py-2 font-semibold text-xs text-white uppercase tracking-widest shadow-xs focus:ring-2 focus:ring-black focus:ring-offset-2']) }}>
    {{ $slot }}
</button>
