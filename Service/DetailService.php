<?php 

    namespace Service 
    {
        use Entity\Detail;
        use Repository\DetailRepository;

        interface DetailService
        {
            public function showDetail(int $code): void;
            public function addDetail(array $items): void;
        }
    }