<?php

declare(strict_types=1);

namespace App\Module\Mpsv\Entity;

/**
 * @author David Valenta <david.valenta96@gmail.com>
 */
class SuitabilityEntity implements IMpsvEntity
{
    public const NOT_DEFINED = 'Vhodnost/neurc';
    public const NOT_SUITABLE = 'Vhodnost/neVh';
    public const LESS_SUITABLE = 'Vhodnost/maloVh';
    public const FULL_SUITABLE = 'Vhodnost/vh';
    public const MORE_SUITABLE = 'Vhodnost/velmiVh';

    private const MPSV_VALUES = [
        self::NOT_DEFINED => 'Neurčeno',
        self::NOT_SUITABLE => 'Nevhodné',
        self::LESS_SUITABLE => 'Málo vhodné',
        self::FULL_SUITABLE => 'Vhodné',
        self::MORE_SUITABLE => 'Velmi vhodné',
    ];

    /**
     * @throws MpsvEntityException
     */
    public static function translateMpsvKey(string $key): string
    {
        if (!isset(self::MPSV_VALUES[$key])) {
           throw MpsvEntityException::entityNotExist($key);
        }

        return self::MPSV_VALUES[$key];
    }
}
