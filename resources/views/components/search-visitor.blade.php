<template x-for="visitor in searchResults">
    <div 
        @click="sendOtp(visitor)"
        class="cursor-pointer transition-shadow hover:shadow-lg rounded-xl border border-gray-200 bg-white p-4 mb-3 flex items-center gap-4"
    >
        <div class="flex-shrink-0">
            <div class="w-12 h-12 rounded-full bg-gray-200 flex items-center justify-center text-gray-500 text-xl font-bold">
                <span x-text="visitor.name.charAt(0)"></span>
            </div>
        </div>
        <div class="flex-1 min-w-0">
            <div class="flex items-center gap-2">
                <span class="text-lg font-semibold truncate" x-text="visitor.name"></span>
                <span class="text-xs bg-blue-100 text-blue-700 px-2 py-0.5 rounded">Host</span>
            </div>
            <div class="text-sm text-gray-500 truncate" x-text="visitor.user.first_name"></div>
        </div>
        <input type="radio" :id="'visitor-' + visitor.id" name="job" :value="visitor.id" class="hidden peer">
        <label :for="'visitor-' + visitor.id" class="ml-4">
            <svg class="w-5 h-5 text-gray-400 peer-checked:text-blue-600 transition-colors" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 14 10">
                <path stroke-linecap="round" stroke-linejoin="round" d="M1 5h12m0 0L9 1m4 4L9 9"/>
            </svg>
        </label>
    </div>
</template>
