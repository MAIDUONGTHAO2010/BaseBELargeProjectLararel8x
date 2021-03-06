<?php

namespace App\Transformers\Auth;

use App\Models\Auth\Role\Role;
use App\Transformers\BaseTransformer;

class RoleTransformer extends BaseTransformer
{
    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected $availableIncludes = [
    ];
    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected $defaultIncludes = [
        'permissions',
    ];

    /**
     * A Fractal transformer.
     *
     * @param  \App\Models\Auth\Role\Role  $role
     *
     * @return array
     */
    public function transform(Role $role)
    {
        return [
            'id' => self::forId($role),
            'name' => $role->name,
        ];
    }

    public function includePermissions(Role $role)
    {
        return $this->collection($role->permissions, new PermissionTransformer());
    }

    /**
     * @return string
     */
    public function getResourceKey(): string
    {
        return 'roles';
    }
}
