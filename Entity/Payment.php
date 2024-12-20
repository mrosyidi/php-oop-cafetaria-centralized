<?php 

    namespace Entity 
    {
        class Payment
        {
            private ?int $code;
            private ?int $total;
            private ?int $pay;
            private ?int $change;

            public function __construct(?int $code = null, ?int $total = 0, ?int $pay = null)
            {
                $this->code = $code;
                $this->total = $total;
                $this->pay = $pay;
                $this->change = $this->pay-$this->total;
            }

            public function setCode(int $code): void
            {
                $this->code = $code;
            }

            public function getCode(): int
            {
                return $this->code;
            }

            public function setTotal(int $total): void
            {
                $this->total = $total;
            }

            public function getTotal(): int
            {
                return $this->total;
            }

            public function setPay(int $pay): void
            {
                $this->pay = $pay;
            }

            public function getPay(): int
            {
                return $this->pay;
            }

            public function setChange(): void
            {
                $this->change = $this->pay-$this->total;
            }

            public function getChange(): int
            {
                return $this->change;
            }
        }
    }