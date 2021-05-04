<?php

namespace App\Services;

use App\Repositories\Rates\RateRepository;
use Prettus\Repository\Criteria\RequestCriteria;

class RateService
{
    protected RateRepository $rateRepository;

    public function __construct(
        RateRepository $rateRepository
    )
    {
        $this->rateRepository = $rateRepository;
    }

    public function index($request)
    {
        $this->rateRepository->pushCriteria(new RequestCriteria($request));
        
        return $this->rateRepository->where('user_id', auth()->user()->id)->paginate();
    }

    public function show($id)
    {   
        return $this->rateRepository->where('user_id', auth()->user()->id)->find($id);
    }

    public function create($attributes)
    {
        $attributes['user_id'] = auth()->user()->id;
        return $this->rateRepository->create($attributes);
    }

    public function update($attributes, $id)
    {
       $this->rateRepository->find($id)->update($attributes);
       return $this->rateRepository->find($id);
    }

    public function delete($id)
    {
        $id = $this->rateRepository->findByRouteKeyName($id)->getKey();

        $this->rateRepository->delete($id);
        return response('', 204);
    }
}
