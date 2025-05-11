<div x-data="{ open: false }">
    <!-- Button to open the drawer -->
    <button @click="open = true" class="px-4 py-2 bg-blue-500 text-white rounded">Open Drawer</button>
    <!-- Drawer -->
    <div class="relative isolate" aria-labelledby="slide-over-title" role="dialog" aria-modal="true" x-show="open" x-cloak>
        <!-- Background backdrop -->
        <div class="fixed inset-0 bg-gray-500/75 transition-opacity" aria-hidden="true" x-show="open"
            x-transition:enter="ease-in-out duration-500" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="ease-in-out duration-500"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"></div>

        <div class="fixed inset-0 overflow-hidden">
            <div class="absolute inset-0 overflow-hidden">
                <div class="pointer-events-none fixed inset-y-0 right-0 flex max-w-full pl-10">
                    <!-- Slide-over panel -->
                    <div class="pointer-events-auto relative w-screen max-w-md" x-show="open"
                        x-transition:enter="transform transition ease-in-out duration-500 sm:duration-700"
                        x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0"
                        x-transition:leave="transform transition ease-in-out duration-500 sm:duration-700"
                        x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full">
                        <!-- Close button -->
                        <div class="absolute top-0 left-0 -ml-8 flex pt-4 pr-2 sm:-ml-10 sm:pr-4">
                            <button @click="open = false" type="button"
                                class="relative rounded-md text-gray-300 hover:text-white focus:ring-2 focus:ring-white focus:outline-hidden">
                                <span class="absolute -inset-2.5"></span>
                                <span class="sr-only">Close panel</span>
                                <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" aria-hidden="true" data-slot="icon">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>

                        <div class="flex h-full flex-col overflow-y-scroll bg-white py-6 shadow-xl">
                            <div class="px-4 sm:px-6">
                                <h2 class="text-base font-semibold text-gray-900" id="slide-over-title">Panel title</h2>
                            </div>
                            <div class="relative mt-6 flex-1 px-4 sm:px-2">
                                @foreach ($order->items as $item)
                                    <li class="flex justify-between gap-x-6 py-5 group p-4 relative">
                                        <div class="flex min-w-0 gap-x-4">
                                            <img class="size-12 flex-none rounded-full bg-gray-50"
                                                src="{{ asset('/storage' . $item->image) }}" alt="">
                                            <div class="min-w-0 flex-auto">
                                                <p class="text-sm/6 font-semibold text-gray-900">{{ $item->name }}</p>
                                                <p class="mt-1 truncate text-xs/5 text-gray-500">
                                                    {{ $item->note }}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                                            <p class="text-sm/6 text-gray-900">{{ $item->amount }}</p>
                                            <p class="mt-1 text-xs/5 text-gray-500"> <time
                                                    datetime="2023-01-23T13:23Z">{{ $item->created_at->format('gA') }}</time>
                                            </p>
                                        </div>

                                        <div
                                            class="absolute inset-0 bg-gray-50 hidden items-center justify-center group-hover:flex">
                                            <form action="{{ route('owner.order.remove.item', ['orderItem' => $item->id]) }}">
                                                @csrf
                                                <button>
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="size-12">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                    </svg>

                                                </button>
                                            </form>
                                        </div>
                                    </li>
                                @endforeach

                                @if ($order->items->count() === 1)
                                    <div class="bg-yellow-100 bottom-0 relative border-t border-b border-yellow-500 text-yellow-700 px-4 py-3"
                                        role="alert">
                                        <p class="font-bold">Hey {{ Auth::user()->first_name }}</p>
                                        <p class="text-sm">Removing this last items in you order will <span
                                                class="font-bold">Cancel</span> your order.</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
