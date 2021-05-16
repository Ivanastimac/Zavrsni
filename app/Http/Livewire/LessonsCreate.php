<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Lesson;

class LessonsCreate extends Component
{

    public $titleLesson;

    protected $rules = [
        'titleLesson' => 'required|min:3',
    ];

    protected $messages = [
        'titleLesson.required' => 'Polje naziv cjeline je obavezno popuniti!',
        'titleLesson.min' => 'Naziv cjeline mora imati minimalno 3 znaka!',
    ];

    public function updated($titleLesson)
    {

        $this->validateOnly($titleLesson);
    }

    public function save() {

        $validatedData = $this->validate();

        Lesson::create([
            'title' => $this->titleLesson
        ]);

        redirect('/lessons/index');
    }

    public function render()
    {
        return view('livewire.lessons-create');
    }
}
