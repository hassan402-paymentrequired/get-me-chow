<x-guest-layout>
    <div class="h-screen flex fle-col items-center justify-center">
        <div class="grid z-50 md:grid-cols-2 items-center max-w-6xl w-full">
            <div
                class="border border-slate-300 bg-[#fefefe] rounded-lg p-6 max-w-md shadow-[0_2px_22px_-4px_rgba(93,96,127,0.2)] max-md:mx-auto relative">
                {{-- <div class="absolute inset-0 bg-black opacity-5"></div> --}}
                <form class="space-y-4 z-50" action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="mb-12">
                        <h3 class="text-slate-900 text-3xl font-semibold">Sign in</h3>
                        {{-- <p class="text-slate-500 text-sm mt-3 leading-relaxed">Sign in to your account and explore a
                                world of possibilities. Your journey begins here.</p> --}}
                    </div>

                    <div>
                        <label class="text-slate-800 text-sm font-medium mb-2 block">User name</label>
                        <div class="relative flex items-center">
                            <input name="email" type="text" required
                                class="w-full text-sm text-slate-800 border border-gray-300 pl-4 pr-10 py-3 rounded outline-none focus:border-none focus:outline-none focus:right-1 focus:ring-black"
                                placeholder="Enter user name" />

                            <svg xmlns="http://www.w3.org/2000/svg" fill="#bbb" stroke="#bbb"
                                class="w-[18px] h-[18px] absolute right-4" viewBox="0 0 24 24">
                                <circle cx="10" cy="7" r="6" data-original="#000000"></circle>
                                <path
                                    d="M14 15H6a5 5 0 0 0-5 5 3 3 0 0 0 3 3h12a3 3 0 0 0 3-3 5 5 0 0 0-5-5zm8-4h-2.59l.3-.29a1 1 0 0 0-1.42-1.42l-2 2a1 1 0 0 0 0 1.42l2 2a1 1 0 0 0 1.42 0 1 1 0 0 0 0-1.42l-.3-.29H22a1 1 0 0 0 0-2z"
                                    data-original="#000000"></path>
                            </svg>
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                    <div>
                        <label class="text-slate-800 text-sm font-medium mb-2 block">Password</label>
                        <div x-data="{ show: false }" class="relative flex items-center">
                            <input :type="show ? 'text' : 'password'" name="password" required
                                class="w-full text-sm text-slate-800 border border-slate-300 pl-4 pr-10 py-3 rounded outline-none focus:border-none focus:outline-none focus:right-1 focus:ring-black"
                                placeholder="Enter password" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            <svg @click="show = !show" x-show="!show" xmlns="http://www.w3.org/2000/svg" fill="#bbb"
                                stroke="#bbb" class="w-[18px] h-[18px] absolute right-4 cursor-pointer"
                                viewBox="0 0 128 128">
                                <path
                                    d="M64 104C22.127 104 1.367 67.496.504 65.943a4 4 0 0 1 0-3.887C1.367 60.504 22.127 24 64 24s62.633 36.504 63.496 38.057a4 4 0 0 1 0 3.887C126.633 67.496 105.873 104 64 104zM8.707 63.994C13.465 71.205 32.146 96 64 96c31.955 0 50.553-24.775 55.293-31.994C114.535 56.795 95.854 32 64 32 32.045 32 13.447 56.775 8.707 63.994zM64 88c-13.234 0-24-10.766-24-24s10.766-24 24-24 24 10.766 24 24-10.766 24-24 24zm0-40c-8.822 0-16 7.178-16 16s7.178 16 16 16 16-7.178 16-16-7.178-16-16-16z"
                                    data-original="#000000"></path>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" @click="show = !show" x-show="show" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-[18px] h-[18px] absolute right-4 cursor-pointer">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                            </svg>

                        </div>
                    </div>

                    <div class="flex flex-wrap items-center justify-between gap-4">
                        <div class="flex items-center">
                            <input id="remember-me" checked name="remember_me" type="checkbox"
                                class="h-4 w-4 shrink-0 text-black focus:ring-black border-slate-300 rounded" />
                            <label for="remember-me" class="ml-3 block text-sm text-slate-500">
                                Remember me
                            </label>
                        </div>

                        <div class="text-sm">
                            <a href="jajvascript:void(0);" class="text-black  hover:underline font-medium">
                                Forgot your password?
                            </a>
                        </div>
                    </div>

                    <div class="!mt-12">
                        <button type="submit"
                            class="w-full shadow-xl py-2.5 px-4 text-[15px] font-medium tracking-wide rounded-lg text-white bg-black hover:bg-neutral-700 focus:outline-none">
                            Sign in
                        </button>

                    </div>
                </form>
            </div>
        </div>
        <div class="absolute inset-0 w-full h-full isolate nice">
            <img src="{{ asset('/storage/images/chow-bg.jpeg') }}" class="w-full h-full object-cover" alt="login img" />
            <div class="absolute inset-0 bg-black opacity-50"></div>
        </div>
    </div>
</x-guest-layout>
