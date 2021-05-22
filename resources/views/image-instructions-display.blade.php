<div class="col-md-3 px-0">
        @if($task->bodyImageInstructions != NULL)
            <img src = "{{ asset('images-instructions/instructions' . $task->id) }}" class="img-fluid" alt="{{ asset('images-instructions/instructions' . $task->id) }}">
        @endif
</div>