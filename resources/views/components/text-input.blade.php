@props(['icon' => ''])
<div class="relative  flex items-center w-full">
    <input
        {{ $attributes->merge(['class' => 'w-full text-sm text-slate-800 border border-gray-300 pl-4 pr-10 py-3 rounded outline-none focus:border-none focus:outline-none focus:right-1 focus:ring-black']) }} />

    {!! $icon !!}
</div>
