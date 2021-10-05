<?php

declare(strict_types=1);

namespace App\Module\Mpsv\Parser;

use App\Module\Mpsv\Parser\Source\Data\SourceData;
use App\Module\Mpsv\Parser\Source\InvalidSourceData;

/**
 * @author David Valenta <david.valenta96@gmail.com>
 */
final class LocalStorageSourceParser extends MpsvParser
{
    public function __construct (
        private string $filename
    ) {
    }

    /**
     * @throws InvalidSourceData
     */
    public function getSourceData(): SourceData
    {
        $content = (string) file_get_contents($this->filename);

        return $this->parseSourceData($content);
    }
}
