<div class="container content py-6 mx-auto">
    <div class="flex space-x-6">
        <!-- Left Side: Form Section for User Registration -->
        @include('livewire.includes.user.create')
        <!-- Right Side: User Listing, Search, and Pagination -->
        <div class="w-full md:w-2/3 p-4">
            <!-- Error Alert -->
            @if(session('error'))
                <div class="flex items-center p-2 mb-2 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
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

            <!-- Search and User List -->
            @include('livewire.includes.user.search')

            <div id="users-list">
                @livewire('user-list',['lazy'=>false])
                {{--                @livewire('user-list',['lazy'=>true])--}}
                {{--                <livewire:user-list lazy />--}}
            </div>
        </div>
    </div>
</div>
