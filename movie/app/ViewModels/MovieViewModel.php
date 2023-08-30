<?php

namespace App\ViewModels;

use Spatie\ViewModels\ViewModel;

class MovieViewModel extends ViewModel
{
    public $movie;
    public $watched;
    public function __construct($movie, $watched,)
    {
        $this->movie = $movie;
        $this->watched = $watched;
    }
    public function movie()
    {
        return collect($this->movie)->merge([
            'poster_path' => 'https://www.themoviedb.org/t/p/w235_and_h235_face/' . $this->movie['poster_path'],
            'vote_average' =>  $this->movie['vote_average'] * 10,
            'release_date' =>  \Carbon\Carbon::parse($this->movie['release_date'])->format('M d, Y'),
            'genres' => collect($this->movie['genres'])->pluck('name')->flatten()->implode(', '),
            'crew' => collect($this->movie['credits']['crew'])->take(2),
            'cast' => collect($this->movie['credits']['cast'])->take(5),
            'images' => collect($this->movie['images']['backdrops'])->take(9),
            'watched' => $this->watched
        ]);
    }
}
