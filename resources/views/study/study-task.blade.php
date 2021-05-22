@extends('layouts.game-study.task')

@section('form')
    <form method="POST" action="{{ url('/study/solution/'. $task->id) }}">
@endsection