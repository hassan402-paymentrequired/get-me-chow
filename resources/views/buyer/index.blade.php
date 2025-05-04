<x-user-layout>

    <div class="relative isolate pt-20 mx-auto max-w-7xl">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-transparent overflow-hidden sm:rounded-lg">
                <div class="p-6 text-black">


                    <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-8 lg:grid-cols-3 xl:gap-x-8">
                        @forelse  ($orders as $order)
                            <x-pending :order="$order" />

                        @empty
                            <div class="text-center  absolute top-[50%] right-[40%] -translate-[50%] flex items-center justify-center flex-col h-[70vh]">
                                <svg class="mx-auto size-12 text-gray-400" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" aria-hidden="true">
                                    <path vector-effect="non-scaling-stroke" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2"
                                        d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                                </svg>
                                <h3 class="mt-2 text-sm font-semibold text-gray-900">No Pending Order</h3>
                                <p class="mt-1 text-sm text-gray-500">You have'nt being placed on an order for the today</p>

                            </div>
                        @endforelse
                    </div>


                    {{-- <x-primary-link link="{{ route('orders.download') }}"> Download Orders </x-primary-link> --}}
                </div>
            </div>
        </div>
    </div>
    </x--layout>
