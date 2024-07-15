<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
        Update Password
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
        Ensure your account is using a long, random password to stay secure.
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')
        <div>
            <label for="old_password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your old password</label>
            <input type="password" name="current_password" id="old_password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500" required />
            @error('current_password')
            <div class="invalid:border-red-500 text-red-600">
            {{ $message }}
            </div>
            @enderror
        </div>

        <div>
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your new password</label>
            <input type="password" name="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500" required />
            @error('password')
            <div class="invalid:border-red-500 text-red-600">
            {{ $message }}
            </div>
            @enderror
        </div>

        <div>
        <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm your new password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500" required />
            @error('password_confirmation')
            <div class="invalid:border-red-500">
            {{ $message }}
            </div>
            @enderror
        </div>

        <div class="flex items-center gap-4">
        <button type="submit" class="bg-purple-500 text-white p-2 rounded hover:bg-purple-400">Change</button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 5000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Changed.') }}</p>
            @endif
        </div>
    </form>
</section>
