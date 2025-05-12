<x-user-layout>

    <div class="py-20 isolate relative">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white  overflow-hidden  sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-5">
                        @foreach ($orders as $order)
                            <x-pending :order="$order" />
                        @endforeach
                    </div>
                    @if (count($orders) === 0)
                        <p class="text-center text-gray-500 dark:text-gray-400">No order history found.</p>
                    @endif
                </div>

            </div>
        </div>
    </div>
</x-user-layout>
