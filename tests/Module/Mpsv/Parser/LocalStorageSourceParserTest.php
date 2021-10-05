<?php

declare(strict_types=1);

namespace App\Tests\Module\Mpsv\Parser;

use App\Module\Mpsv\Parser\LocalStorageSourceParser;

/**
 * @author David Valenta <david.valenta96@gmail.com>
 */
class LocalStorageSourceParserTest extends MpsvParserTest
{
    public function testValidSourceParser(): void
    {
        $this->validSourceParserTest(
            new LocalStorageSourceParser(self::FIXTURES_VALID_FILENAME)
        );
    }

    public function testInvalidJsonSourceParser(): void
    {
        $this->invalidJsonSourceParserTest(
            new LocalStorageSourceParser(self::FIXTURES_INVALID_JSON_FILENAME)
        );
    }

    public function testInvalidJsonSchemaSourceParser(): void
    {
        $this->invalidJsonSchemaSourceParserTest(
            new LocalStorageSourceParser(self::FIXTURES_INVALID_JSON_SCHEMA_FILENAME)
        );
    }
}
