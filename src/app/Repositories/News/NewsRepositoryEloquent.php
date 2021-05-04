<?php

namespace App\Repositories\News;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\News\NewsRepository;
use App\Models\News\News;
use App\Validators\News\NewsValidator;

/**
 * Class NewsRepositoryEloquent.
 *
 * @package namespace App\Repositories\News;
 */
class NewsRepositoryEloquent extends BaseRepository implements NewsRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return News::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
