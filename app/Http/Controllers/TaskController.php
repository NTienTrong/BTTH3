<?php

namespace App\Http\Controllers;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::orderBy('created_at', 'desc')->paginate(5);
        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ],[
            'title.required' => 'Tiêu đề không được để trống!',
            'description.required' => 'Mô tả không được để trống!',
        ]);

        $data = $request->all();
        $data['completed'] = $request->has('completed') ? 1 : 0;
        Task::create($data);
        return redirect()->route('tasks.index')->with('success', 'Thêm thành công!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $task = Task::find($id);
        return view('tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $task = Task::find($id);
        return view('tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ],[
            'title.required' => 'Tiêu đề không được để trống!',
            'description.required' => 'Mô tả không được để trống!',
        ]);

        $task = Task::find($id);
        $data = $request->all();
        $data['completed'] = $request->has('completed') ? 1 : 0;
        $task->update($data);
        return redirect()->route('tasks.index')->with('success', 'Cập nhật thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $task = Task::find($id);
        return redirect()->route('tasks.index')->with('success', 'Xóa thành công!');
    }
}
