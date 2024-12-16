@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Thêm mới Task</h1>
        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Tiêu đề:</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
                @if ($errors->has('title'))
                    <div class="alert alert-danger mt-2">
                        {{ $errors->first('title') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="description">Mô tả:</label>
                <textarea class="form-control" id="description" name="description">{{ old('description') }}</textarea>
                @if ($errors->has('description'))
                    <div class="alert alert-danger mt-2">
                        {{ $errors->first('description') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="long_description">Mô tả chi tiết:</label>
                <textarea class="form-control" id="long_description" name="long_description">{{ old('long_description') }}</textarea>
            </div>
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="completed" name="completed">
                <label class="form-check-label" for="completed">Hoàn thành</label>
            </div>
            <button type="submit" class="btn btn-primary">Lưu</button>
            <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Quay lại</a>
        </form>
    </div>
@endsection
