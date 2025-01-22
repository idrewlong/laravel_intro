@extends('layouts.app')

@section('title', $task->title)

@section('content')
    <div class="mb-4">
        <div class="mb-4 flex items-center justify-between">
            <div class="flex items-center gap-4">
                <a href="{{ route('tasks.index') }}" class="rounded bg-gray-200 px-4 py-2 text-gray-700 hover:bg-gray-300">
                    ← Back
                </a>

                <a href="{{ route('tasks.edit', ['task' => $task->id]) }}"
                    class="rounded bg-blue-500 px-4 py-2 text-white hover:bg-blue-600">
                    Edit
                </a>
            </div>

            <form action="{{ route('tasks.destroy', ['task' => $task->id]) }}" method="POST"
                onsubmit="return confirm('Are you sure you want to delete this task?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="rounded bg-red-500 px-4 py-2 text-white hover:bg-red-600">
                    Delete
                </button>
            </form>
        </div>

        <p class="mb-4 text-gray-700">{{ $task->description }}</p>

        @if ($task->long_description)
            <p class="mb-4 text-gray-700">{{ $task->long_description }}</p>
        @endif

        <div class="mb-4">
            <form action="{{ route('tasks.toggle-complete', ['task' => $task->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <button type="submit"
                    class="rounded {{ $task->completed ? 'bg-gray-500 hover:bg-gray-600' : 'bg-green-500 hover:bg-green-600' }} px-4 py-2 text-white">
                    {{ $task->completed ? 'Mark as Incomplete' : 'Mark as Complete' }}
                </button>
            </form>
        </div>

        <div class="mt-4 text-sm text-gray-500">
            Created: {{ $task->created_at->diffForHumans() }}
            <br>
            Updated: {{ $task->updated_at->diffForHumans() }}
        </div>
    </div>
@endsection
