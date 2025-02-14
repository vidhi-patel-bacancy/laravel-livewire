<?php

namespace App\Livewire;

use App\Models\Todo;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class TodoList extends Component
{
    use WithPagination;

    #[Rule('required|min:2|max:15')]
    public $name;

    public $search;

    public $editedTodoId;
    #[Rule('required|min:2|max:15')]
    public $editedTodoName;

    public function create()
    {
        $validatedData = $this->validateOnly('name');

        try {
            Todo::create($validatedData);
            $this->reset('name');
            session()->flash('success', 'Todo task has been added successfully.!');
            $this->resetPage();
        } catch (\Exception $exception) {
            session()->flash('error', $exception->getMessage());
            return;
        }
    }

    public function delete($todoId)
    {
        try {
            Todo::findOrFail($todoId)->delete();
        } catch (\Exception $exception) {
            session()->flash('error', 'Eror while deleting the task.' . $exception->getMessage());
            return;
        }
    }

    public function toggle($todoId)
    {
        try {
            $todo = Todo::find($todoId);
            $todo->is_completed = !$todo->is_completed;
            $todo->save();
        } catch (\Exception $exception) {
            session()->flash('error', 'Error while change the status of task.' . $exception->getMessage());
            return;

        }
    }

    public function edit($todoId)
    {
        try {
            $this->editedTodoId = $todoId;
            $this->editedTodoName = Todo::findOrFail($todoId)->name;
        } catch (\Exception $exception) {
            session()->flash('error', 'Error while getiing data.' . $exception->getMessage());
            return;
        }
    }

    public function cancelEdit()
    {
        $this->reset('editedTodoName', 'editedTodoId');
    }

    public function update()
    {
        $validatedData = $this->validateOnly('editedTodoName');

        Todo::find($this->editedTodoId)
            ->update([
                'name' => $this->editedTodoName
            ]);

        $this->cancelEdit();
    }
    public function render()
    {
        $todos = Todo::orderByDesc('id')->where('name', 'like', "%{$this->search}%")->paginate(5);
        return view('livewire.todo-list', compact('todos'));
    }
}
