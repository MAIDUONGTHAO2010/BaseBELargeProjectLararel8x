<?php

namespace App\Services;

use App\Repositories\News\NewsRepository;
use Composer\DependencyResolver\Request;
use Prettus\Repository\Criteria\RequestCriteria;

class NewsService
{
    protected NewsRepository $newsRepository;
    public function __construct(
        NewsRepository $newsRepository
    ) {
        $this->newsRepository = $newsRepository;
    }

    public function index($request)
    {
        $this->newsRepository->pushCriteria(new RequestCriteria($request));

        return $this->newsRepository->where('user_id', auth()->user()->id)->paginate();
    }

    public function create($attributes)
    {
        $attributes['user_id'] = auth()->user()->id;

        return $this->newsRepository->create($attributes);
    }

    public function get($attributes)
    {
        return $this->newsRepository->find($attributes['id']);
    }

    public function update($attributes)
    {
        $attributes['user_id'] = auth()->user()->id;

        return $this->newsRepository->update($attributes, $attributes['id']);
    }

    public function delete($attributes)
    {
        $this->newsRepository->delete($attributes['id']);

        return response(null, 204);
    }

    public function getAll()
    {
        return $this->newsRepository->all();
    }
}
