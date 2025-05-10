<x-admin-layout>
    <div class="mx-auto max-w-7xl pt-16 md:flex ">
        <div class="w-full md:w-[300px] border md:p-5 p-3 lg:h-screen overflow-auto overflow-x-auto">
            <div class="l">
                <div class="mt-2 md:space-y-2 space-x-2 md:space-x-0 md:px-5  flex md:flex-col flex-row">
                    @if (auth()->user()->is_admin)
                        <x-nav-link :active="request()->routeIs('admin.visitors.index')" href="{{ route('admin.visitors.index') }}">All</x-nav-link>
                        <x-nav-link href="{{ route('admin.visitors.request') }}" :active="request()->routeIs('admin.visitors.request')">Request</x-nav-link>
                        <x-nav-link href="{{ route('admin.visitors.history') }}" :active="request()->routeIs('admin.visitors.history')">History</x-nav-link>
                        <x-nav-link href="{{ route('admin.visitors.create') }}" :active="request()->routeIs('admin.visitors.create')">Add Visitor</x-nav-link>
                    @endif 
                    @if (!auth()->user()->is_admin)
                        <x-nav-link :active="request()->routeIs('owner.visitors.index')" href="{{ route('owner.visitors.index') }}">All</x-nav-link>
                        <x-nav-link href="{{ route('owner.visitors.history') }}" :active="request()->routeIs('owner.visitors.history')">History</x-nav-link>
                    @endif
                </div>
            </div>
        </div>


        <div class="flex-grow">
            @yield('contents')
        </div>

    </div>
</x-admin-layout>
