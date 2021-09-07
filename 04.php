<?php

    class Movie {
        private string $title;
        private string $studio;
        private string $rating;

        function __construct(string $title, string $studio, string $rating){
            $this->title = $title;
            $this->studio = $studio;
            $this->rating = $rating;
        }

        public function getTitle(): string {
            return $this->title;
        }

        public function getStudio(): string {
            return $this->studio;
        }

        public function getRating(): string {
            return $this->rating;
        }

    }

    $casinoRoyale = new Movie("Casino Royale", "Eon Productions", "PG13");
    $glass = new Movie("Glass", "Buena Vista International", "PG13");
    $spiderMan = new Movie("Spider-Man: Into the Spider-Verse", "Columbia Pictures", "PG");

    $movies = [$casinoRoyale, $glass, $spiderMan];

    function getPG(array $movies): array {
        $ratingPGMovies = [];
        foreach($movies as $movie){
            if($movie->getRating() === "PG"){
                array_push($ratingPGMovies, $movie->getTitle());
            }
        }
        return $ratingPGMovies;
    }

    echo implode("\n", getPG($movies));