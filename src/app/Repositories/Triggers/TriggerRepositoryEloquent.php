<?php

namespace App\Repositories\Triggers;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Triggers\TriggerRepository;
use App\Entities\Trigger;

/**
 * Class TriggerRepositoryEloquent.
 *
 * @package namespace App\Repositories\Triggers;
 */
class TriggerRepositoryEloquent extends BaseRepository implements TriggerRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Trigger::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
