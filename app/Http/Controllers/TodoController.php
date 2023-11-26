<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TodoRequest;
use App\Models\Todo;

use function Laravel\Prompts\alert;

class TodoController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    // ===================================== Controller VIEW ==================================

    public function index(){
        $todos = Todo::all();
        return view('todos.index', [
            'todos'=> $todos
        ]);
    }

    public function create(){
        return view('todos.create');
    }

    public function details($id){
        $todo = Todo::findOrFail($id);

        return view('todos.details', ['todo' => $todo]);
    }


    // ===================================== Controller services ==================================

    public function save(TodoRequest $request){
        
        $data = [
            'title' => $request->title,
            'description' => $request -> description
        ];

        if(isset($request->is_completed)){
            $data['is_completed'] = 1;
        }else {
            $data['is_completed'] = 0;
        }

        Todo::create($data);

        $request->session()->flash('alert-success', 'todo berhasil dibuat');

        return to_route('todos.index');
        // return $request->all();
    }

    public function update(Request $request, string $id){

        
        $input = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string|min:5|max:500'
        ]);

        if(isset($request->is_completed)){
            $input['is_completed'] = 1;
        }else {
            $input['is_completed'] = 0;
        }
        // dd($input);
        $todo = Todo::findOrFail($id);
        $todo->update($input);

        return redirect()->route('todos.details',$id)->with(['success' => 'Data telah disimpan']);
    }

    public function delete($id){
        $todo = Todo::findOrFail($id);

        $todo->delete();

        return redirect()->route('todos.index')->with(['success' => 'Data telah dihapus']);
    }
}
