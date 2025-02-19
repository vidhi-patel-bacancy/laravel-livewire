{{--<div wire:poll.keep-alive.10s>--}}
<div wire:poll.visible.10s>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    @if(count($users))
        @foreach($users as $user)
            @include('livewire.includes.user.list')
        @endforeach
        <!-- Pagination -->
        <div class="my-2">
            {{ $users->links() }}
        </div>
    @else
        <div class="todo mb-5 card px-5 py-6 bg-white col-span-1 border-t-2 border-blue-500 hover:shadow">
            <div class="flex justify-around space-x-2">
                <h3 class="text-lg text-semibold text-gray-800">No Users Found</h3>
            </div>
        </div>
    @endif
</div>
