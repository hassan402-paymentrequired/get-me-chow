<x-user-layout>

    <div class="py-20 isolate relative">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white  overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">


                    @forelse  ($orders as $order)
                        <x-pending :order="$order" />
                    @empty
                        <p class="text-center text-gray-500 dark:text-gray-400">No order history found.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-user-layout>
