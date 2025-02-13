<?php

namespace App\Livewire;

use App\Models\User;
use Faker\Factory;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class Cliker extends Component
{
    use WithPagination;

    public $userName = 'TestUser';

    #[Rule('required|min:3|string')]
    public $first_name = '';

    #[Rule('required|min:3|string')]
    public $last_name = '';

    #[Rule('required|email|unique:users,email,NULL,id,deleted_at,NULL')]
    public $email = '';

    #[Rule('required')]
    public $password = '';

    public function createNewUser()
    {
        $validated = $this->validate();

        User::create([
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);


        $this->reset(['first_name', 'last_name', 'email', 'password']);

        request()->session()->flash('success', 'User has been created successfully');
    }

    public function render()
    {
        $title = "Test";
        $users = User::orderByDesc('id')->paginate(10);
        return view('livewire.cliker', compact("title", "users"));
    }
}
