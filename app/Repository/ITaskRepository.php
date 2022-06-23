<?php
namespace App\Repository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
interface ITaskRepository
{
 /**
     * @param int $perPage
     * @return LengthAwarePaginator
     */
public function findAll(int $perPage = 10): LengthAwarePaginator;


 /**
 * @param int $palId
 * @return Collection|null
 */
public function findPalTasks(Request $request): ?Collection;
 
}