<select  {{ $attributes->merge(['class' => 'border-gray-300 mt-1 dark:border-gray-300 dark:bg-transparent dark:text-black focus:border-neutral-500 dark:focus:border-neutral-600 focus:ring-neutral-500 dark:focus:ring-neutral-600 rounded-md shadow-sm']) }}>
    {{ $slot }}
</select>
