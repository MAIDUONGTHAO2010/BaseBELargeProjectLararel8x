<?php

namespace App\Services;

use App\Repositories\Macro\MacroRepository;
use App\Repositories\File\FileRepository;
use Prettus\Repository\Criteria\RequestCriteria;

class MacroService
{
    protected MacroRepository $macroRepository;
    protected FileRepository $fileRepository;

    public function __construct(
        MacroRepository $macroRepository,
        FileRepository $fileRepository
    )
    {
        $this->macroRepository = $macroRepository;
        $this->fileRepository = $fileRepository;
    }

    public function index($request)
    {
        $this->macroRepository->pushCriteria(new RequestCriteria($request));
        
        return $this->macroRepository->where('user_id', auth()->user()->id)->paginate();
    }

    public function create($attributes)
    {
        $attributes['user_id'] = auth()->user()->id;
        $macro = $this->macroRepository->create($attributes);

        $screenshots = $attributes['screenshots'];
        foreach ($screenshots  as $screenshot) {
            $extension = $screenshot->getClientOriginalExtension();
            $filename  = 'macro' . time() . '.' . $extension;
            $path = $screenshot->storeAs('macros/' . $macro->id, $filename);
            $this->fileRepository->create(
                [
                    'path' => $path,
                    'type' => $extension,
                    'field' => 1,
                    'name' => $filename,
                    'macro_id' => $macro->id
                ]
            );
        }

        $file = $attributes['file'];
        $extension = $file->getClientOriginalExtension();
        $filename  = 'macro' . time() . '.' . $extension;
        $path = $screenshot->storeAs('macros/' . $macro->id, $filename);
        $this->fileRepository->create(
            [
                'path' => $path,
                'type' => $extension,
                'field' => 0,
                'name' => $filename,
                'macro_id' => $macro->id
            ]
        );
        
        return $macro;
    }
}
