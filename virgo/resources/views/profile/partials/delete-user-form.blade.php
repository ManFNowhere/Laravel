<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            Delete Account
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
        Once your account is deleted, all of its resources and subscription will be permanently deleted and canceled.
        </p>
    </header>
<div class="flex flex-col lg:flex-row">
   <button id="delete-user" class="bg-red-700 text-white p-2 rounded hover:bg-red-500">Delete</button>
   @error('delete_password')
    <div class="invalid:border-red-500 text-red-600 mx-4">
    {{ $message }}
    </div>
    @enderror
</div>
    
</section>
