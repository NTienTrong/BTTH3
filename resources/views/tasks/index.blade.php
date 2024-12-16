@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Danh sách Task</h1>
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success')}}
                <button class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <a href="{{ route('tasks.create') }}" class="btn btn-primary">Thêm mới</a>
        <table class="table">
            <thead>
                <tr>
                    <th style="width: 5%;">ID</th>
                    <th style="width: 20%;">Tiêu đề</th>
                    <th style="width: 45%;">Mô tả</th>
                    <th style="width: 15%;">Trạng thái</th>
                    <th style="width: 15%;">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                    <tr>
                        <td>{{ $task->id }}</td>
                        <td>{{ $task->title }}</td>
                        <td>{{ $task->description }}</td>
                        <td>{{ $task->completed ? 'Hoàn thành' : 'Chưa hoàn thành' }}</td>
                        <td>
                            <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-info">Xem</a>
                            <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning">Sửa</a>
                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-end">
            {{ $tasks->links('pagination::bootstrap-4')}}
        </div>
    </div>
@endsection
