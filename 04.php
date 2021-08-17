<?php

    class Movie {
        public string $title;
        public string $studio;
        public string $rating;

        function __construct(string $title, string $studio, string $rating){
            $this->title = $title;
            $this->studio = $studio;
            $this->rating = $rating;
        }
    }

    $casinoRoyale = new Movie("Casino Royale", "Eon Productions", "PG13");
    $glass = new Movie("Glass", "Buena Vista International", "PG13");
    $spiderMan = new Movie("Spider-Man: Into the Spider-Verse", "Columbia Pictures", "PG");

    $movies = [$casinoRoyale, $glass, $spiderMan];

    function getPG(array $movies): array {
        $ratingPGMovies = [];
        foreach($movies as $movie){
            if($movie->rating === "PG"){
                array_push($ratingPGMovies, $movie->title);
            }
        }
        return $ratingPGMovies;
    }

    echo implode("\n", getPG($movies));