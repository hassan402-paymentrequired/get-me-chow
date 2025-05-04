 @props(['order' => null])
 {{-- <div class="grid grid-cols-4 max-sm:grid-cols-2 items-start justify-between gap-6 py-4">
         <div class="col-span-2 flex sm:items-center gap-4 sm:gap-6 max-sm:flex-col">
             <div class="bg-gray-100 p-2 rounded-lg w-24 h-24 shrink-0 flex items-center justify-center">
                 <span class="text-gray-800 font-bold text-xl"
                                                      >
                                                      {{ucwords($order->name)}}
                                                      </span>
             </div>
             <div>
                 <h6 class="text-sm font-semibold text-white">{{$order->owner->first_name}}</h6>
                 <div class="mt-2">
                     <p class="text-xs text-gray-200 font-medium">Item: <span class="ml-1">{{$order->items_count}}</span></p>
                     <p class="text-xs text-gray-200 font-medium mt-1">Total amount: <span class="ml-1">&#x20A6;{{ number_format($order->total_amount, 2) }}</span></p>
                 </div>
             </div>
         </div>

         <div>
             <h6 class="text-sm font-semibold text-white">Status</h6>
             <p class="bg-blue-50 text-xs font-medium text-black mt-2 inline-block rounded py-1 px-2">{{{\App\OrderStatusEnum::getName($order->status)}}}</p>
         </div>
         {{-- {{dd($order)}} --}}

 {{-- <div class="ml-auto">
     @if ($order->status === \App\OrderStatusEnum::NOT_PICKED->value)
         <form action="{{ route('buyer.order.accept', ['order' => $order]) }}" method="post">
             @csrf
             @method('PATCH')
             <x-primary-button>Accept Order</x-primary-button>
         </form>
     @else
         <x-primary-link :link="route('order.show', $order->id)">View</x-primary-link>
     @endif
 </div> --}}
 {{-- </div> --}}


 <div class="overflow-hidden rounded-xl border border-gray-200">
     <div class="flex items-center gap-x-4 border-b border-gray-900/5 bg-gray-50 p-6">
         <div class="size-12 flex items-center justify-center rounded-lg bg-white ring-1 ring-gray-900/10">
             <span class="text-2xl font-bold text-gray-900 uppercase">{{ substr($order->name, 0, 2) }}</span>
         </div>
         <div class="text-sm/6 font-medium text-gray-900">{{ $order->name }}</div>
         <div class="relative ml-auto">
             <div x-data="{ open: false }" class="relative">
                 <button @click="open = !open" type="button" class="-m-2.5 block p-2.5 text-gray-400 hover:text-gray-500"
                     id="options-menu-1-button" aria-expanded="false" aria-haspopup="true">
                     <svg class="size-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                         <path
                             d="M3 10a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0ZM8.5 10a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0ZM15.5 8.5a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3Z" />
                     </svg>
                 </button>

                 <div x-show="open" @click.away="open = false"
                     class="absolute right-0 z-10 mt-0.5 w-32 origin-top-right rounded-md bg-white py-2 shadow-lg ring-1 ring-gray-900/5 focus:outline-hidden"
                     role="menu" aria-orientation="vertical" aria-labelledby="options-menu-1-button" tabindex="-1">
                     @if ($order->owner_id === auth()->user()->id)
                         <a href="#" class="block px-3 py-1 text-sm/6 text-gray-900" role="menuitem"
                             tabindex="-1" id="options-menu-1-item-1">Edit</a>
                     @endif
                     @if ($order->status === \App\OrderStatusEnum::NOT_PICKED->value)
                         <form action="{{ route('buyer.order.accept', ['order' => $order]) }}" method="post">
                             @csrf
                             @method('PATCH')
                             {{-- <x-primary-button>Accept Order</x-primary-button> --}}
                             <button class="block px-3 py-1 text-sm/6 text-gray-900">Accept Order</button>
                         </form>
                     @endif
                     <a href="{{ route('order.show', $order->id) }}" class="block px-3 py-1 text-sm/6 text-gray-900"
                         role="menuitem" tabindex="-1" id="options-menu-1-item-0">View </a>
                 </div>
             </div>
         </div>
     </div>
     <dl class="-my-3 divide-y divide-gray-100 px-6 py-4 text-sm/6">
         <div class="flex justify-between gap-x-4 py-3">
             <dt class="text-gray-500">User</dt>
             <dd class="text-gray-700"><time datetime="2023-01-22">{{ $order->owner->first_name }}</time></dd>
         </div>
         <div class="flex justify-between gap-x-4 py-3">
             <dt class="text-gray-500">Total Price</dt>
             <dd class="flex items-start gap-x-2">
                 <div class="font-medium text-gray-900">&#x20A6;{{ number_format($order->total_amount, 2) }}</div>
                 <div
                     class="rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-green-600/20 ring-inset">
                     {{ $order->name ? 'Active' : 'Inactive' }}</div>
             </dd>
         </div>
     </dl>
 </div>
