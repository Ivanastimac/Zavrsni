@extends('layouts.game-study.task')

@section('form')
    <form method="POST" action="{{ url('/game/solution/'. $task->id) }}">
@endsection