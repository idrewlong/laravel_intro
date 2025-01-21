@extends('layouts.app')

@section('title', 'Edit Task')

@section('styles')
<style>
    .error {
        color: red;
        font-size: 0.8em;
    }
</style>
@endsection

@section('content')
{{-- {{$errors}} --}}
<form method="POST" action="{{route('tasks.update', ['task' => $task->id] )}}">
    <!-- Protects the user from CSRF attacks -->
    @csrf
    @method('PUT')
    <div>
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" />
        @error('title')
            <p class="error">{{$message}}</p>
        @enderror
    </div>
    <div>
        <label for="description">Description:</label>
        <textarea name="description" id="description" rows="3"></textarea>
        @error('description')
            <p class="error">{{$message}}</p>
        @enderror
    </div>
    <div>
        <label for="long_description">Long Description:</label>
        <textarea name="long_description" id="long_description" rows="5"></textarea>
        @error('long_description')
            <p class="error">{{$message}}</p>
        @enderror
    </div>
    <div>
        <button type="submit">Edit Task</button>
    </div>
</form>

@endsection
