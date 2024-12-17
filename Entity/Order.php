<?php   

    namespace Entity 
    {
        class Order
        {
            private ?int $code;
            private ?string $name;
            private ?int $price;
            private ?int $qty;
            private ?int $sub_total;

            public function __construct(?int $code = null, ?string $name = null, ?int $price = null, ?int $qty = null)
            {
                $this->code = $code;
                $this->name = $name;
                $this->price = $price;
                $this->qty = $qty;
                $this->sub_total = $price * $qty;
            }

            public function getCode(): ?int
            {
                return $this->code;
            }

            public function setCode(?int $code): void
            {
                $this->code = $code;
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

            public function getQty(): ?int
            {
                return $this->qty;
            }

            public function setQty(?int $qty): void
            {
                $this->qty = $qty;
            }

            public function getSubTotal(): ?int
            {
                return $this->price * $this->qty;
            }

            public function setSubTotal(): void
            {
                $this->sub_total = $this->price * $this->qty;
            }
        }
    }