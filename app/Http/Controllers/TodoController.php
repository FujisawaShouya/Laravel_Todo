<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use App\Models\Complete;
use App\Http\Requests\TodoRequest;
use App\Http\Requests\UpdateRequest;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

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

    public function update(UpdateRequest $request) {
        Todo::where('id', $request->id)->update([
            'content'=>$request->updated_content
        ]);

        return redirect('/');
    }

    public function complete(Request $request) {
        $user = Auth::user();
        $date = Carbon::now();
        $list = Todo::where('id', $request->id)->value('content');
        $deadline = Todo::where('id', $request->id)->value('deadline');
        Complete::create([
            'user_id'=> $user->id,
            'list'=> $list,
            'completed_date'=> $date->format('Y-m-d'),
            'deadline'=> $deadline
        ]);

        Todo::where('id', $request->id)->delete();

        return redirect('/');
    }

    public function pagenate() {
        if(Auth::check()) {
            $user = Auth::user();
            $items = Complete::where('user_id', $user->id)->get();

            return view('todo.complete', ['items'=> $items]);
        }
    }

    public function relisting(Request $request) {
        $user = Auth::user();
        $list = Complete::where('id', $request->id)->value('list');
        $deadline = Complete::where('id', $request->id)->value('deadline');
        Todo::create([
            'user_id'=> $user->id,
            'content'=> $list,
            'deadline'=> $deadline
        ]);
        Complete::where('id', $request->id)->delete();

        return redirect('/list');
    }
}