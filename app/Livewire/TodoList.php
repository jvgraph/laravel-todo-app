<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Todo;

class TodoList extends Component
{
    public $todos;
    public $task = '';
    function mount()
    {
        $this->fetchTodos();
    }
    function fetchTodos()
    {
        $this->todos = Todo::all();
    }

    function addTodo()
    {
        if($this->task != '') {
            $todo = new Todo();
            $todo->task = $this->task;
            $todo->save();
            $this->task = '';
        }
       
    }
    function deleteTodo($id)
    {   
        $todo = Todo::find($id);
        $todo->delete();
        $this->fetchTodos();
    }
    function updateStatus($id, $status)
    {
        $todo = Todo::find($id);
        $todo->status = $status;
        $todo->save();
        $this->fetchTodos();
    }
    function toggleTodo($id)
    {
        $todo = Todo::find($id);
        $todo->status = !$todo->status;
        $todo->save();
        $this->fetchTodos();
    }
  
    function editTodo()
    {
        $todo = Todo::find($this->todoId);
        $todo->task = $this->task;
        $todo->save();
        $this->task = '';
        $this->todoId = '';
        $this->fetchTodos();
    }   
    public function render()
    {
        return view('livewire.todo-list');
    }
}
