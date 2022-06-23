<?php

namespace App\Http\Controllers;

use App\Exceptions\NotFoundException;
use App\Models\Pal;
use App\Service\PalService;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PalController extends Controller
{

    const PER_PAGE = 10;

    /**
     * @var PalService
     */
    private PalService $palService;

    /**
     * @param PalService $palService
     */
    public function __construct(PalService $palService)
    {
        $this->palService = $palService;
    }

    /**
    * @return Application|Factory|View
    */
    public function index()
    {
        $pals = $this->palService->getPals(self::PER_PAGE);
        return view(
            'pal.index',
            compact('pals')
        )->with('i', (request()->input('page', 1) - 1) * self::PER_PAGE);
    }

    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('pal.create');
    }

    /**
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $this->palService->createPal($request);
        return redirect()->route('pal.index');
    }

    /**
     * @return Application|Factory|View
     */
    public function edit(Pal $pal)
    {
        return view('pal.edit', compact('pal'));
    }

    /**
     * @return RedirectResponse
     */
    public function update(Request $request, Pal $pal)
    {
            $this->palService->updatePal($request, $pal);
            return redirect()->route('pal.index');
    }

    /**
     * @return RedirectResponse
     */
    public function destroy(Pal $pal)
    {
        try {
        $this->palService->deletePal($pal);
        return redirect()->route('pal.index');
        }  catch (Exception $exception) {
            Log::channel('example')->error($exception->getMessage());
            Log::channel('example')->error($exception->getTraceAsString());
            return back()->withError('Nie można usunąć użytkownika jeśli ma przypisane zadania. Sprawdź jego listę!')->withInput(); }
    }

    /**
     * @return Application|Factory|View
     */
    public function search(Request $request)
    {
        try {
            $pal = Pal::find($request->input('pal_id'));
            if (!$pal) {
                throw new NotFoundException('Ups...');
            } 
            return view('pal.search', compact('pal'));
        } catch (NotFoundException $exception) {
            Log::channel('example')->error($exception->getMessage());
            Log::channel('example')->error($exception->getTraceAsString());
            return back()->withError($exception->getMessage())->withInput();
        }  catch (Exception $exception) {
            Log::channel('example')->error($exception->getMessage());
            Log::channel('example')->error($exception->getTraceAsString());
            return back()->withError('Ups, coś poszło nie tak...')->withInput(); }
    }
}
