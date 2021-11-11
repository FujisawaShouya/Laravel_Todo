<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use App\Http\Requests\TodoRequest;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    public function index() {
        if(Auth::check()) {
            $user = Auth::user();
            $items = Todo::where('user_id', $user->id)->get();
            return view('todo.index', ['items' => $items]);
        } else {
            return redirect('/login');
        }
    }

    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function create(TodoRequest $request) {
        $user = Auth::user();
        $todo = Todo::create([
            'user_id' => $user->id,
            'content' => $request->content,
            'deadline' => $request->date
        ]);
        $todo->save();
        
        return redirect('/');
    }

    
}