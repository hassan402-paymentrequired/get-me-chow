 <header class="absolute z-10 inset-x-0 top-0  flex h-16 border-b border-gray-900/10" x-data="{ open: false }">
     <div class="mx-auto flex w-full max-w-7xl items-center justify-between px-4 sm:px-6 lg:px-8">
         <div class="flex flex-1 items-center gap-x-6">
             <button type="button" class="-m-3 p-3 md:hidden" @click="open = true">
                 <svg class="size-5 text-gray-900" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"
                     data-slot="icon">
                     <path fill-rule="evenodd"
                         d="M2 4.75A.75.75 0 0 1 2.75 4h14.5a.75.75 0 0 1 0 1.5H2.75A.75.75 0 0 1 2 4.75ZM2 10a.75.75 0 0 1 .75-.75h14.5a.75.75 0 0 1 0 1.5H2.75A.75.75 0 0 1 2 10Zm0 5.25a.75.75 0 0 1 .75-.75h14.5a.75.75 0 0 1 0 1.5H2.75a.75.75 0 0 1-.75-.75Z"
                         clip-rule="evenodd" />
                 </svg>
             </button>
             <img class="h-8 w-auto" src="{{ asset('storage/images/logo.png') }}" alt="Getmechow">
         </div>
         <nav class="hidden md:flex md:gap-x-11 md:text-sm/6 md:font-semibold md:text-gray-700">
             <x-nav-link :href="route(auth()->user()->is_buyer ? 'buyer.dashboard' : 'dashboard')" :active="request()->routeIs(auth()->user()->is_buyer ? 'buyer.dashboard' : 'dashboard')">
                 {{ __('Dashboard') }}
             </x-nav-link>
             @if (auth()->user()->is_buyer)
                 <x-nav-link :href="route('buyer.history.index')" :active="request()->routeIs('buyer.history.index')">
                     {{ __('History') }}
                 </x-nav-link>
             @else
                 <x-nav-link :href="route('owner.history.index')" :active="request()->routeIs('owner.history.index')">
                     {{ __('History') }}
                 </x-nav-link>
                 <x-nav-link :href="route('owner.visitors.index')" :active="request()->routeIs('owner.visitors.index') || request()->has('visitor')">
                     {{ __('Visitor') }}
                 </x-nav-link>
                 <x-nav-link :href="route('order.create')" :active="request()->routeIs('order.create')">
                     {{ __('Create order') }}
                 </x-nav-link>
             @endif
         </nav>
         <div class="flex flex-1 items-center justify-end gap-x-8">
             <button type="button" class="-m-2.5 p-2.5 text-gray-400 hover:text-gray-500">
                 <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                     aria-hidden="true" data-slot="icon">
                     <path stroke-linecap="round" stroke-linejoin="round"
                         d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
                 </svg>
             </button>
             <a href="{{ route('profile.edit') }}" class="-m-1.5 p-1.5">
                 <div class="flex size-8 rounded-full bg-gray-100 items-center justify-center uppercase">
                     {{ substr(auth()->user()->first_name, 0, 2) }}
                 </div>
             </a>
         </div>
     </div>
     <div class="md:hidden" role="dialog" aria-modal="true" x-show="open">
         <div class="fixed inset-0 z-50"></div>
         <div
             class="fixed inset-y-0 left-0 z-50 w-full overflow-y-auto bg-white px-4 pb-6 sm:max-w-sm sm:px-6 sm:ring-1 sm:ring-gray-900/10">
             <div class="-ml-0.5 flex h-16 items-center gap-x-6">
                 <button type="button" class="-m-2.5 p-2.5 text-gray-700" @click="open = false">
                     <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                         aria-hidden="true" data-slot="icon">
                         <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                     </svg>
                 </button>
                 <div class="-ml-0.5">
                     <a href="#" class="-m-1.5 block p-1.5">
                         <img class="h-8 w-auto" src="{{ asset('storage/images/logo.png') }}" alt="">
                     </a>
                 </div>
             </div>
             <div class="mt-2 space-y-2">
                 <x-nav-link :href="route(auth()->user()->is_buyer ? 'buyer.dashboard' : 'dashboard')" :active="request()->routeIs(auth()->user()->is_buyer ? 'buyer.dashboard' : 'dashboard')">
                     {{ __('Dashboard') }}
                 </x-nav-link>
                 @if (auth()->user()->is_buyer)
                     <x-nav-link :href="route('buyer.history.index')" :active="request()->routeIs('buyer.history.index')">
                         {{ __('History') }}
                     </x-nav-link>
                 @else
                     <x-nav-link :href="route('owner.history.index')" :active="request()->routeIs('owner.history.index')">
                         {{ __('History') }}
                     </x-nav-link>
                     <x-nav-link :href="route('owner.visitors.index')" :active="request()->routeIs('owner.visitors.index') || request()->has('visitor')">
                         {{ __('Visitor') }}
                     </x-nav-link>
                     <x-nav-link :href="route('order.create')" :active="request()->routeIs('order.create')">
                         {{ __('Create order') }}
                     </x-nav-link>
                 @endif
             </div>
         </div>
     </div>
 </header>
