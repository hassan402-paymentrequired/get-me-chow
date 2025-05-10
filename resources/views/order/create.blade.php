<x-user-layout>

    <div class="  relative isolate pt-16 mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8" x-data="orderForm()">

        @if ($alreadyBookForToday)
            <div class="absolute top-17 w-[95%] bg-red-100 border-t-4 border-red-500 rounded-b text-teal-900 px-4 py-3 shadow-md"
                role="alert">
                <div class="flex">
                    <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path
                                d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z" />
                        </svg></div>
                    <div>
                        <p class="font-bold">Hey {{auth()->user()->first_name}}</p>
                        <p class="text-sm">You already have an order for today please edit your order.</p>
                    </div>
                </div>
            </div>
        @endif
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-white overflow-hidden ">
                <div class="p-6 text-black grid md:grid-cols-3 gap-5 grid-cols-1">

                    {{-- ORDER FORM --}}
                    <form action="{{ route('order.store') }}" method="POST" enctype="multipart/form-data"
                        @submit="prepareSubmit($el)"
                        class="border rounded border-gray-100 shadow-sm p-4 md:col-span-2 col-span-1">
                        @csrf

                        <input type="hidden" name="items" :value="JSON.stringify(items)">

                        <div class="mt-4">
                            <x-input-label for="name" :value="__('Order Name')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                                required placeholder="e.g Afternoon chow" :value="old('name')" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="buyer" :value="__('Buyer: ') . $buyer->first_name . ' ' . $buyer->last_name" />
                            <x-text-input id="buyer" class="block mt-1 w-full" type="hidden" name="buyer"
                                required placeholder="e.g Afternoon chow" :value="$buyer->id" />
                        </div>

                        <div class="mt-4">
                            <x-input-label :value="__('Items')" />

                            <div class="flex flex-col gap-3">
                                <template x-for="(item, index) in items" :key="index"
                                    class="border shadow-sm ">
                                    <div
                                        class="grid grid-cols-4 max-sm:grid-cols-2 border shadow-sm items-start justify-between gap-6 py-3 px-3 rounded mt-3">
                                        <div class="col-span-2 flex sm:items-center gap-4 sm:gap-6 max-sm:flex-col">
                                            <div
                                                class="size-24 flex items-center justify-center rounded-lg shrink-0 bg-gray-100 ring-1 ring-gray-900/10">
                                                {{-- class="bg-gray-100 p-2 rounded-lg w-24 h-24 shrink-0 flex items-center justify-center"> --}}
                                                <template x-if="item.image">
                                                    <img :src="item.image" class="w-full h-full object-contain" />
                                                </template>
                                                <template x-if="!item.image" class="">
                                                    <span class="ext-gray-900 uppercase font-bold text-xl"
                                                        x-text="item.name.slice(0, 2).toUpperCase()"></span>
                                                </template>

                                            </div>
                                            <div>
                                                <h6 class="text-sm font-semibold text-black" x-text="item.name"></h6>
                                                <p class="text-xs text-black font-medium mt-1">
                                                    Qty: <span class="ml-1" x-text="item.q"></span>
                                                </p>
                                            </div>
                                        </div>

                                        <div class="ml-auto">
                                            <h6 class="text-sm font-semibold text-black">Price</h6>
                                            <p class="text-sm text-black font-medium mt-2"
                                                x-text="new Intl.NumberFormat('en-NG', { style: 'currency', currency: 'NGN' }).format(item.price)">
                                            </p>
                                        </div>
                                    </div>
                                </template>
                                <p class="text-xs text-black font-medium mt-4">
                                    Total Amount: <span class="ml-1 text-black" x-text="total"></span>
                                </p>



                                <input type="hidden" name="items" :value="JSON.stringify(items)">
                                <input type="hidden" name="total" :value="total">


                                <template x-if="items.length === 0">
                                    <p class="text-sm text-gray-400">No items on list.</p>
                                </template>
                                <x-input-error :messages="$errors->get('items')" class="mt-2" />

                            </div>

                            <div class="mt-6">
                                <x-input-label for="payment_screenshot" :value="__('Payment Screenshot (optional)')" />
                                <input id="payment_screenshot" type="file"
                                    class="block mt-1 w-full text-sm text-white" name="payment_screenshot" />
                            </div>

                            <div class="mt-3">
                                <x-input-label for="item_name" :value="__('Paid')" />
                                <div class="grid sm:grid-cols-2 gap-2 ">
                                    <label for="hs-radio-in-form"
                                        class="flex p-3 w-full bg-white border border-gray-200 rounded-lg text-sm focus:border-black focus:ring-stone-500 ">
                                        <input type="radio" name="hs-radio-in-form"
                                            class="shrink-0 mt-0.5 border-gray-200 rounded-full text-black focus:ring-neutral-500 checked:border-neutral-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 "
                                            id="hs-radio-in-form">
                                        <span class="text-sm text-gray-500 ms-3 dark:text-neutral-400">Transfer</span>
                                    </label>

                                    <label for="hs-radio-checked-in-form"
                                        class="flex p-3 w-full bg-white border border-gray-200 rounded-lg text-sm focus:border-black focus:ring-stone-500 ">
                                        <input type="radio" name="hs-radio-in-form"
                                            class="shrink-0 mt-0.5 border-gray-200 rounded-full text-black focus:ring-neutral-500 checked:border-neutral-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 "
                                            id="hs-radio-checked-in-form" checked="">
                                        <span class="text-sm text-gray-500 ms-3 dark:text-neutral-400">Card</span>
                                    </label>
                                </div>
                            </div>

                            <x-primary-button @disabled($alreadyBookForToday) class="flex items-center justify-center w-full mt-3">Make
                                order</x-primary-button>

                        </div>
                    </form>

                    {{-- ADD ITEM TO LIST --}}
                    <div class="border rounded border-gray-100 shadow-sm p-4 col-span-1">
                        <h4 class="font-semibold text-lg mb-4">Items to Buy</h4>

                        <div class="flex flex-col">
                            <div class="mt-4">
                                <x-input-label for="item_name" :value="__('Name*')" />
                                <x-text-input id="item_name" class="block mt-1 w-full" type="text" x-model="name"
                                    placeholder="e.g Amala and ewedu" />
                            </div>

                            <div class="flex items-center gap-2 max-md:flex-col">
                                <div class="mt-4 max-md:w-full">
                                    <x-input-label for="item_quantity" :value="__('Quantity*')" />
                                    <x-text-input id="item_quantity" class="block mt-1 w-full" type="number"
                                        x-model="quantity" placeholder="e.g 2" />
                                </div>

                                <div class="mt-4 max-md:w-full">
                                    <x-input-label for="price" :value="__('Price*')" />
                                    <x-text-input id="price" class="block mt-1 w-full" type="number"
                                        x-model="price" placeholder="e.g 2000" />
                                </div>
                            </div>

                            <div class="mt-4">
                                <x-input-label for="note" :value="__('Note (optional)')" />
                                <x-textarea-input id="note" class="block mt-1 w-full text-xs" x-model="note"
                                    placeholder="e.g Add more ponmo" />
                            </div>

                            <div class="mt-4">
                                <x-input-label for="image" :value="__('Additional file (optional)')" />
                                <input id="image" type="file" class="block mt-1 w-full text-sm text-white"
                                    @change="handleImageUpload" />
                            </div>



                            <div class="mt-4 w-full">
                                <x-primary-button @click="submit" type="button"
                                    class="w-full flex items-center justify-center text-center">
                                    Add Item
                                </x-primary-button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="bg-white border border-gray-200 rounded-lg shadow-lg p-4 dark:bg-neutral-800 dark:border-neutral-700 absolute top-4 right-4 "
            role="alert" tabindex="-1" aria-labelledby="hs-discovery-label" x-cloak
            x-show="accounts.user !== undefined && accounts.user !== null">
            <div class="flex">
                <div class="shrink-0">
                    <svg class="shrink-0 size-4 text-blue-600 mt-1" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"></circle>
                        <path d="M12 16v-4"></path>
                        <path d="M12 8h.01"></path>
                    </svg>
                </div>
                <div class="ms-3">
                    <h3 id="hs-discovery-label" class="text-gray-800 font-semibold dark:text-white">
                        <span x-text="accounts.user"></span> Account Info
                    </h3>
                    <template x-for="(account, index) in accounts.accounts" :key="index">
                        <div class="mt-4 p-4 border rounded-lg bg-gray-50 dark:bg-neutral-700">
                            <p class="text-sm font-medium text-gray-800 dark:text-white"
                                x-text="account.account_name"></p>
                            <p class="text-sm text-gray-600 dark:text-neutral-300 mt-1"
                                x-text="account.account_number"></p>
                            <p class="text-sm text-gray-600 dark:text-neutral-300 mt-1" x-text="account.bank_name">
                            </p>
                        </div>
                    </template>

                    <button
                        class="mt-4 text-sm text-gray-500 hover:text-gray-700 dark:text-neutral-300 dark:hover:text-neutral-200"
                        @click="accounts = null">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function orderForm() {
            return {
                items: [],
                name: '',
                quantity: 1,
                price: 0,
                note: '',
                image: '',
                imageFile: null,
                total: 0,
                accounts: null,


                handleImageUpload(e) {
                    this.imageFile = e.target.files[0];
                },

                handleImageRemove() {
                    this.imageFile = null;
                    this.image = '';
                },

                getAccountInfo(userId) {
                    fetch(`{{ route('user.account.info', ['user' => ':id']) }}`.replace(':id', userId), {
                            method: 'GET',
                            headers: {
                                'Content-Type': 'application/json'
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            this.accounts = data;
                            console.log(this.accounts);
                        })
                        .catch(error => console.error('Error fetching account info:', error));
                },

                submit() {
                    if (this.name && this.quantity && this.price) {
                        if (this.imageFile instanceof File) {
                            const reader = new FileReader();
                            reader.onload = () => {
                                this.items.push({
                                    name: this.name,
                                    q: this.quantity,
                                    price: this.price,
                                    note: this.note,
                                    image: reader.result
                                });
                                this.total += Number(this.price);
                                this.clearInputs();
                            };
                            reader.readAsDataURL(this.imageFile);
                        } else {
                            this.items.push({
                                name: this.name,
                                q: this.quantity,
                                price: this.price,
                                note: this.note,
                                image: ''
                            });
                            this.total += Number(this.price);
                            this.clearInputs();
                        }
                    }
                },

                clearInputs() {
                    this.name = '';
                    this.quantity = 1;
                    this.price = 0;
                    this.note = '';
                    this.image = '';
                    this.imageFile = null;
                    document.getElementById('image').value = '';
                },

                prepareSubmit(form) {
                    form.submit();
                }
            }
        }
    </script>
</x-user-layout>
