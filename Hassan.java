   <div class="bg-white rounded-2xl shadow-lg p-8 max-w-md w-full">
        <div class="text-center mb-6">
            <div class="text-4xl mb-4">👋</div>
            <h1 class="text-2xl font-bold text-gray-800">Welcome, Visitor!</h1>
            <p class="text-gray-500 text-sm">We're happy to see you. Please fill in your details below 📝</p>
        </div>

        <form method="POST" action="#" class="space-y-4">
            @csrf

            <div>
                <label class="block text-sm font-medium text-gray-700">Full Name</label>
                <input type="text" name="name" required
                    class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-purple-500 focus:border-purple-500" />
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Phone Number</label>
                <input type="text" name="phone" required
                    class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-purple-500 focus:border-purple-500" />
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Reason for Visit</label>
                <textarea name="reason" rows="3"
                    class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-purple-500 focus:border-purple-500"></textarea>
            </div>

            <button type="submit"
                class="w-full bg-purple-600 text-white font-bold py-2 px-4 rounded-lg hover:bg-purple-700 transition-all duration-300">
                🚪 Check In Now
            </button>
        </form>

        <p class="mt-6 text-xs text-center text-gray-400">
            Your visit will be reviewed by our team. Thank you for stopping by!
        </p>
    </div>