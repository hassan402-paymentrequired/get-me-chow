<x-app-layout>
    <h2 class="text-xl font-bold text-gray-800 mb-4">Orders for {{ now()->format('F j, Y') }}</h2>

    @forelse ($orders as $order)
        <div class="order-section">
            <h4 class="text-lg font-semibold text-gray-700">Ordered by: {{ $order->user->name ?? 'Unknown User' }}</h4>
            <p class="text-sm text-gray-600">Status: {{ ucfirst($order->status) }}</p>
            <p class="text-sm text-gray-600 mb-2">Time: {{ $order->created_at->format('h:i A') }}</p>

            <table>
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>Qty</th>
                        <th>Notes</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order->items as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ $item->notes ?? '-' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @empty
        <p class="text-gray-600">No orders found for today.</p>
    @endforelse
</x-app-layout>
