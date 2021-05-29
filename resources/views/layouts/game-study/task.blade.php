<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="{{ asset('css/background.css') }}">
</head>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Zadatak') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 p-5">
        <div class="grid grid-cols-3">
            <div class="col-start-2 py-3">
                <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <div>
                                @if($task->bodyText != NULL)
                                    {{ $task->bodyText }}
                                @endif
                                <div class="col-md-12 px-0">
                                    @include('image-body-display')
                                </div>
                            </div>
                            <div>
                                @yield('form')
                                    @csrf
                                    <div class="ps-3">
                                        <div class="form-check py-1">
                                            <input class="form-check-input" type="radio" id="1" name="answer" value="1">
                                            <label class="form-check-label" for="1">{{ $task->firstAnswer }}</label><br />
                                        </div>
                                        <div class="form-check py-1">
                                            <input class="form-check-input" type="radio" id="2" name="answer" value="2">
                                            <label class="form-check-label" for="2">{{ $task->secondAnswer }}</label><br />
                                        </div>
                                        <div class="form-check py-1">
                                            <input class="form-check-input" type="radio" id="3" name="answer" value="3">
                                            <label class="form-check-label" for="3">{{ $task->thirdAnswer }}</label><br />
                                        </div>
                                        <div class="form-check py-1">
                                            <input class="form-check-input" type="radio" id="4" name="answer" value="4">
                                            <label class="form-check-label" for="4">{{ $task->fourthAnswer }}</label><br />
                                        </div>
                                    </div>
                                    <div class="pt-2">
                                        <input type="submit" class="btn btn-primary btn-sm" value="Predaj odgovor">
                                    </div>
                                </form>
                            </div>
</x-app-layout>