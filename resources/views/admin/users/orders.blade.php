@extends('layouts.admin-user')
@section('contents')
    <div class="grid md:grid-cols-3 gap-5 p-10">
        @foreach ($user->orders as $order)
            <div class="overflow-hidden rounded-xl border border-gray-200">
                <div class="flex items-center gap-x-4 border-b border-gray-900/5 bg-gray-50 p-6">
                    <div
                        class="size-12 flex items-center uppercase justify-center rounded-lg bg-gray-100 object-cover ring-1 ring-gray-900/10">
                        {{ substr($order->owner->first_name, 0, 2) }}
                    </div>
                    <div class="text-sm/6 font-medium text-gray-900">{{ $order->owner->first_name }}</div>
                    <div class="relative ml-auto" x-data="{ open: false }">
                        <button type="button" class="-m-2.5 block p-2.5 text-gray-400 hover:text-gray-500"
                            @click="open = !open" aria-expanded="false" aria-haspopup="true">
                            <span class="sr-only">Open options</span>
                            <svg class="size-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                                <path
                                    d="M3 10a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0ZM8.5 10a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0ZM15.5 8.5a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3Z" />
                            </svg>
                        </button>
                        <div x-show="open" @click.away="open = false"
                            class="absolute right-0 z-10 mt-0.5 w-32 origin-top-right rounded-md bg-white py-2 shadow-lg ring-1 ring-gray-900/5 focus:outline-hidden"
                            role="menu" aria-orientation="vertical" tabindex="-1">
                            <a href="#" class="block px-3 py-1 text-sm/6 text-gray-900" role="menuitem">View</a>
                        </div>
                    </div>
                </div>
                <dl class="-my-3 divide-y divide-gray-100 px-6 py-4 text-sm/6">
                    <div class="flex justify-between gap-x-4 py-3">
                        <dt class="text-gray-500">Buyer</dt>
                        <dd class="text-gray-700"><time
                                datetime="2022-12-13">{{ $order->buyer->first_name . ' ' . $order->buyer->last_name }}</time>
                        </dd>
                    </div>
                    <div class="flex justify-between gap-x-4 py-3">
                        <dt class="text-gray-500">Order time</dt>
                        <dd class="flex items-start gap-x-2">
                            <div class="font-medium text-gray-900">{{ $order->created_at->format('d M, Y') }}</div>
                            <div @if ($order->status === \App\OrderStatusEnum::SUCCESSFULL->value) class="rounded-md bg-red-50 px-2 py-1 text-xs font-medium text-red-700 ring-1 ring-red-600/10 ring-inset">
                                    Delivered
                                    </div>
                                        @elseif ($order->status === \App\OrderStatusEnum::PENDIND->value) <div class="rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-green-600/20 ring-inset">
                                        Pending
                                        </div>
                                     @else
                                     <div class="rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-green-600/20 ring-inset">
                                    Canceled
                                     </div> @endif
                                </dd>
                            </div>
                </dl>
            </div>
        @endforeach
    </div>

    @if ($user->orders->count() === 0)
        <div class="flex items-center justify-center w-full ">
            <p class="text-gray-500">No order found</p>
        </div>
    @endif
@endsection
