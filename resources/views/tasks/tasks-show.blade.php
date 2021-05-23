<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Zadaci') }}
        </h2>
    </x-slot>
    <table class="table">
        <tbody>
            <tr>
                <td style="width:30%"> Razina: </td> <td> {{ $level }} </td>
            </tr>
            <tr>
                <td> Naslov: </td> <td> {{ $task->title }} </td>
            </tr>
            <tr>
                <td> Tekst zadatka: </td>
                <td> @if($task->bodyText != NULL)
                        {{ $task->bodyText }}
                    @endif 
                </td>
            </tr>
        </tbody>
    </table>
    
    <span>
        @include('image-body-display') 
    </span>
           
    <table class="table">
        <tbody>
            <tr> 
                <td style="width:30%"> Prvo ponuđeno rješenje: </td>
                <td> {{ $task->firstAnswer }}
                        @if ($task->solution == '1')
                            (točno)
                        @endif
                </td>
            </tr>
            <tr> 
                <td> Drugo ponuđeno rješenje: </td>
                <td> {{ $task->secondAnswer }}
                        @if ($task->solution == '2')
                            (točno)
                        @endif
                </td>
            </tr>
            <tr> 
                <td> Treće ponuđeno rješenje: </td>
                <td> {{ $task->thirdAnswer }}
                        @if ($task->solution == '3')
                            (točno)
                        @endif
                </td>
            </tr>
            <tr> 
                <td> Četvrto ponuđeno rješenje: </td>
                <td> {{ $task->fourthAnswer }}
                        @if ($task->solution == '4')
                            (točno)
                        @endif
                </td>
            </tr>
            <tr>
                <td> Objašnjenje zadatka: </td>
                <td> @if($task->instructions != NULL)
                        {{ $task->instructions }}
                    @endif 
                </td>
            </tr>
        </tbody>
    </table>
    <span> 
        @include('image-instructions-display') 
    </span>
</x-app-layout>