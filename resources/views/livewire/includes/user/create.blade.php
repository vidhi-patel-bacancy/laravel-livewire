<div class="w-full md:w-1/2 p-6 bg-white rounded-lg shadow-lg">
    <h2 class="text-2xl font-semibold text-gray-800 mb-6">Register User</h2>
    <form wire:submit.prevent="create">
        <!-- First Name Field -->
        <div class="mb-6">
            <label for="first_name" class="block mb-2 text-sm font-medium text-gray-700">* First Name</label>
            <input type="text" id="first_name" wire:model="first_name" placeholder="Enter your first name"
                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-3 focus:ring-blue-500 focus:border-blue-500 transition duration-200 ease-in-out">
            @error('first_name')
            <span class="text-red-500 text-xs mt-2">{{ $message }}</span>
            @enderror
        </div>
        <!-- Last Name Field -->
        <div class="mb-6">
            <label for="last_name" class="block mb-2 text-sm font-medium text-gray-700">* Last Name</label>
            <input type="text" id="last_name" wire:model="last_name" placeholder="Enter your last name"
                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-3 focus:ring-blue-500 focus:border-blue-500 transition duration-200 ease-in-out">
            @error('last_name')
            <span class="text-red-500 text-xs mt-2">{{ $message }}</span>
            @enderror
        </div>
        <!-- Email Field -->
        <div class="mb-6">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-700">* Email</label>
            <input type="email" id="email" wire:model="email" placeholder="Enter your email"
                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-3 focus:ring-blue-500 focus:border-blue-500 transition duration-200 ease-in-out">
            @error('email')
            <span class="text-red-500 text-xs mt-2">{{ $message }}</span>
            @enderror
        </div>
        <!-- Password Field -->
        <div class="mb-6">
            <label for="password" class="block mb-2 text-sm font-medium text-gray-700">* Password</label>
            <input type="password" id="password" wire:model="password" placeholder="Enter your password"
                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-3 focus:ring-blue-500 focus:border-blue-500 transition duration-200 ease-in-out">
            @error('password')
            <span class="text-red-500 text-xs mt-2">{{ $message }}</span>
            @enderror
        </div>

        <!-- Image Upload Field -->
        <div class="mb-6">
            <label for="image" class="block mb-2 text-sm font-medium text-gray-700">* Profile Image</label>
            <input type="file" id="image" wire:model="image"
                   accept="image/png, image/jpeg"
                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-3 focus:ring-blue-500 focus:border-blue-500 transition duration-200 ease-in-out">
            @error('image')
            <span class="text-red-500 text-xs mt-2">{{ $message }}</span>
            @enderror

            <!-- Preview Image -->
            @if ($image)
                <div class="mt-4">
                    <img src="{{ $image->temporaryUrl() }}" class="w-20 h-20 rounded-full mx-auto">
                </div>
            @endif

            <div wire:loading wire:target="image">
                <span class="text-green-500">Uploading image..</span>
            </div>

            <div wire:loading.delay wire:target="create">
                <span class="text-green-500">Sending..</span>
            </div>
        </div>
        <!-- Submit Button -->
        <div class="mb-6">
            <button wire:loading.attr="disabled" type="submit"
                    class="w-full py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition duration-300">
                Register User +
            </button>
        </div>
        @if(session('success'))
            <span class="text-green-500 text-xs">{{ session('success') }}</span>

        @endif
    </form>
</div>
