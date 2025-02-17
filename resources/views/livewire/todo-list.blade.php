<div class="container content py-8 mx-auto">
    <div class="flex space-x-6">
        <!-- Left Side: Form Section -->
        @include('livewire.includes.todo-list.create')
        <!-- Right Side: Listing, Search, and Pagination -->
        <div class="w-full md:w-1/2 p-6 bg-white rounded-lg shadow-lg">
            <!-- Error Alert -->
            @if(session('error'))
                <div class="flex items-center p-4 mb-6 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                    <svg class="shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                         fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                    </svg>
                    <span class="font-medium">{{ session('error') }}</span>
                </div>
            @endif

            <!-- Search Bar -->
            <div class="mb-6">
                @include('livewire.includes.todo-list.search')
            </div>

            <!-- Todo List -->
            <div id="todos-list">
                @if(count($todos))
                    @foreach($todos as $todo)
                        @include('livewire.includes.todo-list.list')
                    @endforeach
                    <!-- Pagination -->
                    <div class="mt-6">
                        {{ $todos->links() }}
                    </div>
                @else
                    <div class="todo bg-white p-6 rounded-lg shadow-sm border-t-2 border-blue-500">
                        <div class="flex justify-center">
                            <h3 class="text-lg font-semibold text-gray-700">No Data Found</h3>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
