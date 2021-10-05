<?php

declare(strict_types=1);

namespace App\Tests\Module\Mpsv\Parser\Source\Data;

use App\Module\Mpsv\Parser\Source\Data\SourceData;
use App\Module\Mpsv\Parser\Source\Data\SourceItem;
use PHPUnit\Framework\TestCase;

/**
 * @author David Valenta <david.valenta96@gmail.com>
 */
class SourceDataTest extends TestCase
{
    private SourceData $sourceData;

    public function setUp(): void
    {
        $sourceItems = [
            new SourceItem(
                'id1',
                'code1',
                'name1',
                'forBlind1',
                'forPurBlind1',
                'specialization1'
            ),
            new SourceItem(
                'id2',
                'code2',
                'name2',
                'forBlind2',
                'forPurBlind2',
                'specialization2'
            ),
        ];

        $this->sourceData = new SourceData($sourceItems);
    }

    public function testDataGetter(): void
    {
        $sourceItems = $this->sourceData->getItems();

        self::assertCount(2, $sourceItems);
        self::assertSame('id1', $sourceItems[0]->getId());
        self::assertSame('code1', $sourceItems[0]->getCode());
        self::assertSame('name1', $sourceItems[0]->getName());
        self::assertSame('forBlind1', $sourceItems[0]->getForBlind());
        self::assertSame('forPurBlind1', $sourceItems[0]->getForPurBlind());
        self::assertSame('specialization1', $sourceItems[0]->getSpecialization());

        self::assertSame('id2', $sourceItems[1]->getId());
        self::assertSame('code2', $sourceItems[1]->getCode());
        self::assertSame('name2', $sourceItems[1]->getName());
        self::assertSame('forBlind2', $sourceItems[1]->getForBlind());
        self::assertSame('forPurBlind2', $sourceItems[1]->getForPurBlind());
        self::assertSame('specialization2', $sourceItems[1]->getSpecialization());

        self::assertSame(md5('id1specialization1'), $sourceItems[0]->getUniqId());
        self::assertSame(md5('id2specialization2'), $sourceItems[1]->getUniqId());
    }
}
