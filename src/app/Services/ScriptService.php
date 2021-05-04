<?php

namespace App\Services;

use App\Repositories\Script\ScriptRepository;
use App\Repositories\Settings\SettingRepository;
use App\Repositories\Actions\ActionRepository;
use Prettus\Repository\Criteria\RequestCriteria;

class ScriptService
{
    protected ScriptRepository $scriptRepository;
    protected SettingRepository $settingRepository;
    protected ActionRepository $actionRepository;

    public function __construct(
        ScriptRepository $scriptRepository,
        SettingRepository $settingRepository,
        ActionRepository $actionRepository
    )
    {
        $this->scriptRepository = $scriptRepository;
        $this->settingRepository = $settingRepository;
        $this->actionRepository = $actionRepository;
    }

    public function index($request)
    {
        $this->scriptRepository->pushCriteria(new RequestCriteria($request));
        
        return $this->scriptRepository->where('user_id', auth()->user()->id)->paginate();
    }

    public function show($id)
    {   
        return $this->scriptRepository->where('user_id', auth()->user()->id)->find($id);
    }

    public function create($attributes)
    {
        return \DB::transaction(function() use ($attributes) {
            $attributes['user_id'] = auth()->user()->id;
            $scriptInnput = $attributes;
            unset($scriptInnput['settings'], $scriptInnput['actions']);
            $script = $this->scriptRepository->create($scriptInnput);
            $settingInput = $attributes['settings'];
            $script->setting()->create($settingInput);
            $script->actions()->createMany($attributes['actions']);

            return $script;
        });
    }

    public function update($attributes, $id)
    {
       $script = $this->scriptRepository->find($id)->update($attributes);
       return $this->scriptRepository->find($id);
    }

    public function delete($id)
    {
        $id = $this->scriptRepository->findByRouteKeyName($id)->getKey();

        $this->scriptRepository->delete($id);
        return response('', 204);
    }
}
