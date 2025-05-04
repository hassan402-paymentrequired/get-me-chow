<x-user-layout>
    <div class="relative isolate pt-16 mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8">
        @forelse ($orders as $order)
            skks
        @empty
            <div class="text-center flex items-center justify-center flex-col h-[70vh]">
                <svg class="mx-auto size-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    aria-hidden="true">
                    <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2"
                        d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                </svg>
                <h3 class="mt-2 text-sm font-semibold text-gray-900">No Order Found</h3>
                <p class="mt-1 text-sm text-gray-500">You have'nt made an order for the today</p>
                <div class="mt-6">
                    <a href="{{ route('order.create') }}"
                        class="inline-flex items-center rounded-md  px-3 py-2 text-sm font-semibold text-white shadow-sm  focus-visible:outline bg-black focus:ring-2 focus:ring-black focus-visible:outline-2 focus-visible:outline-offset-2 ">
                        <svg class="-ml-0.5 mr-1.5 size-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"
                            data-slot="icon">
                            <path
                                d="M10.75 4.75a.75.75 0 0 0-1.5 0v4.5h-4.5a.75.75 0 0 0 0 1.5h4.5v4.5a.75.75 0 0 0 1.5 0v-4.5h4.5a.75.75 0 0 0 0-1.5h-4.5v-4.5Z" />
                        </svg>
                        New Order
                    </a>
                    {{-- <x-primary-button>hello</x-primary-button> --}}
                </div>
            </div>
        @endforelse
    </div>

</x-user-layout>
