<?php

namespace App\Repository;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

interface IPalRepository
{

    /**
     * @param int $perPage
     * @return LengthAwarePaginator
     */
    public function findAll(int $perPage = 10): LengthAwarePaginator;

}
