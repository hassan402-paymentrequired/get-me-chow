<div x-show="hasVisited" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-60">
    <div class="relative w-full max-w-2xl mx-auto bg-white rounded-xl shadow-2xl overflow-hidden">
        <!-- Close Button -->
        <button @click="hasVisited = false"
            class="absolute top-3 right-3 text-gray-400 hover:text-gray-700 transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        <div class="p-6 space-y-6">
            <div>
                <x-input-label class="block text-base font-semibold text-gray-700 mb-2">
                    Search Visitor
                </x-input-label>
                <div class="flex gap-2">
                    <x-text-input
                        placeholder="Name, phone, or email"
                        class="flex-1"
                        x-model.debounce.500ms="searchQuery"
                    />
                    <x-primary-button @click="searchVisitors">Search</x-primary-button>
                </div>
            </div>

            <!-- Results Section -->
            <div>
                @include('components.search-visitor')
                <template x-if="searchQuery && searchResults && searchResults.length === 0">
                    <div class="text-sm text-gray-500 mt-4">No visitors found.</div>
                </template>
                <template x-if="searchResults && searchResults.length > 0">
                    <div class="text-sm text-gray-700 mt-4">Showing results:</div>
                </template>
            </div>
        </div>
    </div>
</div>
