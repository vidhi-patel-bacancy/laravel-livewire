<div>
    @if(session('error'))
        <div class="flex items-center p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
            <svg class="shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                 fill="currentColor" viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            <span class="sr-only">Info</span>
            <div>
                <span class="font-medium">{{ session('error') }}</span>
            </div>
        </div>
    @endif
    @include('livewire.includes.todo-list.create')
    @include('livewire.includes.todo-list.search')
    <div id="todos-list">
        @if(count($todos))
            @foreach($todos as $todo)
                @include('livewire.includes.todo-list.list')
            @endforeach
            <div class="my-2">
                {{ $todos->links() }}
            </div>
        @else
            <div class="todo mb-5 card px-5 py-6 bg-white col-span-1 border-t-2 border-blue-500 hover:shadow">
                <div class="flex justify-around space-x-2">
                    <h3 class="text-lg text-semibold text-gray-800">No Data Found</h3>
                </div>
            </div>
        @endif
    </div>
</div>
