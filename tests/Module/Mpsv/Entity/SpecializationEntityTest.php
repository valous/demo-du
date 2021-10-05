<?php

declare(strict_types=1);

namespace App\Tests\Module\Mpsv\Entity;

use App\Module\Mpsv\Entity\MpsvEntityException;
use App\Module\Mpsv\Entity\SpecializationEntity;
use PHPUnit\Framework\TestCase;

/**
 * @author David Valenta <david.valenta96@gmail.com>
 */
class SpecializationEntityTest extends TestCase
{
    /**
     * @dataProvider entityDataProvider
     */
    public function testTranslateMpsvKey(string $key, string $resultValue): void
    {
        self::assertSame(SpecializationEntity::translateMpsvKey($key), $resultValue);
    }

    public function testTranslateInvalidMpsvKey(): void
    {
        self::expectException(MpsvEntityException::class);
        SpecializationEntity::translateMpsvKey('invalidMpsvKey');
    }

    /**
     * @return string[][]
     */
    public function entityDataProvider(): array
    {
        return [
            ['OborCinnostiProVm/1', 'Administrativa'],
            ['OborCinnostiProVm/2', 'Doprava'],
            ['OborCinnostiProVm/3', 'Finance'],
            ['OborCinnostiProVm/4', 'Informační technologie'],
            ['OborCinnostiProVm/5', 'Právo'],
            ['OborCinnostiProVm/6', 'Kultura a sport'],
            ['OborCinnostiProVm/7', 'Management'],
            ['OborCinnostiProVm/8', 'Obchod a cestovní ruch'],
            ['OborCinnostiProVm/9', 'Obrana a ochrana'],
            ['OborCinnostiProVm/10', 'Stavebnictví'],
            ['OborCinnostiProVm/11', 'Věda a výzkum'],
            ['OborCinnostiProVm/12', 'Výchova a vzdělávání'],
            ['OborCinnostiProVm/13', 'Výroba a provoz'],
            ['OborCinnostiProVm/14', 'Služby'],
            ['OborCinnostiProVm/15', 'Zdravotnictví'],
            ['OborCinnostiProVm/16', 'Zemědělství a lesnictví'],
        ];
    }
}
