@extends('layouts.app')

@section('title', 'The List of Tasks:')


<!-- You can use Blade Templates to render dynamic content -->
{{-- <div>
       <h1>Task List:</h1>
</div> --}}

<!-- Directive -->

{{-- @isset($name)
<div>The name is: {{$name}} </div>
@endisset --}}

@section('content')
   {{-- @if(count($tasks)) --}}
    {{-- @foreach($tasks as $task)
    <div>{{$task -> title}}</div>
    @endforeach --}}
    @forelse($tasks as $task)
    <div>
        <a href="{{ route('tasks.show', ['task' => $task->id])}}">{{$task -> title}}</a>
    </div>
    @empty
    <div>There are no tasks!</div>
    @endforelse

   {{-- @endif --}}
@endsection
