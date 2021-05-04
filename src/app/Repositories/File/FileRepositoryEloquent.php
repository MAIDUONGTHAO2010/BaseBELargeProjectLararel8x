<?php

namespace App\Repositories\File;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\File\FileRepository;
use App\Models\File\File;

/**
 * Class FileRepositoryEloquent.
 *
 * @package namespace App\Repositories\File;
 */
class FileRepositoryEloquent extends BaseRepository implements FileRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return File::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
