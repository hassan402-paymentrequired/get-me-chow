@props(['disabled' => false])

<textarea 
cols="3"
rows="3"
    {{ $attributes->merge(['class' => 'border-gray-300 dark:border-gray-300 dark:bg-transparent dark:text-back focus:border-neutral-500 dark:focus:border-neutral-600 focus:ring-neutral-500 dark:focus:ring-black rounded-md shadow-sm']) }}>
</textarea>
