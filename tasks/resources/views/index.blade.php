@extends('layouts.app')

@section('title', 'The List of Tasks')


<!-- You can use Blade Templates to render dynamic content -->
{{-- <div>
       <h1>Task List:</h1>
</div> --}}

<!-- Directive -->

{{-- @isset($name)
<div>The name is: {{$name}} </div>
@endisset --}}

@section('content')
    {{-- @if (count($tasks)) --}}
    {{-- @foreach ($tasks as $task)
    <div>{{$task -> title}}</div>
    @endforeach --}}
    <div class="mb-4">
        <a href="{{ route('tasks.create') }}" class="inline-block rounded bg-blue-500 px-4 py-2 text-white hover:bg-blue-600">
            Add Task
        </a>
    </div>
    @forelse($tasks as $task)
        <div class="mb-3 flex items-center justify-between border-b py-2">
            <div class="flex items-center">
                @if ($task->completed)
                    <span class="mr-2 text-green-500">✓</span>
                @endif
                <a href="{{ route('tasks.show', ['task' => $task->id]) }}"
                    class="hover:text-blue-600 {{ $task->completed ? 'line-through' : '' }}">
                    {{ $task->title }}
                </a>
            </div>
            <div class="text-sm text-gray-500">
                {{ $task->created_at->diffForHumans() }}
            </div>
        </div>
    @empty
        <div class="text-gray-600">No tasks yet!</div>
    @endforelse

    @if ($tasks->count())
        <nav class="mt-4">
            {{ $tasks->links() }}
        </nav>
    @endif
    {{-- @endif --}}
@endsection
