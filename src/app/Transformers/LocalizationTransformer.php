<?php

namespace App\Transformers;

use App\Values\Localizations\Localization;

class LocalizationTransformer extends BaseTransformer
{
    /**
     * @var  array
     */
    protected $defaultIncludes = [

    ];

    /**
     * @var  array
     */
    protected $availableIncludes = [

    ];

    /**
     * @param  Localization  $entity
     *
     * @return array
     */
    public function transform(Localization $entity)
    {
        $response = [
            'id' => $entity->getLanguage(),

            'language' => [
                'code' => $entity->getLanguage(),
                'default_name' => $entity->getDefaultName(),
                'locale_name' => $entity->getLocaleName(),
            ],
        ];

        // now we manually build the regions
        $regions = [];
        $entity_regions = $entity->getRegions();

        foreach ($entity_regions as $region) {
            $regions[] = [
                'code' => $region->getRegion(),
                'default_name' => $region->getDefaultName(),
                'locale_name' => $region->getLocaleName(),
            ];
        }

        // now add the regions
        $response = array_merge(
            $response,
            [
                'regions' => $regions,
            ]
        );

        $response = $this->filterData(
            $response,
            [

            ]
        );

        return $response;
    }

    /**
     * @return string
     */
    public function getResourceKey(): string
    {
        return 'localizations';
    }
}