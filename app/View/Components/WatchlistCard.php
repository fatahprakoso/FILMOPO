<?php

namespace App\View\Components;

use Illuminate\View\Component;

class WatchlistCard extends Component
{
    public $movieid;
    public $name;
    public $length;
    public $releasedt;
    public $poster;
    public $rated;
    public $watched;

    public function __construct($movieid, $name, $length, $releasedt, $poster, $rated, $watched)
    {
        $this->movieid = $movieid;
        $this->name = $name;
        $this->length = $length;
        $this->releasedt = $releasedt;
        $this->poster = $poster;
        $this->rated = $rated;
        $this->watched = $watched;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.watchlist-card');
    }
}
