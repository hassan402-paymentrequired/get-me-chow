<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Recent Order') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-black overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">


                    @forelse  ($orders as $order)
                        <x-pending :order="$order" />

                    @empty
                        <p class="text-center text-gray-500 dark:text-gray-400">No pending orders found.</p>
                    @endforelse
                    
                    <x-primary-link link="{{ route('orders.download') }}"> Download Orders </x-primary-link>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
