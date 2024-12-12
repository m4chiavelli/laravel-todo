<?php

namespace App\Services\Impl;

use App\Services\TodolistService;
use Illuminate\Support\Facades\Session;

class TodolistServiceImpl implements TodolistService
{
    public function saveTodo(string $id, string $todo, string $time = '00:00'): void
    {
        // Ambil todolist dari session
        $todolist = Session::get('todolist', []);

        // Tambahkan todo baru
        $todolist[] = [
            'id' => $id,
            'todo' => $todo,
            'time' => $time,
        ];

        // Simpan kembali ke session
        Session::put('todolist', $todolist);
    }

    public function getTodolist(): array
    {
        // Ambil todolist dari session, default kosong jika belum ada
        return Session::get('todolist', []);
    }

    public function removeTodo(string $todoId): void
    {
        // Ambil todolist dari session
        $todolist = Session::get('todolist', []);

        // Filter todolist untuk menghapus item dengan id yang sesuai
        $todolist = array_filter($todolist, function ($todo) use ($todoId) {
            return $todo['id'] !== $todoId;
        });

        // Simpan perubahan ke session
        Session::put('todolist', $todolist);
    }
}
