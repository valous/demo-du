<?php

declare(strict_types=1);

namespace App\Module\Mpsv\Parser;

use App\Module\Mpsv\Parser\Source\Data\SourceData;
use App\Module\Mpsv\Parser\Source\InvalidSourceData;
use GuzzleHttp\Client;

/**
 * @author David Valenta <david.valenta96@gmail.com>
 */
final class MpsvOnlineSourceParser extends MpsvParser
{
    private const MPSV_URL = 'https://data.mpsv.cz/od/soubory/ciselniky/cz-isco.json';

    public function __construct (
        private Client $client,
        private string $mpsvSourceUrl = self::MPSV_URL
    ) {
    }

    /**
     * @throws InvalidSourceData
     */
    public function getSourceData(): SourceData
    {
        $request = $this->client->request(
            method: 'GET',
            uri: $this->mpsvSourceUrl
        );

        if ($request->getStatusCode() !== 200) {
            throw InvalidSourceData::fromOnlineRequest($request->getStatusCode());
        }

        return $this->parseSourceData(
            $request->getBody()->getContents()
        );
    }
}
