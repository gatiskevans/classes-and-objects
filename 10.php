<?php

    class Application
    {
        public VideoStore $store;

        public function __construct(VideoStore $store){
            $this->store = $store;
        }

        public function run(): void {
            while (true) {
                echo "Choose the operation you want to perform \n";
                echo "Choose 0 for EXIT\n";
                echo "Choose 1 to fill video store\n";
                echo "Choose 2 to rent video (as user)\n";
                echo "Choose 3 to return video (as user)\n";
                echo "Choose 4 to list inventory\n";

                $command = (int)readline();

                switch ($command) {
                    case 0:
                        echo "Bye!";
                        die;
                    case 1:
                        $this->add_movies();
                        break;
                    case 2:
                        $this->rent_video();
                        break;
                    case 3:
                        $this->return_video();
                        break;
                    case 4:
                        $this->list_inventory();
                        break;
                    default:
                        echo "Sorry, I don't understand you..\n";
                }
            }
        }

        private function add_movies(): void {
            $movie = readline("Enter the movie to add to the list: ");
            if(trim($movie) !== "") $this->store->addVideo($movie);
        }

        private function rent_video(): void {
            echo $this->store->listInventory();
            $movie = readline("Choose a movie to rent: ");
            if(is_numeric($movie)) $this->store->checkoutByTitle($movie);
        }

        private function return_video(): void {
            echo $this->store->listInventory();
            $movie = readline("Choose a movie to return: ");
            if(is_numeric($movie)) $this->store->returnVideo($movie);
        }

        private function list_inventory(): void {
            echo $this->store->listInventory();
            $prompt = readline("Choose a movie to leave the rating. ");
            switch($prompt){
                case 0:
                case $prompt < count($this->store->movies):
                    $this->store->leaveRating($prompt);
                    break;
                default:
                    break;
            }
        }
    }

    class VideoStore {
        public array $movies = [];

        public function __construct(Video $video){
            $this->movies[] = $video;
        }

        public function addVideo(string $title): void {
            $this->movies[] = new Video($title, false);
        }

        public function checkoutByTitle(int $titleIndex): void {
            foreach($this->movies as $index => $movie){
                if($movie->checkout === true && $index === $titleIndex) {
                    echo "You cannot rent this movie. It's already taken\n";
                } else if ($index === $titleIndex) $movie->checkout();
            }
        }

        public function returnVideo(int $titleIndex): void {
            foreach($this->movies as $index => $movie){
                if($movie->checkout === false && $index === $titleIndex){
                    echo "This movie is already in the store!\n";
                } else if($index === $titleIndex) $movie->returnVideo();
            }
        }

        public function listInventory(): string {
            $listOfMovies = '';
            foreach($this->movies as $index => $movie){
                $movie->checkout ? $checkout = "Available: \e[31mNo\e[0m" : $checkout = "Available: \e[32mYes\e[0m";
                $listOfMovies .= "$index | \e[32m$movie->title\e[0m $checkout Rating: {$movie->getAverageRatings()} ";
                $listOfMovies .= "Positive ratings: {$movie->positiveRatings()}\n";
            }
            return $listOfMovies;
        }

        public function leaveRating(int $movieIndex): void {
            echo "Movie title: {$this->movies[$movieIndex]->title}\n";
            echo "Average rating: {$this->movies[$movieIndex]->getAverageRatings()}\n";
            $rating = readline("Leave a rating for this movie (0-10): ");
            if($rating > 10 || $rating < 0) {
                echo "You cannot leave such a rating\n";
            } else {
                $this->movies[$movieIndex]->receiveRating($rating);
            }
        }

    }

    class Video {
        public string $title;
        public bool $checkout;
        public array $averageRatings = [];

        public function __construct(string $title, bool $checkout){
            $this->title = $title;
            $this->checkout = $checkout;
        }

        public function checkOut(): bool {
            return $this->checkout = true;
        }

        public function returnVideo(): bool {
            return $this->checkout = false;
        }

        public function receiveRating(int $input): void {
            $this->averageRatings[] = $input;
        }

        public function positiveRatings(): string {
            if(!$this->averageRatings) return "\e[33mNo Rating\e[0m";
            $percents = number_format(array_sum($this->averageRatings)*10 / count($this->averageRatings), 2);
            if($percents > 50) return "\e[32m$percents%\e[0m";
            return "\e[31m$percents%\e[0m";
        }

        public function getAverageRatings(): int {
            if(!$this->averageRatings) return 0;
            return array_sum($this->averageRatings) / count($this->averageRatings);
        }
    }

    $newVideo = new Video("The Matrix", false);
    $newStore = new VideoStore($newVideo);

    $newStore->addVideo("Godfather II");
    $newStore->addVideo("Star Wars Episode IV: A New Hope");

    $app = new Application($newStore);
    $app->run();