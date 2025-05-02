<select  {{ $attributes->merge(['class' => 'border-gray-300 dark:border-gray-700 dark:bg-transparent dark:text-gray-300 focus:border-neutral-500 dark:focus:border-neutral-600 focus:ring-neutral-500 dark:focus:ring-neutral-600 rounded-md shadow-sm']) }}>
    {{ $slot }}
</select>
