<section class="h-[95vh] grid place-content-center">
    <form action="{{ route('first-login') }}" method="POST"
        class="max-w-sm p-4 mx-auto mt-8 bg-white rounded-lg shadow-md ">
        @csrf
        @method('PUT')
        <div class="flex flex-col items-center justify-center text-center">
            <h1 class="text-3xl font-bold text-gray-900">Welcome to {{ config('app.name') }}</h1>
            <p class="text-sm text-gray-600">Please change your password to continue</p>
        </div>
        <div class="flex flex-col items-center justify-center w-full mt-8">
            <div class="w-full">
                <label for="password" class="text-sm font-medium text-gray-900">Password</label>
                <input type="password" name="password" id="password"
                    class="block w-full p-4 mt-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-orange-500 focus:border-orange-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500"
                    placeholder="Password" required>
            </div>
            <div class="w-full mt-4">
                <label for="password_confirmation" class="text-sm font-medium text-gray-900">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation"
                    class="block w-full p-4 mt-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-orange-500 focus:border-orange-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500"
                    placeholder="Confirm Password" required>
            </div>
            <button type="submit"
                class="w-full px-4 py-2 mt-4 text-sm font-medium text-white bg-orange-500 rounded-lg hover:bg-orange-600 focus:ring-4 focus:outline-none focus:ring-orange-300">Change
                Password</button>
        </div>

    </form>
</section>
