<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="grid grid-cols-3">
        <div class="py-3">
            <form wire:submit.prevent="save" method="POST">
                <div class="shadow overflow-hidden sm:rounded-md">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <div>
                            <label for="name" class = "fs-6 text-secondary p-1">Naziv cjeline</label>
                            <input type="text" wire:model="titleLesson" id="name" class = "shadow p-1 mb-2 rounded border-secondary"> <br/>
                            @error('titleLesson') <span class="errorMessage">{{ $message }}</span> @enderror
                        </div>
                        <div class="d-flex align-items-center pt-4">
                            <button  type="submit" class="btn btn-primary btn-sm" onclick = "return confirm('Jeste li sigurni da želite spremiti ovu cjelinu? Naknadne izmjene nisu moguće!')">Spremi cjelinu</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- prva dva diva je tailwind -->
<!-- css za errorMessage je u posebnom fileu -->