<?php

namespace App\Repositories\Rates;

use App\Repositories\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Rates\RateRepository;
use App\Entities\Rate;

/**
 * Class RateRepositoryEloquent.
 *
 * @package namespace App\Repositories\Rates;
 */
class RateRepositoryEloquent extends BaseRepository implements RateRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Rate::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
