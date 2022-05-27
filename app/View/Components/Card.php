<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Card extends Component
{
    public $id;
    public $title;
    public $rated;
    public $runtime;
    public $released;
    public $poster;
    public $actors;
    public $genre;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id, $title, $rated, $runtime, $released, $poster, $actors, $genre)
    {
        $this->id = $id;
        $this->title = $title;
        $this->rated = $rated;
        $this->runtime = $runtime;
        $this->released = $released;
        $this->poster = $poster;
        $this->actors = $actors;
        $this->genre = $genre;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.card');
    }
}
