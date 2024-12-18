<?php


namespace App\Services;

use App\Models\todos;

// Kelas SaveTodoHandler adalah turunan dari kelas Handler.
class SaveTodoHandler extends Handler
{
    /**
     * Method untuk menangani request dan menyimpan data todo ke database.
     * @param array 
     * @return todos 
     */
    public function handle($request)
    {
        // Membuat instance baru dari model "todos".
        $todo = new todos();
        
        // Mengatur atribut "name" dari request ke properti "name" model todos.
        $todo->name = $request['name'];
        
        // Mengatur atribut "work" dari request ke properti "work" model todos.
        $todo->work = $request['work'];
        
        // Mengatur atribut "dueDate" dari request ke properti "dueDate" model todos.
        $todo->dueDate = $request['dueDate'];
        
        // Menyimpan objek todos ke database.
        $todo->save();

       
        return $todo;
    }
}
