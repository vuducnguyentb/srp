<?php


namespace App\Reporting;


class HtmlOutput implements SalesOutputInterface
{

    public function output($sales)
    {
        // TODO: Implement output() method.
        return "<h1>Sales: $" . number_format($sales, 2) . "</h1>";
    }
}
