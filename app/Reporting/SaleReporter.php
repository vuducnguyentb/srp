<?php


namespace App\Reporting;


use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SaleReporter
{
    public function between($startDate, $endDate)
    {
        // Perform authentication
        // This is application logic and needs to be extracted to the controller
        // if the persistence layer needed to be changed, we would have to change this method
        // Does SalesReporter need to know how a user is authenticated ( Auth::check() ) ? NO
        // Will SalesReporter always need a authenticated user, what if called by an API ?
        if (! Auth::check()) throw new Exception('Authentication required for reporting');

        $sales = $this->queryDBForSalesBetween($startDate, $endDate);

        return $this->format($sales);
    }

    protected function queryDBForSalesBetween($startDate, $endDate)
    {
        // query database
        // it is not this class's responsibility to understand the persistence layer
        // if the persistence layer needed to be changed, we would have to change this method
        return DB::table('sales')->whereBetween('created_at', [$startDate, $endDate])->sum('charge') / 100;
    }

    protected function format($sales)
    {
        // format for output
        // if our output specifications was to change we would again have to modify this change this class
        // it is not this class's responsibility to format the sales data
        return "<h1>Sales: $sales</h1>";
    }
}
