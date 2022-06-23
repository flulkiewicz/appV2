<?php

namespace App\Http\Controllers;

use App\Exceptions\NotFoundException;
use App\Models\Task;
use App\Service\TaskService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Exception;
use Illuminate\Database\QueryException;

class TaskController extends Controller
{

    const PER_PAGE = 10;

    /**
     * @var TaskService
     */
    private TaskService $taskService;

    /**
     * @param TaskService $taskService
     */
    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    /**
    * @return Application|Factory|View
    */
    public function index()
    {
        $tasks = $this->taskService->getTasks(self::PER_PAGE);
        return view(
            'task.index',
            compact('tasks')
        )->with('i', (request()->input('page', 1) - 1) * self::PER_PAGE);
    }

    

    /**
     * @return Application|Factory|View
     */
    public function create(Request $request)
    {
        
        return view('task.create');
            
    }

    /**
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        

        try {
            $pal = Task::find($request->input('pal_id'));
            if (!$pal) {
                throw new Exception();
            }
            $this->taskService->createTask($request);
            return redirect()->route('task.index');
            }  catch (Exception $exception) {
                Log::channel('example')->error($exception->getMessage());
                Log::channel('example')->error($exception->getTraceAsString());
                return back()->withError('Coś poszło nie tak... Sprawdź czy wprowadziłeś poprawne dane.')->withInput(); }
        
    }

    /**
     * @return Application|Factory|View
     */
    public function edit(Task $task)
    {
        return view('task.edit', compact('task'));

          

    }

    /**
     * @return RedirectResponse
     */
    public function update(Request $request, Task $task)
    {
        try {
            $this->taskService->updateTask($request, $task);
             return redirect()->route('task.index');
            }  catch (Exception $exception) {
                Log::channel('example')->error($exception->getMessage());
                Log::channel('example')->error($exception->getTraceAsString());
                return back()->withError('Coś poszło nie tak... Sprawdź czy wprowadziłeś poprawne dane.')->withInput(); }
    }

    /**
     * @return RedirectResponse
     */
    public function destroy(Task $task)
    {
        $this->taskService->deleteTask($task);
        return redirect()->route('task.index');
    }

    /**
     * @return Application|Factory|View
     */
    public function search(Request $request)
    {
        try {
            $task = Task::find($request->input('task_id'));
            if (!$task) {
                throw new NotFoundException('Ups...');
            }
            return view('task.search', compact('task'));
        } catch (NotFoundException $exception) {
            Log::channel('example')->error($exception->getMessage());
            Log::channel('example')->error($exception->getTraceAsString());
            return back()->withError($exception->getMessage())->withInput();
        } 
    }

    public function searchById(Request $request)
    {
        try {
        $tasks = $this->taskService->getPalTasks($request);
        return view(
            'task.paltasks',
            compact('tasks'));
        } catch (Exception $exception) {
            Log::channel('example')->error($exception->getMessage());
            Log::channel('example')->error($exception->getTraceAsString());
            return back()->withError('Zespół naszych najwybitniejszych fachowców pracuje nad tą funkcjonalnością!')->withInput(); }
    }
    

}
