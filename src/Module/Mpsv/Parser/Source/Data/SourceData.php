<?php

declare(strict_types=1);

namespace App\Module\Mpsv\Parser\Source\Data;

/**
 * @author David Valenta <david.valenta96@gmail.com>
 */
final class SourceData
{
    /**
     * @param SourceItem[] $items
     */
    public function __construct(
        /** @var SourceItem[] */
        private array $items
    ) {
    }

    /**
     * @return SourceItem[]
     */
    public function getItems(): array
    {
        return $this->items;
    }
}
