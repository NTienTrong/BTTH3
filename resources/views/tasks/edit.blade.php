@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Sửa Task</h1>
        <form action="{{ route('tasks.update', $task->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Tiêu đề:</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $task->title) }}">
                @if ($errors->has('title'))
                    <div class="alert alert-danger mt-2">
                        {{ $errors->first('title') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="description">Mô tả:</label>
                <textarea class="form-control" id="description" name="description">{{ old('description', $task->description)}}</textarea>
                @if ($errors->has('description'))
                    <div class="alert alert-danger mt-2">
                        {{ $errors->first('description') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="long_description">Mô tả chi tiết:</label>
                <textarea class="form-control" id="long_description" name="long_description">{{ $task->long_description }}</textarea>
            </div>
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="completed" name="completed" {{ $task->completed ? 'checked' : '' }}>
                <label class="form-check-label" for="completed">Hoàn thành</label>
            </div>
            <button type="submit" class="btn btn-primary">Cập nhật</button>
            <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Quay lại</a>
        </form>
    </div>
@endsection
