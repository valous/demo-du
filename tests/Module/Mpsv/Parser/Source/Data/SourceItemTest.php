<?php

declare(strict_types=1);

namespace App\Tests\Module\Mpsv\Parser\Source\Data;

use App\Module\Mpsv\Parser\Source\Data\SourceItem;
use PHPUnit\Framework\TestCase;

/**
 * @author David Valenta <david.valenta96@gmail.com>
 */
class SourceItemTest extends TestCase
{
    public function testDataGetter(): void
    {
        $sourceItem = new SourceItem(
            'id',
            'code',
            'name',
            'forBlind',
            'forPurBlind',
            'specialization'
        );

        self::assertSame('id', $sourceItem->getId());
        self::assertSame('code', $sourceItem->getCode());
        self::assertSame('name', $sourceItem->getName());
        self::assertSame('forBlind', $sourceItem->getForBlind());
        self::assertSame('forPurBlind', $sourceItem->getForPurBlind());
        self::assertSame('specialization', $sourceItem->getSpecialization());
        self::assertSame(md5('idspecialization'), $sourceItem->getUniqId());
    }
}
