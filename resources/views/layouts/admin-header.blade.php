<header x-data="{ open: false }" class="absolute inset-x-0 top-0 z-50 flex h-16 border-b border-gray-900/10">
    <div class="mx-auto flex w-full max-w-7xl items-center justify-between px-4 sm:px-6 lg:px-8">
        <div class="flex flex-1 items-center gap-x-6">
            <button @click="open = true" type="button" class="-m-3 p-3 md:hidden">
                <span class="sr-only">Open main menu</span>
                <svg class="size-5 text-gray-900" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"
                    data-slot="icon">
                    <path fill-rule="evenodd"
                        d="M2 4.75A.75.75 0 0 1 2.75 4h14.5a.75.75 0 0 1 0 1.5H2.75A.75.75 0 0 1 2 4.75ZM2 10a.75.75 0 0 1 .75-.75h14.5a.75.75 0 0 1 0 1.5H2.75A.75.75 0 0 1 2 10Zm0 5.25a.75.75 0 0 1 .75-.75h14.5a.75.75 0 0 1 0 1.5H2.75a.75.75 0 0 1-.75-.75Z"
                        clip-rule="evenodd" />
                </svg>
            </button>
            <img class="h-8 w-auto" src="{{ asset('storage/images/logo.png') }}" alt="INITS">
        </div>
        <nav class="hidden md:flex md:gap-x-11 md:text-sm/6 md:font-semibold md:text-gray-700">
            <x-nav-link :href="route('admin.index')" :active="request()->routeIs('admin.index')">
                {{ __('Dashboard') }}
            </x-nav-link>
            <x-nav-link :href="route('admin.users')" :active="request()->routeIs('admin.users')">
                {{ __('Users') }}
            </x-nav-link>
            <x-nav-link :href="route('admin.settings')" :active="request()->routeIs('admin.settings')">
                {{ __('Settings') }}
            </x-nav-link>
            <x-nav-link :href="route('admin.visitors.index')" :active="request()->routeIs('admin.visitors.index')">
                {{ __('Visitors') }}
            </x-nav-link>
        </nav>
        <div class="flex flex-1 items-center justify-end gap-x-8">
            <button type="button" class="-m-2.5 p-2.5 text-gray-400 hover:text-gray-500">
                <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                    aria-hidden="true" data-slot="icon">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
                </svg>
            </button>
            <div class="-m-1.5 p-1.5 relative" x-data="{ log: false }">
                <div @click="log = true"
                    class="flex cursor-pointer size-8 rounded-full bg-gray-100 items-center justify-center uppercase">
                    {{ substr(auth()->user()->first_name, 0, 2) }}
                </div>

                <div class=" absolute top-10 right-2 " x-show="log" @click.away="log = false">
                    <form method="POST" class="w-[100px]" action="{{ route('logout') }}">
                        @csrf

                        <x-danger-button>{{ __('Log Out') }}</x-danger-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Mobile menu, show/hide based on menu open state. -->
    <div x-show="open" class="lg:hidden" role="dialog" aria-modal="true">
        <!-- Background backdrop -->
        <div class="fixed inset-0 z-50 bg-black/50" @click="open = false"></div>
        <div
            class="fixed inset-y-0 left-0 z-50 w-full overflow-y-auto bg-white px-4 pb-6 sm:max-w-sm sm:px-6 sm:ring-1 sm:ring-gray-900/10">
            <div class="-ml-0.5 flex h-16 items-center gap-x-6">
                <button @click="open = false" type="button" class="-m-2.5 p-2.5 text-gray-700">
                    <span class="sr-only">Close menu</span>
                    <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                        aria-hidden="true" data-slot="icon">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </button>
                <div class="-ml-0.5">
                    <a href="#" class="-m-1.5 block p-1.5">
                        <span class="sr-only">Your Company</span>
                        <img class="h-8 w-auto" src="{{ asset('storage/images/logo.png') }}" alt="INITS getmechow">
                    </a>
                </div>
            </div>
            <div class="mt-2 space-y-2">
                {{-- <nav class="hidden md:flex md:gap-x-11 md:text-sm/6 md:font-semibold md:text-gray-700"> --}}
                    <x-nav-link :href="route('admin.index')" :active="request()->routeIs('admin.index')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    <x-nav-link :href="route('admin.users')" :active="request()->routeIs('admin.users')">
                        {{ __('Users') }}
                    </x-nav-link>
                    <x-nav-link :href="route('admin.settings')" :active="request()->routeIs('admin.settings')">
                        {{ __('Settings') }}
                    </x-nav-link>
                    <x-nav-link :href="route('admin.visitors.index')" :active="request()->routeIs('admin.visitors.index')">
                        {{ __('Visitors') }}
                    </x-nav-link>
                {{-- </nav> --}}
            </div>
        </div>
    </div>
</header>
