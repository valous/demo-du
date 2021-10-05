<?php

declare(strict_types=1);

namespace App\Module\Mpsv\Parser;

use App\Module\Mpsv\Entity\MpsvEntityException;
use App\Module\Mpsv\Entity\SpecializationEntity;
use App\Module\Mpsv\Entity\SuitabilityEntity;
use App\Module\Mpsv\Parser\Source\Data\SourceData;
use App\Module\Mpsv\Parser\Source\Data\SourceItem;
use App\Module\Mpsv\Parser\Source\InvalidSourceData;
use JsonException;
use Swaggest\JsonSchema\Exception;
use Swaggest\JsonSchema\Schema;

/**
 * @author David Valenta <david.valenta96@gmail.com>
 */
abstract class MpsvParser implements ISource
{
    private const MPSV_SOURCE_SCHEMA = __DIR__ . '/../Schema/mpsv.schema.json';

    /**
     * @throws InvalidSourceData
     */
    protected function parseSourceData(string $source): SourceData
    {
        try {
            $jsonData = json_decode($source, flags: JSON_THROW_ON_ERROR);

            $schema = Schema::import(
                json_decode(
                    json: (string) file_get_contents(self::MPSV_SOURCE_SCHEMA),
                    flags: JSON_THROW_ON_ERROR
                )
            );

            $schema->in($jsonData);
        } catch (JsonException $exception) {
            throw InvalidSourceData::fromJsonError($exception);
        } catch (Exception $exception) {
            throw InvalidSourceData::fromSchemaError($exception);
        }

        $items = [];
        foreach ($jsonData->polozky as $item)
        {
            try {
                $forBlind        = SuitabilityEntity::translateMpsvKey($item->vhodnostProNevidome?->id ?? SuitabilityEntity::NOT_DEFINED);
                $forPurBlind     = SuitabilityEntity::translateMpsvKey($item->vhodnostProSlabozrake?->id ?? SuitabilityEntity::NOT_DEFINED);
                $specializations = array_map(
                    function ($item): string {
                        return SpecializationEntity::translateMpsvKey($item->id);
                    },
                    $item->oboryCinnosti ?? []
                );
            } catch (MpsvEntityException $exception) {
                // TODO Přidat volání Loggovací service
                continue;
            }

            foreach ($specializations as $specialization)
            {
                $items[] = new SourceItem(
                    $item->id,
                    $item->kod,
                    $item->nazev->cs,
                    $forBlind,
                    $forPurBlind,
                    $specialization
                );
            }
        }

        return new SourceData($items);
    }
}
