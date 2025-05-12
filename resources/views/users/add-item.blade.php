<x-user-layout>
    <div class="relative isolate pt-16 mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8">
        <div class="w-full max-w-3xl mx-auto p-5" x-data="orderForm()">
            <form class="border rounded border-gray-100 shadow-sm p-4 col-span-1" action="{{ route('owner.order.remove.update', ['order'=>$order->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <h4 class="font-semibold text-lg mb-4">Items to Buy</h4>

                <div class="flex flex-col">
                    <div class="mt-4">
                        <x-input-label for="item_name" :value="__('Name*')" />
                        <x-text-input id="item_name" class="block mt-1 w-full" type="text" name="name" value="{{old('name')}}"
                            placeholder="e.g Amala and ewedu" />
                    </div>

                    <div class="flex items-center gap-2 max-md:flex-col">
                        <div class="mt-4 max-md:w-full">
                            <x-input-label for="item_quantity" :value="__('Quantity*')" />
                            <x-text-input id="item_quantity" min="1" class="block mt-1 w-full" type="number" value="{{old('quantity')}}"
                                placeholder="e.g 2" name="quantity"/>
                        </div>

                        <div class="mt-4 max-md:w-full">
                            <x-input-label for="price" :value="__('Price*')" />
                            <x-text-input id="price" min="1" class="block mt-1 w-full" type="number" value="{{old('price')}}"
                                placeholder="e.g 2000"  name="price"/>
                        </div>
                    </div>

                    <div class="mt-4">
                        <x-input-label for="note" :value="__('Note (optional)')" />
                        <x-textarea-input id="note" name="note" class="block mt-1 w-full text-xs"
                            placeholder="e.g Add more ponmo" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="image" :value="__('Additional file (optional)')" />
                        <input id="image" type="file" class="block mt-1 w-full text-sm"
                            @change="handleImageUpload" accept="image/*" name="image" />
                    </div>

                    <template x-if="image">
                        <div class="mt-4">
                            <img :src="image" class="w-full max-h-64 object-contain rounded border" alt="Preview" />
                        </div>
                    </template>

                    <div class="mt-4 w-full">
                        <x-primary-button  class="w-full flex items-center justify-center text-center">
                            Add Item
                        </x-primary-button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        function orderForm() {
            return {
                image: null,
                handleImageUpload(e) {
                    const file = e.target.files[0];
                    if (file) {
                        this.image = URL.createObjectURL(file);
                    }
                }
            }
        }
    </script>
</x-user-layout>
