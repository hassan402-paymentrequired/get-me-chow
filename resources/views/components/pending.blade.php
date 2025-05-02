 @props(['order' => null])
     <div class="grid grid-cols-4 max-sm:grid-cols-2 items-start justify-between gap-6 py-4">
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

         <div class="ml-auto">
            @if ($order->status === \App\OrderStatusEnum::NOT_PICKED->value)
                   <form action="{{ route('buyer.order.accept', ['order'=>$order]) }}" method="post">
                                        @csrf
                                        @method('PATCH')                                        
                                    <x-primary-button>Accept Order</x-primary-button>
                                </form>
            @else
             <x-primary-link :link="route('order.show', $order->id)">View</x-primary-link>
            @endif
         </div>
     </div>
