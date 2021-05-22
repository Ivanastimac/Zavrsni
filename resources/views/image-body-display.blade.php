<div class="col-md-3 px-0">
    <!-- prikaz slike -->
        @if($task->bodyImage != NULL)
                <img src = "{{ asset('images-tasks/task' . $task->id) }}" class="img-fluid" alt="{{ asset('images-tasks/task' . $task->id) }}">
        @endif
</div>