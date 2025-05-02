<!-- component -->


<div class="flex justify-start item-start space-y-2 flex-col">
    <h1 class="text-3xl dark:text-white lg:text-4xl font-semibold leading-7 lg:leading-9 text-neutral-800">Your Order
    </h1>
    <p class="text-base dark:text-neutral-300 font-medium leading-6 text-neutral-600">Today</p>
</div>



<div
    class="mt-10 flex flex-col  jusitfy-center items-stretch w-full xl:space-y-8 space-y-4 md:space-y-6 xl:space-x-0">
    @forelse  ($orders as $order)
        <a href="{{ route('order.show', ['order' => $order]) }}"
            class="flex flex-col justify-start items-start w-full space-y-4 md:space-y-2 xl:space-y-8 hover:scale-105 transition-all duration-200 ease-in-out">
            <div
                class="flex flex-col justify-start items-start dark:bg-neutral-800 bg-neutral-50 px-4 py-4 md:py-2 md:p-6 xl:p-8 w-full">
                <div
                    class="mt-6 md:mt-0 flex justify-start flex-col md:flex-row items-start md:items-center space-y-4 md:space-x-6 xl:space-x-8 w-full">
                    <div class="bg-gray-100 p-2 rounded-lg w-24 h-24 shrink-0 flex items-center justify-center">
                 <span class="text-gray-800 font-bold text-xl"
                                                      >
                                                      {{ucwords($order->name)}}
                                                      </span>
             </div>
                    <div class="flex justify-between items-start w-full flex-col md:flex-row space-y-4 md:space-y-0">
                        <div class="w-full flex flex-col justify-start items-start space-y-2">
                            <h3 class="text-xl dark:text-white xl:text-2xl font-semibold leading-6 text-neutral-800">
                                {{ ucwords($order->name) }}
                            </h3>

                            <p class="text-sm dark:text-white leading-none text-neutral-800"><span
                                    class="dark:text-neutral-400 text-neutral-300">Total:
                                </span>{{ $order->items_count }} items</p>


                        </div>
                        <div class="flex justify-end space-x-8 items-end  w-full">
                            <p class="text-base dark:text-white xl:text-lg leading-6">
                                {{ $currency }}{{ number_format($order->total_amount, 2) }}</p>

                        </div>
                    </div>
                </div>


            </div>
        </a>
    @empty
        <div class="flex justify-center items-center w-full h-64 rounded-lg shadow-md">
            <p class="text-gray-500">No orders found.</p>
        </div>
        
    @endforelse
</div>
