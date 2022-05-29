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

    public function __construct($movieid, $name, $length, $releasedt, $poster, $rated)
    {
        $this->movieid = $movieid;
        $this->name = $name;
        $this->length = $length;
        $this->releasedt = $releasedt;
        $this->poster = $poster;
        $this->rated = $rated;
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
