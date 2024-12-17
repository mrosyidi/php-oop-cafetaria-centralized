<?php 

    namespace Entity 
    {
        class Drink
        {
            private ?string $name;
            private ?int $price;

            public function __construct(?string $name = null, ?int $price = null)
            {
                $this->name = $name;
                $this->price = $price;
            }

            public function getName(): ?string
            {
                return $this->name;
            }

            public function setName(?string $name): void
            {
                $this->name = $name;
            }

            public function getPrice(): ?int
            {
                return $this->price;
            }

            public function setPrice(?int $price): void
            {
                $this->price = $price;
            }
        }
    }