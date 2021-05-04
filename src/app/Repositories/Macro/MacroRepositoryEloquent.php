<?php

namespace App\Repositories\Macro;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Macro\MacroRepository;
use App\Models\Macro\Macro;

/**
 * Class MacroRepositoryEloquent.
 *
 * @package namespace App\Repositories\Macro;
 */
class MacroRepositoryEloquent extends BaseRepository implements MacroRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Macro::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
