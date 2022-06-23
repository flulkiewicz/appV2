<?php

namespace App\Service;

use App\Exceptions\NotFoundException;
use App\Models\Pal;
use App\Repository\IPalRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;

class PalService
{
    /**
     * @var IPalRepository
     */
    private IPalRepository $palRepository;

    /**
     * @param IPalRepository $palRepository
     */
    public function __construct(IPalRepository $palRepository)
    {
        $this->palRepository = $palRepository;
    }

    /**
     * @param $perPage
     * @return LengthAwarePaginator
     */
    public function getPals($perPage): LengthAwarePaginator
    {
        return $this->palRepository->findAll($perPage);
    }

    /**
     * @param Request $request
     * @return void
     */
    public function createPal(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required'
        ]);
        Pal::create($request->all());
    }

    /**
     * @param Request $request
     * @param Pal $pal
     * @return void
     */
    public function updatePal(Request $request, Pal $pal)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required'
        ]);
        $pal->update($request->all());
    }

    /**
     * @param Pal $pal
     * @return void
     */
    public function deletePal(Pal $pal)
    {
        $pal->delete();
    }

}
