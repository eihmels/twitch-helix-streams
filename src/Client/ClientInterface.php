<?php

declare(strict_types=1);

namespace TwitchHelixStreams\Client;

use Psr\Http\Message\ResponseInterface;
use TwitchHelixStreams\Model\QueryParameters\QueryParameterCollection;

interface ClientInterface
{
    public function streamsRequest(
        string $token,
        QueryParameterCollection $queryParameterCollection = null
    ): ResponseInterface;
}
