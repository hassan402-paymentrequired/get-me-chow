<x-admin-layout>
    <div class="relative isolate overflow-hidden pt-16">
        <header class="pt-6 pb-4 sm:pb-6">
            <div class="mx-auto flex max-w-7xl flex-wrap items-center gap-6 px-4 sm:flex-nowrap sm:px-6 lg:px-8">
                <h1 class="text-base/7 font-semibold text-gray-900">
                    {{ ucwords($user->first_name . ' ' . $user->last_name) }}</h1>
                <div
                    class="order-last flex w-full gap-x-8 text-sm/6 font-semibold sm:order-none sm:w-auto sm:border-l sm:border-gray-200 sm:pl-6 sm:text-sm/7">
                    <x-nav-link :href="route('admin.user.show.orders', $user->id)" :active="request()->routeIs('admin.user.show.orders')">Orders</x-nav-link>
                    <x-nav-link :href="route('admin.user.show.visitors', $user->id)" :active="request()->routeIs('admin.user.show.visitors')">Visitors</x-nav-link>
                </div>
            </div>
        </header>
        <div class="border-b border-b-gray-900/10 lg:border-t lg:border-t-gray-900/5">
            <dl class="mx-auto grid max-w-5xl grid-cols-1 sm:grid-cols-2  lg:px-2 xl:px-0">
                <div
                    class="flex flex-wrap items-baseline justify-between gap-x-4 gap-y-2 border-t border-gray-900/5 px-4 py-10 sm:px-6 lg:border-t-0 lg:border-l xl:px-8">
                    <dt class="text-sm/6 font-medium text-gray-500">Orders</dt>

                    <dd class="w-full flex-none text-3xl/10 font-medium tracking-tight text-gray-900">
                        {{ $user->orders_count }}</dd>
                </div>
                <div
                    class="flex flex-wrap items-baseline justify-between gap-x-4 gap-y-2 border-t border-gray-900/5 px-4 py-10 sm:border-l sm:px-6 lg:border-t-0 xl:px-8">
                    <dt class="text-sm/6 font-medium text-gray-500">Visitors</dt>

                    <dd class="w-full flex-none text-3xl/10 font-medium tracking-tight text-gray-900">
                        {{ $user->visitor_c_heck_count }}</dd>
                </div>
            </dl>
        </div>
    </div>
    @yield('contents')
</x-admin-layout>
