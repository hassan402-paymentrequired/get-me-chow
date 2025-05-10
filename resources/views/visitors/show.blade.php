@extends('layouts.visitor.app')
@section('contents')
    <div class="p-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div class="flex items-center gap-2">
            <span class="text-sm text-gray-500">Name:</span>
            <h2 class="text-base font-semibold">{{ $visitor->name }}</h2>
            </div>
            <div class="flex items-center gap-2">
            <span class="text-sm text-gray-500">Phone:</span>
            <h2 class="text-base font-semibold">{{ $visitor->phone }}</h2>
            </div>
            <div class="flex items-center gap-2">
            <span class="text-sm text-gray-500">Email:</span>
            <h2 class="text-base font-semibold">{{ $visitor->email }}</h2>
            </div>
            <div class="flex items-center gap-2">
            <span class="text-sm text-gray-500">Host:</span>
            <h2 class="text-base font-semibold">{{ $visitor->user->first_name . ' ' . $visitor->user->last_name }}</h2>
            </div>
        </div>



        <h2 class="text-sm font-semibold text-gray-500 underline mt-6 mb-4">Visitor Check ins</h2>
        <div>
            @foreach ($visitor->checkins as $check)
                <div class="flex gap-x-3 hover:bg-gray-100 p-2 rounded">
                    <!-- Left Content -->
                    <div class="min-w-14 text-end">
                        <span class="text-xs text-gray-500 ">{{ $check->created_at->format('h:i A') }}</span>
                    </div>
                    <!-- End Left Content -->

                    <!-- Icon -->
                    <div
                        class="relative last:after:hidden after:absolute after:top-7 after:bottom-0 after:start-3.5 after:w-px after:-translate-x-[0.5px] after:bg-gray-200">
                        <div class="relative z-10 size-7 flex justify-center items-center">
                            <div class="size-2 rounded-full bg-gray-400"></div>
                        </div>
                    </div>
                    <!-- End Icon -->

                    <!-- Right Content -->
                    <div class="grow pt-0.5 pb-8 gap-2">
                        <h3 class="flex gap-x-1.5 font-semibold text-gray-800">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-6 mr-2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 3.75H6.912a2.25 2.25 0 0 0-2.15 1.588L2.35 13.177a2.25 2.25 0 0 0-.1.661V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18v-4.162c0-.224-.034-.447-.1-.661L19.24 5.338a2.25 2.25 0 0 0-2.15-1.588H15M2.25 13.5h3.86a2.25 2.25 0 0 1 2.012 1.244l.256.512a2.25 2.25 0 0 0 2.013 1.244h3.218a2.25 2.25 0 0 0 2.013-1.244l.256-.512a2.25 2.25 0 0 1 2.013-1.244h3.859M12 3v8.25m0 0-3-3m3 3 3-3" />
                            </svg>

                            Checked in on {{ $check->created_at->format('M d') }}
                        </h3>
                        <p class="mt-1 text-sm text-gray-600">
                            {{ $check->reason ?? 'No reason specified' }}
                        </p>
                        <button type="button"
                            class="mt-1 -ms-1 p-1 inline-flex items-center gap-x-2 text-xs rounded-lg border border-transparent text-gray-500 hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none">
                            <span class="shrink-0 size-5 flex items-center justify-center rounded-full bg-gray-100">
                                {{ '23' }}
                            </span>
                            {{ $check->visitor->name }}
                        </button>
                    </div>
                    <!-- End Right Content -->
                </div>
            @endforeach
        </div>
    </div>
 
@endsection
