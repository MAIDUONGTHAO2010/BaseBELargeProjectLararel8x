<?php

namespace App\Repositories\Actions;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Actions\ActionRepository;
use App\Entities\Action;

/**
 * Class ActionRepositoryEloquent.
 *
 * @package namespace App\Repositories\Actions;
 */
class ActionRepositoryEloquent extends BaseRepository implements ActionRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Action::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
