<?php

declare(strict_types=1);

namespace App\Module\Mpsv\Parser\Source;

use JsonException;
use Swaggest\JsonSchema\Exception;

/**
 * @author David Valenta <david.valenta96@gmail.com>
 */
final class InvalidSourceData extends \Exception
{
    public static function fromJsonError(JsonException $jsonError): self
    {
        return new self(
            message: 'Invalid JSON source data.',
            previous: $jsonError
        );
    }

    public static function fromSchemaError(Exception $schemaError): self
    {
        return new self(
            message: 'JSON data is not valid by JsonSchema.',
            previous: $schemaError
        );
    }

    public static function fromOnlineRequest(int $errorHttpCode): self
    {
        return new self(
            message: sprintf('API "data.mpsv.cz" return invalid HTTP response code: %d', $errorHttpCode)
        );
    }
}
