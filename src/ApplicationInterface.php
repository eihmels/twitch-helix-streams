<?php

declare(strict_types=1);

namespace TwitchHelixStreams;

use TwitchHelixStreams\Model\QueryParameters\QueryParameterCollection;
use TwitchHelixStreams\Model\Streams\StreamCollection;

interface ApplicationInterface
{
    public function execute(
        string $token,
        QueryParameterCollection $queryParameterCollection = null
    ): ?StreamCollection;
}
