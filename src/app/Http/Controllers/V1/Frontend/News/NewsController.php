<?php

namespace App\Http\Controllers\V1\frontend\News;

use App\Http\Controllers\Controller;
use App\Services\NewsService;
use App\Transformers\NewsTransformer;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    protected NewsService $newsService;

    public function __construct(
        NewsService $newsService
    ) {
        $this->newsService = $newsService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->fractal($this->newsService->index($request), new NewsTransformer());
    }

    public function store(Request $request)
    {
        $attributes = $this->validate(
            $request,
            [
                'title' => 'required|string',
                'content' => 'required|string'
            ]
        );
        return $this->fractal($this->newsService->create($attributes), new NewsTransformer());
    }

    public function show(Request $request)
    {
        return $this->fractal($this->newsService->get($request), new NewsTransformer());
    }

    public function update(Request $request)
    {
        $attributes = $this->validate(
            $request,
            [
                'title' => 'required|string',
                'content' => 'required',
                'id'=>'required'
            ]
        );
        return $this->fractal($this->newsService->update($attributes), new NewsTransformer());
    }

    public function destroy(Request $request)
    {
        return  $this->newsService->delete($request);
    }

    public function getListNews(Request $request)
    {
        return  $this->newsService->getAll();
    }
}
