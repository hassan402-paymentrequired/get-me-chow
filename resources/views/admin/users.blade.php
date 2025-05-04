<x-admin-layout>
    <div class="relative isolate overflow-hidden pt-16">
        <div class="border-b border-b-gray-900/10 lg:border-t lg:border-t-gray-900/5">
            <dl class="mx-auto grid max-w-5xl grid-cols-1 sm:grid-cols-2  lg:px-2 xl:px-0">
                <div
                    class="flex flex-wrap items-baseline justify-between gap-x-4 gap-y-2 border-t border-gray-900/5 px-4 py-10 sm:px-6 lg:border-t-0 lg:border-l xl:px-8">
                    <dt class="text-sm/6 font-medium text-gray-500">Users</dt>

                    <dd class="w-full flex-none text-3xl/10 font-medium tracking-tight text-gray-900">
                        {{ count($users['users']) }}</dd>
                </div>
                <div
                    class="flex flex-wrap items-baseline justify-between gap-x-4 gap-y-2 border-t border-gray-900/5 px-4 py-10 sm:border-l sm:px-6 lg:border-t-0 xl:px-8">
                    <dt class="text-sm/6 font-medium text-gray-500">Workers</dt>

                    <dd class="w-full flex-none text-3xl/10 font-medium tracking-tight text-gray-900">
                        {{ count($users['buyers']) }}</dd>
                </div>
            </dl>
        </div>
    </div>

    <div class="mt-6 overflow-hidden border-t border-gray-100">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-2xl lg:mx-0 lg:max-w-none">
                @include('components.admin-users-table')
            </div>
        </div>
    </div>

</x-admin-layout>
