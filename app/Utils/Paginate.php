<?php

namespace App\Utils;

use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

class Paginate
{
    public static function paginate($items, $perPage = 5, $page = null)
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $total = count($items);
        $path = url()->current();
        $currentpage = $page;
        $offset = ($currentpage * $perPage) - $perPage ;
        $itemstoshow = array_slice($items , $offset , $perPage);
        $lengthpaginator = new LengthAwarePaginator($itemstoshow ,$total,$perPage);
        $lengthpaginator->setPath($path);

        return $lengthpaginator;

    }
}
