<?php

declare(strict_types=1);

namespace App\Tests\Module\Mpsv\Parser;

use App\Module\Mpsv\Parser\MpsvOnlineSourceParser;
use App\Module\Mpsv\Parser\Source\InvalidSourceData;
use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;

/**
 * @author David Valenta <david.valenta96@gmail.com>
 */
class MpsvOnlineSourceParserTest extends MpsvParserTest
{
    public function testValidSourceParser(): void
    {
        $this->validSourceParserTest(
            new MpsvOnlineSourceParser(
                $this->createHttpClientSourceMockup(
                    200,
                    self::FIXTURES_VALID_FILENAME
                )
            )
        );
    }

    public function testInvalidJsonSourceParser(): void
    {
        $this->invalidJsonSourceParserTest(
            new MpsvOnlineSourceParser(
                $this->createHttpClientSourceMockup(
                    200,
                    self::FIXTURES_INVALID_JSON_FILENAME
                )
            )
        );
    }

    public function testInvalidJsonSchemaSourceParser(): void
    {
        $this->invalidJsonSchemaSourceParserTest(
            new MpsvOnlineSourceParser(
                $this->createHttpClientSourceMockup(
                    200,
                    self::FIXTURES_INVALID_JSON_SCHEMA_FILENAME
                )
            )
        );
    }

    public function testInvalidClientRequest(): void
    {
        $parser = new MpsvOnlineSourceParser(
            $this->createHttpClientSourceMockup(
                500,
                ''
            )
        );

        self::expectException(InvalidSourceData::class);
        self::expectExceptionMessage('API "data.mpsv.cz" return invalid HTTP response code: 500');

        $parser->getSourceData();
    }

    private function createHttpClientSourceMockup(int $httpCode, string $responseFilename): Client
    {
        $client = $this->createMock(Client::class);
        $client->method('request')->willReturnCallback(function() use ($httpCode, $responseFilename): ResponseInterface {
            $response = $this->createMock(ResponseInterface::class);
            $response->method('getStatusCode')->willReturn($httpCode);
            $response->method('getBody')->willReturnCallback(function() use ($responseFilename): StreamInterface {
                $stream = $this->createMock(StreamInterface::class);
                $stream->method('getContents')->willReturn(
                    file_get_contents($responseFilename)
                );

                return $stream;
            });

            return $response;
        });

        return $client;
    }
}
