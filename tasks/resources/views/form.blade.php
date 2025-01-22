@extends('layouts.app')

@section('title', isset($task) ? 'Edit Task' : 'Add Task')

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
    <form method="POST" action="{{ isset($task) ? route('tasks.update', ['task' => $task->id]) : route('tasks.store') }}"
        class="space-y-6">
        @csrf
        @isset($task)
            @method('PUT')
        @endisset

        <div>
            <label for="title" class="mb-1 block text-sm font-medium text-gray-700">
                Title
            </label>
            <input type="text" name="title" id="title" value="{{ isset($task) ? $task->title : old('title') }}"
                class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" />
            @error('title')
                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="description" class="mb-1 block text-sm font-medium text-gray-700">
                Description
            </label>
            <textarea name="description" id="description" rows="3"
                class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ isset($task) ? $task->description : old('description') }}</textarea>
            @error('description')
                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="long_description" class="mb-1 block text-sm font-medium text-gray-700">
                Long Description
            </label>
            <textarea name="long_description" id="long_description" rows="5"
                class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ isset($task) ? $task->long_description : old('long_description') }}</textarea>
            @error('long_description')
                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center gap-2">
            <button type="submit"
                class="inline-flex items-center rounded-md bg-blue-500 px-4 py-2 text-white hover:bg-blue-600">
                {{ isset($task) ? 'Update Task' : 'Create Task' }}
            </button>
            <a href="{{ route('tasks.index') }}"
                class="inline-flex items-center rounded-md bg-gray-200 px-4 py-2 hover:bg-gray-300">
                Cancel
            </a>
        </div>
    </form>

@endsection
