<?php

namespace App\Http\Controllers;

use App\Services\TodolistService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TodolistController extends Controller
{
    private TodolistService $todolistService;

    public function __construct(TodolistService $todolistService)
    {
        $this->todolistService = $todolistService;
    }

    public function todoList(Request $request)
    {
        $todolist = $this->todolistService->getTodolist();
        return response()->view("todolist.todolist", [
            "title" => "Todolist",
            "todolist" => $todolist
        ]);
    }

    public function addTodo(Request $request)
    {
        $todo = $request->input("todo");
        $time = $request->input("time");

        if (empty($todo) || empty($time)) {
            $todolist = $this->todolistService->getTodolist();
            return response()->view("todolist.todolist", [
                "title" => "Todolist",
                "todolist" => $todolist,
                "error" => "Todo dan waktu harus diisi"
            ]);
        }

        $this->todolistService->saveTodo(uniqid(), $todo, $time);

        return redirect()->action([TodolistController::class, 'todoList']);
    }

    public function removeTodo(Request $request, string $todoId): RedirectResponse
    {
        $this->todolistService->removeTodo($todoId);
        return redirect()->action([TodolistController::class, 'todoList']);
    }
}
