<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Zadatak') }}
        </h2>
    </x-slot>
    <table class="table">
        <tbody>
            <form method="POST" action="{{ url('/game/solution/'. $task->id) }}">
                @csrf
                <table>
                    <tr><td colspan='2'> {!! html_entity_decode($task->body) !!} </td></tr>
                </table>
            </form>
        </tbody>
    </table>
</x-app-layout>