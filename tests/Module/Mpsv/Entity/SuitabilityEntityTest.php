<?php

declare(strict_types=1);

namespace App\Tests\Module\Mpsv\Entity;

use App\Module\Mpsv\Entity\MpsvEntityException;
use App\Module\Mpsv\Entity\SuitabilityEntity;
use PHPUnit\Framework\TestCase;

/**
 * @author David Valenta <david.valenta96@gmail.com>
 */
class SuitabilityEntityTest extends TestCase
{
    /**
     * @dataProvider entityDataProvider
     */
    public function testTranslateMpsvKey(string $key, string $resultValue): void
    {
        self::assertSame(SuitabilityEntity::translateMpsvKey($key), $resultValue);
    }

    public function testTranslateInvalidMpsvKey(): void
    {
        self::expectException(MpsvEntityException::class);
        SuitabilityEntity::translateMpsvKey('invalidMpsvKey');
    }

    /**
     * @return string[][]
     */
    public function entityDataProvider(): array
    {
        return [
            ['Vhodnost/neurc', 'Neurčeno'],
            ['Vhodnost/neVh', 'Nevhodné'],
            ['Vhodnost/maloVh', 'Málo vhodné'],
            ['Vhodnost/vh', 'Vhodné'],
            ['Vhodnost/velmiVh', 'Velmi vhodné'],
        ];
    }
}
