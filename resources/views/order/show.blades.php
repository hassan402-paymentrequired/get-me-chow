<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight gap-4">
            <a href="{{ route(auth()->user()->is_buyer ? 'buyer.dashboard' :'dashboard') }}">
                &lArr;
            </a>
            {{ __(ucwords($order->name)) }}
        </h2>
    </x-slot>

    <div class="py-6" x-clock>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-black overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 dark:text-gray-100">
                    <div class="p-4">
                        <div class="max-w-screen-lg mx-auto">
                            {{-- detail --}}
                            <div class="border-b border-gray-300 pb-4 flex items-center justify-between">
                                <div class="">

                                <h3 class="text-xl font-semibold text-white">Order Summary</h3>
                                <div class="mt-4">
                                    <p class="text-gray-200 text-sm font-medium">{{ $order->owner->first_name }}
                                        {{ $order->owner->last_name }}</p>
                                    <p class="text-gray-200 text-sm mt-2 font-medium">
                                        {{ $order->created_at->format('d F Y g:ia') }}</p>
                                </div>
                                </div>
                               @if (!auth()->user()->is_buyer && $order->owner_id == auth()->user()->id && $order->status === \App\OrderStatusEnum::PENDIND->value)
                                <form action="{{ route('owner.order.update', ['order'=>$order]) }}" method="post">
                                        @csrf
                                        @method('PATCH')                                        
                                    <x-primary-button>Mark as Delivered</x-primary-button>
                                </form>
                                    @endif
                                       @if (!auth()->user()->is_buyer && $order->owner_id == auth()->user()->id && $order->status === \App\OrderStatusEnum::SUCCESSFULL->value)
                                <form action="{{ route('owner.order.update', ['order'=>$order]) }}" method="post">
                                        @csrf
                                        @method('PATCH')                                        
                                    <x-primary-button>Repeat Order</x-primary-button>
                                </form>
                                    @endif
                            </div>


                            <div class="divide-y divide-gray-300 mt-6">
                                @foreach ($order->items as $item)
                                    <div
                                        class="grid grid-cols-4 max-sm:grid-cols-2 items-start justify-between gap-6 py-2">
                                        <div class="col-span-2 flex sm:items-center gap-4 sm:gap-6 max-sm:flex-col">
                                            <div class="bg-gray-100 p-2 rounded-lg w-16 h-16 shrink-0 flex items-center justify-center">
                                                @if ($item->image)
                                            {{-- {{    dd($item->image);}} --}}

                                                <img src='{{asset('storage/' . $item->image)}}'
                                                    class="w-full h-full object-contain" />
                                                @else
                                                      <span class="text-gray-800 font-bold text-xl"
                                                      >
                                                      {{ucwords($item->name)}}
                                                      </span>
                                                @endif
                                            </div>
                                            <div>
                                                <h6 class="text-sm font-semibold text-white">{{ ucwords($item->name) }}</h6>
                                                <div class="mt-2">
                                                    <p class="text-xs text-gray-200 font-medium mt-1">Qty: <span
                                                            class="ml-1">{{ $item->quantity }}</span></p>
                                                            @if (auth()->user()->is_buyer)
                                                                
                                                    @if ($item->note)
                                                                @include('components.status-modal')
                                                    @else
                                                        <p class="text-xs text-gray-200 font-medium mt-2">Note: <span
                                                                class="ml-1 text-xs ">No Note Attached</span></p>
                                                    @endif
                                                            @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div>
                                            <h6 class="text-sm font-semibold text-white">Status</h6>
                                            <p
                                                class="bg-blue-50 text-xs font-medium text-black mt-2 inline-block rounded py-1 px-2">
                                                {{{\App\OrderItemStatusEnum::getName($item->status)}}}
                                                {{-- {{dd($order->status, $item->id)}} --}}
                                                </p>
                                        </div>

                                        <div class="ml-auto flex flex-col">
                                            <div>
                                                <h6 class="text-sm font-semibold text-white">Price</h6>
                                                <p class="text-sm text-white font-medium mt-2">
                                                    &#x20A6;{{ number_format($item->amount, 2) }}
                                                </p>
                                            </div>
                                             
                                            <div class="mt-3" x-data>
                                                @if (auth()->user()->is_buyer && $order->status !== \App\OrderStatusEnum::SUCCESSFULL->value && $order->status !== \App\OrderStatusEnum::CANCELED->value)
        
                                                <form 
                                                    action="{{ route('buyer.update.order.item.status', ['orderItem' => $item->id]) }}" 
                                                    method="post" 
                                                    x-ref="statusForm"
                                                >
                                                    @csrf
                                                    @method('PATCH')
                                                    <select 
                                                        class="py-2 px-3 pe-9 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                                        name="status"
                                                        @change="$refs.statusForm.submit()"
                                                    >
                                                        <option selected="">Update {{ ucwords($item->name) }} Status</option>
                                                        @foreach (\App\OrderItemStatusEnum::cases() as $status)
                                                            <option value="{{ $status->value }}">{{ \App\OrderItemStatusEnum::getName($status->value) }}</option>
                                                        @endforeach
                                                    </select>
                                                </form>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

    

  
                            </div>

                            <hr class="border-t border-gray-300" />

                            <div class="max-w-md ml-auto divide-y divide-gray-300 mt-4">


                                <div class="flex justify-between font-semibold text-[15px] text-white py-4">
                                    <span>Total</span>
                                    <span>&#x20A6;{{ number_format($order->total_amount, 2) }}</span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
