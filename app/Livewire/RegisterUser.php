<?php

namespace App\Livewire;

use App\Models\Todo;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class RegisterUser extends Component
{
    use WithPagination, WithFileUploads;

    #[Rule('required|min:2|max:15')]
    public $first_name;

    #[Rule('required|min:2|max:15')]
    public $last_name;

    #[Rule('required|min:2|max:25|email')]
    public $email;

    #[Rule('required|min:2|max:8')]
    public $password;

    #[Rule('required|image|max:2024')]
    public $image;


    public $search;

    public function create()
    {
        $validatedData = $this->validate();

        try {

            if ($this->image) {
                $validatedData['image'] = $this->image->store('uploads/users', 'public');
            }

            $user = User::create($validatedData);

            $this->reset();

            session()->flash('success', 'User has been register successfully.!');
            $this->resetPage();

            $this->dispatch('user-created', $user);
        } catch (\Exception $exception) {
            session()->flash('error', $exception->getMessage());
            return;
        }

    }

    public function reloadList()
    {
        $this->dispatch('user-created');

    }

    public function delete($userId)
    {
        try {
            // Find the user (or todo) by ID
            $user = User::findOrFail($userId);

            // Check if the user has an associated image and delete it from the storage
            if ($user->image && Storage::exists('public/' . $user->image)) {
                Storage::delete('public/' . $user->image);
            }

            // Now, delete the user
            $user->delete();

            // Optionally, you can add a success message or redirect
            session()->flash('success', 'User has been deleted successfully!');
        } catch (\Exception $exception) {
            session()->flash('error', 'Error while deleting the task.' . $exception->getMessage());
            return;
        }
    }

    public function render()
    {
        return view('livewire.register-user');
    }
}
