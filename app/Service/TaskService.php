<?php

namespace App\Service;

use App\Exceptions\NotFoundException;
use App\Models\Task;
use App\Repository\ITaskRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;

class TaskService
{
    /**
     * @var ITaskRepository
     */
    private ITaskRepository $taskRepository;

    /**
     * @param ITaskRepository $taskRepository
     */
    public function __construct(ITaskRepository $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    /**
     * @param $perPage
     * @return LengthAwarePaginator
     */
    public function getTasks($perPage): LengthAwarePaginator
    {
        return $this->taskRepository->findAll($perPage);
    }

    public function getPalTasks(Request $request)
    {
        return $this->taskRepository->findPalTasks($request);
    }

   

    /**
     * @param Request $request
     * @return void
     */
    public function createTask(Request $request)
    {
        $request->validate([
            'pal_id' => 'required',
            'description' => 'required',
        ]);
        Task::create($request->all());
    }

    /**
     * @param Request $request
     * @param Task $task
     * @return void
     */
    public function updateTask(Request $request, Task $task)
    {
        $request->validate([
            'pal_id' => 'required',
            'description' => 'required',
        ]);
        $task->update($request->all());
    }

    /**
     * @param Task $task
     * @return void
     */
    public function deleteTask(Task $task)
    {
        $task->delete();
    }

}
