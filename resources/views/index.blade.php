@extends('layouts.app')

@section('title', 'Tasks List.')

@section('content')
<div>
    {{-- @if (count($tasks)) --}}
    @forelse ($tasks as $task)
        {{-- <h4>
            <div>{{ $task->title }}</div>
        </h4> --}}

        <div>
            <h3>
                <a href="{{ route('tasks.show', ['id' => $task->id]) }}">{{ $task->title }}</a>
            </h3>
        </div>
    @empty
        <div>There are no tasks.</div>
    @endforelse
    {{-- @endif --}}
</div>
@endsection
