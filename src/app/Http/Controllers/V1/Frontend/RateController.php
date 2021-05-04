<?php

namespace App\Http\Controllers\V1\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\RateService;
use App\Transformers\RateTransformer;

class RateController extends Controller
{
    protected RateService $rateService;

    public function __construct(
        RateService $rateService
    )
    {
        $this->rateService = $rateService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->fractal($this->rateService->index($request), new RateTransformer());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = $this->validate(
            $request,
            [
                'script_id' => 'required|numeric',
                'scores' => 'required|numeric'
            ]
        );

        return $this->fractal($this->rateService->create($attributes), new RateTransformer());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->fractal($this->rateService->show($id), new RateTransformer());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $attributes = $this->validate(
            $request,
            [
                'scores' => 'required|numeric'
            ]
        );

        return $this->fractal($this->rateService->update($attributes, $id), new RateTransformer());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->rateService->delete($id);
    }
}
