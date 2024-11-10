<!-- You can use Blade Templates to render dynamic content -->
<div>
       <h1>Task List:</h1>
</div>

<!-- Directive -->

{{-- @isset($name)
<div>The name is: {{$name}} </div>
@endisset --}}

<div>
   {{-- @if(count($tasks)) --}}
    {{-- @foreach($tasks as $task)
    <div>{{$task -> title}}</div>
    @endforeach --}}
    @forelse($tasks as $task)
    <div>{{$task -> title}}</div>
    @empty
    <div>There are no tasks!</div>
    @endforelse

   {{-- @endif --}}
</div>
