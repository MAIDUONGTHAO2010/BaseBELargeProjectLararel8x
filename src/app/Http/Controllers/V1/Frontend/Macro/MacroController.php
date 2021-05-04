<?php

namespace App\Http\Controllers\V1\Frontend\Macro;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\MacroService;
use App\Transformers\MacroTransformer;
use ZipArchive;

class MacroController extends Controller
{
    protected MacroService $macroService;

    public function __construct(
        MacroService $macroService
    )
    {
        $this->macroService = $macroService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->fractal($this->macroService->index($request), new MacroTransformer());
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
                'price' => 'numeric',
                'name' => 'required|string',
                'description' => 'string',
                'status' => 'boolean',
                'file'  => 'required|file|mimes:zip',
                'screenshots' => 'required|array',
                'screenshots.*' => 'required|file|mimes:jpeg,png,jpg,gif'
            ]
        );

        $macro = $this->macroService->create($attributes);

        return $this->fractal($macro, new MacroTransformer());
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
