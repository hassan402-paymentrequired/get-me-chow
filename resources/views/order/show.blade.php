<x-user-layout>
    <div class="mx-auto max-w-7xl px-4 py-24 sm:px-6 lg:px-8 isolate relative">
        <div
            class="mx-auto grid max-w-2xl grid-cols-1 grid-rows-1 items-start gap-x-8 gap-y-8 lg:mx-0 lg:max-w-none lg:grid-cols-3">
            <!-- Invoice summary -->
            <div class="lg:col-start-3 lg:row-end-1">
                <h2 class="sr-only">Summary</h2>
                <div class="rounded-lg bg-gray-50 shadow-sm ring-1 ring-gray-900/5">
                    <dl class="flex flex-wrap">
                        <div class="flex-auto pl-6 pt-6">
                            <dt class="text-sm/6 font-semibold text-gray-900">Amount</dt>
                            <dd class="mt-1 text-base font-semibold text-gray-900">
                                &#x20A6;{{ number_format($order->total_amount, 2) }}</dd>
                        </div>
                        <div class="flex-none self-end px-6 pt-4">
                            <dt class="sr-only">Status</dt>
                            <dd
                                class="rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-600 ring-1 ring-inset ring-green-600/20">
                                Paid</dd>
                        </div>
                        <div class="mt-6 flex w-full flex-none gap-x-4 border-t border-gray-900/5 px-6 pt-6">
                            <dt class="flex-none">
                                <span class="sr-only">User</span>
                                <svg class="h-6 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor"
                                    aria-hidden="true" data-slot="icon">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 1 1-16 0 8 8 0 0 1 16 0Zm-5.5-2.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0ZM10 12a5.99 5.99 0 0 0-4.793 2.39A6.483 6.483 0 0 0 10 16.5a6.483 6.483 0 0 0 4.793-2.11A5.99 5.99 0 0 0 10 12Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </dt>
                            <dd class="text-sm/6 font-medium text-gray-900">
                                {{ ucwords($order->owner->first_name . ' ' . $order->owner->last_name) }}</dd>
                        </div>
                        <div class="mt-4 flex w-full flex-none gap-x-4 px-6">
                            <dt class="flex-none">
                                <span class="sr-only">Due date</span>
                                <svg class="h-6 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor"
                                    aria-hidden="true" data-slot="icon">
                                    <path
                                        d="M5.25 12a.75.75 0 0 1 .75-.75h.01a.75.75 0 0 1 .75.75v.01a.75.75 0 0 1-.75.75H6a.75.75 0 0 1-.75-.75V12ZM6 13.25a.75.75 0 0 0-.75.75v.01c0 .414.336.75.75.75h.01a.75.75 0 0 0 .75-.75V14a.75.75 0 0 0-.75-.75H6ZM7.25 12a.75.75 0 0 1 .75-.75h.01a.75.75 0 0 1 .75.75v.01a.75.75 0 0 1-.75.75H8a.75.75 0 0 1-.75-.75V12ZM8 13.25a.75.75 0 0 0-.75.75v.01c0 .414.336.75.75.75h.01a.75.75 0 0 0 .75-.75V14a.75.75 0 0 0-.75-.75H8ZM9.25 10a.75.75 0 0 1 .75-.75h.01a.75.75 0 0 1 .75.75v.01a.75.75 0 0 1-.75.75H10a.75.75 0 0 1-.75-.75V10ZM10 11.25a.75.75 0 0 0-.75.75v.01c0 .414.336.75.75.75h.01a.75.75 0 0 0 .75-.75V12a.75.75 0 0 0-.75-.75H10ZM9.25 14a.75.75 0 0 1 .75-.75h.01a.75.75 0 0 1 .75.75v.01a.75.75 0 0 1-.75.75H10a.75.75 0 0 1-.75-.75V14ZM12 9.25a.75.75 0 0 0-.75.75v.01c0 .414.336.75.75.75h.01a.75.75 0 0 0 .75-.75V10a.75.75 0 0 0-.75-.75H12ZM11.25 12a.75.75 0 0 1 .75-.75h.01a.75.75 0 0 1 .75.75v.01a.75.75 0 0 1-.75.75H12a.75.75 0 0 1-.75-.75V12ZM12 13.25a.75.75 0 0 0-.75.75v.01c0 .414.336.75.75.75h.01a.75.75 0 0 0 .75-.75V14a.75.75 0 0 0-.75-.75H12ZM13.25 10a.75.75 0 0 1 .75-.75h.01a.75.75 0 0 1 .75.75v.01a.75.75 0 0 1-.75.75H14a.75.75 0 0 1-.75-.75V10ZM14 11.25a.75.75 0 0 0-.75.75v.01c0 .414.336.75.75.75h.01a.75.75 0 0 0 .75-.75V12a.75.75 0 0 0-.75-.75H14Z" />
                                    <path fill-rule="evenodd"
                                        d="M5.75 2a.75.75 0 0 1 .75.75V4h7V2.75a.75.75 0 0 1 1.5 0V4h.25A2.75 2.75 0 0 1 18 6.75v8.5A2.75 2.75 0 0 1 15.25 18H4.75A2.75 2.75 0 0 1 2 15.25v-8.5A2.75 2.75 0 0 1 4.75 4H5V2.75A.75.75 0 0 1 5.75 2Zm-1 5.5c-.69 0-1.25.56-1.25 1.25v6.5c0 .69.56 1.25 1.25 1.25h10.5c.69 0 1.25-.56 1.25-1.25v-6.5c0-.69-.56-1.25-1.25-1.25H4.75Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </dt>
                            <dd class="text-sm/6 text-gray-500">
                                <time
                                    datetime="{{ $order->created_at }}">{{ $order->created_at->format('D H:i A') }}</time>
                            </dd>
                        </div>
                        {{-- <div class="mt-4 flex w-full flex-none gap-x-4 px-6">
                            <dt class="flex-none">
                                <span class="sr-only">Status</span>
                                <svg class="h-6 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor"
                                    aria-hidden="true" data-slot="icon">
                                    <path fill-rule="evenodd"
                                        d="M2.5 4A1.5 1.5 0 0 0 1 5.5V6h18v-.5A1.5 1.5 0 0 0 17.5 4h-15ZM19 8.5H1v6A1.5 1.5 0 0 0 2.5 16h15a1.5 1.5 0 0 0 1.5-1.5v-6ZM3 13.25a.75.75 0 0 1 .75-.75h1.5a.75.75 0 0 1 0 1.5h-1.5a.75.75 0 0 1-.75-.75Zm4.75-.75a.75.75 0 0 0 0 1.5h3.5a.75.75 0 0 0 0-1.5h-3.5Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </dt>
                            <dd class="text-sm/6 text-gray-500">Paid with MasterCard</dd>
                        </div> --}}
                    </dl>
                    <div class="mt-6 border-t border-gray-900/5 px-6 py-6">
                        <a href="#" class="text-sm/6 font-semibold text-gray-900">Download receipt <span
                                aria-hidden="true">&rarr;</span></a>
                    </div>
                </div>
            </div>

            <!-- Invoice -->
            <div
                class="-mx-4 px-4 py-8 shadow-sm ring-1 ring-gray-900/5 sm:mx-0 sm:rounded-lg sm:px-8 sm:pb-14 lg:col-span-2 lg:row-span-2 lg:row-end-2 xl:px-16 xl:pb-20 xl:pt-16">
                <div class="flex items-center justify-between w-full">
                    <h2 class="text-base font-semibold text-gray-900">Details</h2>
                    <dd
                        class="rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-600 ring-1 ring-inset ring-green-600/20">
                        {{ \App\OrderStatusEnum::getName($order->status) }}
                    </dd>
                </div>

                <dl class="mt-2 grid grid-cols-1 text-sm/6 sm:grid-cols-2">
                    <div class="mt-6 border-t border-gray-900/5 pt-6 sm:pr-4">
                        <dt class="font-semibold text-xs text-gray-400">From</dt>
                        <dd class="mt-2 text-gray-500"><span class="font-medium text-gray-900">
                                {{ $order->owner->first_name }}
                            </span></dd>
                    </div>
                    <div class="mt-6 sm:mt-4 sm:border-t sm:border-gray-900/5 sm:pl-4 sm:pt-3">
                        <dt class="font-semibold test-xs text-gray-400">To</dt>
                        <dd class="mt-2 text-gray-500"><span class="font-medium text-gray-900">
                                {{ $order->buyer->first_name }}
                            </span></dd>
                    </div>
                </dl>
                <table class="mt-8 w-full whitespace-nowrap text-left text-sm/6">
                    <colgroup>
                        <col class="w-full">
                        <col>
                        <col>
                        <col>
                    </colgroup>
                    <thead class="border-b border-gray-200 text-gray-900">
                        <tr>
                            <th scope="col" class="px-0 py-3 font-semibold">Items</th>
                            <th scope="col" class="hidden py-3 pl-8 pr-0 text-right font-semibold sm:table-cell">
                                quantity</th>
                            <th scope="col" class="hidden py-3 pl-8 pr-0 text-right font-semibold sm:table-cell">
                                status</th>
                            <th scope="col" class="py-3 pl-8 pr-0 text-right font-semibold">Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->items as $orderItem)
                            <tr class="border-b border-gray-100">
                                <td class="max-w-0 px-0 py-5 align-top">
                                    <div class="truncate font-medium text-gray-900">{{ $orderItem->name }}</div>
                                    <div class="truncate text-gray-500">{{ $orderItem->note }}</div>
                                </td>
                                <td
                                    class="hidden py-5 pl-8 pr-0 text-right align-top tabular-nums text-gray-700 sm:table-cell">
                                    {{ $orderItem->quantity }}</td>
                                <td
                                    class="hidden py-5 pl-8 pr-0 text-right align-top tabular-nums text-gray-700 sm:table-cell">
                                    {{ \App\OrderItemStatusEnum::getName($orderItem->status) }}</td>
                                <td class="py-5 pl-8 pr-0 text-right align-top tabular-nums text-gray-700">
                                    &#x20A6;{{ number_format($orderItem->amount, 2) }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th scope="row" class="pt-4 font-semibold text-gray-900 sm:hidden">Total</th>
                            <th scope="row" colspan="3"
                                class="hidden pt-4 text-right font-semibold text-gray-900 sm:table-cell">Total</th>
                            <td class="pb-0 pl-8 pr-0 pt-4 text-right font-semibold tabular-nums text-gray-900">
                                &#x20A6;{{ number_format($order->total_amount, 2) }}
                                </td>
                        </tr>

                    </tfoot>
                </table>
                @if ($order->status === \App\OrderItemStatusEnum::PENDING->value && $order->owner_id === auth()->user()->id)
                    <x-primary-button x-data=""
                        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">Mark As
                        Completed</x-primary-button>
                @endif
                @if ($order->status !== \App\OrderItemStatusEnum::PENDING->value && $order->owner_id === auth()->user()->id)
                    <form action="{{ route('orders.repeat', ['order' => $order->id]) }}" method="post">
                        @csrf
                        @method('PATCH')
                        <x-primary-button>
                            Repeat Order
                        </x-primary-button>
                    </form>
                @endif
                <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
                    <form method="post" action="{{ route('owner.order.update', ['order' => $order]) }}"
                        class="p-6">
                        @csrf
                        @method('PATCH')

                        <h2 class="text-lg font-medium text-gray-900 ">
                            {{ __('Are you sure you want to mark this order as completed?') }}
                        </h2>

                        {{-- <p class="mt-1 text-sm text-gray-600 ">
                            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                        </p> --}}

                        {{-- reacion gose here --}}
                        {{-- <div class="mt-6">
                            <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                            <x-text-input id="password" name="password" type="password" class="mt-1 block w-3/4"
                                placeholder="{{ __('Password') }}" />

                            <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
                        </div> --}}

                        <div class="mt-6 flex justify-end">
                            <x-secondary-button x-on:click="$dispatch('close')">
                                {{ __('Cancel') }}
                            </x-secondary-button>

                            <x-primary-button class="ms-3">
                                {{ __('Mark as Completed') }}
                            </x-primary-button>
                        </div>
                    </form>
                </x-modal>
            </div>

            <div class="lg:col-start-3" x-data="{
                messages: [],
                newMessage: '',
                orderId: '{{ $order->id }}',
                channel: null,
                fetchMessagesUrl: '{{ route('api.orders.messages', ['order' => $order->id]) }}',
                sendMessageUrl: '{{ route('orders.message.sent', ['order' => $order->id]) }}',
            
                mount() {
                    this.fetchMessages();
                    this.setupWebSockets();
                },
            
                async fetchMessages() {
                    try {
                        const response = await fetch(this.fetchMessagesUrl);
                        const data = await response.json();
                        this.messages = data.messages;
                    } catch (error) {
                        console.error('Error fetching messages:', error);
                    }
                },
            
                setupWebSockets() {
                    this.channel = Echo.private(`order.${this.orderId}`)
                        .listen('OrderMessageSentEvent', (event) => {
                            this.messages.push(event.chat);
                            setTimeout(() => {
                                window.scrollTo(0, document.body.scrollHeight);
                            }, 100);
                        });
                },
            
                async sendMessage() {
                    if (!this.newMessage.trim()) return;
                    try {
                        const response = await fetch(this.sendMessageUrl, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: JSON.stringify({
                                message: this.newMessage
                            })
                        });
                        if (response.ok) {
                            this.newMessage = '';
                        }
                    } catch (error) {
                        console.error('Error sending message:', error);
                    }
                },
            
                formatTime(timestamp) {
                    const date = new Date(timestamp);
                    return new Intl.DateTimeFormat('default', {
                        hour: 'numeric',
                        minute: 'numeric',
                        day: 'numeric',
                        month: 'short'
                    }).format(date);
                }
            }" x-init="mount()">
                <!-- Activity feed -->
                <h2 class="text-sm/6 font-semibold text-gray-900">Chat</h2>
                <ul role="list" class="mt-6 space-y-6 h-[5%] overflow-hidden overflow-y-auto">
                    <template x-for="(message, index) in messages" :key="index">
                        <li class="relative flex gap-x-4">
                            <div class="absolute -bottom-6 left-0 top-0 flex w-6 justify-center">
                                <div class="w-px bg-gray-200"></div>
                            </div>
                            <div class="relative flex size-6 flex-none items-center justify-center bg-white">
                                <div class="size-1.5 rounded-full bg-gray-100 ring-1 ring-gray-300"></div>
                            </div>
                            <div class="flex-auto rounded-md p-3 ring-1 ring-inset ring-gray-200">
                                <div class="flex justify-between gap-x-4">
                                    <div class="py-0.5 text-xs/5 text-gray-500">
                                        <span class="font-medium text-gray-900"
                                            x-text="message.user.first_name"></span>
                                        <span
                                            x-text="message.user_id === '{{ auth()->id() }}' ? '(You)' : ''"></span>
                                    </div>
                                    <time class="flex-none py-0.5 text-xs/5 text-gray-500"
                                        x-text="formatTime(message.created_at)"></time>
                                </div>
                                <p class="text-sm/6 text-gray-500" x-text="message.message"></p>
                            </div>
                        </li>
                    </template>
                    <template x-if="messages.length === 0">
                        <li class="relative flex gap-x-4">
                            <div class="absolute -bottom-6 left-0 top-0 flex w-6 justify-center">
                                <div class="w-px bg-gray-200"></div>
                            </div>
                            <div class="relative flex size-6 flex-none items-center justify-center bg-white">
                                <div class="size-1.5 rounded-full bg-gray-100 ring-1 ring-gray-300"></div>
                            </div>
                            <div class="flex-auto rounded-md p-3 ring-1 ring-inset ring-gray-200">
                                <div class="flex justify-between gap-x-4">
                                    <div class="py-0.5 text-xs/5 text-gray-500">
                                        No messages yet
                                    </div>
                                </div>
                            </div>
                        </li>
                    </template>
                </ul>

                <!-- New comment form -->
                <div class="mt-6 flex gap-x-3">
                    <div class="size-6 flex items-center justify-center rounded-full bg-gray-50 uppercase text-xs">
                        {{ auth()->user()->first_name[0] }}
                    </div>
                    <form @submit.prevent="sendMessage" class="relative flex-auto">
                        <div
                            class="overflow-hidden rounded-lg pb-12 outline outline-1 -outline-offset-1 outline-gray-300 focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-black">
                            <textarea rows="2" x-model="newMessage" id="comment"
                                class="block w-full resize-none bg-transparent px-3 py-1.5 text-base text-gray-900 placeholder:text-gray-400 focus:outline focus:outline-0 sm:text-sm/6"
                                placeholder="Add your comment..." @keydown.enter.prevent="sendMessage"></textarea>
                        </div>

                        <div class="absolute inset-x-0 bottom-0 flex justify-between py-2 pl-3 pr-2">
                            <button type="submit"
                                class="rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50"
                                :disabled="!newMessage.trim()">
                                Comment
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('chatComponent', () => ({
                messages: [],
                newMessage: '',
                orderId: {{ $order->id }},
                channel: null,
                fetchMessagesUrl: "{{ route('api.orders.messages', ['order' => $order->id]) }}", // Pass the route URL
                sendMessageUrl: "{{ route('orders.message.sent', ['order' => $order->id]) }}",

                initChat() {
                    // Load existing messages
                    this.fetchMessages();

                    // Set up Echo with Reverb
                    this.setupWebSockets();
                },

                async fetchMessages() {
                    try {
                        const response = await fetch(`/api/orders/${this.orderId}/messages`);
                        this.messages = await response.json();
                    } catch (error) {
                        console.error('Error fetching messages:', error);
                    }
                },

                setupWebSockets() {
                    this.channel = Echo.private(`order.${this.orderId}`)
                        .listen('OrderMessageSentEvent', (data) => {
                            console.log(e)
                            this.messages.push(data.message);
                            // Scroll to bottom
                            setTimeout(() => {
                                window.scrollTo(0, document.body.scrollHeight);
                            }, 100);
                        });
                },

                async sendMessage() {
                    if (!this.newMessage.trim()) return;

                    try {
                        const response = await fetch(this.sendMessageUrl, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: JSON.stringify({
                                message: this.newMessage
                            })
                        });
                        console.log(response)
                        if (response.ok) {
                            this.newMessage = '';
                        }
                    } catch (error) {
                        console.error('Error sending message:', error);
                    }
                },

                formatTime(timestamp) {
                    const date = new Date(timestamp);
                    return new Intl.DateTimeFormat('default', {
                        hour: 'numeric',
                        minute: 'numeric',
                        day: 'numeric',
                        month: 'short'
                    }).format(date);
                }
            }));
        });
    </script> --}}
</x-user-layout>
