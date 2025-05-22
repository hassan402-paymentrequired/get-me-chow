<x-admin-layout>
    <div class="relative isolate overflow-hidden pt-16">
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

    <!-- Counts -->
    <p>Total Visitors: {{ $user->visitor_check_ins_count }}</p>
    <p>Current Visitors: {{ $user->current_visitors_count }}</p>
    <p>Today's Visitors: {{ $user->todays_visitors_count }}</p>

    <!-- Current Visitors List -->
    <h3>Currently Checked In</h3>
    @foreach ($currentVisitors as $checkIn)
        <div>
            <p>Visitor: {{ $checkIn->visitor->name }}</p>
            <p>Check-in: {{ \Carbon\Carbon::parse($checkIn->check_in_time)->format('g:i A') }}</p>
        </div>
    @endforeach

    <!-- Past Visitors List -->
    <h3>Past Visitors</h3>
    @foreach ($pastVisitors as $checkIn)
        <div>
            <p>Visitor: {{ $checkIn->visitor->name }}</p>
            <p>Check-in: {{ \Carbon\Carbon::parse($checkIn->check_in_time)->format('M j, Y g:i A') }}</p>
            <p>Check-out: {{ \Carbon\Carbon::parse($checkIn->check_out_time)->format('M j, Y g:i A') }}</p>
        </div>
    @endforeach

</x-admin-layout>
