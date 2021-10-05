<?php

declare(strict_types=1);

namespace App\Module\Mpsv\Parser;

use App\Module\Mpsv\Parser\Source\Data\SourceData;

/**
 * @author David Valenta <david.valenta96@gmail.com>
 */
interface ISource
{
    public function getSourceData(): SourceData;
}
