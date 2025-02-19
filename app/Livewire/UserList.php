<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class UserList extends Component
{
    use WithPagination;

    public $search;

    #[On('user-created')]
    public function updateList($user = null)
    {

    }

    public function render()
    {
        $users = User::where('first_name', 'like', "%{$this->search}%")
            ->orWhere('last_name', 'like', "%{$this->search}%")
            ->orderByDesc('id')
            ->paginate(5);

        return view('livewire.user-list', compact('users'));
    }
}
