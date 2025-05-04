<button {{ $attributes->merge(['type' => 'submit', 'class' => 'rounded bg-black px-3 py-2 text-sm font-semibold text-white shadow-xs focus:ring-2 focus:ring-black focus:ring-offset-2']) }}>
    {{ $slot }}
</button>
