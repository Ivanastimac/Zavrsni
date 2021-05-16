<div class="container m-4 w-75">
    <div class="shadow p-5 mb-5 bg-body rounded w-50">
        <form wire:submit.prevent="save" method="POST">
            <div class="col">
                <label for="name" class = "fs-6 text-secondary p-1">Naziv cjeline</label>
                <input type="text" wire:model="titleLesson" id="name" class = "shadow p-1 mb-4 rounded border-secondary">
                @error('titleLesson') <span ...>{{ $message }}</span> @enderror
            </div>
            <div>
                <button  type="submit" class="btn btn-primary btn-sm">Spremi cjelinu</button>
            </div>
        </form>
    </div>
</div>
  

