<?php

namespace App\Presenters;

use App\Transformers\File\FileTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class FilePresenter.
 *
 * @package namespace App\Presenters;
 */
class FilePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new FileTransformer();
    }
}
