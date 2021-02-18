<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Charts\UserChart;
use App\Charts\TodoChart;
use Illuminate\Support\Facades\DB;

class TodoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
//         $todos = Todo::orderBy('completed')->latest()->get();

        //$todos = auth()->user()->todos->sortBy('completed'); //for collection
        $todos = auth()->user()->todos()->orderBy('completed')->latest()->get();
        return view('todo._index', [
            'todos' => $todos
        ]);
    }

    public function create()
    {
        return view('todo._create');
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255|min:3',
            'description' => 'required|max:255|min:3',
        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }

        auth()->user()->todos()->create([
            'title' => $request->title,
            'description' => $request->description,

        ]);

        return redirect('/todos')->with('toast_success', 'Todo was created!');
    }


    public function show(Todo $todo)
    {
        return view('todo._show', compact('todo'));
    }


    public function edit(Todo $todo)
    {
        return view('todo._edit', compact('todo'));
    }


    public function update(Request $request, Todo $todo)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255|min:3',
            'description' => 'required|max:255|min:3',
        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }
        $todo->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect('/todos')->with('toast_success', 'Todo was updated!');
    }


    public function destroy(Todo $todo)
    {
        $todo->delete();
        return redirect('/todos')->with('toast_success', 'Todo was deleted!');
    }

    public function complete(Todo $todo)
    {
        $todo->update([
            'completed' => true,
        ]);
        return redirect(route('todo.index'))->with('toast_success', 'Task marked as completed!');
    }
    public function incomplete(Todo $todo)
    {
        $todo->update([
            'completed' => false,
        ]);
        return redirect(route('todo.index'))->with('toast_success', 'Task marked as incompleted!');
    }


    public function userchart()
    {
        $chart = new UserChart;
        $chart->labels(['January', 'Febuary', 'March', 'April', 'May', 'June',]);
        $chart->dataset('User Signup', 'line', [20, 60, 48, 22, 39, 9]);
        $chart->dataset('User Purchase', 'line', [220, 100, 80, 130, 96]);

        return view('chart.userchart', compact('chart'));
    }

    public function TodoChart()
    {
        $todos_total = DB::table('todos')->count();
        $todos_completed = DB::table('todos')->where('completed', 1)->count();
        $todos_incompleted = DB::table('todos')->where('completed', 0)->count();
        $chart = new TodoChart;
        $chart->labels(['Total Todos', 'Completed Todos', 'Incompleted Todos']);
        $chart->dataset('Todo', 'bar', [$todos_total, $todos_completed, $todos_incompleted ]);

        return view('chart.todoschart', compact('chart'));
    }
}
