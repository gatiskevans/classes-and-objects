<?php

    class Application
    {
        public VideoStore $store;

        function __construct(VideoStore $store){
            $this->store = $store;
        }

        function run() {
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
                        echo "Sorry, I don't understand you..";
                }
            }
        }

        private function add_movies() {
            //todo
            $movie = readline("Enter the movie to add to the list: ");
            $this->store->addVideo($movie);
        }

        private function rent_video() {
            //todo
        }

        private function return_video() {
            //todo
        }

        private function list_inventory() {
            //todo
        }
    }

    class VideoStore {
        public array $movies = [];
        public Video $video;

        function __construct(Video $video){
            $this->video = $video;
        }

        function addVideo($title){
            array_push($this->movies, $title);
            var_dump($this->movies);
        }

        function checkoutByTitle($title){

        }

    }

    class Video {
        public string $title;
        public bool $checkout;
        public int $averageRating;

        function __construct(string $title, bool $checkout, int $averageRating){
            $this->title = $title;
            $this->checkout = $checkout;
            $this->averageRating = $averageRating;
        }

        function checkOut(): bool {
            return $this->checkout = true;
        }

        function returnVideo(): bool {
            return $this->checkout = false;
        }

        function receiveRating(){

        }
    }

    $newVideo = new Video("The Matrix", false, 5);
    $newStore = new VideoStore($newVideo);

    $app = new Application($newStore);
    $app->run();