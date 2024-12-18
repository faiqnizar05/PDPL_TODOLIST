<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\todos;
use App\Services\ValidationHandler;
use App\Services\SaveTodoHandler;

class todosController extends Controller
{

    public function index() {
        $todos=todos::all();
        $data=compact('todos');
        return view("welcome")->with($data);
    }

    public function store(Request $request)
    {
        try {
            // Buat handler untuk validasi dan penyimpanan
            $validationHandler = new ValidationHandler();
            $saveTodoHandler = new SaveTodoHandler();

            // Hubungkan handler ke dalam chain
            $validationHandler->setNext($saveTodoHandler);

            // Eksekusi chain
            $validationHandler->handle($request);

            return redirect(route("todo.home"))->with('success', 'Todo successfully added!');
        } catch (\Exception $e) {
            return back()->withErrors($e->getMessage());
        }
    }


    public function delete($id){
        todos::find($id)->delete();
        return redirect(route("todo.home"));
    }


    public function edit($id){
        $todo=todos::find($id);
        $data=compact('todo');
        return view("update")->with($data);        
    }


    public function updateData(Request $request) {
        $request->validate(
            [
            'name' => 'required',
            'work' => 'required',
            'dueDate' => 'required',
            ]
           );

               $id=$request['id'];  
               $todo=new todos;
               $todo->name=$request['name'];
               $todo->work=$request['work'];
               $todo->dueDate=$request['dueDate'];
               $todo->save();
    
    
               return redirect(route("todo.home"));



    }
}
