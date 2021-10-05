<?php

declare(strict_types=1);

namespace App\Module\Mpsv\Entity;

/**
 * @author David Valenta <david.valenta96@gmail.com>
 */
class SpecializationEntity implements IMpsvEntity
{
    public const ADMINISTRATION = 'OborCinnostiProVm/1';
    public const TRANSPORT = 'OborCinnostiProVm/2';
    public const FINANCE = 'OborCinnostiProVm/3';
    public const INFORMATION_TECHNOLOGY = 'OborCinnostiProVm/4';
    public const JUSTICE = 'OborCinnostiProVm/5';
    public const CULTURE_SPORT = 'OborCinnostiProVm/6';
    public const MANAGEMENT = 'OborCinnostiProVm/7';
    public const TRADE_TOURISM = 'OborCinnostiProVm/8';
    public const DEFENCE_PROTECTION = 'OborCinnostiProVm/9';
    public const CONSTRUCTION = 'OborCinnostiProVm/10';
    public const SCIENCE = 'OborCinnostiProVm/11';
    public const EDUCATION = 'OborCinnostiProVm/12';
    public const PRODUCTION = 'OborCinnostiProVm/13';
    public const SERVICE = 'OborCinnostiProVm/14';
    public const HEALTHCARE = 'OborCinnostiProVm/15';
    public const FARMING = 'OborCinnostiProVm/16';

    private const MPSV_VALUES = [
        self::ADMINISTRATION => 'Administrativa',
        self::TRANSPORT => 'Doprava',
        self::FINANCE => 'Finance',
        self::INFORMATION_TECHNOLOGY => 'Informační technologie',
        self::JUSTICE => 'Právo',
        self::CULTURE_SPORT => 'Kultura a sport',
        self::MANAGEMENT => 'Management',
        self::TRADE_TOURISM => 'Obchod a cestovní ruch',
        self::DEFENCE_PROTECTION => 'Obrana a ochrana',
        self::CONSTRUCTION => 'Stavebnictví',
        self::SCIENCE => 'Věda a výzkum',
        self::EDUCATION => 'Výchova a vzdělávání',
        self::PRODUCTION => 'Výroba a provoz',
        self::SERVICE => 'Služby',
        self::HEALTHCARE => 'Zdravotnictví',
        self::FARMING => 'Zemědělství a lesnictví',
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
