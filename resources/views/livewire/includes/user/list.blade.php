<div wire:key="{{ $user->id }}"
     class="todo mb-4 bg-white rounded-lg shadow-sm p-4 col-span-1 border-t-2 hover:shadow-lg transition duration-200">
    <div class="flex justify-between items-center space-x-3">
        <!-- User Content -->
        <div class="flex items-center space-x-3">
            <!-- User Image -->
            <img src="{{ $user->image ? asset('storage/' . $user->image) : asset('default-images/user.png') }}"
                 alt="User Image"
                 class="w-10 h-10 rounded-full border border-gray-300 shadow-sm">

            <div>
                <h3 class="text-base font-semibold text-gray-800">{{ $user->first_name . " " .$user->last_name }}</h3>
                <span class="text-xs text-gray-500">({{ $user->email }})</span>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="flex space-x-2">
            <button wire:click="delete({{ $user->id }})"
                    class="text-red-500 font-semibold hover:text-red-700 transition duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"/>
                </svg>
            </button>
        </div>
    </div>

    <!-- Timestamp -->
    <span class="text-xs text-gray-500 block mt-2">
        {{ \Carbon\Carbon::parse($user->created_at)->timezone('Asia/Kolkata')->format('d-m-Y h:i:s A') }}
    </span>
</div>
