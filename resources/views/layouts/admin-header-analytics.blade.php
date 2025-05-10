        <div class="relative isolate overflow-hidden pt-16">
            <header class="pt-6 pb-4 sm:pb-6">
                <div class="mx-auto flex max-w-7xl flex-wrap items-center gap-6 px-4 sm:flex-nowrap sm:px-6 lg:px-8">
                    <h1 class="text-base/7 font-semibold text-gray-900">Order Flow</h1>
                    <div
                        class="order-last flex w-full gap-x-8 text-sm/6 font-semibold sm:order-none sm:w-auto sm:border-l sm:border-gray-200 sm:pl-6 sm:text-sm/7">
                        <x-nav-link :href="route('admin.index', ['period' => 'today'])" :active="request()->get('period') === 'today' || request()->get('period') === null">Today</x-nav-link>
                        <x-nav-link :href="route('admin.index', ['period' => 'week'])" :active="request()->get('period') === 'week'">This Week</x-nav-link>
                        <x-nav-link :href="route('admin.index', ['period' => 'month'])" :active="request()->get('period') === 'month'">This Month</x-nav-link>
                    </div>
                    <a href="{{ route('admin.visitors.create') }}"
                        class="ml-auto flex items-center gap-x-1 rounded-md bg-black px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-stone-500 focus-visible:outline-2 ">
                        <svg class="-ml-1.5 size-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"
                            data-slot="icon">
                            <path
                                d="M10.75 6.75a.75.75 0 0 0-1.5 0v2.5h-2.5a.75.75 0 0 0 0 1.5h2.5v2.5a.75.75 0 0 0 1.5 0v-2.5h2.5a.75.75 0 0 0 0-1.5h-2.5v-2.5Z" />
                        </svg>
                        Add Visitor
                    </a>
                </div>
            </header>

            <!-- Stats -->
            <div class="border-b border-b-gray-900/10 lg:border-t lg:border-t-gray-900/5">
                <dl class="mx-auto grid max-w-7xl grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 lg:px-2 xl:px-0">
                    <div
                        class="flex flex-wrap items-baseline justify-between gap-x-4 gap-y-2 border-t border-gray-900/5 px-4 py-10 sm:px-6 lg:border-t-0 xl:px-8">
                        <dt class="text-sm/6 font-medium text-gray-500">Total Orders</dt>

                        <dd class="w-full flex-none text-3xl/10 font-medium tracking-tight text-gray-900">
                            {{ $data['ordersCount'] }}</dd>
                    </div>
                    <div
                        class="flex flex-wrap items-baseline justify-between gap-x-4 gap-y-2 border-t border-gray-900/5 px-4 py-10 sm:border-l sm:px-6 lg:border-t-0 xl:px-8">
                        <dt class="text-sm/6 font-medium text-gray-500">Total Visitors</dt>

                        <dd class="w-full flex-none text-3xl/10 font-medium tracking-tight text-gray-900">
                            {{ $data['visitorsCount'] }}</dd>
                    </div>
                    <div
                        class="flex flex-wrap items-baseline justify-between gap-x-4 gap-y-2 border-t border-gray-900/5 px-4 py-10 sm:px-6 lg:border-t-0 lg:border-l xl:px-8">
                        <dt class="text-sm/6 font-medium text-gray-500">Completed Orders</dt>

                        <dd class="w-full flex-none text-3xl/10 font-medium tracking-tight text-gray-900">{{$data['totalCompletedOrder']}}</dd>
                    </div>
                    <div
                        class="flex flex-wrap items-baseline justify-between gap-x-4 gap-y-2 border-t border-gray-900/5 px-4 py-10 sm:border-l sm:px-6 lg:border-t-0 xl:px-8">
                        <dt class="text-sm/6 font-medium text-gray-500">Cancelled Orders</dt>

                        <dd class="w-full flex-none text-3xl/10 font-medium tracking-tight text-gray-900">{{$data['totalCancelOrder']}}</dd>
                    </div>
                </dl>
            </div>

            <div class="absolute top-full left-0 -z-10 mt-96 origin-top-left translate-y-40 -rotate-90 transform-gpu opacity-20 blur-3xl sm:left-1/2 sm:-mt-10 sm:-ml-96 sm:translate-y-0 sm:rotate-0 sm:transform-gpu sm:opacity-50"
                aria-hidden="true">
                <div class="aspect-1154/678 w-[72.125rem] bg-linear-to-br from-[#FF80B5] to-[#9089FC]"
                    style="clip-path: polygon(100% 38.5%, 82.6% 100%, 60.2% 37.7%, 52.4% 32.1%, 47.5% 41.8%, 45.2% 65.6%, 27.5% 23.4%, 0.1% 35.3%, 17.9% 0%, 27.7% 23.4%, 76.2% 2.5%, 74.2% 56%, 100% 38.5%)">
                </div>
            </div>
        </div>
