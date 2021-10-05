<?php

declare(strict_types=1);

namespace App\Module\Mpsv\Entity;

/**
 * @author David Valenta <david.valenta96@gmail.com>
 */
interface IMpsvEntity
{
    public static function translateMpsvKey(string $name): string;
}
