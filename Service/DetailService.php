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

        class DetailServiceImpl implements DetailService
        {
            private DetailRepository $detailRepository;

            public function __construct(DetailRepository $detailRepository)
            {
                $this->detailRepository = $detailRepository;
            }

            public function showDetail(int $code): void
            {
                $details = $this->detailRepository->findAll();

                echo "DAFTAR DETAIL" . PHP_EOL;

                if(empty($details))
                {
                    echo "Tidak ada daftar detail" . PHP_EOL;
                }else
                {
                    $counter = 0;
                    foreach($details as $detail)
                    {
                        if($detail->getCode() == $code)
                        {
                            $counter++;
                            echo "$counter. " . $detail->getCode() . " " . $detail->getName() . " Rp." . $detail->getPrice() .
                            " (x" . $detail->getQty() . ") Rp." . $detail->getSubTotal() . PHP_EOL;
                        }
                    }
                }
            }

            public function addDetail(array $items): void
            {
                
            }
        }
    }