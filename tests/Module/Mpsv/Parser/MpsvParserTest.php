<?php

declare(strict_types=1);

namespace App\Tests\Module\Mpsv\Parser;

use App\Module\Mpsv\Parser\MpsvParser;
use App\Module\Mpsv\Parser\Source\Data\SourceData;
use App\Module\Mpsv\Parser\Source\InvalidSourceData;
use PHPUnit\Framework\TestCase;

/**
 * @author David Valenta <david.valenta96@gmail.com>
 */
abstract class MpsvParserTest extends TestCase
{
    protected const FIXTURES_VALID_FILENAME = __DIR__ . '/../../../fixtures/Module/Mpsv/mpsv.valid.source.json';
    protected const FIXTURES_INVALID_JSON_FILENAME = __DIR__ . '/../../../fixtures/Module/Mpsv/mpsv.invalidJson.source.json';
    protected const FIXTURES_INVALID_JSON_SCHEMA_FILENAME = __DIR__ . '/../../../fixtures/Module/Mpsv/mpsv.invalidJsonSchema.source.json';

    protected function validSourceParserTest(MpsvParser $parser): void
    {
        $sourceItems = $parser->getSourceData()->getItems();
        self::assertCount(4, $sourceItems);

        // TODO rozšířít pro otestotávní přesné sady dat v rámci položek $sourceItems
    }

    protected function invalidJsonSourceParserTest(MpsvParser $parser): void
    {
        self::expectException(InvalidSourceData::class);
        self::expectExceptionMessage('Invalid JSON source data.');

        $parser->getSourceData();
    }

    protected function invalidJsonSchemaSourceParserTest(MpsvParser $parser): void
    {
        self::expectException(InvalidSourceData::class);
        self::expectExceptionMessage('JSON data is not valid by JsonSchema.');

        $parser->getSourceData();
    }
}
