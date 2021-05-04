<?php

namespace App\Repositories\Script;

use App\Repositories\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Script\ScriptRepository;
use App\Entities\Script;

/**
 * Class ScriptRepositoryEloquent.
 *
 * @package namespace App\Repositories\Script;
 */
class ScriptRepositoryEloquent extends BaseRepository implements ScriptRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Script::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
