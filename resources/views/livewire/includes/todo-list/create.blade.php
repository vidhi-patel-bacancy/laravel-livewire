<div class="w-full md:w-1/2 p-6 bg-white rounded-lg shadow-lg">
    <h2 class="text-2xl font-semibold text-gray-800 mb-6">Create New Todo</h2>
    <form wire:submit.prevent="create">
        <!-- Name Field -->
        <div class="mb-6">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-700">* Todo</label>
            <input type="text" id="name" wire:model="name" placeholder="Enter your task..."
                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-3 focus:ring-blue-500 focus:border-blue-500 transition duration-200 ease-in-out">
            @error('name')
            <span class="text-red-500 text-xs mt-2">{{ $message }}</span>
            @enderror
        </div>
        <!-- Submit Button -->
        <div class="mb-6">
            <button type="submit"
                    class="w-full py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition duration-300">
                Create Task +
            </button>
        </div>
        @if(session('success'))
            <span class="text-green-500 text-xs">{{ session('success') }}</span>

        @endif
    </form>
</div>
