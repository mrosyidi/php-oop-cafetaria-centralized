<?php 

    namespace Repository 
    {
        use Entity\Detail;

        interface DetailRepository
        {
            public function findAll(): array;
            public function save(Detail $detail): void;
        }
    }