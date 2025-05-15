<div
    class="inline-block text-left bg-white rounded-lg overflow-hidden align-bottom transition-all transform shadow-2xl sm:my-8 sm:align-middle sm:max-w-xl sm:w-full">
    <!-- Header -->
    <div class="flex justify-between items-center p-4 border-b">
        <h2 class="text-lg font-semibold">Enter OTP</h2>
        <button type="button" class="text-gray-400 hover:text-gray-600" @click="selectedUser = null; isVerified = false">
            &times;
        </button>
    </div>

    <!-- Body -->
    <div class="flex flex-col items-center p-6 space-y-4">
        <span class="text-sm text-gray-600">Please comfirm the OTP send to you mail or sms</span>
        <x-text-input type="text" placeholder="Enter OTP" class="w-full" x-model="otp" />
        <x-primary-button @click="verifyOtp" class="w-full h-9">
            Verify OTP</x-primary-button>
    </div>
</div>
