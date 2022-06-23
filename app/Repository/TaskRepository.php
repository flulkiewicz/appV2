<?php
namespace App\Repository;
use App\Models\Task;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class TaskRepository implements ITaskRepository
{
 /**
 * @param int $palId
 * @return Collection|null
 */
 public function findAll(int $perPage = 10): LengthAwarePaginator
    {
        return task::query()
            ->select('tasks.*')
            ->orderBy('pal_id')
            ->paginate($perPage);
    }

    
    public function findPalTasks(Request $request): ?Collection
    {

        return task::query()
        ->select('tasks.*')
            ->where($request->input('pal_id'))
            ->orderBy('id');
    }

}