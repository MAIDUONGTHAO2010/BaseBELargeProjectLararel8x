<?php

namespace App\Http\Controllers\V1\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\ScriptService;
use App\Transformers\ScriptTransformer;

class ScriptController extends Controller
{
    protected ScriptService $scriptService;

    public function __construct(
        ScriptService $scriptService
    )
    {
        $this->scriptService = $scriptService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->fractal($this->scriptService->index($request), new ScriptTransformer());
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
                'name' => 'required|string',
                'type_id' => 'boolean',
                'price' => 'numeric',
                'currency' => 'numeric',
                'version' => 'required|string',
                'phone_model' => 'required|string',
                'os_version' => 'required|string',
                'category' => 'required|numeric',
                'sub_category' => 'required|numeric',
                'description' => 'string',
                'settings.loop'  => 'required|numeric',
                'settings.run_until'  => 'required|numeric',
                'actions'    => 'required|array',
                'actions.*.type'  => 'required|numeric|in:-1,0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22',
                'actions.*.x' => 'required|numeric',
                'actions.*.y' => 'required|numeric',
                'actions.*.r' => 'required|numeric',
                'actions.*.condition' => 'numeric',
                'actions.*.operator' => 'numeric',
                'actions.*.param' => 'string',
                'actions.*.rect_left' => 'numeric',
                'actions.*.rect_top' => 'numeric',
                'actions.*.rect_bottom' => 'numeric',
                'actions.*.rect_right' => 'numeric',
                'actions.*.package_name' => 'string',
                'actions.*.click_action_type' => 'numeric',
                'actions.*.duration' => 'numeric',
            ]
        );

        return $this->fractal($this->scriptService->create($attributes), new ScriptTransformer());;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function download($id)
    {
        $zip_file = 'macro-'. $id . '.zip';
        $zip = new \ZipArchive();
        $zip->open($zip_file, \ZipArchive::CREATE | \ZipArchive::OVERWRITE);
        
        $path = storage_path('app/macros/'.$id);
        $files = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($path));
        foreach ($files as $name => $file)
        {
            if (!$file->isDir()) {
                $filePath     = $file->getRealPath();
                $relativePath = 'macro/' . substr($filePath, strlen($path) + 1);
                $zip->addFile($filePath, $relativePath);
            }
        }
        $zip->close();

        return response()->download($zip_file);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->fractal($this->scriptService->show($id), new ScriptTransformer());
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
                'name' => 'required|string',
                'type_id' => 'boolean',
                'price' => 'numeric',
                'currency' => 'numeric',
                'version' => 'required|string',
                'phone_model' => 'required|string',
                'os_version' => 'required|string',
                'category' => 'required|numeric',
                'sub_category' => 'required|numeric',
                'description' => 'string',
            ]
        );

        return $this->fractal($this->scriptService->update($attributes, $id), new ScriptTransformer());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->scriptService->delete($id);
    }
}
