<?php 

    namespace Repository 
    {
        use Entity\Detail;

        interface DetailRepository
        {
            public function findAll(): array;
            public function save(Detail $detail): void;
        }

        class DetailRepositoryImpl implements DetailRepository
        {
            public array $details = array();

            public function findAll(): array
            {
                return $this->details;
            }

            public function save(Detail $detail): void
            {

            }
        }
    }