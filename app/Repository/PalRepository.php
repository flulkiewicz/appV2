<?php

namespace App\Repository;

use App\Models\Pal;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class PalRepository implements IPalRepository
{
    /**
     * @param int $perPage
     * @return LengthAwarePaginator
     */
    public function findAll(int $perPage = 10): LengthAwarePaginator
    {
        return Pal::query()
            ->select('pals.*')
            ->paginate($perPage);
    }

}
