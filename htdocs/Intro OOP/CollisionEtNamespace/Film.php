<?php

namespace Media\Elements;

class Film {
        public int $id;
        public string $title;
        public int $duration;
        public string $synopsis;
        public \DateTime $dateParution;
        public string $image;

        public function __construct(array $init){
                $this->hydrate($init);
        }

        public function hydrate(array $update){
                foreach($update as $key => $value){
                $nameSet = "set".ucfirst($key);
                $this->$nameSet($value);
                // $this->$key = $value; //n'utilise pas le setter, mais même résultat
                }
        }

        /**
         * Get the value of id
         */
        public function getId(): int
        {
                return $this->id;
        }

        /**
         * Set the value of id
         */
        public function setId(int $id): self
        {
                $this->id = $id;

                return $this;
        }

        /**
         * Get the value of title
         */
        public function getTitle(): string
        {
                return $this->title;
        }

        /**
         * Set the value of title
         */
        public function setTitle(string $title): self
        {
                $this->title = $title;

                return $this;
        }

        /**
         * Get the value of duration
         */
        public function getDuration(): int
        {
                return $this->duration;
        }

        /**
         * Set the value of duration
         */
        public function setDuration(int $duration): self
        {
                $this->duration = $duration;

                return $this;
        }

        /**
         * Get the value of synopsis
         */
        public function getSynopsis(): string
        {
                return $this->synopsis;
        }

        /**
         * Set the value of synopsis
         */
        public function setSynopsis(string $synopsis): self
        {
                $this->synopsis = $synopsis;

                return $this;
        }

        /**
         * Get the value of dateParution
         */
        public function getDateParution(): \DateTime
        {
                return $this->dateParution;
        }

        /**
         * Set the value of dateParution
         */
        public function setDateParution(\DateTime $dateParution): self
        {
                $this->dateParution = $dateParution;

                return $this;
        }

        /**
         * Get the value of image
         */
        public function getImage(): string
        {
                return $this->image;
        }

        /**
         * Set the value of image
         */
        public function setImage(string $image): self
        {
                $this->image = $image;

                return $this;
        }
}