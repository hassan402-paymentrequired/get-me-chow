<x-admin-layout>
    <div class="mx-auto max-w-7xl pt-16 lg:flex lg:gap-x-16 lg:px-8">
        <div class="divide-y divide-gray-900/10">


            <div class="grid grid-cols-1 gap-x-8 gap-y-8 py-10 md:grid-cols-3">
                <div class="px-4 sm:px-0">
                    <h2 class="text-base/7 font-semibold text-gray-900">Personal Information</h2>
                    <p class="mt-1 text-sm/6 text-gray-600">Use a permanent address where you can receive mail.</p>
                </div>

                <form class="bg-white shadow-xs ring-1 ring-gray-900/5 sm:rounded-xl md:col-span-2">
                    <div class="px-4 py-6 sm:p-8">
                        <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                            <div class="sm:col-span-3">
                                <label for="first-name" class="block text-sm/6 font-medium text-gray-900">First
                                    name</label>
                                <div class="mt-2">
                                    <input type="text" name="first_name" id="first-name" autocomplete="given-name"
                                        {{-- value="{{auth()->user()->first_name }}" --}}
                                        class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-black sm:text-sm/6">
                                </div>
                            </div>

                            <div class="sm:col-span-3">
                                <label for="last-name" class="block text-sm/6 font-medium text-gray-900">Last
                                    name</label>
                                <div class="mt-2">
                                    <input type="text" name="last-name" id="last-name" autocomplete="family-name"
                                        class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-black sm:text-sm/6">
                                </div>
                            </div>

                            <div class="sm:col-span-full">
                                <label for="email" class="block text-sm/6 font-medium text-gray-900">Email
                                    address</label>
                                <div class="mt-2">
                                    <input id="email" name="email" type="email" autocomplete="email"
                                        class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-black sm:text-sm/6">
                                </div>
                            </div>

                            <div class="col-span-full">
                                <label for="street-address" class="block text-sm/6 font-medium text-gray-900">
                                    Phone No
                                </label>
                                <div class="mt-2">
                                    <input type="text" name="street-address" id="street-address"
                                        autocomplete="street-address"
                                        class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-black sm:text-sm/6">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center justify-end gap-x-6 border-t border-gray-900/10 px-4 py-4 sm:px-8">
                        <button type="button" class="text-sm/6 font-semibold text-gray-900">Cancel</button>
                        <button type="submit"
                            class="rounded bg-black px-3 py-2 text-sm font-semibold text-white shadow-xs focus:ring-2 focus:ring-black focus:ring-offset-2">Save</button>
                    </div>
                </form>
            </div>

            <div class="grid grid-cols-1 gap-x-8 gap-y-8 py-10 md:grid-cols-3">
                <div class="px-4 sm:px-0">
                    <h2 class="text-base/7 font-semibold text-gray-900">Edit Buyer</h2>
                    <p class="mt-1 text-sm/6 text-gray-600">Edit buyer for the current day.</p>
                </div>

                <form class="bg-white shadow-xs ring-1 ring-gray-900/5 sm:rounded-xl md:col-span-2">
                    <div class="px-4 py-6 sm:p-8">
                        <div class="overflow-hidden rounded-xl border border-gray-200">
                            <div class="flex items-center gap-x-4 border-b border-gray-900/5 bg-gray-50 p-6">
                                <div
                                    class="size-12 flex items-center justify-center rounded-lg bg-white ring-1 ring-gray-900/10">
                                    <span
                                        class="text-2xl font-bold text-gray-900 uppercase">{{ substr($currentBuyer->first_name, 0, 2) }}</span>
                                </div>
                                <div class="text-sm/6 font-medium text-gray-900">{{ $currentBuyer->first_name }}</div>
                                <div class="relative ml-auto">
                                    <div x-data="{ open: false }" class="relative">
                                        <button @click="open = !open" type="button"
                                            class="-m-2.5 block p-2.5 text-gray-400 hover:text-gray-500"
                                            id="options-menu-1-button" aria-expanded="false" aria-haspopup="true">
                                            <span class="sr-only">Open options</span>
                                            <svg class="size-5" viewBox="0 0 20 20" fill="currentColor"
                                                aria-hidden="true" data-slot="icon">
                                                <path
                                                    d="M3 10a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0ZM8.5 10a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0ZM15.5 8.5a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3Z" />
                                            </svg>
                                        </button>

                                        <div x-show="open" @click.away="open = false"
                                            class="absolute right-0 z-10 mt-0.5 w-32 origin-top-right rounded-md bg-white py-2 shadow-lg ring-1 ring-gray-900/5 focus:outline-hidden"
                                            role="menu" aria-orientation="vertical"
                                            aria-labelledby="options-menu-1-button" tabindex="-1">
                                            <a href="#" class="block px-3 py-1 text-sm/6 text-gray-900"
                                                role="menuitem" tabindex="-1" id="options-menu-1-item-0">View<span
                                                    class="sr-only">,
                                                    SavvyCal</span></a>
                                            <a href="#" class="block px-3 py-1 text-sm/6 text-gray-900"
                                                role="menuitem" tabindex="-1" id="options-menu-1-item-1">Edit<span
                                                    class="sr-only">,
                                                    SavvyCal</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <dl class="-my-3 divide-y divide-gray-100 px-6 py-4 text-sm/6">
                                <div class="flex justify-between gap-x-4 py-3">
                                    <dt class="text-gray-500">Email</dt>
                                    <dd class="text-gray-700"><time datetime="2023-01-22">{{$currentBuyer->email}}</time></dd>
                                </div>
                                <div class="flex justify-between gap-x-4 py-3">
                                    <dt class="text-gray-500">Phone No</dt>
                                    <dd class="flex items-start gap-x-2">
                                        <div class="font-medium text-gray-900">{{$currentBuyer->phone_no}}</div>
                                        <div
                                            class="rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-green-600/20 ring-inset">
                                            {{$currentBuyer->is_active ? 'Active' : 'Inactive'}}</div>
                                    </dd>
                                </div>
                            </dl>
                        </div>
                        {{-- select --}}
                        <div class="sm:col-span-3 mt-3">
                            <label for="country" class="block text-sm/6 font-medium text-gray-900">Change today's
                                buyer</label>
                            <div class="mt-2 grid grid-cols-1">
                                <select id="country" name="country" autocomplete="country-name"
                                    class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-1.5 pr-8 pl-3 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 focus:outline-2 focus:-outline-offset-2 focus:outline-black sm:text-sm/6">
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->first_name }}
                                            {{ $user->last_name }}</option>
                                    @endforeach
                                </select>
                                <svg class="pointer-events-none col-start-1 row-start-1 mr-2 size-5 self-center justify-self-end text-gray-500 sm:size-4"
                                    viewBox="0 0 16 16" fill="currentColor" aria-hidden="true" data-slot="icon">
                                    <path fill-rule="evenodd"
                                        d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>

                    </div>
                    <div class="flex items-center justify-end gap-x-6 border-t border-gray-900/10 px-4 py-4 sm:px-8">
                        <button type="button" class="text-sm/6 font-semibold text-gray-900">Cancel</button>
                        <button type="submit"
                            class="rounded-md bg-black px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-neutral-500">Save</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</x-admin-layout>
