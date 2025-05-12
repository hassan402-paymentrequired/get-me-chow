<x-user-layout>
    <div class="relative isolate pt-24 mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8" x-data="{ drawer: false }">
        @forelse ($orders as $order)
            @each('components.drawer', $orders, 'order')
            <div class="overflow-hidden rounded-xl max-w-5xl w-full m-auto border border-gray-200">
                <div class="flex items-center gap-x-4 border-b border-gray-900/5 bg-gray-50 p-6">
                    <div class="size-12 flex items-center justify-center rounded-lg bg-white ring-1 ring-gray-900/10">
                        <span class="text-2xl font-bold text-gray-900 uppercase">{{ substr($order->name, 0, 2) }}</span>
                    </div>
                    <div class="text-sm/6 font-medium text-gray-900">{{ $order->name }}</div>

                    <div class="relative ml-auto">
                        <div x-data="{ open: false }" class="relative">
                            <button @click="open = !open" type="button"
                                class="-m-2.5 block p-2.5 text-gray-400 hover:text-gray-500" id="options-menu-1-button"
                                aria-expanded="false" aria-haspopup="true">
                                <svg class="size-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"
                                    data-slot="icon">
                                    <path
                                        d="M3 10a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0ZM8.5 10a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0ZM15.5 8.5a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3Z" />
                                </svg>
                            </button>

                            <div x-show="open" @click.away="open = false"
                                class="absolute right-0 z-10 mt-0.5 w-32 origin-top-right rounded-md bg-white py-2 shadow-lg ring-1 ring-gray-900/5 focus:outline-hidden"
                                role="menu" aria-orientation="vertical" aria-labelledby="options-menu-1-button"
                                tabindex="-1">
                                @if ($order->owner_id === auth()->user()->id)
                                    <a href="{{ route('owner.order.remove.add', $order->id) }}"
                                        class="block hover:bg-gray-100 px-3 py-1 text-sm/6 text-gray-900">Add Item</a>
                                    <button @click="drawer = true"
                                        class="block hover:bg-gray-100 w-full text-start px-3 py-1 text-sm/6 text-gray-900">Remove
                                        Item</button>
                                    <form action="{{ route('owner.order.delete', ['order' => $order]) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button 
                                            class="block hover:bg-gray-100 w-full text-start px-3 py-1 text-sm/6 text-gray-900">Delete
                                            Order</button>
                                    </form>
                                @endif
                                <a href="{{ route('order.show', $order->id) }}"
                                    class="block px-3 py-1 text-sm/6 hover:bg-gray-100  text-gray-900"
                                    id="options-menu-1-item-0">View </a>
                            </div>
                        </div>
                    </div>
                </div>
                <dl class="-my-3 divide-y divide-gray-100 px-6 py-4 text-sm/6">
                    <div class="flex justify-between gap-x-4 py-3">
                        <dt class="text-gray-500">Buyer</dt>
                        <dd class="text-gray-700"><time datetime="2023-01-22">{{ $order->buyer->first_name }}</time>
                        </dd>
                    </div>
                    <div class="flex justify-between gap-x-4 py-3">
                        <dt class="text-gray-500">Total Price</dt>
                        <dd class="flex items-start gap-x-2">
                            <div class="font-medium text-gray-900">&#x20A6;{{ number_format($order->total_amount, 2) }}
                            </div>
                            <div
                                class="rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-green-600/20 ring-inset">
                                {{ \App\OrderItemStatusEnum::getName($order->status) }}
                            </div>
                        </dd>
                    </div>
                </dl>
            </div>

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
