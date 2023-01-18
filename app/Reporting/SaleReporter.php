<?php


namespace App\Reporting;


use App\Repositories\SalesRepository;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SaleReporter
{
    protected $repo;

    public function __construct(SalesRepository $repo)
    {
        $this->repo = $repo;
    }

    public function between($startDate, $endDate,SalesOutputInterface $formatter)
    {
        $sales = $this->repo->between($startDate, $endDate);
        
        return $formatter->output($sales);
    }

}
