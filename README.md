```
Hello world  <div class="sm:col-span-2 sm:col-start-1">
                                <label for="city" class="block text-sm/6 font-medium text-gray-900">City</label>
                                <div class="mt-2">
                                    <input type="text" name="city" id="city"
                                        autocomplete="address-level2"
                                        class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                                </div>
                            </div>

                            <div class="sm:col-span-2">
                                <label for="region" class="block text-sm/6 font-medium text-gray-900">State /
                                    Province</label>
                                <div class="mt-2">
                                    <input type="text" name="region" id="region"
                                        autocomplete="address-level1"
                                        class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                                </div>
                            </div>

                            <div class="sm:col-span-2">
                                <label for="postal-code" class="block text-sm/6 font-medium text-gray-900">ZIP /
                                    Postal code</label>
                                <div class="mt-2">
                                    <input type="text" name="postal-code" id="postal-code"
                                        autocomplete="postal-code"
                                        class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                                </div>
                            </div>
























                             <div class="px-4 py-6 sm:p-8">
                        <div class="max-w-2xl space-y-10 md:col-span-2">
                            <fieldset>
                                <legend class="text-sm/6 font-semibold text-gray-900">By email</legend>
                                <div class="mt-6 space-y-6">
                                    <div class="flex gap-3">
                                        <div class="flex h-6 shrink-0 items-center">
                                            <div class="group grid size-4 grid-cols-1">
                                                <input id="comments" aria-describedby="comments-description"
                                                    name="comments" type="checkbox" checked
                                                    class="col-start-1 row-start-1 appearance-none rounded-sm border border-gray-300 bg-white checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto">
                                                <svg class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-disabled:stroke-gray-950/25"
                                                    viewBox="0 0 14 14" fill="none">
                                                    <path class="opacity-0 group-has-checked:opacity-100"
                                                        d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path class="opacity-0 group-has-indeterminate:opacity-100"
                                                        d="M3 7H11" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="text-sm/6">
                                            <label for="comments" class="font-medium text-gray-900">Comments</label>
                                            <p id="comments-description" class="text-gray-500">Get notified when
                                                someones posts a comment on a posting.</p>
                                        </div>
                                    </div>
                                    <div class="flex gap-3">
                                        <div class="flex h-6 shrink-0 items-center">
                                            <div class="group grid size-4 grid-cols-1">
                                                <input id="candidates" aria-describedby="candidates-description"
                                                    name="candidates" type="checkbox"
                                                    class="col-start-1 row-start-1 appearance-none rounded-sm border border-gray-300 bg-white checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto">
                                                <svg class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-disabled:stroke-gray-950/25"
                                                    viewBox="0 0 14 14" fill="none">
                                                    <path class="opacity-0 group-has-checked:opacity-100"
                                                        d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path class="opacity-0 group-has-indeterminate:opacity-100"
                                                        d="M3 7H11" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="text-sm/6">
                                            <label for="candidates"
                                                class="font-medium text-gray-900">Candidates</label>
                                            <p id="candidates-description" class="text-gray-500">Get notified when a
                                                candidate applies for a job.</p>
                                        </div>
                                    </div>
                                    <div class="flex gap-3">
                                        <div class="flex h-6 shrink-0 items-center">
                                            <div class="group grid size-4 grid-cols-1">
                                                <input id="offers" aria-describedby="offers-description"
                                                    name="offers" type="checkbox"
                                                    class="col-start-1 row-start-1 appearance-none rounded-sm border border-gray-300 bg-white checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto">
                                                <svg class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-disabled:stroke-gray-950/25"
                                                    viewBox="0 0 14 14" fill="none">
                                                    <path class="opacity-0 group-has-checked:opacity-100"
                                                        d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path class="opacity-0 group-has-indeterminate:opacity-100"
                                                        d="M3 7H11" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="text-sm/6">
                                            <label for="offers" class="font-medium text-gray-900">Offers</label>
                                            <p id="offers-description" class="text-gray-500">Get notified when a
                                                candidate accepts or rejects an offer.</p>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>

                            <fieldset>
                                <legend class="text-sm/6 font-semibold text-gray-900">Push notifications</legend>
                                <p class="mt-1 text-sm/6 text-gray-600">These are delivered via SMS to your mobile
                                    phone.</p>
                                <div class="mt-6 space-y-6">
                                    <div class="flex items-center gap-x-3">
                                        <input id="push-everything" name="push-notifications" type="radio" checked
                                            class="relative size-4 appearance-none rounded-full border border-gray-300 bg-white before:absolute before:inset-1 before:rounded-full before:bg-white not-checked:before:hidden checked:border-indigo-600 checked:bg-indigo-600 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:before:bg-gray-400 forced-colors:appearance-auto forced-colors:before:hidden">
                                        <label for="push-everything"
                                            class="block text-sm/6 font-medium text-gray-900">Everything</label>
                                    </div>
                                    <div class="flex items-center gap-x-3">
                                        <input id="push-email" name="push-notifications" type="radio"
                                            class="relative size-4 appearance-none rounded-full border border-gray-300 bg-white before:absolute before:inset-1 before:rounded-full before:bg-white not-checked:before:hidden checked:border-indigo-600 checked:bg-indigo-600 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:before:bg-gray-400 forced-colors:appearance-auto forced-colors:before:hidden">
                                        <label for="push-email" class="block text-sm/6 font-medium text-gray-900">Same
                                            as email</label>
                                    </div>
                                    <div class="flex items-center gap-x-3">
                                        <input id="push-nothing" name="push-notifications" type="radio"
                                            class="relative size-4 appearance-none rounded-full border border-gray-300 bg-white before:absolute before:inset-1 before:rounded-full before:bg-white not-checked:before:hidden checked:border-indigo-600 checked:bg-indigo-600 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:before:bg-gray-400 forced-colors:appearance-auto forced-colors:before:hidden">
                                        <label for="push-nothing" class="block text-sm/6 font-medium text-gray-900">No
                                            push notifications</label>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>















                    <div class="overflow-hidden rounded-xl border border-gray-200">
                            <div class="flex items-center gap-x-4 border-b border-gray-900/5 bg-gray-50 p-6">
                                <div
                                    class="size-12 flex items-center justify-center rounded-lg bg-white ring-1 ring-gray-900/10">
                                    <span
                                        class="text-2xl font-bold text-gray-900 uppercase">{{ substr('SavvyCal', 0, 2) }}</span>
                                </div>
                                <div class="text-sm/6 font-medium text-gray-900">SavvyCal</div>
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
                                    <dt class="text-gray-500">Last invoice</dt>
                                    <dd class="text-gray-700"><time datetime="2023-01-22">January 22, 2023</time></dd>
                                </div>
                                <div class="flex justify-between gap-x-4 py-3">
                                    <dt class="text-gray-500">Amount</dt>
                                    <dd class="flex items-start gap-x-2">
                                        <div class="font-medium text-gray-900">$14,000.00</div>
                                        <div
                                            class="rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-green-600/20 ring-inset">
                                            Paid</div>
                                    </dd>
                                </div>
                            </dl>
                        </div>












                         <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="s">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                    class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
                    name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                    href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif


            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>

    </form>
``












  {{-- <div class="mb-6">
                <div class="flex justify-between flex-wrap gap-2 w-full">
                    <span class="text-gray-700 font-bold">{{ $check->created_at->format('M Y') }}</span>
                    <p>
                        <span>{{ $visitor->created_at->format('gA') }}</span>
                    </p>
                </div>
                <p class="mt-2">
                   {{$check->reason ?? 'No reason specified'}}
                </p>
            </div> --}}