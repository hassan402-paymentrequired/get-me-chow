<x-admin-layout>
    @include('layouts.admin-header-analytics')
    <div class="space-y-16 py-16 xl:space-y-20">
        <div>
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <h2 class="mx-auto max-w-2xl text-base font-semibold text-gray-900 lg:mx-0 lg:max-w-none">
                    Recent Orders
                </h2>
            </div>
            <div class="mt-6 overflow-hidden border-t border-gray-100">
                <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                    <div class="mx-auto max-w-2xl lg:mx-0 lg:max-w-none">
                        @include('layouts.admin-recent-order')
                    </div>
                </div>
            </div>
        </div>
        @include('components.admin-recent-visitor-card')

    </div>
</x-admin-layout>
