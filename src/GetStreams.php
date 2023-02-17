<?php

declare(strict_types=1);

namespace TwitchHelixStreams;

use Assert\AssertionFailedException;
use GuzzleHttp\Exception\GuzzleException;
use JsonException;
use TwitchHelixStreams\Client\TwitchHelix;
use TwitchHelixStreams\Mapper\StreamCollectionMapper;
use TwitchHelixStreams\Model\QueryParameters\QueryParameterCollection;
use TwitchHelixStreams\Model\Streams\StreamCollection;

final class GetStreams implements ApplicationInterface
{
    public function __construct(private readonly TwitchHelix $twitchHelix)
    {
    }

    /**
     * @throws GuzzleException
     * @throws JsonException
     * @throws AssertionFailedException
     */
    public function execute(string $token, QueryParameterCollection $queryParameterCollection = null): ?StreamCollection
    {
        $response = $this->twitchHelix->streamsRequest($token, $queryParameterCollection);

        $response->getBody()->rewind();

        /** @var array $contents */
        $contents = json_decode($response->getBody()->getContents(), true, 512, JSON_THROW_ON_ERROR);

        return StreamCollectionMapper::mapStreamFromArray($contents);
    }
}
